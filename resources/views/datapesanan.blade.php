@extends('main.layout')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.bootstrap5.min.css">
@endsection
@section('content')
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
            data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data Pesanan</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Data Pesanan</h6>
                </nav>
            </div>
        </nav>
        <div class="container-fluid py-4">
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <!-- Mengurangi offset untuk menggeser card lebih ke kanan dan memperbesar card -->
                    <div class="card">
                        <div class="card-header pb-0">
                            <h3>Data Seluruh Pemesanan</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                @if ($pemesanans->isEmpty())
                                    <p class="text-center">Belum ada riwayat pemesanan.</p>
                                @else
                                    <table class="table table-bordered" id="data-table">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Nama User</th>
                                                <th class="text-center">Nama Mobil</th>
                                                <th class="text-center">Lama Sewa (Hari)</th>
                                                <th class="text-center">Total Harga</th>
                                                <th class="text-center">Jenis Pembayaran</th>
                                                <th class="text-center">Tanggal Pemesanan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pemesanans as $pemesanan)
                                                <tr id="print-section-{{ $pemesanan->id }}">
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ $pemesanan->user->name }}</td>
                                                    <td class="text-center">{{ $pemesanan->mobil->nama }}</td>
                                                    <td class="text-center">{{ $pemesanan->lama_sewa }}</td>
                                                    <td class="text-center">Rp.
                                                        {{ number_format($pemesanan->total_harga, 0, ',', '.') }}
                                                    </td>
                                                    <td class="text-center">{{ ucfirst($pemesanan->jenis_bayar) }}</td>
                                                    <td class="text-center">
                                                        {{ $pemesanan->created_at->format('d M Y, H:i') }}
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
    @endsection
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#data-table').DataTable({
                    dom: 'Bfrtip', // Menyertakan tombol di atas tabel
                    buttons: [
                        'copy', // Tombol untuk menyalin data ke clipboard
                        'excel', // Tombol untuk mengekspor ke Excel
                        'csv', // Tombol untuk mengekspor ke CSV
                        'pdf', // Tombol untuk mengekspor ke PDF
                        'print' // Tombol untuk mencetak
                    ]
                });
            });
        </script>
    </main>
@endsection
