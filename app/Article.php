<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'title', 'slug', 'content', 'user_id', 'image', 'status'
    ];

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
