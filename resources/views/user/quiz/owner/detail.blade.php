@extends('user.layouts.main')
@section('title', 'Kuis Anda')
@section('content')
    <div class="card">
        <div class="card-header bg-white text-dark">
            <h3>{{ $quiz->name }}</h3>
            <p>
                {{ $quiz->description }}
            </p>
            <button type="submit" class="btn btn-white bg-primary border border-white text-white">Publikasikan</button>
        </div>
        <div class="card-body">
            <form action="{{ route('store.question', $quiz->id) }}" method="post">
                @csrf
                <h5>Tambah Pertanyaan dan Jawaban</h5>
                <div class="mb-3">
                    <label for="question" class="form-label">Pertanyaan</label>
                    <textarea name="question" id="question" class="form-control" cols="30" rows="5">{{ old('question') }}</textarea>
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <textarea placeholder="Jawaban A..." name="answer_1" id="answer_a" class="form-control my-1" cols="30"
                                rows="3"></textarea>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <textarea placeholder="Jawaban B..." name="answer_2" id="answer_b" class="form-control my-1" cols="30"
                                rows="3"></textarea>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <textarea placeholder="Jawaban C..." name="answer_3" id="answer_c" class="form-control my-1" cols="30"
                                rows="3"></textarea>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-3">
                            <textarea placeholder="Jawaban D..." name="answer_4" id="answer_d" class="form-control my-1" cols="30"
                                rows="3"></textarea>
                        </div>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="answer_true" aria-label="Default select example">
                            <option selected>Pilih jawaban yang benar</option>
                            <option value="1">A</option>
                            <option value="2">B</option>
                            <option value="3">C</option>
                            <option value="4">D</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit"
                            class="btn btn-white bg-primary text-white border border-white">Simpan</button>
                    </div>
                </div>
            </form>
            <div class="mb-3 mt-5">
                <h6>Daftar Pertanyaan :</h6>
            </div>
            @forelse ($quiz->Questions as $num => $question)
                <div class="mb-3">
                    <div class="p-1" style="background-color: rgb(243, 236, 236);border-radius: 5px;">
                        {{ $num += 1 }}. {{ $question->question }} <br>
                        <div class="" style="padding-left: 16px;">
                            @foreach ($question->Options as $num => $option)
                                {{ chr(65 + $num) }}. {{ $option->option }}
                                @if ($option->true_or_false == 1)
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-success" width="22"
                                        height="22" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="m10.562 14.492l-2.497-2.496q-.14-.14-.344-.15q-.204-.01-.363.15q-.16.16-.16.354t.16.354l2.638 2.638q.242.243.566.243q.323 0 .565-.243l5.477-5.477q.14-.14.15-.344q.01-.204-.15-.363q-.16-.16-.354-.16t-.354.16zM12.003 21q-1.866 0-3.51-.708q-1.643-.709-2.859-1.924q-1.216-1.214-1.925-2.856Q3 13.87 3 12.003q0-1.866.708-3.51q.709-1.643 1.924-2.859q1.214-1.216 2.856-1.925Q10.13 3 11.997 3q1.866 0 3.51.708q1.643.709 2.859 1.924q1.216 1.214 1.925 2.856Q21 10.13 21 11.997q0 1.866-.708 3.51q-.709 1.643-1.924 2.859q-1.214 1.216-2.856 1.925Q13.87 21 12.003 21" />
                                    </svg>
                                @endif
                                <br>
                            @endforeach
                            <svg class="text-danger" data-bs-target="#hapus_pertanyaan{{ $question->id }}"
                                data-bs-toggle="modal" xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M9.878 4.25a2.251 2.251 0 0 1 4.244 0a.75.75 0 1 0 1.415-.5a3.751 3.751 0 0 0-7.073 0a.75.75 0 1 0 1.414.5M2.75 6a.75.75 0 0 1 .75-.75h17a.75.75 0 0 1 0 1.5h-17A.75.75 0 0 1 2.75 6m2.367 1.752a.75.75 0 0 1 .798.698l.46 6.9c.09 1.347.154 2.285.294 2.99c.137.685.327 1.047.6 1.303c.274.256.648.422 1.34.512c.714.093 1.654.095 3.004.095h.774c1.35 0 2.29-.002 3.004-.095c.692-.09 1.066-.256 1.34-.512c.273-.256.463-.618.6-1.303c.14-.705.204-1.643.294-2.99l.46-6.9a.75.75 0 1 1 1.497.1l-.464 6.952c-.085 1.282-.154 2.318-.316 3.132c-.169.845-.455 1.551-1.047 2.104c-.591.554-1.315.793-2.17.904c-.822.108-1.86.108-3.145.108h-.88c-1.285 0-2.323 0-3.145-.108c-.855-.111-1.579-.35-2.17-.904c-.592-.553-.878-1.26-1.047-2.104c-.162-.814-.23-1.85-.316-3.132L4.418 8.55a.75.75 0 0 1 .699-.798" />
                            </svg>
                            <div class="modal fade" id="hapus_pertanyaan{{ $question->id }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus
                                                Pertanyaan</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('destroy.question', $question->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-body text-center">
                                                <b>Apakah anda yakin mau menghapus pertanyaan ini?</b>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('edit.question', $question->id) }}">
                                <svg class="text-warning" xmlns="http://www.w3.org/2000/svg"
                                width="22" height="22" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M8 12h8v2H8zm2 8H6V4h7v5h5v3.1l2-2V8l-6-6H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h4zm-2-2h4.1l.9-.9V16H8zm12.2-5c.1 0 .3.1.4.2l1.3 1.3c.2.2.2.6 0 .8l-1 1l-2.1-2.1l1-1c.1-.1.2-.2.4-.2m0 3.9L14.1 23H12v-2.1l6.1-6.1z" />
                            </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center">
                    <img src="{{ asset('no-data.jpg') }}" style="width: 500px;height:500px;" alt="">
                </div>
            @endforelse
        </div>
    </div>
@endsection
