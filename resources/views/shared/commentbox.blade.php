@foreach($comments as $comment)
    <div class="card" data-bs-theme="auto" style="margin-bottom: 10px;">
        <div class="card-body">
            <div class="row  justify-contetn-between">
                <div class="col text-left">
                    <h5 class="card-title">
                        @if($comment->user->image !== "user.png")
                        <img class="image rounded-circle" src="/images/{{$comment->user->image}}" alt="profile_image" style="width: 40px;height: 40px; padding: 0px; margin: 0px; ">
                        @else

                        @endif
                        <a class="link-body-emphasis text-decoration-none" href="{{ url('/user', $comment->user_id) }}">
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
                <div class="p-2 border" data-bs-theme="auto">{{ $comment->content }}</div>
            </p>

            <div class="row  justify-contetn-between">
                <div class="col text-left">
                    <h6 class="card-subtitle mb-2 text-muted">{{ $comment->created_at->format('d.m.Y H:i') }}</h6>
                </div>

                <div class="col text-right">
                    <div class="d-flex flex-row-reverse">
                    @guest
                    <div class="d-flex align-items-center">
                            <span id="boot-icon" class="bi bi-heart-fill" style="font-size: 20px; color: rgb(255, 0, 0); margin-top: 7px; margin-bottom: 16px; margin-left: 13px; margin-right: 13px;"></span>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="flex-column">{{ $comment->likes->count() }}</div>
                    </div>
                    @else
                    <form action="{{route('like.toggle')}}" method="POST">
                        @csrf
                        <input type="hidden" name="comment_id" value="{{$comment->id}}">
                        <button type="submit" class="btn btn-link">
                            @if (App\Models\Like::hasUserLikedComment(auth()->user()->id, $comment->id))
                                <span id="boot-icon" class="bi bi-heart-fill" style="font-size: 20px; color: rgb(255, 0, 0);"></span>
                            @else
                                <span id="boot-icon" class="bi bi-heart" style="font-size: 20px; opacity: 1; -webkit-text-stroke-width: 0px;"></span>
                            @endif
                        </button>
                    </form>
                    <div class="d-flex align-items-center">
                        <div class="flex-column">{{ $comment->likes->count() }}</div>
                    </div>
                    @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
