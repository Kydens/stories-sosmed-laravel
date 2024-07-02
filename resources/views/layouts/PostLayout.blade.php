@extends('layouts.TemplateLayout')

@section('title')
    Home
@endsection

@section('content')
    <div class="row bg-light">
        <div class="col-sm-3 px-4 d-none d-md-block" id="sidePost">
            <ul class="mt-3" style="list-style-type: none">
                <li class="d-flex align-items-center gap-2 fs-5 mb-2 py-2 px-3 rounded-pill sidePost"
                    style="width:fit-content">
                    <a href="/" class="text-dark" style="text-decoration: none;">
                        <i class="bi bi-house-fill"></i>
                        Home
                    </a>
                </li>
                <li class="d-flex align-items-center gap-2 fs-5 mb-2 py-2 px-3 rounded-pill sidePost"
                    style="width:fit-content">
                    <a href="{{ route('profile.index', ['username' => Auth::user()->username]) }}" class="text-dark"
                        style="text-decoration: none;">
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
        </div>
        <div class="col-sm-6 border-start border-end" style="min-height: 100vh">
            @yield('contentPost')
        </div>
        @if (Session::has('add-post'))
            <div class="alert alert-success alert-dismissible fade show shadow m-3" role="alert"
                style="width:24rem; position: fixed; bottom: 0px; right: 0px;">
                {{ session('add-post') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            let postAdded = false;
            let currentLike = 0;

            $('#postButton').click(function() {
                let addPost = (`
                    <div class="card" id="postForm">
                        <form action="{{ route('posts.store') }}" method="post">
                            @csrf
                            <div class="card-body px-4 pb-4 border rounded shadow-sm">
                                <div class="mb-2 d-flex gap-2 btn rounded-pill" id="closeAddPost" style="background-color:#f3f5f7; width: fit-content;">
                                    <i class="bi bi-arrow-left"></i>
                                    Cancel
                                </div>
                                <div class="d-flex gap-2">
                                    {{--  userAvatarPost --}}
                                    <div class="mt-1" id="userAvatarPost">
                                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle"
                                            style="width: 40px;" alt="Avatar" />
                                    </div>
                                    {{-- post --}}
                                    <div id="post" style="width: 100%;">
                                        <div class="mt-0 mb-1 d-flex justify-content-between" id="user">
                                            <div class="d-block">
                                                <span>{{ Auth::user()->name }}</span>
                                                <small class="text-muted">{{ '@' . Auth::user()->username }}</small>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column gap-2 justify-content-between">
                                            <div class="mb-3">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Tell your stories." name="inputPost"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-dark">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                `);

                if (!postAdded) {
                    $('#contentPost').prepend(addPost);
                    postAdded = true;
                    console.log(postAdded);
                }
            });

            $('#contentPost').on('click', '#closeAddPost', function() {
                $('#postForm').remove();
                postAdded = false;
            });

            $('.like-btn').click(function(e) {
                e.preventDefault();
                var post_id = $(this).data('post-id');
                var button = $(this);

                $.ajax({
                    url: "{{ route('posts.likes') }}",
                    type: 'POST',
                    async: true,
                    data: {
                        _token: '{{ csrf_token() }}',
                        post_id: post_id,
                    },
                    success: function(response) {
                        if (response.likes !== undefined) {
                            button.find('.likesCounter').text(response.likes);

                            if (response.liked) {
                                button.find('.notLiked').replaceWith(
                                    `<i class="bi bi-heart-fill liked" style="color: red;"></i>`
                                );
                            } else {
                                button.find('.liked').replaceWith(
                                    `<i class="bi bi-heart notLiked" style="color: black;"></i>`
                                );
                            }
                        }
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            });
        });
    </script>
@endsection
