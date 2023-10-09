@extends('layouts.master')
@section('container')
<section class="content">
    <div class="container">
        <div class="box-body">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <div class="box-body">
                        <div class="box-header">
                            <h3 class="box-title">Form Edit User</h3>
                        </div>
                        <div class="form-group">
                            <form class="form-horizontal" action="/user/{{ $u -> id }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class=" form-group row">
                                    <div class="row form-row-group has-feedback">
                                        <label class="col-sm-2 col-from-label" for=""> Username</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="username" placeholder="username"
                                            value="{{ $u -> username }}">
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <div class="row form-row-group has-feedback">
                                        <label class="col-sm-2 col-from-label" for=""> Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" name="password" placeholder="Password"
                                            value="{{ $u -> password }}" readonly>
                                        </div>
                                        {{-- <div class="col-sm-2">
                                            <div class="from-group input-group">
                                               <a href="/user/{id}/editPassword" class="btn btn-sm btn-warning btn-flat btn-icon-split ">
                                                <i class="fa fa-key"></i> Ganti Password
                                            </a>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <!-- Button trigger modal -->
                                </div>
                                <div class=" form-group row">
                                    <div class="row form-row-group has-feedback">
                                        <label class="col-sm-2 col-from-label" for=""> Nama</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="nama" placeholder="nama"
                                            value="{{ $u -> nama }}">
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <div class="row form-row-group has-feedback">
                                        <label class="col-sm-2 col-from-label" for=""> email</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" name="email" placeholder="email@example.com"
                                            value="{{ $u -> email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <div class="row form-row-group has-feedback">
                                        <label class="col-sm-2 col-from-label" for=""> No Tlp</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control" name="hp" placeholder="hp"
                                            value="{{ $u -> hp }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="from-group row">
                                    <div class="row form-row-group has-feedback">
                                        <label class="col-sm-2 col-from-label" for=""> Jabatan</label>
                                        <div class="col-sm-8">
                                            <select class="from-control" name="level" id="" required>
                                                <option value="">Jabatan</option>
                                                <option value="{{ $u-> level }}" selected>
                                                @if ( $u->level == 1)
                                                    Admin
                                                @else 
                                                    Kasir  
                                                @endif
                                                </option>
                                                @if ($u->level == 1)
                                                <option value="1">Admin</option>
                                                @else
                                                <option value="2">Kasir</option> 
                                                @endif
                                                
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">
                                    <button type="submit" name="submit" class="btn btn-info pull-right">Ganti</button>
                                </div>
                                <!-- /.box-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection
