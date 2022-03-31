<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $fillable = [
      'visitor_ip', 'visitor_os', 'visitor_device', 'visitor_browser', 'url_id'
    ];

    public function url(){
        return $this->belongsTo(Url::class);
    }
}
