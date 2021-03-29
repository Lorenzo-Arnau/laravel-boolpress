<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\AuthorSpec;
use App\Post;
class Author extends Model
{
        public function specs(){
            return $this->hasOne('App\AuthorSpecs');
        }
        public function posts(){
            return $this->hasMany('App\Post');
        }
}
