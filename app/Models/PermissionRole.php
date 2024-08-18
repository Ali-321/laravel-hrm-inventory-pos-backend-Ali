<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    use HasFactory;

    protected $fillable =[
        'permission_id',
        'role_id',
    ];

    public function permission(){
        return $this->belongTo(Permission::class);
    }

    public function role(){
        return $this->belongTo(Role::class);
    }


}
