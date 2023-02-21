<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Selection extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'selections';

    protected $fillable = [
        'code',
        'value',
        'category',
        'particulars',
    ];

    // protected static function boot() {
    //     parent::boot();
    
    //     static::creating(function($model){
    //         $max = self::max('code') ?? 0;
    //         $no = intval($max) + 1;

    //         $model->code = str_pad($no, 10, '0', STR_PAD_LEFT);
    //     }); 
    // }
}
