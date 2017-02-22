<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyect extends Model
{
    protected $table = 'proyects';

    protected $fillable = ['name', 
    	'description', 
    	'start', 
    	'ending', 
    	'status', 
    	'cost', 
    	'coin',
    	'type', 
    	'user_id', 
    	'client_id'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function client()
    {
    	return $this->belongsTo('App\Client');
    }
}
