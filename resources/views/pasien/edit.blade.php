{{-- resources/views/pasien/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Pasien</h2>
    <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_pasien">Nama Pasien</label>
            <input type="text" class="form-control" name="nama_pasien" value="{{ $pasien->nama_pasien }}" required>
        </div>
        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" name="alamat" value="{{ $pasien->alamat }}" required>
        </div>
        <div class="mb-3">
            <label for="no_telepon">No Telpon</label>
            <input type="text" class="form-control" name="no_telepon" value="{{ $pasien->no_telepon }}" required>
        </div>
        <div class="mb-3">
            <label for="rumah_sakit_id">Rumah Sakit</label>
            <select class="form-control" name="rumah_sakit_id" required>
                @foreach ($rumahSakits as $rs)
                    <option value="{{ $rs->id }}" {{ $pasien->rumah_sakit_id == $rs->id ? 'selected' : '' }}>
                        {{ $rs->nama_rumah_sakit }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
