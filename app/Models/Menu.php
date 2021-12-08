<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected array $fillable = ['name', 'company_id'];
    public bool $timestamps = false;

    /**
     * @param int $company_id
     * @return mixed
     */
    public function getMenuByCompanyId(int $company_id)

    {
        return $this->where('company_id', $company_id)->get();
    }

    public function getColumnsById(int $menu_id, array $fields)
    {
        return $this->select(...$fields)->where('id', $menu_id)->get();
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
