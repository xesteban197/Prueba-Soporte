import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios'; // Asegúrate de tener axios instalado

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        tasks: [] // Estado inicial para las tareas
    },
    mutations: {
        ADD_TASK(state, task) {
            state.tasks.push(task);
        },
        UPDATE_TASK(state, updatedTask) {
            console.log("state.tasks === " , state.tasks);
            
            const index = state.tasks.findIndex(t => t.id === updatedTask);
            if (index !== -1) {
                Vue.set(state.tasks, index, updatedTask);
            }

            const findedTask = state.tasks.find(t => t.task.id === updatedTask);

            axios.put(`/tasks/${updatedTask}`, findedTask.task)
            .then(response => {
                console.log("respondse == ", response.data);
                
            })
            .catch(error => {
                console.error("Error updating task:", error);
            });
        },
        DELETE_TASK(state, taskId) {
            state.tasks = state.tasks.filter(t => t.task.id !== taskId);
        }
    },
    actions: {
        addTask({ commit }, task) {
            axios.post('/tasks', task)
                .then(response => {
                    commit('ADD_TASK', response.data);
                })
                .catch(error => {
                    console.error("Error adding task:", error);
                });
        },
        completeTask({ commit }, task) {
            commit('UPDATE_TASK', task);                
        },
        deleteTask({ commit }, taskId) {
            axios.post(`/tasks/${taskId}`)
                .then(() => {
                    commit('DELETE_TASK', taskId);
                })
                .catch(error => {
                    console.error("Error deleting task:", error);
                });
        }
    },
    getters: {
        tasks: state => state.tasks
    }
});
