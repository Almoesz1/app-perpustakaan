<!-- File: resources/views/loans/index.blade.php -->
@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
<style>
    :root {
        --primary: #4f46e5;
        --primary-hover: #4338ca;
        --bg-main: #f8fafc;
        --surface: #ffffff;
        --text-main: #0f172a;
        --text-muted: #64748b;
        --border: #e2e8f0;
    }

    .loans-wrapper {
        max-width: 1280px;
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

    .btn-create {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background-color: var(--primary);
        color: #ffffff;
        font-weight: 600;
        font-size: 14px;
        padding: 10px 18px;
        border-radius: 10px;
        text-decoration: none;
        transition: all 0.2s ease;
        box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.2);
    }

    .btn-create:hover {
        background-color: var(--primary-hover);
        transform: translateY(-1px);
        box-shadow: 0 6px 12px -2px rgba(79, 70, 229, 0.3);
    }

    .card-container {
        background: var(--surface);
        border: 1px solid var(--border);
        border-radius: 16px;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.03), 0 4px 6px -2px rgba(0, 0, 0, 0.01);
        overflow: hidden;
    }

    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }

    .modern-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
        font-size: 14px;
    }

    .modern-table th {
        background-color: #f8fafc;
        padding: 16px 20px;
        font-weight: 700;
        color: var(--text-muted);
        border-bottom: 1px solid var(--border);
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        white-space: nowrap;
    }

    .modern-table td {
        padding: 16px 20px;
        color: var(--text-main);
        border-bottom: 1px solid #f1f5f9;
        vertical-align: middle;
    }

    .modern-table tbody tr {
        transition: background-color 0.15s ease;
    }

    .modern-table tbody tr:hover {
        background-color: #f8fafc;
    }

    .modern-table tbody tr:last-child td {
        border-bottom: none;
    }

    .user-avatar-group {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .avatar-circle {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #e0e7ff;
        color: var(--primary);
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        flex-shrink: 0;
    }

    .user-info {
        display: flex;
        flex-direction: column;
    }

    .user-name {
        font-weight: 600;
        color: var(--text-main);
        font-size: 14px;
    }

    .user-sub {
        font-size: 12px;
        color: var(--text-muted);
    }

    .book-list {
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
    }

    .book-chip {
        background: #f1f5f9;
        border: 1px solid var(--border);
        color: #334155;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 12px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 12px;
        border-radius: 9999px;
        font-size: 12px;
        font-weight: 600;
        text-transform: capitalize;
    }

    .badge-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
    }

    .status-dipinjam {
        background: #fef3c7;
        color: #92400e;
    }
    .status-dipinjam .badge-dot { background: #d97706; }

    .status-dikembalikan {
        background: #d1fae5;
        color: #065f46;
    }
    .status-dikembalikan .badge-dot { background: #10b981; }

    .status-terlambat {
        background: #ffe4e6;
        color: #9f1239;
    }
    .status-terlambat .badge-dot { background: #f43f5e; }

    .action-group {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        gap: 6px;
    }

    .action-btn {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: 1px solid var(--border);
        background: #ffffff;
        color: var(--text-muted);
        text-decoration: none;
        transition: all 0.2s ease;
        cursor: pointer;
    }

    .action-btn:hover {
        background: #f8fafc;
        color: var(--text-main);
        border-color: #cbd5e1;
    }

    .action-btn.btn-return-icon {
        background: #10b981;
        color: #ffffff;
        border: none;
        width: auto;
        padding: 0 12px;
        font-size: 12px;
        font-weight: 600;
        gap: 4px;
    }

    .action-btn.btn-return-icon:hover {
        background: #059669;
    }

    .action-btn.btn-delete-icon:hover {
        background: #fef2f2;
        color: #ef4444;
        border-color: #fca5a5;
    }

    .alert-banner {
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        color: #065f46;
        padding: 14px 18px;
        border-radius: 12px;
        margin-bottom: 20px;
        font-size: 14px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .pagination-container {
        padding: 16px 20px;
        border-top: 1px solid var(--border);
        background: #f8fafc;
    }
</style>

<div class="loans-wrapper">
    <div class="page-header">
        <div class="page-title-group">
            <h1>Daftar Peminjaman</h1>
            <p>Kelola dan pantau seluruh sirkulasi peminjaman buku perpustakaan.</p>
        </div>
        <a href="{{ route('loans.create') }}" class="btn-create">
            <svg width="18" height="18" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Tambah Peminjaman
        </a>
    </div>

    @if (session('success'))
        <div class="alert-banner">
            <svg width="20" height="20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="card-container">
        <div class="table-responsive">
            <table class="modern-table">
                <thead>
                    <tr>
                        <th style="width: 60px;">ID</th>
                        <th>Anggota</th>
                        <th>Buku Dipinjam</th>
                        <th>Petugas</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th style="text-align: right;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($loans as $loan)
                        <tr>
                            <td style="font-weight: 700; color: var(--text-muted);">#{{ $loan->id }}</td>
                            <td>
                                <div class="user-avatar-group">
                                    <div class="avatar-circle">
                                        {{ strtoupper(substr($loan->member->nama ?? 'A', 0, 1)) }}
                                    </div>
                                    <div class="user-info">
                                        <span class="user-name">{{ $loan->member->nama ?? '-' }}</span>
                                        <span class="user-sub">NIM: {{ $loan->member->nim ?? '-' }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="book-list">
                                    @foreach ($loan->loanItems as $item)
                                        <span class="book-chip">
                                            <svg width="12" height="12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                                            {{ $item->book->judul ?? '-' }}
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <span style="font-weight: 500;">{{ $loan->user->name ?? '-' }}</span>
                            </td>
                            <td>{{ $loan->tanggal_pinjam }}</td>
                            <td>{{ $loan->tanggal_kembali }}</td>
                            <td>
                                <span class="status-badge status-{{ $loan->status }}">
                                    <span class="badge-dot"></span>
                                    {{ $loan->status }}
                                </span>
                            </td>
                            <td>
                                <div class="action-group">
                                    @if ($loan->status === 'dipinjam')
                                        <form action="{{ route('loans.kembalikan', $loan->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="action-btn btn-return-icon" title="Kembalikan Buku">
                                                <svg width="14" height="14" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                                Kembali
                                            </button>
                                        </form>
                                    @endif

                                    <a href="{{ route('loans.show', $loan->id) }}" class="action-btn" title="Detail">
                                        <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                    </a>

                                    <a href="{{ route('loans.edit', $loan->id) }}" class="action-btn" title="Edit">
                                        <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>

                                    <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn btn-delete-icon" title="Hapus">
                                            <svg width="15" height="15" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" style="text-align: center; color: var(--text-muted); padding: 48px;">
                                Belum ada data transaksi peminjaman.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination-container">
            {{ $loans->links() }}
        </div>
    </div>
</div>
@endsection