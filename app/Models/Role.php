<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['nom'];

    public const IS_CITOYEN = 0;
    public const IS_ADMIN = 1;
    public const IS_CONTRIBUTEUR = 2;
}
