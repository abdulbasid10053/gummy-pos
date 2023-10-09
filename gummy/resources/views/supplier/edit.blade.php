@extends('layouts.master')
@section('container')
<section class="content">
  <div class="content">
    <div class="col-lg-12">
      <div class="box-body">
        <div class="box box-info">
                    <!-- /.box-header --> 
          <div class="box-header with-border">
            <h3 class="box-title">Form Edit Supplier</h3>
            <div class="form-group">
              <!-- form start -->
                <form class="form-horizontal" action="/supplier/{{ $supplier -> id }}" method="POST">
                  @method('put')
                  @csrf
                  <div class="box-body">
                    <div class="form-group">
                      <label for="">Nama</label>
                      <div class="">
                        <input type="text" class="form-control" name="nama" placeholder="nama" value="{{ $supplier -> nama }}"required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>No Telephone:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-phone"></i>
                        </div>
                        <input type="number" class="form-control" name="no_tlp" data-inputmask='"mask": "(0822) 9999-99998"' data-mask placeholder="082299999999" value="{{ $supplier -> no_tlp }}"required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="addres" class="control-label">Alamat</label>
                      <div class="">
                        <input type="text" class="form-control" name="alamat" placeholder="alamat" value="{{ $supplier -> alamat }}"required>
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