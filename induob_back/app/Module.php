<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'titulo', 'descripcion',
    ];

    
    //relaciones
    public function documents()
    {
    	return $this->hasMany(Document::class);
    }

    public function questions()
    {
    	return $this->hasMany(Question::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'question_user');
    }

}
