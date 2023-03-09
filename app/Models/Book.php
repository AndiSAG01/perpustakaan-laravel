<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    // protected $guarded = [];
    protected $fillable = [
        'barcode',
        'image',
        'publicId',
        'category_id',
        'isbn',
        'source',
        'by',
        'title',
        'author',
        'publisher',
        'publicationYear',
        'stock',
    ];
    public function borrow()
    {
        $this->stock--;
        $this->save();
    }
    public function lend()
    {
        $this->stock++;
        $this->save();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function source()
    {
        return $this->belongsTo(Category::class);
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

}
