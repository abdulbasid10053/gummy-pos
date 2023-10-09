@extends('layouts.master')
@section('titel','Kategori')
@section('container')
<section class="content">
    <div class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Kategori</h3>
                <div class="pull-right">
                    <a href="/kategori/create" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i>Create
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable-k">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori as $k)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>

                            <td>{{ $k -> nama_kategori }}</td>
                            <td class="text-center" width="160px">
                                <a href="/kategori/{{ $k -> id }}/edit" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil"> Edit</i>
                                </a>
                                <form action="/kategori/{{ $k -> id }}" class="inline" method="POST">
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
                
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var table = $('#dataTable-k').DataTable({
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
<script>
        function yakin(){
            alert('yakin mau hapus.?');
        }
</script>
</section>
@endsection
