<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected array $fillable = ['title', 'description'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function menus(): HasMany
    {
        return $this->hasMany(Menu::class);
    }

}
