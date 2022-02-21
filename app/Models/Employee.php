<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = ['FirstName','LastName','email','phone'];
    public function company() {
        return $this->belongsTo(Company::class,'company');
    }
}
