<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Society extends Model
{
    use HasFactory;

    protected $table ='societies';
    protected $fillable = [
    'name',
    'description',
    'logo',
    'societyAvailability',
    'societyFees',
    'user_id'];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function announcements(){
        return $this->hasMany(Announcement::class);
    }
    
}
