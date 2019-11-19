<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    protected $table = "customer";

    public $timestamps = false;

    protected $fillable = [
        'name',
        'lastname',
        'email',
        'password',
        'phone',
        'created',
        'register_by',
        'modified',
        'modified_by'
    ];
}
