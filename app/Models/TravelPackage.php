<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class TravelPackage extends Model
{
    use HasFactory;
    use SoftDeletes;
   protected $fillabel = [
    'title', 'slug', ' location', 'anout', 'featured_event', 'laguage', 'food', 'departure_date', 'duration', 'type', 'price'
   ];

   protected $hidden = [

   ];
}
