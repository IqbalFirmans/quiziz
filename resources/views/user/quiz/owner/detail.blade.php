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
                                {{ chr(65 + $num) }}. {{ $option->option }} <br>
                            @endforeach
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
