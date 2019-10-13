<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'enunciado', 'alternativa_A', 'alternativa_B', 'alternativa_C','alternativa_D','correcta',
    ];


    //relaciones
    public function module()
    {
    	return $this->belongsTo(Module::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class,'question_user');
    }

}
