<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Med;



class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'adv_name',
        'total_price',
        'quantity',
        'shipping_date',
        'status',
        'paid',
        'user_id',
        'med_id'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function meds(){
        return $this->belongsToMany(Med::class);
    }
}
