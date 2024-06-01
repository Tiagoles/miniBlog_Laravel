@include('components.navbar')
 
@include('app.user.components.posts_components', ["posts"=>$posts])

@include('components.footer')
