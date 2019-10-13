<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'tipo_rol', 
    ];


    //relaciones
    public function users()
    {
    	return $this->hasMany(User::class);
    }

}
