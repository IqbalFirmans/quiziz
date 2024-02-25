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
                                                <p class="mb-1">
                                                    <span class="fw-bold">{{ $comment->user->name }}</span>
                                                    <span
                                                        class="small">{{ $comment->created_at->diffForHumans() }}</span>
                                                    <br>
                                                </p>

                                                <button class="text-primary"
                                                    wire:click="selectReply({{ $comment->id }})">
                                                    <i class="fas fa-reply fa-xs"></i>
                                                    <span class="small">reply</span>
                                                </button>
                                            </div>
                                            <p class="small mb-0">
                                                {{ $comment->body }}
                                            </p>
                                            <div class="d-flex gap-2">
                                                @guest
                                                    <button class="text-dark">

                                                        <i class="fas fa-thumbs-up text-dark"></i>

                                                        {{ $comment->totalLikes() }}
                                                    </button>
                                                @endguest

                                                @auth
                                                    <button wire:click="like({{ $comment->id }})"
                                                        class="text-{{ $comment->hasLike ? 'primary' : 'dark' }}">

                                                        <i
                                                            class="fas fa-thumbs-up text-{{ $comment->hasLike ? 'primary' : 'dark' }}"></i>

                                                        {{ $comment->totalLikes() }}
                                                    </button>

                                                    @if ($comment->user_id == Auth::user()->id)
                                                        <button wire:click="selectEdit({{ $comment->id }})">
                                                            <i class="fas fa-edit text-warning"></i>
                                                        </button>

                                                        {{-- <button wire:click="delete({{ $comment->id }})">
                                                            <i class="fas fa-times-circle text-danger"></i>
                                                        </button> --}}

                                                        <button data-bs-toggle="modal"
                                                            data-bs-target="#modal_confirm_delete{{ $comment->id }}">
                                                            <i class="fas fa-times-circle text-danger"></i>
                                                        </button>
                                                    @endif
                                                @endauth

                                            </div>

                                            @if (isset($comment_id) && $comment_id == $comment->id)
                                                <form wire:submit.prevent="reply" class="py-2">
                                                    @csrf
                                                    <textarea wire:model.defer="body2" id="komentar" class="form-control @error('body2') is-invalid @enderror"
                                                        rows="2" placeholder="Balas Komentar.."></textarea>

                                                    @error('body2')
                                                        <div class="text-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <button type="submit" class="badge bg-primary mt-2">Submit</button>
                                                    <!-- Tombol Cancel -->
                                                    <button type="button" wire:click="cancelReply"
                                                        class="badge bg-secondary mt-2">
                                                        Batal
                                                    </button>
                                                </form>
                                            @endif

                                            @if (isset($edit_comment_id) && $edit_comment_id == $comment->id)
                                                <form wire:submit.prevent="update" class="py-2">
                                                    @csrf
                                                    <textarea wire:model.defer="body2" id="komentar" class="form-control @error('body2') is-invalid @enderror"
                                                        rows="2"></textarea>

                                                    @error('body2')
                                                        <div class="text-danger" role="alert">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    <button type="submit" class="badge bg-warning mt-2">Update</button>
                                                    <!-- Tombol Cancel -->
                                                    <button type="button" wire:click="cancelEdit"
                                                        class="badge bg-secondary mt-2">
                                                        Batal
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                {{-- reply Comment --}}
                                @if ($comment->childrens)
                                    @foreach ($comment->childrens as $comment2)
                                        <div class="d-flex flex-start my-2 ms-5">
                                            <img class="rounded-circle shadow-1-strong me-3"
                                                src="{{ $comment2->user->photo ? asset('storage/' . $comment2->user->photo) : asset('default.png') }}"
                                                alt="avatar" width="35" height="35" />
                                            <div class="flex-grow-1 flex-shrink-1">
                                                <div>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="mb-1">
                                                            <span class="fw-bold">{{ $comment2->user->name }}</span>
                                                            <span
                                                                class="small">{{ $comment2->created_at->diffForHumans() }}</span>
                                                            <br>
                                                        </p>

                                                        <button class="text-primary"
                                                            wire:click="selectReply({{ $comment2->id }})">
                                                            <i class="fas fa-reply fa-xs"></i>
                                                            <span class="small">reply</span>
                                                        </button>
                                                    </div>
                                                    <p class="small mb-0">
                                                        {{ $comment2->body }}
                                                    </p>
                                                    <div class="d-flex gap-2">
                                                        @guest
                                                            <button class="text-dark">

                                                                <i class="fas fa-thumbs-up text-dark"></i>

                                                                {{ $comment->totalLikes() }}
                                                            </button>
                                                        @endguest

                                                        @auth
                                                            <button wire:click="like({{ $comment2->id }})"
                                                                class="text-{{ $comment2->hasLike ? 'primary' : 'dark' }}">

                                                                <i
                                                                    class="fas fa-thumbs-up text-{{ $comment2->hasLike ? 'primary' : 'dark' }}"></i>

                                                                {{ $comment2->totalLikes() }}
                                                            </button>

                                                            @if ($comment2->user_id == Auth::user()->id)
                                                                <button wire:click="selectEdit({{ $comment2->id }})">
                                                                    <i class="fas fa-edit text-warning"></i>
                                                                </button>

                                                                <button data-bs-toggle="modal"
                                                                data-bs-target="#modal_confirm_delete{{ $comment2->id }}">
                                                                    <i class="fas fa-times-circle text-danger"></i>
                                                                </button>
                                                            @endif
                                                        @endauth

                                                    </div>

                                                    @if (isset($comment_id) && $comment_id == $comment2->id)
                                                        <form wire:submit.prevent="reply" class="py-2">
                                                            @csrf
                                                            <textarea wire:model.defer="body2" id="komentar" class="form-control @error('body2') is-invalid @enderror"
                                                                rows="2" placeholder="Balas Komentar.."></textarea>

                                                            @error('body2')
                                                                <div class="text-danger" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <button type="submit"
                                                                class="badge bg-primary mt-2">Submit</button>
                                                            <!-- Tombol Cancel -->
                                                            <button type="button" wire:click="cancelReply"
                                                                class="badge bg-secondary mt-2">
                                                                Batal
                                                            </button>
                                                        </form>
                                                    @endif

                                                    @if (isset($edit_comment_id) && $edit_comment_id == $comment2->id)
                                                        <form wire:submit.prevent="update" class="py-2">
                                                            @csrf
                                                            <textarea wire:model.defer="body2" id="komentar" class="form-control @error('body2') is-invalid @enderror"
                                                                rows="2"></textarea>

                                                            @error('body2')
                                                                <div class="text-danger" role="alert">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                            <button type="submit"
                                                                class="badge bg-warning mt-2">Update</button>
                                                            <!-- Tombol Cancel -->
                                                            <button type="button" wire:click="cancelEdit"
                                                                class="badge bg-secondary mt-2">
                                                                Batal
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                                {{-- modal delete --}}
                                                <div wire:ignore.self class="modal fade"
                                                    id="modal_confirm_delete{{ $comment2->id }}"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">
                                                                    Konfirmasi Hapus
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <b>
                                                                    Apakah anda yakin mau menghapus komentar ini?
                                                                </b>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Tutup</button>
                                                                <button wire:click="delete({{ $comment2->id }})"
                                                                    class="btn btn-danger"
                                                                    data-bs-dismiss="modal">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- end modal --}}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                                {{-- end reply comment --}}

                            </div>

                            {{-- modal delete --}}
                            <div wire:ignore.self class="modal fade" id="modal_confirm_delete{{ $comment->id }}"
                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <b>
                                                Apakah anda yakin mau menghapus komentar ini?
                                            </b>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button wire:click="delete({{ $comment->id }})" class="btn btn-danger"
                                                data-bs-dismiss="modal">Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end modal --}}

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
