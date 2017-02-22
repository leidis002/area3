<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

    protected $fillable = ['contact', 'phone', 'observacion', 'persona_id'];

    public function persona()
    {
    	return $this->belongsTo('App\Persona');
    }

    public function proyects()
    {
    	return $this->hasMany('App\Proyect');
    }
}
