<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResponseMessage extends Model
{
    use HasFactory;
    public function Platform()
    {
        return $this->hasMany(Platform::class);
    }
}
