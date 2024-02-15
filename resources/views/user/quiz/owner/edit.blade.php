@extends('user.layouts.main')
@section('title', 'Edit Kuis Anda')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('update.question', $question->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="question" class="form-label">Pertanyaan</label>
                    <textarea cols="30" rows="3" name="question" class="form-control">{{ $question->question }}</textarea>
                </div>
                <div class="row">
                    @foreach ($question->Options as $num => $option)
                    <div class="col-sm-12 col-md-6 col-lg-3">
                        <div class="mb-1 d-flex gap-1">
                            <textarea type="text" name="answer_{{ $num += 1 }}" class="form-control" placeholder="Jawaban {{ chr(64+$num) }}">{{ $option->option }}</textarea>
                        </div>
                    </div>
            @endforeach
                </div>
                <div class="mb-3">
                    <select class="form-select" name="answer_true" aria-label="Default select example">
                        <option value="{{ null }}" selected>Pilih jawaban yang benar</option>
                        @foreach ($question->Options as $number => $option)
                            <option value="{{ $number+=1 }}" {{ $option->true_or_false == 1 ? 'selected' : '' }}>
                                {{ chr(65 + $number-=1) }}</>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-white bg-primary border border-white text-white">Simpan</button>
                    <a href="/user/detail-quiz/{{ $question->quiz_id }}">
                        <button type="button" class="btn btn-secondary border border-white text-white">Kembali</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
