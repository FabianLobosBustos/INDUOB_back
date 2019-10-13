<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'lastName','rut','dv',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //relaciones
    public function role()
    {
    	return $this->belongsTo(Role::class);
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class,'question_user')->withPivot('nota','aprobado');
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class,'module_user')->withPivot('consultado','completado','fecha_consulta');
    }

}
