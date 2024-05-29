<!DOCTYPE html>
<html lang="en">
<head>
  @include('Themes.head');

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script> <!-- Include CryptoJS library -->
  <script>
    var originalText = ''; // Variable to store the original text
    
    function encryptText() {
      var inputText = document.getElementById('inputText').value.trim(); // Get the input text
      if (inputText === '') {
        alert('Please enter text to encrypt.');
        return;
      }
      originalText = inputText; // Store the original text
      var encryptedText = CryptoJS.SHA256(inputText); // Encrypt the input text using SHA256
      document.getElementById('outputText').value = encryptedText.toString(); // Set the encrypted text to the output field
    }

    function decryptText() {
      if (originalText === '') {
        alert('No text has been encrypted yet.');
        return;
      }
      // document.getElementById('inputText').value = ''; // Clear the output field
      document.getElementById('outputText').value = originalText; // Set the original text to the input field
    }
  </script>
</head>

<!-- Bootstrap Bundle with Popper -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script> -->
<!-- jQuery -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
















<body>

  <!-- ======= Header ======= -->
  @include('Themes.header');
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('Themes.sidemenu');
  <!-- End Sidebar-->

  <main id="main" class="main text-white">
    <style>
      body{
        background-image: url('assets/img/back.jpg');
        background-size:cover;
        background-position: center;
      }
    </style>

    <div class="pagetitle">
      <h1 class="text-white">SHA256 Encryption</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item text-white"><a href="">Home</a></li>
          <li class="breadcrumb-item active text-white">SHA256 Encrypt/Decrypt</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="row">
  <div class="col-md-5 mt-2">
    <h3>Input</h3>
    <textarea id="inputText" style="height: 250px; width: 100%;" class="form-control"></textarea>
  </div>
  <div class="col-md-5 mt-2">
    <h3>Output</h3>
    <textarea id="outputText" style="height: 250px; width: 100%;" class="form-control"></textarea>
      </div>
      <br>
      <div class="col-12 text-center mt-2">
        <button type="button" class="btn btn-primary my-2 py-2" onclick="encryptText()">Encrypt</button><br>
        <button type="button" class="btn btn-success my-2 py-2 text-white" onclick="decryptText()">Decrypt</button>
      </div>
    </div>

  </main><!-- End #main -->

</body>
</html>
