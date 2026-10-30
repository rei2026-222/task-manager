<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'is_completed',
        'user_id',     // ユーザーID
        'category_id', // カテゴリーID
    ];

    // 追加：Taskは1人のUserに属する
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 追加：Taskは1つのCategoryに属する
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}