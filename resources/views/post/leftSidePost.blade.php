@extends('layouts.PostLayout')

@section('leftSidePost')
    <ul class="mt-3" style="list-style-type: none">
        <li class="d-flex align-items-center gap-2 fs-5 mb-2 py-2 px-3 rounded-pill sidePost" style="width:fit-content">
            <a href="{{ route('home') }}" class="text-dark" style="text-decoration: none;">
                <i class="bi bi-house-fill"></i>
                Home
            </a>
        </li>
        <li class="d-flex align-items-center gap-2 fs-5 mb-2 py-2 px-3 rounded-pill sidePost" style="width:fit-content">
            <a href="{{ route('profile.index') }}" class="text-dark" style="text-decoration: none;">
                <i class="bi bi-person-fill"></i>
                Profile
            </a>
        </li>
        <li style="text-decoration: none;">
            <button class="btn btn-dark w-100 fs-6 py-2 px-3 rounded-pill justify-content-center" id="postButton">
                Post
            </button>
        </li>
    </ul>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#postButton').click(function() {
                let addPost = (`
                    <div class="card">
                        {{-- <a class="stretched-link" href=""></a> --}}
                        <div class="card-body d-flex gap-2 px-4 py-3 border rounded shadow-sm">
                            {{--  userAvatarPost --}}
                            <div class="mt-1" id="userAvatarPost">
                                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                                    style="width: 40px;" alt="Avatar" />
                            </div>
                            {{-- post --}}
                            <div id="post" style="width: 100%;">
                                <div class="mt-0 d-flex justify-content-between" id="user">
                                    <div class="d-block">
                                        <span>{{ Auth::user()->name }}</span>
                                        <small class="text-muted">@ {{ Auth::user()->username }}</small>
                                    </div>
                                </div>
                                <div class="d-flex flex-column gap-2 justify-content-between">
                                    <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    {{-- <div class="d-flex align-items-start gap-2">
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
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                `);

                console.log('tes');
                // $('#contentPost').append(addPost);
            });
        });
    </script>
@endsection
