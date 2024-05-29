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
        .btn .btn-success {
            gap: 30px;
        }       </style>
        <div class="pagetitle">
            <h1 class="text-white">Steganography</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item text-white"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active text-white">Stegnography</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body text-center">
                    <h5 class="card-title">Encryption Interface</h5>
                    <p class="card-text">Choose an action:</p>
                    <a href="{{route('encode_admin.encode')}}" class="btn btn-success btn-md btn-block mx-3">Encode</a>
                    <a href="{{route('decode_admin.decode')}}" class="btn btn-primary btn-md btn-block">Decode</a>
                </div>
            </div>
        </div>
    </div>
</div>

    
    </main>
</body>
</html>