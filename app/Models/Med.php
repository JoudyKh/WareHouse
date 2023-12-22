<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Classification;
use App\Models\Company;
use App\Models\Order;
use App\Models\Owner;


class Med extends Model
{
    use HasFactory;
    protected $fillable=[
        'med_id',
        'sci_name',
        'adv_name',
        'class_id',
        'company_id',
        'store_name',
        'quantity',
        'price',
        'expiration_date'
    ];
    public $timestamps = false;

    public function orders(){
        return $this->belongTo(Order::class);
    }

    public function classifications(){
        return $this->belongsTo(Classification::class);
    }

    public function companies(){
        return $this->belongsTo(Company::class);
    }
    
    public function store_name(){
        return $this->belongTo(Owner::class,'store_name');
    }
}
