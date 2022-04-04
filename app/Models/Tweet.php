<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tweet extends Model
{
  use HasFactory;

  protected $guarded = [];


  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  /**
   * Get the user's first name.
   *
   * @return \Illuminate\Database\Eloquent\Casts\Attribute
   */

  protected function createdAt(): Attribute
  {
    return Attribute::make(
      get: fn ($value) => \Carbon\Carbon::parse($value)->diffForHumans(),
    );
  }
}
