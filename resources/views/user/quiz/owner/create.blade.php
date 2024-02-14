@extends('user.layouts.main')
@section('title', 'Tambah Kuis Anda')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('quiz.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h4>Informasi Kuis.</h4>
                <div class="mb-3">
                    <label for="name"  class="form-label">Nama Kuis</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nama Kuis...">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Kuis</label>
                    <textarea name="description" id="description" class="form-control" cols="30" rows="5" placeholder="Deskripsi Kuis..."></textarea>
                </div>

                <div class="mb-3 float-end">
                    <button type="submit" class="btn btn-white bg-primary border border-white text-white">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
