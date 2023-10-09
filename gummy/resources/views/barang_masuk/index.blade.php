@extends('layouts.master')
@section('titel','Barang_masuk')
@section('container')

<section class="content">
    <div class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title ">Riwayat Data Barang Masuk</h3>
                <div class="btn-group " role="group">
                    {{-- <a href="{{ route('barangmasuk.pdf') }}"><button type="button" class="btn btn-secondary"><i
                                class="fa fa-save"></i> PDF</button></a> --}}
                    {{-- <a href="#kirikstsnys"><button type="button" class="btn btn-secondary"><i class="fa fa-save"></i>
                            excel</button></a>
                    <button type="button" class="btn btn-secondary" onclick="window.print()"><i class="fa fa-save"></i>
                        PDF</button> --}}
                </div>
                <div class="pull-right">
                    <a href="/barang_masuk/create" class="btn btn-sm btn-primary btn-flat btn-icon-split">
                        <i class="fa fa-user-plus"></i> Input
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable-a">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Barcode</th>
                            <th>Nama Barang</th>
                            <th>Supplier</th>
                            <th>Jumlah Masuk</th>
                            {{-- <th>Total Stok</th> --}}
                            <th>Penerima</th>
                            <th>Tanggal Masuk</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang_masuk as $bm)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $bm -> barang ['barcode'] }}</td>
                            <td>{{ $bm -> barang ['nama_barang'] }}</td>
                            <td>{{ $bm -> supplier ['nama'] }}</td>
                            <td>{{ $bm -> jumlah_masuk.' '. $bm -> satuan ['nama_satuan'] }}</td>
                            {{-- <td>{{ $bm -> barang ['stok'].' '. $bm ->satuan ['nama_satuan'] }}</td> --}}
                            <td>{{ $bm -> user ['nama']}}</td>
                            <td>{{ $bm -> tanggal_barang_masuk }}</td>

                            <td class="text-center" width="160px">
                                <a href="/barang_masuk/{{ $bm -> id }}/edit" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"> Edit </i>
                                </a>
                                <form action="/barang_masuk/{{ $bm -> id }}" class="inline" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-xs">
                                        <i class="fa fa-trash"> Hapus </i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $barang_masuk -> links() }} --}}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var table = $('#dataTable-a').DataTable({
                paging : true,
                dom: 'Bfrtip',
                buttons: [
                     
        {
            extend: 'print',
            text: '<i class="fa fa-save"></i> PDF'
        },
        'excel',
        'pdf'
    ],
             

            });

        //     table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
        });
    </script>
</section>

@endsection
