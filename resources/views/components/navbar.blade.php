<header class="mb-auto">
    <div>
    <h3 class="float-md-start mb-0">Tera Apps</h3>
    <nav class="nav nav-masthead justify-content-center float-md-end">
        @auth()
        <a class="nav-link {{ Request::segment(1) == "" ? "active" : "" }}" href="{{ Request::segment(1) == "" ? "/" : "/pasien" }}">{{ Request::segment(1) == "" ? "Home" : "Pasien" }}</a>
        <a class="nav-link {{ Request::segment(1) == "daftar" ? "active" : "" }}" href="{{ Request::segment(1) == "daftar" ? "/daftar" : "/rs" }}">{{ Request::segment(1) == "daftar" ? "Daftar" : "RS" }}</a>
        <a href="#" class="nav-link">
        <form action="/keluar" method="post"">
            @csrf
            <button type="submit" class="btn btn-outline-light btn-sm">Keluar</button>
        </form>
        </a>
        @else
        <a class="nav-link {{ Request::segment(1) == "daftar" ? "active" : "" }}" href="{{ Request::segment(1) == "daftar" ? "#" : "/daftar" }}">Daftar</a>
        @endauth
    </nav>
    </div>
</header>