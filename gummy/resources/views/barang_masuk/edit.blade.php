@extends('layouts.master')
@section('container')
<section class="content">

  <div class="content">
    <div class="col-lg-12">
      <div class="box-body">
        <h3 class="box-title">Tambah Daftar Barang</h3>
        <div class="box box-info">
                    <!-- /.box-header --> 
          <div class="box-header with-border">
            
            <div class="justify-content-center">
              <!-- form start -->
              <form action="/barang_masuk/{{ $barangmasuk -> id }}" method="post">
                @method('PUT')
                @csrf
                    <div class=" form-group row">
                      <label class="col-sm-2 col-form-label" for="">Nama Supplier</label>
                      <div class="col-sm-10">
                        <select name="supplier_id" class="form-control" id="supplier_id">
                          <option value="{{ $barangmasuk -> id }}" selected disabled>{{ $barangmasuk -> supplier ['nama'] }}</option>
                          @foreach ($supplier as $sup)
                          <option value="{{ $sup -> id }}">{{ $sup -> nama }}</option>                              
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-from-label" for="">Nama Barang</label>
                      <div class="col-sm-10">
                        <select name="barang_id" class="form-control" id="barang_id" onchange="ambilStok(this)">
                          <option value="{{ $barangmasuk -> id }}" selected disabled>{{ $barangmasuk -> barang ['nama_barang'] }}</option>
                          @foreach ($barang as $brg)
                          <option value="{{ $brg -> id }}" stok="{{ $brg -> stok }}"> {{ $brg -> nama_barang }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>                    
                    <div class="form-group row">
                      <label for="total_stok" class="col-sm-2 col-form-label">Stok</label>
                      <div class="col-sm-10">
                        <input type="number" class="form-control" id="data-stok" placeholder="" value="{{ $barangmasuk -> barang ['stok'] }}" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="jumlah_masuk" class="col-sm-2 col-form-label">Jumlah Masuk</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="jumlah_masuk" id="jumlah_masuk" value="{{ $barangmasuk -> jumlah_masuk }}" placeholder="Jumlah Masuk">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label" for="">Satuan Barang</label>
                      <div class="col-sm-10">
                        <select name="satuan_id" class="form-control" id="supplier_id">
                          <option value="{{ $barangmasuk -> id }}" selected disabled>{{ $barangmasuk -> satuan ['nama_satuan'] }}</option>
                          @foreach ($satuan as $sat)
                          <option value="{{ $sat -> id }}">{{ $sat -> nama_satuan }}</option>                              
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label" for="harga">Total Stok</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="total-stok" name="total_stok" readonly placeholder="Total Stok">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label" for="">Penerima</label>
                      <div class="col-sm-10">
                        <select name="user_id" class="form-control" id="user_id">
                          <option value="{{ $barangmasuk -> id }}" selected disabled>{{ $barangmasuk -> user ['nama'] }}</option>
                          @foreach ($u as $us)
                                    <option value="{{ $us -> id }}">{{ $us -> nama }}</option>                              
                                    @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label"> Tanggal Masuk</label>
                      <div class="col-sm-10">
                        <input type="date" class="form-control" name="update_at" value="{{ $barangmasuk -> tanggal_barang_masuk}}">
                      </div>
                    </div>
            
                    <div class="row">
                      <div class="col-xs-10">
                          <a href="#" class="text-center"></a>
                      </div>
                      <!-- /.col -->
                      <div class="col-xs-2">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">simpan</button>
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
    // function ambilStok(e){
    //   let opt = e.querySelectorAll('option');
    //   opt.forEach(el => {
    //     if(el.selected){
    //       let v = el.getAttribute('stok');
    //   document.querySelector('#data-stok').value = v;
    //     }
    //   });
      
    // }
    function ambilStok(e){
      let opt = e.querySelectorAll('option');
      opt.forEach(el => {
        if(el.selected){
          let v = el.getAttribute('stok');
          let s = el.getAttribute('satuan');
      document.querySelector('#data-stok').value = v;
      
      document.querySelector('#satuan_id').querySelectorAll('option').forEach(elop =>{
        elop.selected = false;
        console.log(elop.value);
        if(elop.value == s){
          elop.selected = true;
        }
      });
      
        }
      });
      
      // let cek = document.querySelector('#data-stok').value;
      // if(cek != '' || cek != undefined){
      //   hitung(cek);
      // }
    }
    function hitung(val){
      if(val != ''){
        if (val => document.querySelector('#data-stok').value = v) {
          document.querySelector('#total-stok').value = parseInt(document.querySelector('#data-stok').value) + parseInt(val);

        }else{
          document.querySelector('#total-stok').value = parseInt(document.querySelector('#data-stok').value) - parseInt(val);
        }
      }else{
        document.querySelector('#total-stok').value = 0;
      }
      

    }
  </script>
@endsection