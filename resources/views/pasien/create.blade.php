{{-- resources/views/pasien/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pasien</h2>
    <form action="{{ route('pasien.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama_pasien" class="form-label">Nama Pasien</label>
        <input type="text" name="nama_pasien" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" name="alamat" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="no_telpon" class="form-label">No Telpon</label>
        <input type="text" name="no_telepon" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="rumah_sakit_id" class="form-label">Rumah Sakit</label>
        <select name="rumah_sakit_id" class="form-control" required>
            <option value="" disabled {{ !$rumahSakitId ? 'selected' : '' }}>
                Pilih Rumah Sakit
            </option>
            @foreach($rumahSakits as $rs)
                <option value="{{ $rs->id }}" {{ $rumahSakitId == $rs->id ? 'selected' : '' }}>
                    {{ $rs->nama_rumah_sakit }}
                </option>
            @endforeach
        </select>
    </div>


    <button type="submit" class="btn btn-success">Simpan</button>
</form>
</div>
@endsection
