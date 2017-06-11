<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Members extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name','address','phone','email','voucher','valid_thru','is_use',
    ];
}
