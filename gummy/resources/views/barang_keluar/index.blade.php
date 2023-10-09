@extends('layouts.master')
@section('titel','Data Barang Retur')
@section('container')
<section class="content">

    <div class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data barang Retur</h3>
                <div class="pull-right">
                    <a href="/retur/create" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i>RETUR
                    </a>
                </div>
            </div>

            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="dataTable-r">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Barcode</th>
                            <th>Nama</th>
                            <th>Jumlah Keluar</th>
                            <th>Stok Sekarang</th>
                            <th>User</th>
                            <th>Tanggal Keluar</th>
                            <th>Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($retur as $ret)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $ret -> barang ['barcode'] }}</td>
                            <td>{{ $ret -> barang ['nama_barang'] }}</td>
                            <td>{{ $ret -> jumlah_keluar }}</td>
                            <td>{{ $ret -> barang ['stok'] }}</td>
                            <td>{{ $ret -> user ['nama'] }}</td>
                            <td>{{ $ret -> tanggal_keluar }}</td>

                            <td class="text-center" width="160px">
                                <form action="/retur/{{ $ret -> id }}" class="inline" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-xs" onclick="yakin()">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $retur -> links() }}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var table = $('#dataTable-r').DataTable({
                paging : true,
                dom: 'Bfrtip',
                buttons: [
                     
        {
            extend: 'print',
            text: '<i class="fa fa-save"></i> PDF'
        },
    ],
             

            });

            table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
        });
    </script>
    <script>
        function yakin(){
            alert('yakin mau hapus.?');
        }
    </script>
</section>

@endsection
