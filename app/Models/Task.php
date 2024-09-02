<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $table = 'tasks';

    // Corrección: Se añade 'user_id' a los campos protegidos contra asignación masiva.
    protected $fillable = ['title', 'description', 'user_id'];

    // Relaciones
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
