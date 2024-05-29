<!DOCTYPE html>
<html lang="en">
<head>
  @include('Themes.head');


</head>
<body>

<style>

body{
  background-image: linear-gradient(to bottom, rgba(0,0,0,0.5), rgba(0,0,0,0.5)),url('assets/img/back.jpg');
  background-size: cover;
  background-position: center;
}




  </style>
  <!-- ======= Header ======= -->
  @include('Themes.header');
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('Themes.sidemenu');
  <!-- End Sidebar-->

  <main id="main" class="main text-white">
    <div class="pagetitle">
      <h1 class="text-white">MD5 Encryption</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item text-white"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active text-white">MD5 Encrypt/Decrypt</li>
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
    <textarea id="outputText" style="height: 250px; width: 100%;" class="form-control"></textarea><br>
  </div>
  <div class="col-10 text-center mt-2">
    <button onclick="encryptData()" type="button" class="btn btn-success">Encrypt</button>
    <br>
    <button onclick="decryptData()" type="button" class="btn btn-primary text-white my-2">Decrypt</button>
  </div>
</div>

<!---form-end---->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/crypto-js.min.js"></script>
    <script>
      var originalText = ""; // Variable to store the original text

      function encryptData() {
        var inputText = document.getElementById('inputText').value;
        if (!inputText.trim()) {
          alert("Please enter some text in the input field.");
          return;
        }
        originalText = inputText; // Store the original text
        var encryptedText = CryptoJS.MD5(inputText).toString();
        document.getElementById('outputText').value = encryptedText;
      }

      function decryptData() {
        // Show the original text in the output field
        document.getElementById('outputText').value = originalText;
      }
    </script>
  </main>
</body>
</html>
