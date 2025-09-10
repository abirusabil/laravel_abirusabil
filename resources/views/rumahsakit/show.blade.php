@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pasien di {{ $rumahSakit->nama_rumah_sakit }}</h2>
    <a href="{{ route('rumah-sakit.index') }}" class="btn btn-secondary mb-3">Kembali</a>
    <a href="{{ route('pasien.create', ['rumah_sakit_id' => $rumahSakit->id]) }}" class="btn btn-primary mb-3">
    Tambah Pasien
    </a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>No Telpon</th>
                 <td>aksi</td>
            </tr>
        </thead>
        <tbody>
            @forelse ($rumahSakit->pasien as $pasien)
                 <tr id="row-{{ $pasien->id }}">
                    <td>{{ $pasien->nama_pasien }}</td>
                    <td>{{ $pasien->alamat }}</td>
                    <td>{{ $pasien->no_telepon }}</td>
                    <td>
                        <a href="{{ route('pasien.edit', $pasien->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $pasien->id }}">Hapus</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Tidak ada pasien</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(function() {
    // Hapus Pasien
    $('.btn-delete').on('click', function() {
        if (!confirm('Yakin ingin menghapus pasien ini?')) return;

        let id = $(this).data('id');
        $.ajax({
            url: '/pasien/' + id,
            type: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(res) {
                if (res.success) {
                    $('#row-' + id).remove();
                }
            }
        });
    });
});
</script>
@endsection
