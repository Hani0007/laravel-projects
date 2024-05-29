<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Steganography</title>
    <!-- Include your CSS files here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-md5/2.18.0/js/md5.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <!-- Include CSRF token -->
</head>
<body>
    <!-- ======= Header ======= -->
    @include('Themes.header')

    <!-- ======= Sidebar ======= -->
    @include('Themes.sideadmin')

    <main id="main" class="main">
        <style>
            body {
                background-size: cover;
                background-image: url('assets/img/back.jpg');
                background-position: center;
            }
        </style>
        <div class="pagetitle">
            <h1 class="text-white">Steganography</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-white"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active text-white">Stegnography</li>
                </ol>
            </nav>
        </div>
    <!-- End Page Title -->

        <div class="container text-white">
            <div class="row">
                <div class="col-md-6">
                    <h2>Cover Text</h2>
                    <textarea id="coverText" style="height: 200px; width: 100%;" class="form-control"></textarea>
                </div>
                <div class="col-md-6">
                    <h2>Secret Message</h2>
                    <textarea id="secretMessage" style="height: 200px; width: 100%;" class="form-control"></textarea>
                </div>
            </div>
            <div class="row mt-2">
                <!-- <div class="col-md-6">
                    <h2>Password</h2>
                    <input type="password" id="password" class="form-control">
                    <div id="passwordError" class="text-danger"></div>  -->
                    <!-- Error message container -->
                </div>
                <div class="col">
                    <button onclick="encodeAndSave()" class="btn btn-warning text-white">Encode</button>
                    <a href="{{route('steg.login')}}" class="btn btn-success btn-md btn-block">Back</a>
                    


                    




                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <h2 class="text-white">Encoded Text</h2>
                    <textarea id="encodedText" style="height: 200px; width: 100%;" class="form-control"></textarea>
                </div>
                <div class="col">
                    <h2 class="text-white">MD5 Key</h2>
                    <textarea type="text" id="md5Hash" style="height: 200px; width: 100%;" class="form-control"></textarea>
                </div> 
            </div>
         

     
    </div>
    <script>
    // Function to handle encoding and saving data
    function encodeAndSave() {
        // Retrieve cover text and secret message from the input fields
        var coverText = document.getElementById('coverText').value;
        var secretMessage = document.getElementById('secretMessage').value;

        // Make AJAX request to the backend to perform encoding and saving
        $.ajax({
            url: '/encode-and-save',
            type: 'POST',
            data: {
                cover_text: coverText,
                secret_message: secretMessage,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Update the encoded text textarea with the result
                document.getElementById('encodedText').value = response.encoded_text;

                // Update the MD5 hash input field
                document.getElementById('md5Hash').value = response.md5_hash;

                // Generate password based on MD5 hash
                var password = response.md5_hash.substr(-4); // Last four characters of the MD5 hash
                document.getElementById('password').value = password;
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }

    function showPasswordModal() {
        $('#passwordModal').modal('show');
    }



    function decodeMessage() {
        var encodedText = document.getElementById('encodedText').value;
        var password = document.getElementById('modalPassword').value;
        
        $.ajax({
            url: '/decode',
            type: 'POST',
            data: {
                encoded_text: encodedText,
                password: password,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#passwordModal').modal('hide');
                document.getElementById('decodedMessage').value = response.secret_message;
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                document.getElementById('modalPasswordError').innerText = "Incorrect Password or Error Occurred.";
            }
        });
    }
</script>

           



    </main>



    
 




</body>
</html>
