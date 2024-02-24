@foreach($comments as $comment)
    <div class="card bg-light" style="margin-bottom: 10px;">
        <div class="card-body">
            <div class="row  justify-contetn-between">
                <div class="col text-left">
                    <h5 class="card-title">
                        @if($comment->user->image !== "user.png")
                        <img class="image rounded-circle" src="/images/{{$comment->user->image}}" alt="profile_image" style="width: 40px;height: 40px; padding: 0px; margin: 0px; ">
                        @else

                        @endif
                        <a href="{{ url('/user', $comment->user_id) }}">
                            {{ $comment->user->name }}
                        </a>
                    </h5>
                </div>

                <div class="col text-right">
                    <div class="d-flex flex-row-reverse">
                        @if(auth()->check())
                            @if(auth()->user()->id === $comment->user_id)
                                <form action="{{ route('comments.destroy', ['comment' => $comment]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>

            <p class="card-text">
                <div class="bg-white p-2 border">{{ $comment->content }}</div>
            </p>

            <div class="row  justify-contetn-between">
                <div class="col text-left">
                    <h6 class="card-subtitle mb-2 text-muted">{{ $comment->created_at->format('d.m.Y H:i') }}</h6>
                </div>

                <div class="col text-right">
                    <div class="d-flex flex-row-reverse">
                    @if(auth()->check())
                    @if(auth()->user()->id === $comment->user_id)
                    <form action="" method="POST">
                        @csrf
                        @method('POST')
                        <button type="submit" class="btn btn-danger btn-sm">Like</button>
                    </form>
                    @endif
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
