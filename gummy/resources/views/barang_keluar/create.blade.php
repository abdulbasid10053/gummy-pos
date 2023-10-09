@extends('layouts.master')
@section('container')
<section>
    <div class="content">
        <div class="col-lg-7">
            <div class="box-body">
                <h3 class="box-title">Tambah Daftar Barang</h3>
                <div class="box box-info">
                    <!-- /.box-header -->
                    <div class="box-header with-border">

                        <div class="justify-content-center">
                            <!-- form start -->
                            <form action="/retur/simpan" method="post">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-2 col-from-label" for="">Nama Barang</label>
                                    <div class="col-sm-10">
                                        <select name="barang_id" class="form-control" id="barang_id"
                                            onchange="ambilStok(this)" required>
                                            <option value="" selected disabled>Pilih barang</option>
                                            @foreach ($barang as $brg)
                                            <option value="{{ $brg -> id }}" stok="{{ $brg -> stok }}">
                                                {{ $brg -> nama_barang }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="total_stok" class="col-sm-2 col-form-label">Stok</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="data-stok" placeholder=""
                                            readonly>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="jumlah_keluar" class="col-sm-2 col-form-label">Jumlah Keluar</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="jumlah_keluar"
                                            onkeyup="hitung(this)" id="jumlah_keluar" required
                                            placeholder="Jumlah Keluar">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="total_stok" class="col-sm-2 col-form-label">Total Stok</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="total_stok" id="total-stok"
                                            placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label" for="">Petugas Retur</label>
                                    <div class="col-sm-10">
                                        <select name="user_id" class="form-control" id="user_id">
                                            <option value="{{ $user -> id }}" selected>{{ $user -> nama }}</option>
                                            {{-- @foreach ($u as $us)
                                            <option value="{{ $us -> id }}">{{ $us -> nama }}</option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal_keluar" class="col-sm-2 col-form-label">Tanggal_keluar</label>
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" value="{{ date('Y-m-d') }}"
                                            name="tanggal_keluar" id="tanggal_keluar" required
                                            placeholder="Tanggal Keluar">
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
    function ambilStok(e) {
        let opt = e.querySelectorAll('option');
        opt.forEach(el => {
            if (el.selected) {
                let v = el.getAttribute('stok');
                document.querySelector('#data-stok').value = v;
            }
        });
    }

    function hitung(e) {
        if (e.value != '') {
            document.querySelector('#total-stok').value = parseInt(document.querySelector('#data-stok').value) -
            parseInt(e.value);
            if(parseInt(e.value) <= parseInt(document.querySelector('#data-stok').value) ){
            }else{
                alert('melebihi stok');
                e.value = parseInt(document.querySelector('#data-stok').value);
                document.querySelector('#total-stok').value = 0;
            }
            
        } else {
            document.querySelector('#total-stok').value = 0;
        }


    }

</script>

@endsection
