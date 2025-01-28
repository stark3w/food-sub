<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tariff extends Model
{
    use HasFactory;

    protected $table = 'tariffs';
    protected $fillable = ['ration_name', 'cooking_day_before'];

}
