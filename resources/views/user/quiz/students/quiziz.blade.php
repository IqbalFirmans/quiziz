@extends('user.layouts.main')
@section('title', 'Quiziz')
@section('content')
    <style>
        html {
            font-size: 14px;
        }

        .container {
            font-size: 14px;
            color: #666666;
        }

        .card-custom {
            overflow: hidden;
            min-height: 450px;
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
        }

        .card-custom-img {
            height: 200px;
            min-height: 200px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            border-color: inherit;
        }

        /* First border-left-width setting is a fallback */
        .card-custom-img::after {
            position: absolute;
            content: '';
            top: 161px;
            left: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-top-width: 40px;
            border-right-width: 0;
            border-bottom-width: 0;
            border-left-width: 545px;
            border-left-width: calc(575px - 5vw);
            border-top-color: transparent;
            border-right-color: transparent;
            border-bottom-color: transparent;
            border-left-color: inherit;
        }

        .card-custom-avatar img {
            border-radius: 50%;
            box-shadow: 0 0 15px rgba(10, 10, 10, 0.3);
            position: absolute;
            top: 100px;
            left: 1.25rem;
            width: 100px;
            height: 100px;
        }
    </style>

    <div class="container">
        <div class="row pt-5 m-auto">
            @forelse ($all_quiz as $quiz)
                <div class="col-md-6 col-lg-4 pb-3">
                    <!-- Add a style="height: XYZpx" to div.card to limit the card height and display scrollbar instead -->
                    <div class="card card-custom bg-white border-white border-0" style="height: 450px">
                        <div class="card-custom-img" style="background-color:#344767;">
                        </div>
                        <div class="card-custom-avatar">
                            <img class="img-fluid border border-white border-2" style="object-fit: cover;"
                                src="{{ asset('quiz.jpg') }}" alt="Avatar" />
                        </div>
                        <div class="card-body" style="overflow-y: auto">
                            <h4 class="card-title">{{ $quiz->name }}</h4>
                            <p class="card-text">
                                {{ $quiz->description }}
                            </p>
                        </div>
                        <div class="card-footer d-flex gap-1 justify-content-center"
                            style="background: inherit; border-color: inherit;">
                            @if (Auth::user()->IsFinish($quiz->id))
                                <a href="/user/result-quiz/{{ $quiz->id }}">
                                    <button type="submit"
                                        class="btn btn-primary bg-primary btn-md border border-white rounded-2">Lihat
                                        Hasil</button>
                                </a>
                            @else
                                <a href="/user/play/quiz/{{ $quiz->id }}">
                                    <button type="submit"
                                        class="btn btn-primary bg-primary btn-md border border-white rounded-2">Kerjakan</button>
                                </a>
                            @endif
                        </div>
                    </div>

                </div>
            @empty
                <img src="{{ asset('no-data.jpg') }}" alt="">
            @endforelse
        </div>
    </div>
@endsection
