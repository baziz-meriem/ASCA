<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contribution extends Model
{
    use HasFactory;
    protected $fillable = [
        'nature',
        'pays',
        'wilaya',
        'commune',
        'codePostale',
        'maire',
        'deputé',
        'wali',
        'description',
        'proposition',
        'user_id'
    ];
    const UPDATED_AT = null;//to only display creation date
    const CREATED_AT = 'date_creation';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
