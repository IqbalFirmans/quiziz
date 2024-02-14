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
            @foreach ($question->Options as $num => $option)
             <div class="mb-1 d-flex gap-1">
               <p>{{ chr(65 + $num) }}.</p> <input type="text" name="answer_{{ $num+=1 }}" class="form-control" value="{{ $option->option }}">
             </div>
            @endforeach
            <div class="mb-3">
                <select class="form-select" name="answer_true" aria-label="Default select example">
                    <option selected>Pilih jawaban yang benar</option>
                    @foreach ($question->Options as $number => $option)
                     <option value="{{ $option->id }}" {{ $option->true_or_false == 1 ? 'selected' : '' }}>{{ chr(65 + $number) }}</>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-white bg-primary border border-white text-white">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
