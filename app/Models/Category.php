<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['code, name', 'location'];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
