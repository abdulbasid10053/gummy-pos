@extends('layouts.master')
@section('titel','Satuan')
@section('container')
<section class="content">
    <div class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Data Satuan</h3>
                <div class="pull-right">
                    <a href="/satuan/create" class="btn btn-primary btn-flat">
                        <i class="fa fa-user-plus"></i>Create
                    </a>
                </div>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped " id="dataTable-s">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>Nama Satuan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($satuan as $sat)
                        <tr>
                            <td>{{ $loop -> iteration }}</td>
                            <td>{{ $sat -> nama_satuan }}</td>
                            <td class="text-center" width="160px">
                                <a href="/satuan/{{ $sat -> id }}/edit" class="btn btn-warning btn-xs">
                                    <i class="fa fa-pencil">Edit </i>
                                </a>
                                <form action="/satuan/{{ $sat -> id }}" class="inline" method="POST">
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
                {{ $satuan -> links() }}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            var table = $('#dataTable-s').DataTable({
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
