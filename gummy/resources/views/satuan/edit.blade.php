@extends('layouts.master')
@section('title','Edit Satuan')
@section('container')
<section class="content">
    <div class="content">
      <div class="col-lg-12">
        <div class="box-body">
          <div class="box box-info">
                      <!-- /.box-header --> 
            <div class="box-header with-border">
              <h3 class="box-title">Edit Jenis Satuan</h3>
              <div class="form-group">
                <!-- form start -->
                  <form class="form-horizontal" action="/satuan/{{ $satuan -> id }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="box-body">
                      <div class="form-group">
                        <label for="">Nama</label>
                        <div class="">
                          <input type="text" class="form-control" name="nama_satuan" placeholder="nama satuan" value="{{ $satuan -> nama_satuan }}" required>
                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
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