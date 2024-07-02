@extends('layouts.ProfileLayout')

@section('contentProfile')
    @foreach ($postLiked as $post)
        {{-- post --}}
        <div class="card mt-2">
            <a class="stretched-link"
                href="{{ route('posts.getPost', ['username' => $post->users->username, 'id' => $post->id]) }}"></a>
            <div class="card-body d-flex gap-2 px-4 py-3 rounded post">
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
                                {{ $post->posts->created_at }}
                            </small>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-2 justify-content-between">
                        <div id="post" style="width: 100%;">
                            {{ $post->posts->status }}
                        </div>
                        <div class="d-flex" style="z-index: 2; width: fit-content;">
                            <div class="col-sm-8">
                                <button class="like-btn d-flex align-items-center gap-2 btn btn-disabled p-0"
                                    data-post-id="{{ $post->id }}">
                                    <i class="bi bi-heart-fill liked" style="color: red"></i>
                                    <small class="likesCounter">{{ $post->posts->likes }}</small>
                                </button>
                            </div>
                            <div class="col-sm-8">
                                <button id="like" class="d-flex align-items-center gap-2 btn btn-disabled p-0">
                                    <i class="bi bi-chat"></i>
                                    <small class="commentCounter"></small>
                                </button>
                            </div>
                            <div class="col-sm-8">
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
@endsection
