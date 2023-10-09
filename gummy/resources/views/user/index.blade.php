@extends('layouts.master')
@section('titel','User')
@section('container')
<section class="content">
    <div class="content">
            <div class="box">
                    <div class="box-header">
                            <h3 class="box-title">Data Akun</h3>
                            <div class="pull-right">
                                    <a href="/user/create" class="btn btn-primary btn-flat">
                                            <i class="fa fa-user-plus"></i>Create
                                    </a>
                            </div>
                    </div>
                    <div class="box-body table-responsive">
                            <table class="table table-bordered table-striped w-100 dt-responsive nowrap"" id="dataTable-k">
                                    <thead>
                                            <tr>
                                                    <th>NO</th>
                                                    <th>Username</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Hp</th>
                                                    {{-- <th>Jabatan</th> --}}
                                                    <th>Actions</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($u as $a)
                                        <tr>
                                            <td>{{ $loop -> iteration }}</td>
                                            <td>{{ $a -> username }}</td>
                                            <td>{{ $a -> nama }}</td>
                                            <td>{{ $a -> email }}</td>
                                            <td>{{ $a -> hp }}</td>
                                            {{-- <td>{{  
                                            if ($a -> level == 1) {
                                                'admin'
                                            }elseif (a -> level == 2) {
                                                'kasir'
                                            } 
                                            }}
                                            </td> --}}
                                                                                        
                                            <td class="text-center" width="160px">
                                                    <a href="/user/{{ $a -> id }}/edit" class="btn btn-warning btn-xs">
                                                    <i class="fa fa-pencil"> Edit</i>
                                                    </a>
                                                    <a href="/user/{{ $a -> id }}/editPassword" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-key">Edit Password</i>
                                                    </a>
                                                    <form action="/user/{{ $a -> id }}" class="inline" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-danger btn-xs">
                                                                <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                    {{-- <a href="/user/status/{{ $a -> id }}" class="btn btn-success btn-xs">
                                                        <i class="fa fa-power-off"> </i>
                                                    </a> --}}
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
</section>
@endsection