<div class="container ">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ url('frontend/images/logo.png') }}" alt="logo Nomads"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navb"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navb">
                <ul class="navbar-nav ms-auto mr-3">
                    <li class="nav-item mx-md-2 ">
                        <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a class="nav-link" href="{{ url('detail') }}">Paket Travel</a>
                    </li>
                    <li class="nav-item mx-md-2 dropdown">
                        <a class="nav-link dropdown-toggle" href="{{ route('home') }}" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" id="navbardrop">
                            Service
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="">Action</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="">Another action</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item mx-md-2">
                        <a class="nav-link" href="">Testimonial</a>
                    </li>

                    @guest
                        <!-- Moble Button -->
                        <form class="form-check-inline d-sm-block d-md-none" action="{{ route('login') }}">
                            <button class="btn btn-login my-2 my-sm-0 px-4" type="button" onclick="event.preventDefault(); location.href='{{ route('login') }}';">Masuk</button>
                        </form>

                        <!-- desktop button -->
                        <form class="form-check-inline d-none d-md-block "  action="{{ route('login') }}">
                            <button class="btn  rounded-0 btn-login btn-navbar-right my-sm-0 mt-5 px-4 my-auto"
                                type="button" onclick="event.preventDefault(); location.href='{{ route('login') }}';">Masuk</button>
                        </form>
                    @endguest

                    @auth
                        <!-- Moble Button -->
                        <form class="form-check-inline d-sm-block d-md-none" method="POST"  action="{{ url('logout') }}">
                            @csrf
                            <button class="btn btn-login my-2 my-sm-0 px-4" type="submit">Keluar</button>
                        </form>

                        <!-- desktop button -->
                        <form class="form-check-inline d-none d-md-block" method="POST" action="{{ url('logout') }}">
                            @csrf
                            <button
                                class="btn rounded-0 btn-login btn-navbar-right my-sm-0 mt-5 px-4 my-auto" type="submit">Keluar</button>
                        </form>
                    @endauth


                </ul>

            </div>
        </div>
    </nav>
    <!-- End Navbar -->


</div>
