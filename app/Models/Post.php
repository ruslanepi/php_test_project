<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function someMethod() { echo 123;}
    public $someProperty = 1;

    protected $table = 'posts';
    protected $guarded = [];
}
