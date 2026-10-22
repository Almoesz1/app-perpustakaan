@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <h1>Profil Saya</h1>

    <table style="width:100%; max-width:500px; margin-bottom:30px;">
        <tr><th style="text-align:left; padding:8px; border-bottom:1px solid #ccc;">Nama</th><td style="padding:8px; border-bottom:1px solid #ccc;">{{ auth()->user()->name }}</td></tr>
        <tr><th style="text-align:left; padding:8px; border-bottom:1px solid #ccc;">Email</th><td style="padding:8px; border-bottom:1px solid #ccc;">{{ auth()->user()->email }}</td></tr>
        <tr><th style="text-align:left; padding:8px; border-bottom:1px solid #ccc;">Role</th><td style="padding:8px; border-bottom:1px solid #ccc;">{{ ucfirst(auth()->user()->role) }}</td></tr>
    </table>

    <h2>Ganti Password</h2>
    <form action="{{ route('profile.updatePassword') }}" method="POST" style="max-width:400px;">
        @csrf
        @method('PUT')

        <label for="password_lama">Password Lama</label>
        <input type="password" name="password_lama" id="password_lama">
        @error('password_lama') <div class="error">{{ $message }}</div> @enderror

        <label for="password_baru">Password Baru</label>
        <input type="password" name="password_baru" id="password_baru">
        @error('password_baru') <div class="error">{{ $message }}</div> @enderror

        <label for="password_baru_confirmation">Konfirmasi Password Baru</label>
        <input type="password" name="password_baru_confirmation" id="password_baru_confirmation">

        <button type="submit" class="btn" style="margin-top:20px;">Ganti Password</button>
    </form>
@endsection