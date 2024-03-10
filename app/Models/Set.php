<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'reviewer',
        'user_id'
    ];

    protected $casts = [
        'reviewer' => 'array'
    ];
 
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
}