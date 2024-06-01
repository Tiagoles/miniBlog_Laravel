@php
    use Carbon\Carbon;
@endphp
<div id="container-posts-user">
    <hr>
    <h2 class="text-xl text-center py-4">{{ $subTitle }}</h2>
    @foreach ($posts as $post)
        <div class="post-user d-flex justify-content-center mb-1">
            <div class="card" style="width: 30rem;" idPost="{{ $post->id }}">
                <div class="container-img-rounded-profile-post py-2 px-2 d-flex justify-between">
                    <a href="{{ route('user.show', ['id' => $post->user_id]) }}"
                        class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                        <img src="{{ asset("storage/img/profile_photos/{$post->photo_profile_author_post}") }}"
                            alt="imagem de publicação" class="card-img-top img-rounded-profile-post">
                    </a>
                </div>
                <span class="absolute top-0 right-0 px-3 py-3">
                    <button id="button-options-post" class="button-options-post">
                        <img src="{{ asset('/img/icons/posts/icons8-três-pontos-32.png') }}" alt="Opcoes de post">
                    </button>
                </span>

                <div id="display-options-post_{{ $post->id }}" class="display-options-post">
                    <ul>
                        <li class="my-2">
                            <button class="btn" data-bs-toggle="modal" data-bs-target="#addPosteUpdate"
                                data-mode="update" data-post-id="{{ $post->id }}"
                                data-description="{{ $post->description }}"
                                data-image="{{ asset("storage/img/posts/{$post->image_post}") }}">Editar</button>
                        </li>
                        <li class="my-2">
                            <form action="{{ route('posts.delete', ['id' => $post->id]) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn">Excluir</button>
                            </form>
                        </li>

                    </ul>
                </div>

                <span class="author-user-post mt-3">
                    <a href="{{ route('user.show', ['id' => $post->user_id]) }}"
                        class="link-secondary link-offset-2 link-underline-opacity-25 link-underline-opacity-300-hover">{{ ucwords($post->author_post) }}</a>
                </span>

                <div class="card-text position-absolute ms-2 mt-5 pt-4">
                    {{ $post->description }}
                </div>
                @if (!empty($post->image_post))
                    <img src="{{ asset("storage/img/posts/{$post->image_post}") }}" alt="imagem de publicação"
                        class="card-img-top img-rounded-profile-post">
                @endif
                <div class="reacts-post-container pt-2 pb-2">
                    <span class="reacts-post ms-2">
                        <button id="button-comment-post_{{ $post->id }}" buttonReferencePost={{ $post->id }}>
                            <img src="{{ asset('/img/icons/posts/icons8-balão-de-fala-32.png') }}"
                                alt="icone de conversa" height="32" width="32" id="img-balao-conversa">
                        </button>
                    </span>
                    <hr>
                </div>

                <form class="d-flex justify-content-around"
                    action="{{ route('comment.store', ['post_id' => $post->id]) }}" method="post"
                    id="form_post_id_{{ $post->id }}" postReference={{ $post->id }}>
                    @csrf
                    <textarea class="form-control ms-2" placeholder="Comente aqui..." name="text-area-comment-post"
                        id="text-area-comment-post_{{ $post->id }}" postReference={{ $post->id }} cols="30" rows="1"
                        idPost={{ $post->id }} required></textarea>
                    <div class="ms-2">
                        <button id="button-send-comment_{{ $post->id }}" postReference={{ $post->id }}
                            class="btn btn-success me-2">Comentar</button>
                    </div>
                </form>

                <div id="area-comments-all">
                    <div class="dropdown">
                        <button class="btn btn-sm btn-secondary dropdown-toggle mx-2 my-2" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Comentários
                        </button>

                        <ul class="dropdown-menu px-2 py-2">
                            @foreach ($comments as $comment)
                                <div class="container-img-rounded-profile-post position-relative pt-2 px-2 py-2">
                                    <a href="{{ route('user.show', ['id' => $comment->user_id]) }}">
                                        <img src="{{ asset("storage/img/profile_photos/{$comment->photo_profile_author_comment}") }}"
                                            alt="imagem de publicação"
                                            class="card-img-top img-rounded-profile-post d-inline-block">
                                        <a href="{{ route('user.show', ['id' => $comment->user_id]) }}"
                                            class="position-absolute mt-2 ms-3 ">
                                            @php
                                                $author_comment = explode(' ', $comment->name)[0];
                                            @endphp
                                            {{ ucwords($author_comment) }}
                                        </a>
                                    </a>
                                </div>
                                <div class="position-relative">
                                    @php
                                        $currentTime = Carbon::now('America/Sao_Paulo');
                                        $comment->created_at->setTimeZone('America/Sao_Paulo');
                                        $differenceInMinutes = $currentTime->diffInMinutes($comment->created_at);
                                        $differenceInHours = $currentTime->diffInHours($comment->created_at);
                                    @endphp

                                    @if ($differenceInHours >= 1)
                                        <p class="fw-normal position-absolute top-0 right-0">
                                            {{ $differenceInHours }}h
                                        </p>
                                    @elseif ($differenceInMinutes < 60)
                                        <p class="fw-normal position-absolute top-0 right-0">
                                            {{ $differenceInMinutes }}m
                                        </p>
                                    @endif
                                </div>
                                <div id="area-profile-comment" class="position-relative pb-2">
                                    <p class="">{{ $comment->comments }}</p>
                                </div>
                                <hr>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
