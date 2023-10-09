@extends('layouts.master')
@section('titel','Edit Kategori')
@section('container')
<section class="content">
    <div class="content">
      <div class="col-lg-12">
        <div class="box-body">
          <div class="box box-info">
                      <!-- /.box-header --> 
            <div class="box-header with-border">
              <h3 class="box-title">Edit Nama Kategori</h3>
              <div class="form-group">
                <!-- form start -->
                  <form class="form-horizontal" action="/kategori/{{ $kategori -> id }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="box-body">
                      <div class="form-group">
                        <label for="">Nama Kategori</label>
                        <div class="">
                          <input type="text" class="form-control" name="nama_kategori" placeholder="nama kategori" value="{{ $kategori -> nama_kategori }}" required>
                          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
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