<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Suspect extends Model
{
  use HasFactory, SoftDeletes;

  protected $fillable =
  [
    'complaint_id',
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

  public function complaint(): BelongsTo
  {
    return $this->belongsTo(Complaint::class, 'complaint_id', 'id');
  }

  public function discussion(): BelongsTo
  {
    return $this->belongsTo(Discussion::class, 'complaint_id', 'id');
  }
}
