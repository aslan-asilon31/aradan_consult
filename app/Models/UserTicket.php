<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ticket',
        'queue_number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
