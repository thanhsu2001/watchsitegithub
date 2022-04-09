<!DOCTYPE html>
<html>

<head>
    <title>{{ $attributes['title'] ?? 'Provjp_Watch' }}</title>
    <link href="{{ asset('/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/css/sb-admin-2.min.css')}}">
</head>

<body>
    @include('common/navbar')
    <div class="container">
        <div class="row">
            <div class="col">
                @if (session('success_mesg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success_mesg') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error_mesg'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error_mesg') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>

    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('/js/demo/chart-pie-demo.js')}}"></script>
</body>

</html>
