<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fund extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function donateds(): HasMany
    {
        return $this->hasMany(Donated::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
