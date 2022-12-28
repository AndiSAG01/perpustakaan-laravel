<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'class',
        'leaderName',
        'position',
        'noId',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
