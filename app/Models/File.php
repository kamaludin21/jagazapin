<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
    [
        'user_id',
        'file_category_id',
        'slug',
        'title',
        'file',
        'attachment',
        'is_show',
    ];

    protected $hidden = [
        'uuid',
    ];

    protected $casts = [
        'is_show' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->uuid = Str::uuid();
        });
    }

    public function scopeShow($query)
    {
        return $query->where('is_show', true);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(FileCategory::class, 'file_category_id', 'id');
    }
}
