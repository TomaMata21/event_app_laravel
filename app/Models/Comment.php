<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use  HasFactory;

    protected $fillable = [
        'uid',
        'message',
    ];

    protected $dates = [
        'createdAt',
        'updatedAt',
    ];

    protected $appends = ['uid'];

    public function getUidAttribute(): string
    {
        return uniqid('', true);
    }

    public function setCreatedAtAttribute($value): void
    {
        $this->attributes['createdAt'] = $value;
    }

    public function setUpdatedAtAttribute($value): void
    {
        $this->attributes['updatedAt'] = $value;
    }

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function event(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
