<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    /**
     * The usuarios that belong to the Role
     */
    public function usuarios(): BelongsToMany
    {
        return $this->belongsToMany(Usuario::class);
    }
}
