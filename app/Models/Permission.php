<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
  protected $table = 'permissions';
  protected $fillable = ['id', 'name', 'slug'];
  public $timestamps = false;

  public function roles()
  {
    return $this->belongsToMany(Role::class, 'role_permisison');
  }
}
