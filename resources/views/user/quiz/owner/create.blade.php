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
                <div class="mb-3">
                    <label for="image" class="form-label">Tambah Gambar Kuis</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <h4>Tambah Pertanyaan.</h4>
                <div id="add_questions">

                </div>
                <div class="mb-3">
                    <button type="button" onclick="add_questions()" class="btn btn-white bg-info border border-white text-white">Tambah Pertanyaan</button>
                </div>
                <div class="mb-3 float-end">
                    <button type="submit" class="btn btn-white bg-primary border border-white text-white">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    function add_questions()
    {
        let place = document.getElementById("add_questions");
        let createElement = document.createElement('div');
        createElement.classList.add('mb-3');
        createElement.innerHTML =`
                    <div class="mb-3">
                        <label for="question" class="form-label">Pertanyaan</label>
                        <textarea name="question[]" id="question" cols="30" rows="3" class="form-control" placeholder="Pertanyaan..."></textarea>
                        <div class="mb-3" style="margin-left: 40px;">
                            <label for="option" class="form-label">Opsi Jawaban A.</label>
                            <input class="form-control" id="option" name="option[]">
                            <label for="option" class="form-label">Opsi Jawaban B.</label>
                            <input class="form-control" id="option" name="option[]">
                            <label for="option" class="form-label">Opsi Jawaban C.</label>
                            <input class="form-control" id="option" name="option[]">
                            <label for="option" class="form-label">Opsi Jawaban D.</label>
                            <input class="form-control" id="option" name="option[]">
                            <label for="option" class="form-label">Opsi Jawaban Benar.</label>
                            <input class="form-control" id="option" name="true[]" placeholder="Isikan hanya dengan huruf A atau B atau C atau D!">
                        </div>
                    </div>
        `;
        place.appendChild(createElement);
    }
</script>
@endsection
