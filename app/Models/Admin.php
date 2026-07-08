<?php

namespace App\Models;


use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admins';

    protected $fillable = [
        'username_admin',
        'email_admin',
        'password_admin',
    ];

    protected $hidden = [
        'password_admin',
        'remember_token',
    ];

    /**
     * Memberitahu Laravel bahwa kolom password bernama password_admin
     */
    
    public function getAuthPassword()
    {
        return $this->password_admin;
    }
 
}