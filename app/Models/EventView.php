<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventView extends Model
{
    use HasFactory;
    protected $table ='event_views';
    protected $fillable = [
    'user_id',
    'event_id',

    ];
}
