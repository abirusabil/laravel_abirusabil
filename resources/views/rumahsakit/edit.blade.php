{{-- resources/views/rumah_sakit/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Rumah Sakit</h2>
    <form action="{{ route('rumah-sakit.update', $rumahSakit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Rumah Sakit</label>
            <input type="text" name="nama_rumah_sakit" value="{{ $rumahSakit->nama_rumah_sakit }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" value="{{ $rumahSakit->alamat }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ $rumahSakit->email }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Telepon</label>
            <input type="text" name="telepon" value="{{ $rumahSakit->telepon }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
