@include('components.navbar')
<h1 class="text-2xl text-center py-2">{{ $title }}</h1>
<div id="container-edit-user">
    <div class="container-introduction-profile-image d-flex justify-content-center py-2 px-2">
       @if(empty($user->photo_profile))
       <img class="img-rounded-profile-post"
       src="{{ asset("/img/icons/posts/do-utilizador.png") }}" alt="Imagem de perfil">
       @else   
        <img class="img-rounded-profile-post"
        src="{{ asset("storage/img/profile_photos/{$user->photo_profile}") }}" alt="Imagem de perfil">
       @endif
    </div>
</div>
@include('app.user.components.posts_components')

@include('components.footer')
