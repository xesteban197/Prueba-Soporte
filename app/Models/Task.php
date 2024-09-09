<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $table = 'tasks';

    //protected $fillable = ['title', 'description', 'user_id'];

    protected $fillable = ['id', 'user_id', 'title', 'description', 'completed', 'created_at', 'update_at'];

    // Relaciones
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
