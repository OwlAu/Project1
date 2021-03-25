<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocietyMember extends Model
{
    use HasFactory;
    protected $table ='society_members';
    protected $fillable = [
    'user_id',
    'status',
    'image',
    'club_id'
    ];
}
