<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    @foreach($posts as $post)
<p>{{ $post->content }}</p>
@endforeach
</div>
