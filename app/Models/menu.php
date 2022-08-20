<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class menu extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function Kategori()
    {
        return $this->hasOne(Kategori::class);
    }
}
