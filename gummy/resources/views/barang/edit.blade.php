@extends('layouts.master')
@section('container')
<section class="content">

  <div class="content">
    <div class="col-lg-12">
      <div class="box-body">
        <div class="box box-info">
                    <!-- /.box-header --> 
          <div class="box-header with-border">
            <h3 class="box-title">Edit Daftar Barang</h3>
            <div class="form-group">
              <!-- form start -->
              <form action="/barang/{{ $barang -> id }}" method="post">
                @method('PUT')
                @csrf
                   <div class="form-group has-feedback">
                      <input type="text" class="form-control" name="barcode" placeholder="barcode" value="{{ $barang -> barcode }}" readonly required>
                   </div>
                   <div class="form-group has-feedback">
                      <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" value="{{ $barang -> nama_barang }}" required>
                   </div>
                   <div class="form-group has-feedback">
                    <input type="number" class="form-control" name="harga" placeholder="harga" value="{{ $barang -> harga }}" required>
                   </div>
                   <div class="form-group has-feedback">
                    <input type="number" class="form-control" name="harga_jual" placeholder="harga" value="{{ $barang -> harga_jual }}" required>
                   </div>
                    <div class="form-group">
                      <select name="kategori_id" class="form-control" id="kategori_id">
                        <option value="{{ $barang -> kategori_id }}">{{ $barang -> kategori ['nama_kategori'] }}</option>
                        @foreach ($kategori as $kat)
                          <option value="{{ $kat -> id  }}">{{ $kat -> nama_kategori}}</option>                      
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <select name="satuan_id" class="form-control" id="satuan_id">
                        <option value="{{ $barang -> satuan_id }}">{{ $barang -> satuan ['nama_satuan'] }}</option>
                        @foreach ($satuan as $data)
                        <option value="{{ $data -> id  }}">{{ $data -> nama_satuan }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="row">
                      <div class="col-xs-10">
                          <a href="#" class="text-center"></a>
                      </div>
                      <!-- /.col -->
                      <div class="col-xs-2">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                      </div>
                      <!-- /.col -->
                    </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
@endsection