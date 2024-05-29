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
    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Include CSRF token -->
</head>
<body>
    <!-- ======= Header ======= -->
    @include('Themes.header')

    <!-- ======= Sidebar ======= -->
    @include('Themes.sidemenu')

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
        </div><!-- End Page Title -->

        <div class="container text-white">
            <div class="row">
                <div class="col-md-6">
                    <h2>Encrypted Encoded Text</h2>
                    <textarea id="encodedText" style="height: 200px; width: 100%;" class="form-control"></textarea>
                </div>
                <div class="col-md-6">
                    <h2>Secret Message</h2>
                    <textarea id="secretMessage" style="height: 200px; width: 100%;" class="form-control"></textarea>
                    
                </div>

                <h2>Decryption Key</h2>
                    <textarea id="decryptionKey" style="height: 200px; width: 50%;" class="form-control"></textarea>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <button onclick="showPasswordModal()" class="btn btn-primary">Decode</button>
                    <button onclick="decryptText()" class="btn btn-warning  text-white">Decrypt</button>
                    <a href="{{route('steg.login')}}" class="btn btn-success btn-md btn-block">Back</a>
                </div>
            </div>
        </div>

        <!-- Password Modal -->
        <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="passwordModalLabel">Enter Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="password" id="passwordInput" class="form-control" placeholder="Enter password">
                        <div id="passwordError" class="text-danger mt-2" style="display: none;">Incorrect password or encoded text.</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" onclick="decodeText()" class="btn btn-primary">Decode</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            // Function to show the password modal
            function showPasswordModal() {
                $('#passwordModal').modal('show');
            }

            // Function to decode text
            function decodeText() {
                // Retrieve the encoded text from the textarea
                var encodedText = document.getElementById('encodedText').value;

                // Retrieve the password from the modal input field
                var password = document.getElementById('passwordInput').value;

                // Send an AJAX request to decode and retrieve the secret message
                $.ajax({
                    url: '{{ route("steg.decode") }}', // Using the decoding route
                    type: 'POST',
                    data: {
                        encoded_text: encodedText,
                        password: password,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        // Update the secret message textarea with the retrieved message
                        document.getElementById('secretMessage').value = response.secret_message;
                        $('#passwordModal').modal('hide'); // Hide the modal after successful decoding
                        $('#passwordError').hide(); // Hide the error message if previously shown
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        // Display error message
                        $('#passwordError').show(); // Show the error message
                    }
                });
            }

            function decryptText() {
                // Retrieve the encoded text and decryption key
                var encodedText = document.getElementById('encodedText').value;
                var decryptionKey = document.getElementById('decryptionKey').value;

                // Check if the encoded text contains the decryption key
                if (encodedText.includes(decryptionKey)) {
                    // Prompt the user to decrypt the text first
                    alert('Please decrypt the text first before proceeding with decryption.');
                    return;
                }

                // Send an AJAX request to decrypt the encoded text
                $.ajax({
                    url: '/decrypt', // Adjust the route for decryption
                    type: 'POST',
                    data: {
                        encoded_text: encodedText,
                        decryption_key: decryptionKey,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        // Update the encodedText textarea with the encoded text
                        document.getElementById('encodedText').value = response.encoded_text;
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                        // Handle errors if any
                    }
                });
            }
        </script>
    </main>
</body>
</html>