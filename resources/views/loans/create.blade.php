@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')
    <h1>Tambah Transaksi Peminjaman</h1>

    @if ($errors->any())
        <div class="alert alert-danger" style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('loans.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="member_id">Pilih Anggota:</label><br>
            <select name="member_id" id="member_id" required style="width: 100%; padding: 8px;">
                <option value="">-- Pilih Anggota --</option>
                @foreach ($members as $member)
                    <option value="{{ $member->id }}" {{ old('member_id') == $member->id ? 'selected' : '' }}>
                        {{ $member->nama }} ({{ $member->nim }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- INFO PETUGAS LOGGED IN (Tanpa Input Dropdown $users) --}}
        <div style="margin-bottom: 15px;">
            <label>Petugas Pencatat:</label><br>
            <input type="text" value="{{ auth()->user()->name }} ({{ ucfirst(auth()->user()->role) }})" disabled style="width: 100%; padding: 8px; background-color: #e5e7eb;">
            <small style="color: #6b7280;">Petugas dicatat otomatis dari akun yang sedang login.</small>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="tanggal_pinjam">Tanggal Pinjam:</label><br>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" value="{{ old('tanggal_pinjam', date('Y-m-d')) }}" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label for="tanggal_kembali">Tanggal Kembali (Tenggat):</label><br>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" value="{{ old('tanggal_kembali', date('Y-m-d', strtotime('+7 days'))) }}" required style="width: 100%; padding: 8px;">
        </div>

        <div style="margin-bottom: 15px;">
            <label>Pilih Buku (Bisa Pilih Lebih dari 1):</label><br>
            <div style="max-height: 200px; overflow-y: auto; border: 1px solid #ccc; padding: 10px;">
                @foreach ($books as $book)
                    <div style="margin-bottom: 5px;">
                        <input type="checkbox" name="book_ids[]" value="{{ $book->id }}" id="book_{{ $book->id }}" {{ is_array(old('book_ids')) && in_array($book->id, old('book_ids')) ? 'checked' : '' }}>
                        <label for="book_{{ $book->id }}">{{ $book->judul }} (Stok: {{ $book->stok }})</label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn">Simpan Transaksi</button>
        <a href="{{ route('loans.index') }}" style="margin-left: 10px;">Batal</a>
    </form>
@endsection