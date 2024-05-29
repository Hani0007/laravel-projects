<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SteganographyData extends Model
{
    protected $table = 'steganography_data';

    protected $fillable = [
        'cover_text',
        'secret_message',
        'encoded_text',
        'encrypted_encoded_text', // Add encrypted_encoded_text to the fillable array
        'password', // Add password to the fillable array
    ];

    // You can define any additional methods or relationships here if needed
}

