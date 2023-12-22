<?php 
 
namespace App\Models; 
 
use Illuminate\Database\Eloquent\Factories\HasFactory; 
use Illuminate\Database\Eloquent\Model; 
use App\Models\Med;
use App\Models\Classification;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FavMed extends Model 
{ 
    use HasFactory; 
    protected $fillable=[ 
        'sci_name', 
        'adm_name', 
        'company', 
        'quantity', 
        'price', 
        'expiration_date', 
        'class_id', 
        'med_id' 
    ]; 
 
    public $timestamps=false; 
    
    public function classification(){
        return $this->belongsTo(Classification::class);
    }

    public function medicines(){ 
        return $this->hasMany(Med::class); 
    } 
}