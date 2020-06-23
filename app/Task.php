<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['user_id', 'title', 'completed'];

    protected $hidden = ['created_at', 'updated_at','is_deleted'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
