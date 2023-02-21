<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRight extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'user_rights';

    protected $fillable = [
        'user_id',
        'system_module_id',
        'can_add',
        'can_save',
        'can_edit',
        'can_delete',
        'can_print',
        'can_lock',
        'can_unlock',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function system_module()
    {
        return $this->belongsTo(SystemModule::class, 'system_module_id');
    }

}
