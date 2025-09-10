{{-- resources/views/pasien/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Pasien</h2>
    <a href="{{ route('pasien.create') }}" class="btn btn-primary mb-3">Tambah Pasien</a>

     <div class="mb-3">
        <label>Filter Rumah Sakit:</label>
        <select id="filter-rs" class="form-control">
            <option value="">Semua</option>
            @foreach($rumahSakits as $rs)
                <option value="{{ $rs->id }}">{{ $rs->nama_rumah_sakit }}</option>
            @endforeach
        </select>
    </div>

    <table class="table table-bordered" id="table-pasien">
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>Alamat</th>
                <th>No Telpon</th>
                <th>Rumah Sakit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pasiens as $p)
                <tr id="row-{{ $p->id }}">
                    <td>{{ $p->nama_pasien }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->no_telepon }}</td>
                    <td>
                        <a href="{{ route('rumah-sakit.show', $p->rumahSakit->id) }}" class="btn btn-primary btn-sm">{{ $p->rumahSakit->nama_rumah_sakit }}</a>
                        </td>
                    <td>
                        <a href="{{ route('pasien.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <button class="btn btn-sm btn-danger btn-delete" data-id="{{ $p->id }}">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$('#filter-rs').change(function() {
    var rs_id = $(this).val();
    $.get('/pasien?rumah_sakit_id=' + rs_id, function(data) {
        var html = $(data).find('#table-pasien tbody').html();
        $('#table-pasien tbody').html(html);
    });
});

$(function() {
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
