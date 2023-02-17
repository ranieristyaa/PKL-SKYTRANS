<style>
</style>
@auth
    @if (auth()->user()->email_verified_at === null)
        <div class="header-top-bar">
            <div class="container">
                <div class="row d-flex align-items-center text-center justify-content-center">
                    Anda tidak dapat melakukan pendaftaran karena belum melakukan verifikasi email.
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="color: yellow">Kirim
                            verifikasi email</button>.
                    </form>
                </div>
            </div>
        </div>
    @endif
@endauth
<nav class="navbar navbar-expand-lg shadow-sm navigation" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="">
            <img src="{{ url('images/logo-semarang.png') }}" alt="" class="img-fluid mr-1" style="max-height:48px;">
            <img src="{{ url('images/logosimentelblue.svg') }}" alt="" class="img-fluid" style="max-height:32px;">
        </a>

        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain"
            aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icofont-navigation-menu"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarmain">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"><a class="nav-link"
                        href="">Beranda</a></li>
                <li class="nav-item {{ Request::is('user/daftar-menara') ? 'active' : '' }}"><a class="nav-link"
                {{-- href="{{ route('user.daftar-menara') }}">Pendaftaran</a></li> --}} 
                href="/user/daftar-menara">Pendaftaran</a></li>

                <li
                    class="nav-item dropdown {{ (Request::is('user/peta-makro*') || Request::is('user/peta-mikro*')) ? 'active' : '' }}">
                    <a class="nav-link dropdown-toggle" id="dropdownpeta" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">Peta<i class="icofont-thin-down"></i></a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownpeta">
                        <li><a class="dropdown-item" href="/user/peta-makro">Peta Menara Makro</a></li>
                        <li><a class="dropdown-item" href="/user/peta-mikro">Peta Menara Mikro</a>
                        </li>
                    </ul>
                </li>

                @auth
                    <li class="nav-item dropdown {{ (Request::is('user/riwayat*') || Request::is('user/edit')) ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" id="dropdownuser" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">Halo, {{ auth()->user()->name }}<i class="icofont-thin-down"></i></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownuser">
                            <li><a class="dropdown-item" href="/user/riwayat">Riwayat Permohonan</a></li>
                            <li><a class="dropdown-item" href="/user/edit">Edit Profil</a></li>
                            <li>
                                <form action="/user/logout" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">Log Out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item dropdown {{ (Request::is('user/login') || 
                                                    Request::is('admin/login') || 
                                                    Request::is('user/register')) ? 'active' : '' }}">
                        <a class="nav-link dropdown-toggle" id="dropdownlogin" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Login <i class="icofont-thin-down"></i></a>
                            
                        <ul class="dropdown-menu" aria-labelledby="dropdownlogin">
                            <li><a class="dropdown-item" href="">Login sebagai Pemohon</a></li>
                            <li><a class="dropdown-item" href="">Login sebagai Admin</a></li>
                        </ul>
                    </li>
                @endauth
                
            </ul>
        </div>
    </div>
</nav>
