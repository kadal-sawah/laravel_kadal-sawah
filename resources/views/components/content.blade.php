@include('components.header')

<body class="d-flex h-100 text-center text-white bg-dark">

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
@include('components.navbar')

{{ $slot }}    
</div>
</body>
</html>