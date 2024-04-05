<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['key', 'value'];
    // Je kunt hier meer functies toevoegen zoals accessor en mutator
}
