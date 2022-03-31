<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = [
      'long_url', 'short_url', 'code'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function visitor() {
        return $this->hasMany(Visitor::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($url) {
            $url->user_id = auth()->id();
        });
    }
}
