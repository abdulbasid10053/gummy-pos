@extends('layouts.master')
@section('titel','Costumer')
@section('container')
<section class="content">
    <div class="content">
            <div class="box">
                    <div class="box-header">
                            <h3 class="box-title">Data Customer</h3>
                            <div class="pull-right">
                                    <a href="/customer/create" class="btn btn-primary btn-flat">
                                            <i class="fa fa-user-plus"></i>Create
                                    </a>
                            </div>
                    </div>
                    <div class="box-body table-responsive">
                            <table class="table table-bordered table-striped" id="dataTable-r">
                                    <thead>
                                            <tr>
                                                    <th>NO</th>
                                                    <th>Nama</th>
                                                    <th>Hp</th>
                                                    <th>Poin</th>
                                                    <th>Alamat</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($customer as $c)
                                        <tr>
                                            <td>{{ $loop -> iteration }}</td>
                                            <td>{{ $c -> nama }}</td>
                                            <td>{{ $c -> no_tlp }}</td>
                                            <td>{{ $c -> poin }}</td>
                                            <td>{{ $c -> alamat }}</td>
                                                                                        
                                            <td class="text-center" width="160px">
                                                    <a href="/customer/{{ $c -> id }}/edit" class="btn btn-warning btn-xs">
                                                    <i class="fa fa-pencil"> Edit </i>
                                                    </a>
                                                    <form action="/customer/{{ $c -> id }}" class="inline" method="POST">
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
                            {{ $customer -> links() }}
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