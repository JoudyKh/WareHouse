<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Med;

class Classification extends Model
{
    use HasFactory;
    protected $fillable=[
        'name'
    ];
    
    public $timestamps=false;

    public function meds(){
        return $this->hasMany(Med::class);
    }
}
