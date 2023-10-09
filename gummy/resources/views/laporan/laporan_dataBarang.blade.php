@extends('layouts.master')
@section('container')
<div class="content">
    <div class="box">
            <div class="box-header">
                    <h3 class="box-title"><a href="/barang">Data Barang</a></h3>
                    <div class="pull-right">
                            <a href="/barang/create" class="btn btn-primary btn-flat">
                                    <i class="fa fa-user-plus"></i>Create
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
                                            <th>tanggal</th>
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
                                    <td>{{ $brg -> created_at }}</td>
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
        ],
                 
        
                });
        
            //    table.buttons().container().appendTo('#dataTable_wrapper .col-md-5:eq(0)');
            });
        </script> 
@endsection