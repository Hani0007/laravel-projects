<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SteganographyData;

class StegController extends Controller
{
    public function steg()
    {
        return view('pages.stegnography');
    }

    public function decode(Request $request)
    {
        // Retrieve the encoded text and password from the request
        $encodedText = $request->input('encoded_text');
        $password = $request->input('password');

        // Query the database to retrieve the record with the provided encoded text and password
        $record = SteganographyData::where('encoded_text', $encodedText)
                                    ->where('password', $password)
                                    ->first();

        // Check if the record exists
        if ($record) {
            // If the record exists, return the secret message
            return response()->json(['secret_message' => $record->secret_message]);
        } else {
            // If the record does not exist or password is incorrect, return an error message
            return response()->json(['error' => 'Incorrect password or encoded text'], 404);
        }
    }

    public function checkPassword(Request $request)
    {
        // Retrieve the encoded text and password from the request
        $encodedText = $request->input('encoded_text');
        $password = $request->input('password');

        // Query the database to retrieve the record with the provided encoded text and password
        $record = SteganographyData::where('encoded_text', $encodedText)
                                    ->where('password', $password)
                                    ->first();

        // Check if the record exists
        if ($record) {
            // If the record exists, return the secret message
            return response()->json(['secret_message' => $record->secret_message]);
        } else {
            // If the record does not exist or password is incorrect, return an error message
            return response()->json(['error' => 'Incorrect password or encoded text'], 404);
        }
    }

    public function decrypt(Request $request)
    {
        // Retrieve the decryption key from the request
        $decryptionKey = $request->input('decryption_key');

        // Query the database to retrieve the record with the provided decryption key
        $record = SteganographyData::where('encrypted_encoded_text', $decryptionKey)->first();

        // Check if the record exists
        if ($record) {
            // If the record exists, return the encoded text
            return response()->json(['encoded_text' => $record->encoded_text]);
        } else {
            // If the record does not exist, return an error message
            return response()->json(['error' => 'Decryption key not found'], 404);
        }
    }
}
