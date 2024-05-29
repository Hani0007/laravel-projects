<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Encryption Tool</title>
  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>


  <!-- Include Head -->
  @include('Themes.head');

  <!-- Header -->
  @include('Themes.header');

  <!-- Sidebar -->
  @include('Themes.sidemenu');


  <main id="main" class="main  text-white">

    <style type="">
    
    body{
      background-image: url('assets/img/back.jpg');
      background-size: cover;
      background-position: center;
      
    }
  </style>


    <div class="pagetitle">
      <h1 class="text-white">SHA1 Encryption</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item text-white"><a href="">Home</a></li>
          <li class="breadcrumb-item active text-white">SHA1 Encrypt/Decrypt</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

  <!--form start-->
<div class="row">
  <div class="col-md-5 mt-2">
    <h3>Input</h3>
    <textarea id="inputText" style="height: 250px; width: 100%;" class="form-control"></textarea>
  </div>
  <div class="col-md-5 mt-2">
    <h3>Output</h3>
    <textarea id="outputText" style="height: 250px; width: 100%;" class="form-control"></textarea>
  </div>
</div>
<div class="row mt-2">
  <div class="col-md-10 text-center">
    <button onclick="encrypt()" type="button" class="btn btn-primary my-2 py-2">Encrypt</button>
    <br>
    <button onclick="decrypt()" type="button" class="btn btn-success py-2 text-white">Decrypt</button>
  </div>
</div>
<!---Form End--->


  </main><!-- End #main -->




<!--Bootstrap Bundle with Popper -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script> -->
<!-- jQuery -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

  <!-- Add your JavaScript code or include external JavaScript files here -->
  <script>
    let originalText = ""; // Variable to store original plaintext

    async function encrypt() {
      var input = document.getElementById('inputText').value.trim(); // Adjusted ID here
      if (input === "") {
        alert("Input field is empty. Please enter some text.");
        return;
      }
      originalText = input; // Store the original plaintext
      var hashed = await sha1(input);
      document.getElementById('outputText').value = hashed; // Adjusted ID here
    }

    async function decrypt() {
      if (originalText === "") {
        alert("No text to decrypt.");
        return;
      }
      document.getElementById('outputText').value = originalText; // Set the original plaintext back to input field
      // document.getElementById('inputText').value = ''; // Clear the output field
    }

    async function sha1(str) {
      var buffer = new TextEncoder("utf-8").encode(str);
      var hashBuffer = await crypto.subtle.digest("SHA-1", buffer);
      var hashArray = Array.from(new Uint8Array(hashBuffer));
      var hashedString = hashArray.map(byte => ('00' + byte.toString(16)).slice(-2)).join('');
      return hashedString;
    }
  </script>
</body>
</html>
