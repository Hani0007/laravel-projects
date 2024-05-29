<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Ahmed extends Model implements Authenticatable
{
    protected $table = 'ahmed';

    protected $fillable = [
        'name', 'email', 'password', 'image', 'created_at', 'updated_at'
    ];

    // Implementing required methods from Authenticatable interface

    public function getAuthIdentifierName()
    {
        return 'email'; // Assuming 'email' is the column name for email
    }

    public function getAuthIdentifier()
    {
        return $this->getAttribute($this->getAuthIdentifierName());
    }

    public function getAuthPassword()
    {
        return $this->password; // Assuming 'password' is the column name for password
    }

    public function getRememberTokenName()
    {
        return 'remember_token'; // Assuming 'remember_token' is the column name for remember token
    }

    public function getRememberToken()
    {
        return $this->getAttribute($this->getRememberTokenName());
    }

    public function setRememberToken($value)
    {
        $this->setAttribute($this->getRememberTokenName(), $value);
    }

    // Mutator to hash the password before saving
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
