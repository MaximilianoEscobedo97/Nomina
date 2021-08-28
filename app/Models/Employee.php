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
      'email'               => 'required|email',
      'name'                => 'required',
      'last_name'           => 'required',
      'second_last_name'    => 'required',
      'code'                => 'required',
      'status'              => 'required',
    ];
}
