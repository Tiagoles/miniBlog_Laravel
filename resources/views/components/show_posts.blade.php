<h1 class="text-center mt-5 mb-5 tet-2xl">Veja as publicações recentes:</h1>

<div id="container-posts-user">
    <hr>
    @foreach ($posts as $post)
        <div class="post-user d-flex justify-content-center mb-1">
            <div class="card" style="width: 30rem;">
                <div class="container-img-rounded-profile-post">
                    <img src="{{ asset("storage/img/profile_photos/{$user->photo_profile}") }}"
                        alt="imagem de publicação" class="card-img-top img-rounded-profile-post">
                </div>
                <span class="author-user-post mt-3">
                    <a href="{{ route('user.show', ['id' => $post->user_id]) }}"
                        class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">{{ ucwords($post->author_post) }}</a>
                </span>
                <p class="card-text position-absolute ms-2 mt-5 pt-3">
                    {{ $post->description }}
                </p>
                @if (!empty($post->image_post))
                    <img src="{{ asset("storage/img/posts/{$post->image_post}") }}" alt="imagem de publicação"
                        class="card-img-top img-rounded-profile-post">
                @endif
            </div>
        </div>
    @endforeach

</div>
