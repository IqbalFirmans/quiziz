@extends('auth.layouts.main')
@section('content')
    <div class="text-center">
        @auth
            @if (Auth::user()->email_verified_at == null)
                <b>Lihat E-MAIL anda untuk verifikasi akun anda.</b>
            @else
                <b>Akun E-MAIL anda sudah terverifikasi.</b>
            @endif
        @endauth
    </div>
@endsection
