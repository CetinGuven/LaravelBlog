<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';

    protected $fillable = [
        'id',
        'title',
        'article',
        'category_id',
    ];
    public function categori()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }
}

