<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * The roles that belong to the Usuario
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'role_usuarios');
    }
}
