<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
	protected $table = 'personas';

	protected $fillable = [
		'rif',
		'razon',
		'direccion',
		'telefono',
		'email',
	];

    public function user()
    {
    	return $this->hasOne('App\User');
    }

    public function client()
    {
    	return $this->hasOne('App\Client');
    }
}
