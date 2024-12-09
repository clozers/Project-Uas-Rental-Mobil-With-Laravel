@extends('main.layout')

@section('content')
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-md-8 offset-md-1"> <!-- Menambahkan offset untuk menggeser card ke kanan -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header pb-0">
                        <h3>Data Mobil</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0" id="myTable">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            ID</th>
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
                                            Jumlah Kursi</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tahun Beli</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Harga/Hari</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Gambar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_mobil as $i)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $i->nama }}</td>
                                            <td class="text-center">{{ $i->warna }}</td>
                                            <td class="text-center">{{ $i->no_polisi }}</td>
                                            <td class="text-center">{{ $i->jumlah_kursi }}</td>
                                            <td class="text-center">{{ $i->tahun_beli }}</td>
                                            <td class="text-center">Rp.{{ number_format($i->harga, 0, ',', '.') }}</td>
                                            <td class="text-center"><img
                                                    src="{{ asset('storage/photo-mobil/' . $i->gambar) }}" alt=""
                                                    width="100"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr class="horizontal dark">
                        <p class="text-uppercase text-sm">Form Pemesanan</p>
                        <form action="{{ route('admin.pemesanan.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                @foreach ($data_user as $user)
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="username" class="form-control-label">Username</label>
                                            <input class="form-control" type="text" value="{{ $user->name }}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email" class="form-control-label">Email address</label>
                                            <input class="form-control" type="email" value="{{ $user->email }}"
                                                disabled>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Mobil Yang Ingin Dipesan</p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="mobil" class="form-control-label">Merk Mobil</label>
                                        <select name="mobil_id" class="form-control">
                                            @foreach ($data_mobil as $mobil)
                                                <option value="{{ $mobil->id }}">{{ $mobil->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="waktu" class="form-control-label">Waktu Rental (Hari)</label>
                                        <input id="days" class="form-control" type="number" name="waktu"
                                            placeholder="Jumlah hari" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="jenis_bayar" class="form-control-label">Jenis Bayar</label>
                                        <select name="jenis_bayar" class="form-control">
                                            <option value="cash">Cash</option>
                                            <option value="card">Card</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark">
                            <p class="text-uppercase text-sm">Total Harga</p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="harga" class="form-control-label">Harga</label>
                                        <input id="total_harga" class="form-control" type="text" name="harga"
                                            value="" readonly>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('days').addEventListener('input', function() {
            const days = parseInt(this.value) || 0;
            const selectedMobil = document.querySelector('[name="mobil_id"]').value;
            const hargaMobil = @json($data_mobil->pluck('harga', 'id'));

            if (hargaMobil[selectedMobil]) {
                const totalHarga = days * hargaMobil[selectedMobil];
                document.getElementById('total_harga').value = `Rp. ${totalHarga.toLocaleString()}`;
            }
        });
    </script>
@endsection
