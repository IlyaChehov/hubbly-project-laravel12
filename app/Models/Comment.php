<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $table = 'comments';
    protected $fillable = [
        'body',
        'commentable_type',
        'commentable_id',
        'parent_id',
        'user_id',
    ];

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
