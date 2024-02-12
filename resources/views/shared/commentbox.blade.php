@foreach($comments as $comment)
    <div class="card bg-light" style="margin-bottom: 10px;">
        <div class="card-body">
            <h5 class="card-title">{{ App\Models\User::find($comment->user_id)->name }}</h5>
            <p class="card-text">
                <div class="bg-white p-2 border">{{ $comment->content }}</div>
            </p>
            <h6 class="card-subtitle mb-2 text-muted">{{ $comment->created_at }}</h6>
        </div>
    </div>
@endforeach
