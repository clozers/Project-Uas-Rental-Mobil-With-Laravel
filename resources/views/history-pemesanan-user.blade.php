@extends('main.layout')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-9 offset-md-2">
                <!-- Mengurangi offset untuk menggeser card lebih ke kanan dan memperbesar card -->
                <div class="card">
                    <div class="card-header pb-0">
                        <h3>History Pemesanan</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if ($pemesanans->isEmpty())
                                <p class="text-center">Belum ada riwayat pemesanan.</p>
                            @else
                                <table class="table table-bordered" id="data-table-mobil">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th class="text-center">Nama Mobil</th>
                                            <th class="text-center">Lama Sewa (Hari)</th>
                                            <th class="text-center">Total Harga</th>
                                            <th class="text-center">Jenis Pembayaran</th>
                                            <th class="text-center">Tanggal Pemesanan</th>
                                            <th class="text-center action-column">Aksi</th> <!-- Kolom aksi -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pemesanans as $pemesanan)
                                            <tr id="print-section-{{ $pemesanan->id }}">
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td class="text-center">{{ $pemesanan->mobil->nama }}</td>
                                                <td class="text-center">{{ $pemesanan->lama_sewa }}</td>
                                                <td class="text-center">Rp.
                                                    {{ number_format($pemesanan->total_harga, 0, ',', '.') }}
                                                </td>
                                                <td class="text-center">{{ ucfirst($pemesanan->jenis_bayar) }}</td>
                                                <td class="text-center">{{ $pemesanan->created_at->format('d M Y, H:i') }}
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-primary btn-sm"
                                                        onclick="printData({{ $pemesanan->id }})">Print</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printData(id) {
            const printSection = document.getElementById('print-section-' + id);

            const originalContent = document.body.innerHTML;

            // Mengganti konten body dengan bagian yang akan dicetak
            document.body.innerHTML = `
            <html>
                <head>
                    <title>Print Data</title>
                </head>
                <body>
                <h1>History Pemesanan</h1>
                    <table border="1" style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Nama Mobil</th>
                                <th class="text-center">Lama Sewa (Hari)</th>
                                <th class="text-center">Total Harga</th>
                                <th class="text-center">Jenis Pembayaran</th>
                                <th class="text-center">Tanggal Pemesanan</th>
                                <th class="text-center action-column">Aksi</th> <!-- Kolom aksi -->
                            </tr>
                        </thead>
                        <tbody>
                            ${printSection.innerHTML}
                        </tbody>
                    </table>
                </body>
            </html>
        `;

            // Mencetak halaman
            window.print();

            // Mengembalikan konten asli
            document.body.innerHTML = originalContent;

            // Reload halaman untuk mengembalikan script
            location.reload();
        }
    </script>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#data-table-mobil').DataTable();
        });
    </script>
@endsection
