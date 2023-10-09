@extends('layouts.master')
@section('titel','Barang')
@section('container')

<section class="content">
    <div class="content">
        <div class="box">
                <div class="box-header">
                        <h3 class="box-title"><a href="/barang">Data Barang</a></h3>
                        <div class="pull-right">
                                <a href="/barang/create" class="btn btn-primary btn-flat">
                                        <i class="fa fa-user-plus"></i>Create
                                </a>
                        </div>
                        <div class="pull-right">
                                <a href="/barang/print" class="btn btn-primary btn-flat">
                                        <i class="fa fa-barcode"></i>Print Barcode
                                </a>
                        </div>
                </div>
                {{-- <div class="container">
                        <div class="row">
                                <form action="/barang" method="get">
                                        <div class="mb-3">
                                          <input type="text" name="search"  placeholder="Cari barang apa.." autocomplete="off">
                                        </div>
                                </form>
                        </div>
                </div> --}}
                
                <div class="box-body table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable-brg">
                                <thead>
                                        <tr>
                                                <th>NO</th>
                                                <th>Barcode</th>
                                                <th>Nama Barang</th>
                                                <th>Harga</th>
                                                <th>Harga_jual</th>
                                                <th>Kategori</th>
                                                <th>Stok</th>
                                                <th>Satuan</th>
                                                <th>keuntungan satuan</th>
                                                <th>Action</th>
                                        </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $index => $brg)
                                    <tr>
                                        <td  scope="row">{{ $index + $barang->firstItem()}}</td> 
                                        <td>{{ $brg -> barcode }}</td>                                 
                                        <td>{{ $brg -> nama_barang }}</td>
                                        <td>{{ $brg -> harga }}</td>
                                        <td>{{ $brg -> harga_jual }}</td>
                                        <td>{{ $brg -> kategori ['nama_kategori']}}</td>
                                        <td>{{ $brg -> stok }}</td>
                                        <td>{{ $brg -> satuan ['nama_satuan'] }}</td>
                                        <td>{{ $brg -> keuntungan }}</td>
                                        {{-- rencana update tambah 1 join untuk tau supplier sebelumnya --}
                                        {{-- <td>{{ $brg -> supplier ['supplier'] }}</td> --}}
                                                                                    
                                        <td class="text-center" width="160px">
                                                <a href="/barang/{{ $brg -> id }}/edit" class="btn btn-warning btn-xs">
                                                <i class="fa fa-pencil"> Edit</i>
                                                </a>
                                                
                                                <form action="/barang/{{ $brg -> id }}" class="inline" method="POST">
                                                   @csrf
                                                   @method('delete')
                                                   <button class="btn btn-danger btn-xs">
                                                        <i class="fa fa-trash"> Hapus</i>
                                                   </button>
                                                </form>
                                                
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

    //    table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
    });
</script> 
</section>
@endsection