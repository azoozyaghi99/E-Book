<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place_Of_Publication extends Model
{
    use HasFactory;
    public $table='place_of_publications';
    public function book(){
        return $this->hasMany(Info_Book::class);
    }
}
