<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable=[
        "nom-categorie",
        "image-categorie"
    ];
    public function scategories()
{
return $this->hasMany(Scategorie::class ,"categorieID");
}
}
