@extends('layouts.master')
@section('container')
<section class="content">
    <div class="content">
      <div class="col-lg-12">
        <div class="box-body">
          <div class="box box-info">
                      <!-- /.box-header --> 
            <div class="box-header with-border">
              <h3 class="box-title">Tambah User</h3>
              <div class="form-group">
                <!-- form start -->
                  <form class="form-horizontal" action="/user/simpan" method="POST">
                    @csrf
                    <div class="box-body">
                      <div class="form-group">
                        <label for="username">Username</label>
                        <div class="">
                          <input type="text" class="form-control" name="username" placeholder="username" required>
                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="password" class="control-label">Password</label>
                        <div class="">
                          <input type="password" class="form-control" name="password" placeholder="password" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="control-label">Email</label>
                        <div class="">
                          <input type="email" class="form-control" name="email" placeholder="Email@gmail.com" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="nama" class="control-label">Nama</label>
                        <div class="">
                          <input type="text" class="form-control" name="nama" placeholder="nama" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label>No Telephone:</label>
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                          </div>
                          <input type="number" class="form-control" name="hp" data-inputmask='"mask": "(0822) 9999-99998"' data-mask placeholder="082299999999" required>
                        </div>
                      </div>
                      <div class="form-group has-feedback">
                        <select name="level" class="form-control" id="">
                          <option value="">Jabatan</option>
                          <option value="1">Admin</option>
                          <option value="2">Kasir</option>
                        </select>
                        <span class="glyphicon glyphicon-home form-control-feedback"></span>
                      </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                      <button type="submit" name="submit" class="btn btn-info pull-right">Tambah</button>
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