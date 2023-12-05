<div class="container-fluid bg-dark px-0">
    <div class="row gx-0">
        <div class="col-lg-3 bg-dark d-none d-lg-block">
            <a href="{{ route('home') }}" class="navbar-brand w-100 h-100 m-0 p-0 d-flex align-items-center justify-content-center">
                <h1 class="m-0 text-primary text-uppercase">{{ config('app.name') }}</h1>
            </a>
        </div>
        <div class="col-lg-9">
            <div class="row gx-0 bg-white d-none d-lg-flex">
            </div>
            <nav class="navbar navbar-expand-lg bg-dark navbar-dark p-1 p-lg-0">
                <a href="{{ route('home') }}" class="navbar-brand d-block d-lg-none">
                    <h1 class="m-0 text-primary text-uppercase">ALMERCH</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                    <div class="navbar-nav mr-auto py-1000">
                        <a href="{{ route('home') }}" class="nav-item nav-link{{ Request::is('/') ? ' active' : '' }}">Beranda</a>
                        <a href="{{ route('shop.keranjang') }}" class="nav-item nav-link{{ Request::is('keranjang') ? ' active' : '' }}">Keranjang</a>
                        <a href="{{ route('shop.pemesanan') }}" class="nav-item nav-link{{ Request::is('pemesanan') ? ' active' : '' }}">Pemesanan</a>

                        @guest
                            <a href="{{ route('login') }}" class="nav-item nav-link{{ Request::is('login') ? ' active' : '' }}">Login</a>
                            <a href="{{ route('register') }}" class="nav-item nav-link{{ Request::is('register') ? ' active' : '' }}">Register</a>
                        @else
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ auth()->user()->foto_profil_url }}" alt="Foto Profil" class="img-fluid rounded-circle" style="width: 30px; height: 30px; object-fit: cover; margin-right: 5px;">
                                    {{ auth()->user()->nama_pengguna }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <div class="dropdown-divider"></div>
                                    <form id="logout-form" method="POST" action="{{ route('loginRequest') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Logout</button>
                                    </form>
                                    
                                    <script>
                                        document.getElementById('logout-form').addEventListener('submit', function(event) {
                                            event.preventDefault(); // Prevent the default form submission
                                    
                                            // Perform any additional actions if needed
                                    
                                            // Submit the form programmatically
                                            this.submit();
                                        });
                                    </script>
                                    
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
