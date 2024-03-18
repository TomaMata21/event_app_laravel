<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use  HasFactory;

    protected $fillable = [
        'uid',
        'title',
        'description',
        'coverImage',
        'dateTime',
    ];

    protected $dates = [
        'createdAt',
        'updatedAt',
        'dateTime',
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

    public function setDateTimeAttribute($value): void
    {
        $this->attributes['dateTime'] = Carbon::parse($value);
    }


    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function participations(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Participation::class);
    }

    public function comments(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
