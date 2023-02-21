<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SystemModule extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'system_modules';

    protected $fillable = [
        'system_module',
        'description',
    ];

    public function user_rights()
    {
        return $this->hasMany(UserRight::class, 'system_module_id', 'id');
    }
}
