<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    use HasFactory;

    // Table name
    protected $table = 'menu';

    protected $primaryKey = 'id';

    // Mass assignable columns (optional)
    protected $fillable = ['name', 'url', 'parent_id', 'sort_order', 'status'];

    // Relation for nested menus
    public function children()
    {
        return $this->hasMany(MenuModel::class, 'parent_id', 'id')
                    ->where('status', 1)
                    ->orderBy('sort_order');
    }
}