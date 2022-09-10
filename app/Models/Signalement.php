<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signalement extends Model
{
    use HasFactory;
    protected $fillable = ['pays', 'wilaya', 'daira', 'commune', 'codePostale', 'depassement', 'depass_description', 'voir_respo', 'conduit', 'solution_propose', 'nature', 'user_id', 'statut'];
    const UPDATED_AT = null;
    const CREATED_AT = 'date_creation';
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
