<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class business_card extends Model
{
    use HasFactory;
     protected $table='business_card';
    protected $fillable = [
        'description', 'image', 'date', 'status'];
}