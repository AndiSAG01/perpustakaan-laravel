<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'transactionCode',
        'book_id',
        'user_id',
        'submission',
        'entry',
        'return',
        'late_id',
        'lateDay',
        'description',
        'status'

    ];
   
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function late()
    {
        return $this->belongsTo(Late::class);
    }

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }

}
