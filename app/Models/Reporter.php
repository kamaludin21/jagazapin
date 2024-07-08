<?php

namespace App\Models;

use App\Models\Discussion;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reporter extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
    [
        'complaint_id',
        'reporter_category_id',
        'name',
        'phone_number',
        'email',
        'address',
    ];

    protected $hidden = [
        'uuid',
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

    public function complaint(): BelongsTo
    {
        return $this->belongsTo(Complaint::class, 'complaint_id', 'id');
    }

    public function reporterCategory(): BelongsTo
    {
        return $this->belongsTo(ReporterCategory::class, 'reporter_category_id', 'id');
    }

    public function discussion(): BelongsTo
    {
        return $this->belongsTo(Discussion::class, 'complaint_id', 'id');
    }
}
