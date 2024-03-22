@extends('user.layouts.main')
@section('title', 'Hasil Kuis Anda')
@section('content')
<div class="card">
    <div class="card-header bg-white text-dark text-center">
        <h5>Hasil Kuis <span class="text-primary">{{ $name_quiz }}</span></h5>
    </div>
    <div class="card-body">
        @foreach ($all_result as $item)
         
        @endforeach
    </div>
</div>
@endsection
