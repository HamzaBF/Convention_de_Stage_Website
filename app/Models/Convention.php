<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convention extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'Name',
        'Date',
        'Lieu_De_Naissance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
