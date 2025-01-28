<?php

namespace App\Models;


use App\Helpers\PhoneHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use softDeletes;

    protected $table = 'orders';
    protected $fillable = [
        'client_name',
        'client_phone',
        'tariff_id',
        'schedule_type',
        'comment',
        'first_date',
        'last_date',
    ];


    public function tariff()
    {
        return $this->belongsTo(Tariff::class);
    }

    public function ration()
    {
        return $this->hasMany(Ration::class);
    }


}
