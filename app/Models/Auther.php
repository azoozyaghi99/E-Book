<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auther extends Model
{
    use HasFactory;
    public $table='authers';
    public function book(){
        return $this->hasMany(Info_Book::class);
    }
}
