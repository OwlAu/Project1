<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventFeedback extends Model
{
    use HasFactory;
    protected $table ='eventfeedbacks';
    protected $fillable = [
    'user_id',
    'event_id',
    'feedback',
    ];
}
