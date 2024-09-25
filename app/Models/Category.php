<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
   use HasFactory;

   // Add 'status' to the fillable fields
   protected $fillable = ['title', 'description', 'status'];
}

?>
