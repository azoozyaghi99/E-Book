<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info_Book extends Model
{
    use HasFactory;
    public $table='info_books';
    public function books(){
        return $this->belongsTo(Book::class);
    }
    public function authers(){
        return $this->belongsTo(Auther::class);
    }
    public function categories(){
        return $this->belongsTo(Category::class);
    }
    public function place_of_publications(){
        return $this->belongsTo(Place_Of_Publication::class);
    }
}
