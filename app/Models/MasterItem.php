<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MasterItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'kode',
        'nama',
        'harga_beli',
        'laba',
        'supplier',
        'jenis',
        'created_at',
        'updated_at',
        'deleted_at',
        'foto'

    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_master_item');
    }
}
