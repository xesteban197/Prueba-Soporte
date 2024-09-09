<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all(); // Obtiene todas las tareas
        return response()->json($tasks);
    }
    // Crear tarea
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:500',
            'user' => 'required|max:500',
            'completed' => 'required'
        ]);

        $task = new Task($validated);
        $user = User::where('email',$validated['user'])->first();
        $task->user_id = $user->id;
        $task->save();

        return response()->json(['task' => $task, 'user' => $user]);
    }

    // Actualizar tarea
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:500',
        ]);

        $task = Task::find($id);
       
        if (!$task) {
            return response()->json(['error' => 'Task not found.'], 404);
        }
    
        // Actualiza la tarea con los datos validados.
        $task->update([
            'completed' => 1
        ]);
        return response()->json(['task' => $task]);
    }

    // Eliminar tarea
    public function destroy($id)
    {
        
        $task = Task::find($id);

       
        if(!$task) {
            return redirect()->back()->with('error', 'Task not found.');
        }

        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully.');
    }
}
