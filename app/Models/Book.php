<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public $table='books';
    public function info_books(){
        return $this->hasMany(Info_Book::class);
    }
}
