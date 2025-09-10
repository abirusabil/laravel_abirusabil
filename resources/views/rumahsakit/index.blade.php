{{-- resources/views/rumah_sakit/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Rumah Sakit</h2>
    <a href="{{ route('rumahsakit.create') }}" class="btn btn-primary mb-3">Tambah Rumah Sakit</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Rumah Sakit</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rumahSakits as $rs)
                <tr id="row-{{ $rs->id }}">
                    <td>{{ $rs->nama_rumah_sakit }}</td>
                    <td>{{ $rs->alamat }}</td>
                    <td>{{ $rs->email }}</td>
                    <td>{{ $rs->telepon }}</td>
                    <td>
                        <a href="{{ route('rumah-sakit.show', $rs->id) }}" class="btn btn-primary btn-sm">Lihat Pasien</a>
                        <a href="{{ route('rumah-sakit.edit', $rs->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $rs->id }}">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
$(function(){
    $('.btn-delete').on('click', function(){
        if(!confirm('Yakin ingin menghapus data ini?')) return;

        let id = $(this).data('id');
        $.ajax({
            url: '/rumah-sakit/' + id,
            type: 'DELETE',
            data: { _token: '{{ csrf_token() }}' },
            success: function(res){
                if(res.success){
                    $('#row-' + id).remove();
                }
            }
        });
    });
});
</script>
@endsection
