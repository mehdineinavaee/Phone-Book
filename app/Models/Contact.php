<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Phone;

class Contact extends Model
{
    use HasFactory;
    protected $fillable=['name','family','father_name'];

    public function getFullNameAttribute()
    {
        return $this->name . ' ' . $this->family;
    }

    public function phones()
    {
        return $this->hasMany(Phone::class);
    }
}
