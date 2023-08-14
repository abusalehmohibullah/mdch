<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard 2</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('admin-assets/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin-assets/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin-assets/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin-assets/vendor/font-awesome-6.4.0/css/all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin-assets/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('admin-assets/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('admin-assets/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin-assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin-assets/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin-assets/vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin-assets/vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin-assets/vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin-assets/vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin-assets/vendor/vector-map/jqvmap.min.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('admin-assets/css/theme.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('admin-assets/css/style.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">

    @include('admin/header') <!-- Include the header partial -->

    <main class="bg-white py-3">

        <div class="container my-3">
            @if(session('success'))
            <div class="alert alert-success my-3" role="alert">
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger my-3" role="alert">
                {{ session('error') }}
            </div>
            @endif


            @yield('content') <!-- Placeholder for the page-specific content -->
        </div>
    </main>


    @include('admin/footer') <!-- Include the footer partial -->



    <!-- Jquery JS-->
    <script src="{{ asset('admin-assets/vendor/jquery-3.2.1.min.js') }}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('admin-assets/vendor/bootstrap-4.1/popper.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/bootstrap-4.1/bootstrap.min.js') }}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('admin-assets/vendor/slick/slick.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/wow/wow.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/animsition/animsition.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/counter-up/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/counter-up/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/circle-progress/circle-progress.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/chartjs/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/vector-map/jquery.vmap.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/vector-map/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/vector-map/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/vector-map/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('admin-assets/vendor/ckeditor5/build/ckeditor.js') }}"></script>

    <!-- Main JS-->
    <script src="{{ asset('admin-assets/js/main.js') }}"></script>
    <script src="{{ asset('admin-assets/js/js.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: "{{route('ckeditor.upload', ['_token'=>csrf_token()])}}"
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>

</body>

</html>
<!-- end document-->