@include('components.header')

<body class="d-flex h-100 text-center text-white bg-dark">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
@include('components.navbar')

@if(session()->has('sukses'))
    <p class="alert alert-success">
        {{session('sukses')}}
    </p>
@endif
@if(session()->has('gagal'))
    <p class="alert alert-danger">
        {{session('gagal')}}
    </p>
@endif
{{ $slot }}    
</div>
</body>
</html>