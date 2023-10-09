@extends('layouts.master')
@section('titel','Supplier')
@section('container')
<section class="content">
    <div class="content">
        <div class="box">
            <div class="box-header">
                <a href="/supplier"><h3 class="box-title">Data Supplier</h3></a>
                <div class="pull-right">
                    <a href="/supplier/create" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i>Create
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable-sup">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama</th>
                            <th>No Telephone</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($supplier as $s)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $s -> nama }}</td>
                            <td>{{ $s -> no_tlp }}</td>
                            <td>{{ $s -> alamat }}</td>

                            <td class="text-center">
                                <a href="/supplier/{{ $s -> id }}/edit" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"> Edit</i>
                                </a>
                                <form action="/supplier/{{ $s -> id }}" class="inline" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btn-xs" onclick="yakin()">
                                        <i class="fa fa-trash"> Hapus</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- {{ $supplier -> links() }} --}}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var table = $('#dataTable-sup').DataTable({
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
<script>
        function yakin(){
            alert('yakin mau hapus.?');
        }
</script>
</section>
@endsection
