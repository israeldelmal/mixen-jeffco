<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'h1', 'slug', 'description', 'content', 'user_id', 'image'
    ];

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
