<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

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
        'deleted',
        'user_id'
    ];
    const UPDATED_AT = null;
    const CREATED_AT = 'date_creation';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
