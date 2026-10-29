@extends('layouts.app')

@section('title', 'Detail Peminjaman')

@section('content')
<style>
    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        flex-wrap: wrap;
        gap: 12px;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #4b5563;
        text-decoration: none;
        font-weight: 500;
        font-size: 14px;
        padding: 8px 14px;
        background: #f3f4f6;
        border-radius: 6px;
        transition: all 0.2s ease;
    }

    .btn-back:hover {
        background: #e5e7eb;
        color: #111827;
    }

    .detail-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        padding: 24px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        margin-bottom: 28px;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
    }

    .info-item {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .info-label {
        font-size: 12px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: #6b7280;
    }

    .info-value {
        font-size: 15px;
        font-weight: 500;
        color: #1f2937;
    }

    .badge {
        display: inline-block;
        padding: 4px 12px;
        border-radius: 9999px;
        font-size: 13px;
        font-weight: 600;
        text-transform: capitalize;
        width: fit-content;
    }

    .badge-dipinjam {
        background-color: #fef3c7;
        color: #92400e;
    }

    .badge-dikembalikan {
        background-color: #d1fae5;
        color: #065f46;
    }

    .badge-terlambat {
        background-color: #fee2e2;
        color: #991b1b;
    }

    .section-title {
        font-size: 18px;
        font-weight: 700;
        color: #111827;
        margin-bottom: 16px;
    }

    .table-container {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 12px;
        overflow-x: auto;
        box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    }

    .styled-table {
        width: 100%;
        border-collapse: collapse;
        text-align: left;
    }

    .styled-table th {
        background-color: #f9fafb;
        padding: 14px 20px;
        font-size: 13px;
        font-weight: 600;
        color: #4b5563;
        border-bottom: 1px solid #e5e7eb;
        text-transform: uppercase;
    }

    .styled-table td {
        padding: 16px 20px;
        font-size: 14px;
        color: #374151;
        border-bottom: 1px solid #f3f4f6;
    }

    .styled-table tbody tr:last-child td {
        border-bottom: none;
    }

    .styled-table tbody tr:hover {
        background-color: #f9fafb;
    }

    @media (max-width: 640px) {
        .detail-card {
            padding: 16px;
        }
        .info-grid {
            grid-template-columns: 1fr;
            gap: 16px;
        }
    }
</style>

<div class="page-header">
    <h1 style="margin:0; font-size: 24px; font-weight: 700; color: #111827;">Detail Peminjaman</h1>
    <a href="{{ route('loans.index') }}" class="btn-back">
        &larr; Kembali ke Daftar Peminjaman
    </a>
</div>

<div class="detail-card">
    <div class="info-grid">
        <div class="info-item">
            <span class="info-label">Anggota</span>
            <span class="info-value">{{ $loan->member->nama ?? '-' }} <span style="color: #6b7280; font-weight: 400;">({{ $loan->member->nim ?? '-' }})</span></span>
        </div>

        <div class="info-item">
            <span class="info-label">Petugas Pencatat</span>
            <span class="info-value">{{ $loan->user->name ?? '-' }}</span>
        </div>

        <div class="info-item">
            <span class="info-label">Tanggal Pinjam</span>
            <span class="info-value">{{ $loan->tanggal_pinjam }}</span>
        </div>

        <div class="info-item">
            <span class="info-label">Tenggat Kembali</span>
            <span class="info-value">{{ $loan->tanggal_kembali }}</span>
        </div>

        <div class="info-item">
            <span class="info-label">Tanggal Dikembalikan</span>
            <span class="info-value">{{ $loan->tanggal_dikembalikan ?? '-' }}</span>
        </div>

        <div class="info-item">
            <span class="info-label">Status</span>
            <span class="badge badge-{{ $loan->status }}">{{ $loan->status }}</span>
        </div>
    </div>
</div>

<h2 class="section-title">Buku yang Dipinjam</h2>

<div class="table-container">
    <table class="styled-table">
        <thead>
            <tr>
                <th style="width: 60px;">No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($loan->loanItems as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td style="font-weight: 600; color: #111827;">{{ $item->book->judul ?? '-' }}</td>
                    <td>{{ $item->book->penulis ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="text-align: center; color: #6b7280; padding: 24px;">Tidak ada buku dalam transaksi ini.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection