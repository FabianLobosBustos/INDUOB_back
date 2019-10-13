<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{

    protected $fillable = [
        'titulo',
        'descripcion',
    ];

     //relaciones
     public function module()
     {
         return $this->belongsTo(Module::class);
     }
     
}
