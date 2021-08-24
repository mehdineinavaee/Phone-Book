<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;

class Phone extends Model
{
    protected $fillable=['phone'];

    public function contacts()
    {
        return $this->belongsToMany(Contact::class);
    }
}
