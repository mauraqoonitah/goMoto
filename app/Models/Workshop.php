<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Workshop extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'address',
        'phone_number',
        'distance',
    ];

    /**
     * Get all of the comments for the Workshop
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function motorcycles(): HasMany
    {
        return $this->hasMany(Motorcycle::class, 'workshop_id', 'id');
    }

}
