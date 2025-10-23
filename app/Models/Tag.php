<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tags';
    protected $fillable = ['title'];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(
            Post::class,
            'post_tag',
            'tag_id',
            'post_id'
        )->withTimestamps();
    }
}
