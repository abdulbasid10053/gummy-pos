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
                            <form class="form-horizontal" action="/updatePassword{{ $u -> id }}" method="POST">
                                @method('PUT')
                                @csrf
                                @if (session('status'))
                                    <div class="alert alert-success">{{ session('status') }}</div>

                                @elseif(session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                                    
                                @endif
                                <div class=" form-group row">
                                    <div class="row form-row-group has-feedback">
                                        <label class="col-sm-2 col-from-label" for="">Password Admin</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="oldPassword" name="old_password" placeholder="Password"
                                            value="">
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <div class="row form-row-group has-feedback">
                                        <label class="col-sm-2 col-from-label" for=""> New Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="newPassword" name="new_password" placeholder="New Password"
                                            value="">
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class=" form-group row">
                                    <div class="row form-row-group has-feedback">
                                        <label class="col-sm-2 col-from-label" for=""> Confirm Password</label>
                                        <div class="col-sm-8">
                                            <input type="password" class="form-control" id="repeatPassword" name="repeat_password" placeholder="Confirm Password"
                                            value="">
                                            @error('Cahange Password')
                                                
                                            @enderror
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
