<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TravelPackage extends Model
{
    use HasFactory;
    use SoftDeletes;
   protected $fillable = [
    'title', 'slug', 'location', 'about', 'featured_event', 'language', 'foods', 'departured_date', 'duration', 'type', 'price'
   ];

   protected $hidden = [

   ];

   public function galleries(){
    return $this->hasMany(Gallery::class, 'packages_id', 'id');
   }

   public function transaction(){
    return $this->hasMany(Transaction::class, 'travel_packages_id', 'id');
   }
}
