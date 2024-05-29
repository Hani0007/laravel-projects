<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SteganographyData; // Import SteganographyData model

class Stegadmin_Controller extends Controller
{
    public function steg()
    {
        return view('pages.encodedecode');
    }

    public function encodeAndSave(Request $request)
    {
        try {
            // Retrieve cover text and secret message from the request
            $coverText = $request->input('cover_text');
            $secretMessage = $request->input('secret_message');

            // Perform encoding operation using the balanced interword steganography algorithm
            $encodedText = $this->interwordSteganographyEncode($coverText, $secretMessage);

            // Calculate MD5 hash of the encoded text
            $md5Hash = md5($encodedText);

            // Generate password from the last four characters of the MD5 hash
            $password = substr($md5Hash, -4);

            // Save the data to the database, including the generated password
            SteganographyData::create([
                'cover_text' => $coverText,
                'secret_message' => $secretMessage,
                'encoded_text' => $encodedText,
                'encrypted_encoded_text' => $md5Hash,
                'password' => $password // Include the generated password in the database record
            ]);

            // Return the encoded text, MD5 hash, and generated password
            return response()->json([
                'encoded_text' => $encodedText,
                'md5_hash' => $md5Hash,
                'password' => $password
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function interwordSteganographyEncode($coverText, $secretMessage)
    {
        // Convert the secret message to binary representation
        $binaryMessage = $this->textToBinary($secretMessage);

        // Calculate the number of spaces needed to encode each bit of the binary message
        $numSpacesPerBit = ceil(strlen($coverText) / strlen($binaryMessage));

        // Initialize variables
        $encodedText = '';
        $binaryIndex = 0;

        // Iterate through each character in the cover text
        for ($i = 0; $i < strlen($coverText); $i++) {
            $char = $coverText[$i];

            // Skip non-printable characters
            if (!ctype_print($char)) {
                continue;
            }

            // If the character is a space and there's more binary message to encode
            if ($char === ' ' && $binaryIndex < strlen($binaryMessage)) {
                // Determine the number of extra spaces to insert based on the binary message
                $numSpaces = min($numSpacesPerBit, strlen($binaryMessage) - $binaryIndex);

                // Insert the extra spaces
                $encodedText .= str_repeat(' ', $numSpaces);

                // Move to the next bit of the binary message
                $binaryIndex += $numSpaces;
            }

            // Append the current character to the encoded text
            $encodedText .= $char;
        }

        return $encodedText;
    }

    private function textToBinary($text)
    {
        // Convert each character of the text to its binary representation
        return implode('', array_map(function ($char) {
            return str_pad(decbin(ord($char)), 8, '0', STR_PAD_LEFT);
        }, str_split($text)));
    }
    public function encode()
    {
        // code...
        return view('pages.stegnography_admin');
    }
    public function decode()
    {
        // code...
        return view('pages.admindecode');
    }
}
