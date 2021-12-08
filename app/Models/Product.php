<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected array $fillable = ['company_id', 'name', 'price', 'weight', 'active', 'menu_id'];
    public bool $timestamps = false;

    public function getAllData(int $company_id)
    {
        return $this->select(
            'products.id',
            'products.company_id',
            'products.name',
            'products.price',
            'products.weight',
            'products.active',
            'menus.name as menu'
        )
            ->leftJoin('menus', 'products.menu_id', '=', 'menus.id')
            ->where('products.company_id', $company_id)
            ->get();
    }

    public function menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

}
