@extends('layouts.master')
@section('titel','Penjualan')
@section('container')
<section class="content-header">
    <h1>Transaksi
        <small>Penjualan</small>
    </h1>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top">
                                <label for="date">Date</label>
                            </td>
                            <td>
                                <div class="from-group">
                                    <input type="date" value="{{ date('Y-m-d') }}" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; width:30%">
                                <label for="user">Kasir</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="user" value="{{ $user -> nama }}" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="customer">Customer</label>
                            </td>
                            <td>
                                <div>
                                    <select class="form-control" id="customer">
                                        {{-- <option value="">Umum</option> --}}
                                        @foreach ($customer as $c)
                                        <option value="{{ $c -> id  }}">{{ $c -> nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top; width:30%">
                                <label for="produk">Produk</label>
                            </td>
                            <td>
                                <div class="from-group input-group">
                                    {{-- <input type="hidden" id="barcode">
                                        <input type="hidden" id="nama_barang">
                                        <input type="hidden" id="stock">  --}}

                                    {{-- data-toggle="modal"
                                            data-target="#modal-item onclick="cerate()"--}}
                                    <input type="text" id="barcode" class="form-control" autofocus>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                                            {{-- <i class="fa fa-search"></i> --}}
                                            <i class="fa fa-paper-plane-o"></i>
                                        </button>
                                    </span>
                                    <div class="modal fade" id="modal-item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="terjual">INPUT PEMBELIAN</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/penjualan/simpan" method="post">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-from-label" for="">Nama
                                                                Barang</label>
                                                            <div class="col-sm-10">
                                                                <select name="barang_id" class="form-control" id="barang_id" onchange="ambilStok(this)">
                                                                    <option value="" selected disabled>Pilih barang
                                                                    </option>
                                                                    @foreach ($barang as $brg)
                                                                    <option value="{{ $brg -> id }}" stok="{{ $brg -> stok }}">
                                                                        {{ $brg -> nama_barang }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="total_stok" class="col-sm-2 col-form-label">Stok</label>
                                                            <div class="col-sm-10">
                                                                <input type="number" class="form-control" id="data-stok" placeholder="" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="jumlah_keluar" class="col-sm-2 col-form-label">Jumlah Keluar</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" name="jumlah_keluar" onkeyup="hitung(this.value)" id="jumlah_keluar" required placeholder="Jumlah Keluar">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="total_stok" class="col-sm-2 col-form-label">Total Stok</label>
                                                            <div class="col-sm-10">
                                                                <input type="number" class="form-control" name="total_stok" id="total-stok" placeholder="" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label" for="">Petugas
                                                                Retur</label>
                                                            <div class="col-sm-10">
                                                                <select name="user_id" class="form-control" id="user_id">
                                                                    <option value="{{ $user -> id }}" selected>
                                                                        {{ $user -> nama }}
                                                                    </option>
                                                                    @foreach ($u as $us)
                                                                    <option value="{{ $us -> id }}">{{ $us -> nama }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="from-group">
                                                            <input type="hidden" name="customer_id" value="{{ $kd }}">
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="tanggal_keluar" class="col-sm-2 col-form-label">Tanggal_keluar</label>
                                                            <div class="col-sm-3">
                                                                <input type="date" class="form-control" value="{{ date('Y-m-d') }}" name="tanggal_keluar" id="tanggal_keluar" required placeholder="Tanggal Keluar">
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
                                                {{-- <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                {{-- <label for="qty">Qty</label> --}}
                            </td>
                            <td>
                                <br>
                                {{-- <div class="form-group">
                                        <input type="number" id="qty" value="1" min="1" class="form-control">
                                    </div> --}}
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                {{-- <div>
                                        <button type="button" id="add_cart" class="btn btn-primary">
                                            <i class="fa fa-cart-plus"></i>Add
                                        </button>
                                    </div> --}}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="box box-widget">
                <div class="box-body">
                    <div align="right">
                        <h4>Invoice <b><span id="invoice">{{ 'TBM-'.date('Y-m-d').$kde }}</span></b></h4>
                        <h1><b><span id="grand_total2" style="font-size: 40pt">0</span></b></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="box box-widget">
                <div class="box-body table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Barcode</th>
                                <th>Product Item</th>
                                <th>Price</th>
                                <th>Qty</th>
                                {{-- <th width="10%">Discount Item</th>
                                    <th width="15%">Total</th> --}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="cart_table">
                            <?php $total = 0; ?>
                            <?php $qty = 0; ?>
                            <?php $jumlah = 0; ?>
                            @foreach ($sales as $s)
                            <tr>
                                <td>{{ $loop -> iteration }}</td>
                                <td>{{ $s -> barang ['barcode'] }}</td>
                                <td>{{ $s -> barang ['nama_barang'] }}</td>
                                <td>{{ $s -> barang ['harga_jual'] }}</td>
                                <td>{{ $s -> jumlah_keluar }}</td>
                                <td class="text-center" width="160px">
                                    <form action="/penjualan/{{$s -> id}}" class="inline" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-xs">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <?php $jumlah = (int)$s->barang['harga_jual'] * (int)$s->jumlah_keluar; ?>
                            {{-- <?php $total = (int)$s->barang['harga_jual'] * (int)$s->jumlah_keluar; ?> --}}

                            @endforeach
                        </tbody>
                    </table>
                    {{ $sales -> links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top">
                                <label for="date">Sub Total</label>
                            </td>
                            <td>
                                <div class="from-group">
                                    <input type="number" value="{{ $jumlah }}" id="sub_total" class="form-control" readonly>
                                </div>
                                <div class="from-group">
                                    <input type="number" value="{{ $qty }}" id="sub_total" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="discount">Discount</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" id="discount" onkeyup="diskon(this.value)" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="grand_total">Grand Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="grand_total" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top; width:30%">
                                <label for="cash">Cash</label>
                            </td>
                            <td>
                                <div class="from-group">
                                    <input type="number" id="cash" value="0" min="0" class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="change">Change</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" id="change" class="form-control" readonly>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <table width="100%">
                        <tr>
                            <td style="vertical-align: top">
                                <label for="note">Note </label>
                            </td>
                            <td>
                                <div>
                                    <textarea name="" id="note" cols="30" rows="4" class="form-control"></textarea>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="box box-widget">
                <div class="box-body">
                    <button id="cancel_payment" class="btn btn-flat btn-warning">
                        <i class="fa fa-refresh"></i> cencel
                    </button><br><br>
                    <button id="proses_payment" class="btn btn-flat btn-lg btn-success">
                        <i class="fa fa-paper-plane-o"></i> Prosess Payment
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        function ambilStok(e) {
            document.querySelector('#data-stok').value = '';
            document.querySelector('#total_stok').value = '';
            let opt = e.querySelectorAll('option');
            opt.forEach(el => {
                if (el.selected) {
                    let v = el.getAttribute('stok');
                    document.querySelector('#data-stok').value = v;
                }
            });
        }

        function hitung(val) {
            if (val != '') {
                document.querySelector('#total-stok').value = parseInt(document.querySelector('#data-stok').value) -
                    parseInt(val);
            } else {
                document.querySelector('#total-stok').value = 0;
            }


        }

        function diskon(val) {
            if (val != '') {
                document.querySelector('#grand_total').value = parseInt(document.querySelector('#sub_total').value) -
                    parseInt(val);

            } else {
                document.querySelector('#grand_total').value = 0;
            }
        }
    </script>
    <script>
        // $(document).ready(function(){

        // });
        function create() {
            $("#modal-item").modal('show');
        }
    </script>

</section>
@endsection