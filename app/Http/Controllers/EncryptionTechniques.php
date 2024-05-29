<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncryptionTechniques extends Controller
{
    //
    public function sha1()
    {
        // code...
           return view('pages.SHA1');
    }

    public function sha224()
    {
        // code...
           return view('pages.SHA224');
    }


    public function sha256()
    {
        // code...
           return view('pages.SHA256');
    }

     public function sha384()
    {
        // code...
           return view('pages.SHA384');
    }
       public function sha512()
    {
        // code...
           return view('pages.SHA512');
    }

       public function steg()
    {
        // code...
           return view('pages.user_encodedecode');
    }
     public function userEncode()
    {
        // code...
        return view('pages.stegnography');
    }
    public function userDecode()
    {
        // code...
        return view('pages.userencode');
    }
}
