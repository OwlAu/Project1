<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Confession extends Model
{
    use HasFactory;
    protected $table ='confessions';
    protected $fillable = [
    'user_id',
    'content',
    ];
}
