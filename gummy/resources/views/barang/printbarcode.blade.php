@extends('layouts.master')
@section('titel','Barang')
@section('container')
<section class="content">
    <div class="content">
        <div class="box">
                <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable-brg">
                                
                                <tbody>
                                    @foreach ($barang as $index => $brg)
                                    <tr>
                                        <td>
                                            {{ $brg -> nama_barang }}
                                            {!! DNS2D::getBarcodeHTML("$brg -> barcode",'QRCODE',1,1) !!}
                                            {{ $brg->barcode }}
                                        </td>
                                   </tr>
                                    @endforeach
                                </tbody>
                        </table>
                        {{-- {{ $barang -> links() }} --}}
                </div>   
        </div>
</div>
<script>
$(document).ready(function () {
        var table = $('#dataTable-brg').DataTable({
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
    });
</script> 
</section>
@endsection