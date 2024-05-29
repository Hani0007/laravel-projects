<!DOCTYPE html>
<html lang="en">
<head>
  @include('Themes.head');
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script> <!-- Include CryptoJS library -->
  <script>
    var originalText = ''; // Variable to store the original text

    function encryptText() {
      originalText = document.getElementById('inputText').value.trim(); // Store the original text
      if (originalText === '') {
        alert('Please enter text to encrypt.');
        return;
      }
      var encryptedText = CryptoJS.SHA224(originalText); // Encrypt the input text using SHA224
      document.getElementById('outputText').value = encryptedText.toString(); // Set the encrypted text to the output field
    }

    function decryptText() {
      if (originalText === '') {
        alert('No text was encrypted.');
        return;
      }
      document.getElementById('outputText').value = originalText; // Show the original text in the output field
    }
  </script>
</head>
<body>

  <!-- ======= Header ======= -->
  @include('Themes.header');
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('Themes.sidemenu');
  <!-- End Sidebar-->

  <main id="main" class="main text-white">

    <style type="">
    
    body{
      background-image: url('assets/img/back.jpg');
      background-size: cover;
      background-position: center;
      
    }
  </style>


    <div class="pagetitle">
      <h1 class="text-white">SHA224 Encryption</h1>
      <nav>
        <ol class="breadcrumb ">
          <li class="breadcrumb-item text-white"><a href="">Home</a></li>
          <li class="breadcrumb-item active text-white">SHA224 Encrypt/Decrypt</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="row">
      <div class="col-md-5 mt-2">
        <h3>Input</h3>
        <textarea id="inputText" style="height: 250px; width: 100%;" type="text" class="form-control"></textarea>
      </div>
      <br>
      <div class="col-md-5 mt-2">
        <h3>Output</h3>
        <textarea id="outputText" style="height: 250px; width: 100%;" type="text" class="form-control"></textarea>
      </div>
      <br>
      <div class="col-10 text-center mt-2">
        <button type="button" class="btn btn-primary my-2 py-2" onclick="encryptText()">Encrypt</button><br>
        <button type="button" class="btn btn-success my-2 py-2 text-white" onclick="decryptText()">Decrypt</button>
      </div>
    </div>

  </main><!-- End #main -->


</body>
</html>
