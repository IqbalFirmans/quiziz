@push('css')
    <style>
        button {
            background: none;
            padding: 0;
            border: none;
        }
    </style>
@endpush

<section class="gradient-custom mb-4">
    <h3 class="text-center">({{ $total_comments }}) Comments</h3>
    <div class="d-flex justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-body p-4">
                    <h4 class="text-center mb-4 pb-2">Nested comments section</h4>
                    @auth
                        <form wire:submit.prevent="store">
                            @csrf
                            <textarea wire:model.defer="body" id="komentar" placeholder="Komentar..."
                                class="form-control @error('body') is-invalid @enderror" cols="15" rows="5"></textarea>
                            @error('body')
                                <div class="text-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                            <button type="submit" class="btn btn-primary mt-3 "
                                style="background-color: #e91e63;border:1px solid #e91e63;">Kirim</button>
                        </form>
                    @endauth
                    @guest
                        <div class="alert" style="background-color: #e91e63">
                            <a href="/auth/login" class="text-white">Login untuk berkomentar</a>
                        </div>
                    @endguest
                    @foreach ($comments as $comment)
                        <div class="mt-3" id="comment-{{ $comment->id }}">
                            <div class="">
                                <div class="d-flex flex-start my-2">
                                    <img class="rounded-circle shadow-1-strong me-3"
                                        src="{{ $comment->user->photo ? asset('storage/' . $comment->user->photo) : asset('default.png') }}"
                                        alt="avatar" width="35" height="35" />
                                    <div class="flex-grow-1 flex-shrink-1">
                                        <div>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p class="mb-1">{{ $comment->user->name }}
                                                    <br>
                                                    <span
                                                        class="small">{{ $comment->created_at->diffForHumans() }}</span>
                                                </p>
                                                <a href="#reply_comments_section" data-bs-toggle="collapse"
                                                    class="text-primary">
                                                    <i class="fas fa-reply fa-xs"></i>
                                                    <span class="small">reply</span>
                                                </a>
                                            </div>
                                            <p class="small mb-0">
                                                {{ $comment->body }}
                                            </p>
                                            <div class="d-flex gap-2">

                                                @auth
                                                    @if ($comment->hasLike())
                                                        <button wire:click="like({{ $comment->id }})" class="text-primary">
                                                            <i class="fas fa-thumbs-up text-primary"></i>
                                                            {{ $comment->totalLikes() }}
                                                        </button>
                                                    @else
                                                        <button wire:click="like({{ $comment->id }})" class="text-dark">
                                                            <i class="fas fa-thumbs-up text-dark"></i>
                                                            {{ $comment->totalLikes() }}
                                                        </button>
                                                    @endif
                                                @endauth

                                                <span>
                                                    <i class="fas fa-edit text-warning"></i>
                                                </span>

                                                <span>
                                                    <i class="fas fa-times-circle text-danger"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="collapse" id="reply_comments_section">
                                            <form action="" method="post" class="mt-2">
                                                @csrf
                                                <textarea name="komentar" id="komentar" placeholder="Komentar..." class="form-control" cols="15" rows="5"></textarea>
                                                <button type="submit" class="btn btn-primary mt-3"
                                                    style="background-color: #e91e63;border:1px solid #e91e63;">Kirim</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
