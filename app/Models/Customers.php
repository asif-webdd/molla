<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customers extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'email', 'mobile', 'password', 'address', 'email_verified', 'email_verified_at', 'email_verified_token'];
}
