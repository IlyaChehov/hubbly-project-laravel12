<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    public const GENDER_NOT_SPECIFIED = 0;
    public const GENDER_MALE = 1;
    public const GENDER_FEMALE = 2;

    protected $table = 'profiles';
    protected $fillable = [
        'name',
        'surname',
        'country',
        'city',
        'birthed_at',
        'id_married',
        'gender',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
