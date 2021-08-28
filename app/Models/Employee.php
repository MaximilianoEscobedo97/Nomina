<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $guarded = ['id'];

    static $rules = [
      'email'               => 'required|email|unique:employees,email',
      'name'                => 'required|regex:/^[a-zA-Z\-_]+$/',
      'last_name'           => 'required|regex:/^[a-zA-Z\-_]+$/',
      'second_last_name'    => 'required|regex:/^[a-zA-Z\-_]+$/',
      'code'                => 'required',
      'status'              => 'required',
    ];
}
