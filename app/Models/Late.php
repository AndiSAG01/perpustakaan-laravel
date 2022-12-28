<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Late extends Model
{
    use HasFactory;

    protected $fillable = ['body'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
