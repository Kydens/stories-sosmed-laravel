@extends('layouts.PostLayout')

@section('contentPost')
    <div class="d-flex flex-column gap-4 py-3" id="detailPost">
        <a class="btn btn-dark rounded-pill" style="width: fit-content;" href="{{ route('home') }}">
            <i class="bi bi-arrow-left" style="-webkit-text-stroke: 1px;"></i>
            Back
        </a>
        <div class="card">
            <div class="card-body d-flex gap-2 px-4 py-3 border rounded shadow-sm post">
                {{--  userAvatarPost --}}
                <div class="mt-1" id="userAvatarPost">
                    <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" style="width: 40px;"
                        alt="Avatar" />
                </div>
                {{-- post --}}
                <div id="post" style="width: 100%;">
                    <div class="mt-0 d-flex justify-content-between" id="user">
                        <div class="d-block">
                            <span>{{ $post->users->name }}</span>
                            <small class="text-muted">{{ '@' . $post->users->username }}</small>
                        </div>
                        <div class="block">
                            <small class="text-muted">
                                {{ $post->created_at }}
                            </small>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-2 justify-content-between">
                        <div id="post" style="width: 100%;">
                            {{ $post->status }}
                        </div>
                        <div class="d-flex align-items-start gap-2" style="z-index: 10">
                            <div class="col-sm-1">
                                <button class="like d-flex align-items-center gap-2 btn btn-disabled p-0">
                                    <i class="bi bi-heart"></i>
                                    <small class="likesCounter">{{ $post->likes }}</small>
                                </button>
                            </div>
                            <div class="col-sm-1">
                                <button id="like" class="d-flex align-items-center gap-2 btn btn-disabled p-0">
                                    <i class="bi bi-chat"></i>
                                    <small class="commentCounter"></small>
                                </button>
                            </div>
                            <div class="col-sm-1">
                                <a class="btn btn-disabled p-0 d-flex align-items-center ">
                                    <i class="bi bi-send"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        @foreach ($recommend as $recommendPost)
            <div class="card">
                <a class="stretched-link"
                    href="{{ route('posts.getPost', ['username' => $post->users->username, 'id' => $post->id]) }}"></a>
                <div class="card-body d-flex gap-2 px-4 py-3 border rounded shadow-sm post">
                    {{--  userAvatarPost --}}
                    <div class="mt-1" id="userAvatarPost">
                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                            style="width: 40px;" alt="Avatar" />
                    </div>
                    {{-- post --}}
                    <div id="post" style="width: 100%;">
                        <div class="mt-0 d-flex justify-content-between" id="user">
                            <div class="d-block">
                                <span>{{ $recommendPost->users->name }}</span>
                                <small class="text-muted">{{ '@' . $recommendPost->users->username }}</small>
                            </div>
                            <div class="block">
                                <small class="text-muted">
                                    {{ $recommendPost->created_at }}
                                </small>
                            </div>
                        </div>
                        <div class="d-flex flex-column gap-2 justify-content-between">
                            <div id="post" style="width: 100%;">
                                {{ $recommendPost->status }}
                            </div>
                            <div class="d-flex align-items-start gap-2" style="z-index: 10;">
                                <div class="col-sm-1">
                                    {{-- <form action="{{ route('home') }}" method="post"> --}}
                                    <button class="like d-flex align-items-center gap-2 btn btn-disabled p-0">
                                        <i class="bi bi-heart notLiked"></i>
                                        <small class="likesCounter">{{ $recommendPost->likes }}</small>
                                    </button>
                                    {{-- </form> --}}
                                </div>
                                <div class="col-sm-1">
                                    <button id="like" class="d-flex align-items-center gap-2 btn btn-disabled p-0">
                                        <i class="bi bi-chat"></i>
                                        <small class="commentCounter"></small>
                                    </button>
                                </div>
                                <div class="col-sm-1">
                                    <a class="btn btn-disabled p-0 d-flex align-items-center ">
                                        <i class="bi bi-send"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
