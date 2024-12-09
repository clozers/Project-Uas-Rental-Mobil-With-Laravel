@extends('main.layout')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
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
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data Mobil</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Data Mobil</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0">
                                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                            </a>
                        </li>
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                                aria-labelledby="dropdownMenuButton">
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New message</span> from Laur
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    13 minutes ago
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="mb-2">
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="my-auto">
                                                <img src="../assets/img/small-logos/logo-spotify.svg"
                                                    class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    <span class="font-weight-bold">New album</span> by Travis Scott
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    1 day
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item border-radius-md" href="javascript:;">
                                        <div class="d-flex py-1">
                                            <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                                <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                                    <title>credit-card</title>
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF"
                                                            fill-rule="nonzero">
                                                            <g transform="translate(1716.000000, 291.000000)">
                                                                <g transform="translate(453.000000, 454.000000)">
                                                                    <path class="color-background"
                                                                        d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z"
                                                                        opacity="0.593633743"></path>
                                                                    <path class="color-background"
                                                                        d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="text-sm font-weight-normal mb-1">
                                                    Payment successfully completed
                                                </h6>
                                                <p class="text-xs text-secondary mb-0">
                                                    <i class="fa fa-clock me-1"></i>
                                                    2 days
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <a data-bs-toggle="modal" data-bs-target="#modal-tambah" class="btn btn-primary">Tambah</a>
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Data Mobil</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="myTable">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                id</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Nama</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Warna</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                No Polisi</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Jumlah kursi</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Tahun Beli</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Harga/Hari</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Gambar</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $i)
                                            <tr>
                                                <td
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{ $loop->iteration }}</td>
                                                <td
                                                    class="text-center  text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{ $i->nama }}</td>
                                                <td
                                                    class="text-center  text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{ $i->warna }}</td>
                                                <td
                                                    class="text-center  text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{ $i->no_polisi }}</td>
                                                <td
                                                    class="text-center  text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{ $i->jumlah_kursi }}</td>
                                                <td
                                                    class="text-center  text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{ $i->tahun_beli }}</td>
                                                <td
                                                    class="text-center  text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Rp.{{ number_format($i->harga, 0, ',', '.') }}</td>
                                                <td
                                                    class="text-center  text-secondary text-xxs font-weight-bolder opacity-7">
                                                    <img src="{{ asset('storage/photo-mobil/' . $i->gambar) }}"
                                                        alt="" width="100">
                                                </td>
                                                <td
                                                    class="text-center  text-secondary text-xxs font-weight-bolder opacity-7">
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#modal-detail{{ $i->id }}"
                                                        class="btn btn-info"><i class="fas fa-eye"></i>Detail</a>
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#modal-edit{{ $i->id }}"
                                                        class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#modal-hapus{{ $i->id }}"
                                                        class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-detail{{ $i->id }}" tabindex="-1"
                                                aria-labelledby="modalDetailLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="modalDetailLabel">Detail Data</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Foto Mobil</label><br>
                                                                <img src="{{ asset('storage/photo-mobil/' . $i->gambar) }}"
                                                                    alt="" width="450">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Nama Mobil</label>
                                                                <p>{{ $i->nama }}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Warna Mobil</label>
                                                                <p>{{ $i->warna }}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">No Polisi</label>
                                                                <p>{{ $i->no_polisi }}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Jumlah Kursi</label>
                                                                <p>{{ $i->jumlah_kursi }}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Tahun Beli</label>
                                                                <p>{{ $i->tahun_beli }}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Harga</label>
                                                                <p>{{ $i->harga}}</p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="modal-edit{{ $i->id }}" tabindex="-1"
                                                aria-labelledby="modalEditLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="modalEditLabel">Edit Data</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('admin.mobil.update', ['id' => $i->id]) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="namaMobil" class="form-control-label">Nama
                                                                        Mobil</label>
                                                                    <input class="form-control" type="text"
                                                                        id="namaMobil" name="nama"
                                                                        value="{{ $i->nama }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="warnaMobil"
                                                                        class="form-control-label">Warna
                                                                        Mobil</label>
                                                                    <input class="form-control" type="text"
                                                                        id="warnaMobil" name="warna"
                                                                        value="{{ $i->warna }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="noPolisi" class="form-control-label">No
                                                                        Polisi</label>
                                                                    <input class="form-control" type="text"
                                                                        id="noPolisi" name="no_polisi"
                                                                        value="{{ $i->no_polisi }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jumlahKursi"
                                                                        class="form-control-label">Jumlah
                                                                        Kursi</label>
                                                                    <input class="form-control" type="text"
                                                                        id="jumlahKursi" name="jumlah_kursi"
                                                                        value="{{ $i->jumlah_kursi }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tahunBeli"
                                                                        class="form-control-label">Tahun
                                                                        Beli</label>
                                                                    <input class="form-control" type="date"
                                                                        id="tahunBeli" name="tahun_beli"
                                                                        value="{{ $i->tahun_beli }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tahunBeli"
                                                                        class="form-control-label">Harga</label>
                                                                    <input class="form-control" type="number"
                                                                        id="hargaMobil" name="harga"
                                                                        value="{{ $i->harga }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    @if ($i->gambar)
                                                                        <img src="{{ asset('storage/photo-mobil/' . $i->gambar) }}"
                                                                            width="450"alt="">
                                                                    @endif
                                                                    <label for="gambarMobil"
                                                                        class="form-control-label">Gambar</label>
                                                                    <input class="form-control" type="file"
                                                                        id="gambarMobil" name="gambar">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="modal-hapus{{ $i->id }}" tabindex="-1"
                                                aria-labelledby="modalHapusLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="modalHapusLabel">Hapus Data</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Apakah Kamu yakin ingin menghapus data user
                                                                <b>{{ $i->name }}</b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form action="{{ route('admin.mobil.delete', ['id' => $i->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-default"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="modal-tambah" tabindex="-1"
                                                aria-labelledby="modalTambahLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="modalTambahLabel">Tambah Data</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('admin.mobil.store') }}" method="POST"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="namaMobil" class="form-control-label">Nama
                                                                        Mobil</label>
                                                                    <input class="form-control" type="text"
                                                                        id="namaMobil" name="nama">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="warnaMobil"
                                                                        class="form-control-label">Warna
                                                                        Mobil</label>
                                                                    <input class="form-control" type="text"
                                                                        id="warnaMobil" name="warna">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="noPolisi" class="form-control-label">No
                                                                        Polisi</label>
                                                                    <input class="form-control" type="text"
                                                                        id="noPolisi" name="no_polisi">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jumlahKursi"
                                                                        class="form-control-label">Jumlah
                                                                        Kursi</label>
                                                                    <input class="form-control" type="text"
                                                                        id="jumlahKursi" name="jumlah_kursi">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tahunBeli"
                                                                        class="form-control-label">Tahun
                                                                        Beli</label>
                                                                    <input class="form-control" type="date"
                                                                        id="tahunBeli" name="tahun_beli">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="tahunBeli"
                                                                        class="form-control-label">Harga</label>
                                                                    <input class="form-control" type="number"
                                                                        id="hargaMobil" name="harga">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="gambarMobil"
                                                                        class="form-control-label">Gambar</label>
                                                                    <input class="form-control" type="file"
                                                                        id="gambarMobil" name="gambar">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                        </form>
                                                        @if (session('success'))
                                                            <div class="alert alert-success">
                                                                {{ session('success') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer pt-3  ">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-lg-6 mb-lg-0 mb-4">
                            <div class="copyright text-center text-sm text-muted text-lg-start">
                                ©
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>,
                                made with <i class="fa fa-heart"></i> by
                                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                    Tim</a>
                                for a better web.
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com" class="nav-link text-muted"
                                        target="_blank">Creative Tim</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                        target="_blank">About Us</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                        target="_blank">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                        target="_blank">License</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
@endsection
