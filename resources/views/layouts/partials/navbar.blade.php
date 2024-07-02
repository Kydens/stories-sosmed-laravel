<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand">
            <h1>
                <strong><i>Stories</i></strong>
            </h1>
        </a>
        <div class="navbar" id="navbarNav">
            <ul class="d-flex align-items-center mb-0" style="list-style-type: none">
                {{-- <li class="nav-item mx-4">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Recipient's username">
                        <span class="input-group-text" id="basic-addon2">Search</span>
                    </div>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link"
                        style="{{ Route::is('home') ? 'font-weight:500; color:#f3f5f7;' : 'font-weight:500; color:lightgrey;' }}"
                        href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <div class="btn-group">
                        <button class="btn btn-dark btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                                style="width: 24px;" alt="Avatar" />
                            <span class="fs-6">{{ Auth::user()->username }}</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item"
                                    href="{{ route('profile.index', ['username' => Auth::user()->username]) }}">
                                    Profile
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item text-danger fw-bold" href="{{ route('logout') }}">Logout</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
