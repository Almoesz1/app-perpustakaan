<!-- File: resources/views/loans/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@section('content')
<style>
    :root {
        --primary: #4f46e5;
        --primary-hover: #4338ca;
        --text-main: #0f172a;
        --text-muted: #64748b;
        --border: #e2e8f0;
        --surface: #ffffff;
    }

    .edit-wrapper {
        max-width: 720px;
        margin: 0 auto;
        font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        flex-wrap: wrap;
        gap: 16px;
    }

    .page-title-group h1 {
        font-size: 26px;
        font-weight: 800;
        color: var(--text-main);
        letter-spacing: -0.02em;
        margin: 0 0 4px 0;
    }

    .page-title-group p {
        margin: 0;
        color: var(--text-muted);
        font-size: 14px;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: var(--text-muted);
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        padding: 10px 16px;
        background: #ffffff;
        border: 1px solid var(--border);
        border-radius: 10px;
        transition: all 0.2s ease;
    }

    .btn-back:hover {
        background: #f8fafc;
        color: var(--text-main);
    }

    .card-container {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 16px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.03);
        padding: 32px;
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-label {
        display: block;
        font-size: 13px;
        font-weight: 700;
        color: var(--text-main);
        text-transform: uppercase;
        letter-spacing: 0.04em;
        margin-bottom: 8px;
    }

    .readonly-box {
        background: #f8fafc;
        border: 1px solid var(--border);
        padding: 12px 16px;
        border-radius: 10px;
        color: var(--text-main);
        font-weight: 600;
        font-size: 14px;
    }

    .book-chips {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .book-chip {
        background: #f1f5f9;
        border: 1px solid var(--border);
        color: #334155;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .form-control {
        width: 100%;
        padding: 12px 14px;
        border: 1px solid var(--border);
        border-radius: 10px;
        font-size: 14px;
        color: var(--text-main);
        background-color: #ffffff;
        transition: all 0.2s ease;
        box-sizing: border-box;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
    }

    .error-message {
        color: #ef4444;
        font-size: 12px;
        font-weight: 500;
        margin-top: 6px;
    }

    .form-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 32px;
        padding-top: 20px;
        border-top: 1px solid var(--border);
    }

    .btn-submit {
        background-color: var(--primary);
        color: #ffffff;
        font-weight: 600;
        font-size: 14px;
        padding: 12px 24px;
        border-radius: 10px;
        border: none;
        cursor: pointer;
        transition: all 0.2s ease;
        box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.2);
    }

    .btn-submit:hover {
        background-color: var(--primary-hover);
        transform: translateY(-1px);
        box-shadow: 0 6px 12px -2px rgba(79, 70, 229, 0.3);
    }

    .btn-cancel {
        color: var(--text-muted);
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        padding: 12px 20px;
        border-radius: 10px;
        transition: all 0.2s ease;
    }

    .btn-cancel:hover {
        background: #f1f5f9;
        color: var(--text-main);
    }
</style>

<div class="edit-wrapper">
    <div class="page-header">
        <div class="page-title-group">
            <h1>Edit Peminjaman</h1>
            <p>Perbarui tenggat pengembalian dan status transaksi #{{ $loan->id }}.</p>
        </div>
        <a href="{{ route('loans.index') }}" class="btn-back">
            &larr; Kembali
        </a>
    </div>

    <div class="card-container">
        <div class="form-group">
            <label class="form-label">Anggota Peminjam</label>
            <div class="readonly-box">
                {{ $loan->member->nama ?? '-' }} <span style="color: var(--text-muted); font-weight: normal;">({{ $loan->member->nim ?? '-' }})</span>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Buku Dipinjam</label>
            <div class="book-chips">
                @foreach ($loan->loanItems as $item)
                    <span class="book-chip">
                        <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                        {{ $item->book->judul ?? '-' }}
                    </span>
                @endforeach
            </div>
        </div>

        <form action="{{ route('loans.update', $loan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="tanggal_pinjam" value="{{ $loan->tanggal_pinjam }}">

            <div class="form-group">
                <label for="tanggal_kembali" class="form-label">Tenggat Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control" value="{{ old('tanggal_kembali', $loan->tanggal_kembali) }}">
                @error('tanggal_kembali')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="status" class="form-label">Status Peminjaman</label>
                <select name="status" id="status" class="form-control">
                    <option value="dipinjam" @selected(old('status', $loan->status) == 'dipinjam')>Dipinjam</option>
                    <option value="dikembalikan" @selected(old('status', $loan->status) == 'dikembalikan')>Dikembalikan</option>
                    <option value="terlambat" @selected(old('status', $loan->status) == 'terlambat')>Terlambat</option>
                </select>
                @error('status')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-actions">
                <a href="{{ route('loans.index') }}" class="btn-cancel">Batal</a>
                <button type="submit" class="btn-submit">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</div>
@endsection