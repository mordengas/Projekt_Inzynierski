@foreach($comments as $comment)
    <div class="card bg-light" style="margin-bottom: 10px;">
        <div class="card-body">
            <h5 class="card-title">
                @if($comment->user->image)
                <img class="image rounded-circle" src="/images/{{$comment->user->image}}" alt="profile_image" style="width: 40px;height: 40px; padding: 0px; margin: 0px; ">
                @endif
                <a href="{{ url('/user', $comment->user_id) }}">
                    {{ $comment->user->name }}
                </a>
            </h5>
            <p class="card-text">
                <div class="bg-white p-2 border">{{ $comment->content }}</div>
            </p>
            <h6 class="card-subtitle mb-2 text-muted">{{ $comment->created_at->format('d.m.Y H:i') }}</h6>
        </div>
    </div>
@endforeach
