<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Returns extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function borrow() {
        return $this->belongsTo(Borrow::class);
    }

    public function officer() {
        return $this->belongsTo(Officer::class);
    }
}
