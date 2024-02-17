<section class="gradient-custom mb-4">
    <h3 class="text-center">({{ $total_comments }}) Comments</h3>
    <div class="d-flex justify-content-center">
        <div class="card">
            <div class="card-body p-4">
                <h4 class="text-center mb-4 pb-2">Nested comments section</h4>
                <form wire:submit.prevent="store">
                    @csrf
                    <textarea wire:model.defer="body" id="komentar" placeholder="Komentar..."
                        class="form-control @error('body') is-invalid @enderror" cols="15" rows="5"></textarea>
                    @error('body')
                        <div class="text-danger" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-3"
                        style="background-color: #e91e63;border:1px solid #e91e63;">Kirim</button>
                </form>
                @foreach ($comments as $comment)
                    <div class="mt-3">
                        <div class="">

                            <div class="d-flex flex-start my-2">
                                <img class="rounded-circle shadow-1-strong me-3"
                                    src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar"
                                    width="35" height="35" />
                                <div class="flex-grow-1 flex-shrink-1">
                                    <div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <p class="mb-1">{{ $comment->user->name }}
                                                <br>
                                                <span class="small">{{ $comment->created_at->diffForHumans() }}</span>
                                            </p>
                                            <a href="#reply_comments_section" data-bs-toggle="collapse"
                                                class="text-primary"><i class="fas fa-reply fa-xs"></i><span
                                                    class="small">
                                                    reply</span></a>
                                        </div>
                                        <p class="small mb-0">
                                            {{ $comment->body }}
                                        </p>
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
</section>
