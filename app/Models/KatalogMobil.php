<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KatalogMobil extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $table = 'katalog_mobil';


}
