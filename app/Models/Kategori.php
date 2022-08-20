<?php

namespace App\Models;

use App\Models\menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function Menu()
    {
        return $this->belongsTo(menu::class);
    }
}
