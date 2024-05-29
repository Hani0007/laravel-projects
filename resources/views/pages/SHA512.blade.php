
<<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!--Bootstrap Bundle with Popper-->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script> -->
<!-- jQuery -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
</head>

@include('Themes.head');

<body>

  <!-- ======= Header ======= -->

  @include('Themes.header');

  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('Themes.sidemenu');

  <!-- End Sidebar-->

  <main id="main" class="main text-white">
    <style>
    body {
      background-size: cover;
      background-image: url('assets/img/back.jpg');
      background-position: center;

     } 


    </style>

    <div class="pagetitle">
      <h1 class="text-white">SHA512 Encryption</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item text-white"><a href="">Home</a></li>
          <li class="breadcrumb-item active text-white">SHA512 Encrypt/Decrypt</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->


    <!--form start-->

    <div class="row">
      <div class="col-md-6 mt-2">
        <h3>Input</h3>
        <textarea id="inputText" style="height: 250px; width: 100%;" type="text" class="form-control"></textarea>
      </div><br></br>
      <div class="col-md-6 mt-2">
        <h3>Output</h3>
        <textarea id="outputText" style="height: 250px; width: 100%;" type="text" class="form-control"></textarea>
      </div>
      <br></br><br>
      <div class="col-12 text-center mt-2">
        <button id="encryptButton" type="button" class="btn btn-primary my-2 py-2">Encrypt</button><br>
        <div class="col-12 text-center">
          <button id="decryptButton" style="color:white" type="button" class="btn btn-success py-2 text-white">Decrypt</button>
        </div>
      </div>
    </div>

  </main><!-- End #main -->

 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
  <script>
    // Variable to store the original text
    var originalText = "";

    // Function to display warning alert if input fields are empty
    function validateInput() {
      var inputText = document.getElementById("inputText").value.trim();
      if (inputText === "") {
        alert("Input field is empty. Please enter text.");
        return false;
      }
      return true;
    }

    // Event listener for encrypt button
    document.getElementById("encryptButton").addEventListener("click", function(event) {
      if (!validateInput()) {
        event.preventDefault();
        return;
      }
      
      originalText = document.getElementById("inputText").value;
      var encryptedText = CryptoJS.SHA512(originalText).toString(CryptoJS.enc.Hex);
      document.getElementById("outputText").value = encryptedText;
    });
    
    // Event listener for decrypt button
    document.getElementById("decryptButton").addEventListener("click", function(event) {
      if (originalText) {
        document.getElementById("outputText").value = originalText;
      } else {
        alert("No original text found for decryption.");
      }
    });
  </script>

</body>

</html>
