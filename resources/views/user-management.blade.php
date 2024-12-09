@extends('main.layout')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection
@section('content')
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
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Data User</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Data User</h6>
                </nav>
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
                            <h6>Data User</h6>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="myTableuser">
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
                                                Email</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                image</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $d)
                                            <tr>
                                                <td
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{ $loop->iteration }}</td>
                                                <td
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{ $d->name }}</td>
                                                <td
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    {{ $d->email }}</td>
                                                <td
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    <img src="{{ asset('storage/photo-user/' . $d->image) }}"
                                                        alt="" width="100">
                                                </td>
                                                <td
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#modal-detail{{ $d->id }}"
                                                        class="btn btn-info"><i class="fas fa-eye"></i>Detail</a>
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#modal-edit{{ $d->id }}"
                                                        class="btn btn-primary"><i class="fas fa-pen"></i>Edit</a>
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#modal-hapus{{ $d->id }}"
                                                        class="btn btn-danger"><i class="fas fa-trash-alt"></i>Hapus</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-detail{{ $d->id }}" tabindex="-1"
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
                                                                <label for="exampleInputEmail1">Foto profile</label><br>
                                                                <img src="{{ asset('storage/photo-user/' . $d->image) }}"
                                                                    alt="" width="450">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Nama</label>
                                                                <p>{{ $d->name }}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Email</label>
                                                                <p>{{ $d->email }}</p>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Password</label>
                                                                <p>{{ $d->password }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="modal-edit{{ $d->id }}" tabindex="-1"
                                                aria-labelledby="modalEditLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="modalEditLabel">Edit Data</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('admin.user.update', ['id' => $d->id]) }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="namaMobil"
                                                                        class="form-control-label">Nama</label>
                                                                    <input class="form-control" type="text"
                                                                        id="namaMobil" name="name"
                                                                        value="{{ $d->name }}">
                                                                </div>
                                                                @error('name')
                                                                    <small>{{ $message }}</small>
                                                                @enderror
                                                                <div class="form-group">
                                                                    <label for="warnaMobil"
                                                                        class="form-control-label">Email</label>
                                                                    <input class="form-control" type="text"
                                                                        id="warnaMobil" name="email"
                                                                        value="{{ $d->email }}">
                                                                </div>
                                                                @error('email')
                                                                    <small>{{ $message }}</small>
                                                                @enderror
                                                                <div class="form-group">
                                                                    <label for="warnaMobil"
                                                                        class="form-control-label">Password</label>
                                                                    <input class="form-control" type="text"
                                                                        id="warnaMobil" name="password">
                                                                </div>
                                                                @error('password')
                                                                    <small>{{ $message }}</small>
                                                                @enderror
                                                                <div class="form-group">
                                                                    @if ($d->image)
                                                                        <img src="{{ asset('storage/photo-user/' . $d->image) }}"
                                                                            width="450"alt="">
                                                                    @endif
                                                                    <label for="imageMobil"
                                                                        class="form-control-label">image</label>
                                                                    <input class="form-control" type="file"
                                                                        id="imageMobil" name="image">
                                                                </div>
                                                                @error('photo')
                                                                    <small>{{ $message }}</small>
                                                                @enderror
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
                                            <div class="modal fade" id="modal-hapus{{ $d->id }}" tabindex="-1"
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
                                                                <b>{{ $d->name }}</b>
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <form action="{{ route('admin.user.delete', ['id' => $d->id]) }}"
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
                                                        <div class="modal-body">
                                                            <form action="{{ route('admin.user.store') }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label for="nama"
                                                                        class="form-control-label">Nama</label>
                                                                    <input class="form-control" type="text"
                                                                        id="nama" name="name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email"
                                                                        class="form-control-label">Email</label>
                                                                    <input class="form-control" type="text"
                                                                        id="email" name="email">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="password"
                                                                        class="form-control-label">Password</label>
                                                                    <input class="form-control" type="text"
                                                                        id="password" name="password">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="image"
                                                                        class="form-control-label">image</label>
                                                                    <input class="form-control" type="file"
                                                                        id="image" name="image">
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-default"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                        </form>
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
            $('#myTableuser').DataTable();
        });
    </script>
@endsection
