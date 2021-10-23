<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Renewal extends Model
{
    // Mass Assignment(割り当て許可)エラー防止？
    protected $guarded = array('id');
    
    public static $rules = array(
        'profile_id' => 'required',
        'update_at' => 'required',
        );
    
}
