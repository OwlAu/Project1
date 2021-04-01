<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventParticipant extends Model
{
    use HasFactory;

    protected $table ='event_participants';
    protected $fillable = [
    'user_id',
    'status',
    'paymentImage',
    'event_id'
    ];
}
