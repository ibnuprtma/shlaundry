<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table= 'roles';
    protected $gruarderd= ['id'];

    protected $fillable = [
        'name',
    ];

    public function user()
    {
        return $this->hasMany(App\User::class);
    }
}
