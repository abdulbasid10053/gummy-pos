@extends('layouts.master')
@section('container')

<section class="content">
    <div class="content">
      <div class="col-lg-12">
        <div class="box-body">
          <div class="box box-info">
                      <!-- /.box-header --> 
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Daftar Barang</h3>
              <div class="form-group">
                <!-- form start -->
                <form action="/barang/simpan" method="post">
                  @csrf
                     <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="barcode" value="{{ 'SBR-'.$kd }}" placeholder="barcode" readonly required>
                        <span class="form-control-feedback"></span>
                      </div>
                     <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang" autocomplete="off" required>
                        <span class="form-control-feedback"></span>
                      </div>
                     <div class="form-group has-feedback">
                        <input type="number" class="form-control" name="harga" placeholder="harga" id="harga" required>
                        <span class=" form-control-feedback"></span>
                      </div>
                     <div class="form-group has-feedback">
                        <input type="number" class="form-control" name="harga_jual" placeholder="Harga Jual" id="jual" required>
                        <span class=" form-control-feedback"></span>
                      </div>
                     <div class="form-group has-feedback">
                        <input type="text" class="form-control" name="keuntungan" placeholder="keuntungan" id="keuntungan" >
                        <span class=" form-control-feedback"></span>
                      </div>
                      <div class="form-group">
                        <select name="kategori_id" class="form-control" id="kategori_id" required>
                          <option value="" selected disabled>Pilih kategori Barang</option>
                          @foreach ($kategori as $kat)
                          <option value="{{ $kat -> id  }}">{{ $kat -> nama_kategori}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <select name="satuan_id" class="form-control" id="satuan_id" required>
                          <option value="" selected disabled>Pilih Jenis Satuan</option>
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
 
  <script type="text/javascript">
  $(document).ready(function(){
    $("#harga, #jual").keyup(function(){
      var harga = $("#harga").val();
      var jual = $("#jual").val();
      var total = parseInt(jual) - parseInt(harga);
      $("#keuntungan").val(total);
    })
  })
  </script>
@endsection