<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Header extends Model
{
    protected $table = 'headers';

    protected $fillable = [
        'image', 'user_id', 'status'
    ];

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
