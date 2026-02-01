<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function student() {
        return $this->belongsTo(Student::class);
    }

    public function item() {
        return $this->belongsTo(Item::class);
    }

    public function officer() {
        return $this->belongsTo(Officer::class);
    }

    public function return() {
        return $this->hasOne(Returns::class);
    }
}
