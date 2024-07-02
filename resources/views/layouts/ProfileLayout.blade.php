@extends('layouts.PostLayout')

@section('contentPost')
    <div class="d-flex flex-column gap-2">
        <div class="card shadow-sm mb-2" style="width: 100%;">
            {{-- profile --}}
            <div class="card-body p-0">
                <div
                    style="width: 100%; min-height: 150px; max-height:200px; background-image: url({{ asset('images/sky.jpg') }}); background-size: cover;">
                </div>
                <div class="position-relative" style="min-height: 80px; max-height: 80px; height: 80px">
                    <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle position-absolute"
                        style="width: 100px; top: -60%; left: 4%;" alt="Avatar" />
                </div>
                <div class="container px-4 pb-4">
                    <h1 class="mb-0 card-title">{{ $user->name }}</h1>
                    <span class="card-subtitle text-muted">{{ '@' . $user->username }}</span>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="navbar" id="navbarNav">
                    <ul class="d-flex justify-content-around mb-0 p-0" style="list-style-type: none; width: 100%">
                        <li class="nav-item">
                            <a class="nav-link"
                                style="font-weight: 600; color: black; {{ Route::is('profile.index') ? 'border-bottom: black solid 4px;' : '' }}"
                                href="{{ route('profile.index', Auth::user()->username) }}">
                                Post
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"
                                style="font-weight: 600; color: black; {{ Route::is('profile.likes') ? 'border-bottom: black solid 4px;' : '' }}"
                                href="{{ route('profile.likes', ['username' => Auth::user()->username]) }}">
                                Like
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="contentPost">
            @yield('contentProfile')
        </div>
    </div>
@endsection
