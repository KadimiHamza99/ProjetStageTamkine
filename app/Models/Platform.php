<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Platform extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'url',
        'statut',
        'logo',
        'response_code'
    ];
}
