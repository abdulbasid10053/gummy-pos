@extends('layouts.master')
@section('container')
<div class="content">
    <div class="box">
        <div class="box-body table-responsive">
            <table class="table table-bordered table-strip" id="dataTable-r">
                <thead>
                    <tr>
                        <td>no</td>
                        <td>invoice</td>
                        <td>kode barang</td>
                        <td>nama barang</td>
                        <td>harga barang</td>
                        <td>Jumlah Keluar</td>
                        <td>keuntungan</td>
                        <td>total harga</td>
                        <td>note</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detail as $item)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ $item -> penjualan ['invoice'] }}</td>  
                        <td>{{ $item -> barang ['barcode'] }}</td>
                        <td>{{ $item -> barang ['nama_barang'] }}</td>
                        <td>{{ $item -> barang ['harga_jual'] }}</td>
                        <td>{{ $item -> jumlah_keluar }}</td>
                        <td>{{ ($item -> barang ['keuntungan'])* ( $item -> jumlah_keluar)  }}</td>
                        <td>{{ $item -> penjualan ['total_harga'] }}</td>
                        <td>{{ $item -> penjualan ['note'] }}</td>                                                
                            
                     </tr>
                   
                    @endforeach 
                </tbody>
            </table>
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
@endsection
