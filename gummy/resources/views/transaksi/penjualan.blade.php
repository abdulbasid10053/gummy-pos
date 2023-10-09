@extends('layouts.master')
@section('titel','Penjualan')
@section('container')
<section class="content-header">
    <h1>Transaksi
        <small>Penjualan</small>
    </h1>
</section>
<section class="content">
    <form action="/penjualan/simpan" method="POST">
        @csrf
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
                                    <input type="text"name="user_id" id="hidden" value="{{ $user -> id }}" class="form-control">
                                    
                                    <input type="text" id="user" value="{{ $user -> nama }}" class="form-control"
                                        readonly>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="customer">Customer</label>
                            </td>
                            <td>
                                <div>
                                    <select class="form-control" id="customer" name="customer_id">
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
                                    {{-- punyanya modal --}}
                                    {{-- data-toggle="modal"
                                            data-target="#modal-item onclick="cerate()"--}}
                                    <input type="text" id="barcode" class="form-control" autofocus>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal"
                                            data-target="#modal-item">
                                            {{-- <i class="fa fa-search"></i> --}}
                                            <i class="fa fa-paper-plane-o"></i>
                                        </button>
                                    </span>
                                    
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
                        <input type="hidden" name="invoice" value="{{ 'TBM-'.date('Y-m-d').$kde }}">
                        <h4>Invoice <b><span id="invoice">{{ 'TBM-'.date('Y-m-d').$kde }}</span></b></h4>
                        <h1><b><span style="font-size: 40pt"><input type="hidden" readonly id="grand_total2"></span></b></h1>
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
                                 <th>Actions</th> 
                            </tr>
                        </thead>
                        <tbody id="cart_table">
                            
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
                                    <input type="number"  value="" id="sub_total" class="form-control"
                                        readonly>
                                </div>
                            
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="discount">Discount</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="text" name="diskon" id="discount" onkeyup="potongan(this.value)" value="0" min="0"
                                        class="form-control">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top">
                                <label for="grand_total">Grand Total</label>
                            </td>
                            <td>
                                <div class="form-group">
                                    <input type="number" name="total_harga" id="grand_total" class="form-control" readonly>
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
                                    <input type="number" name="cash" id="cash" value="0"  onkeyup="bayar(this.value)" class="form-control" required>
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
                                    <textarea name="note" id="note" cols="30" rows="4" class="form-control"></textarea>
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
                    {{-- <button id="cancel_payment" class="btn btn-flat btn-warning">
                    <a href="/penjualan">
                        <i class="fa fa-refresh"></i> cencel</i> 
                    </a>
                    </button><br><br> --}}
                    <button type='submit'id="proses_payment" class="btn btn-flat btn-lg btn-success">
                        <i class="fa fa-paper-plane-o"></i> Prosess Payment
                    </button>
                </div>
            </div>
        </div>
   
    </div>
</form>

{{-- modal --}}
<div class="modal fade" id="modal-item" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="terjual">INPUT PEMBELIAN</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
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
                                                                <select class="form-control"
                                                                    id="barang_id" onchange="ambilStok(this)">
                                                                    <option value="" selected disabled>Pilih barang
                                                                    </option>
                                                                    @foreach ($barang as $brg)
                                                                    <option value="{{ $brg -> id }}"
                                                                        stok="{{ $brg -> stok }}" nm="{{ $brg -> nama_barang }}" bc="{{ $brg -> barcode }}" hj="{{ $brg -> harga_jual }}">
                                                                        {{ $brg -> nama_barang }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" id="input-id-barang">
                                                        <input type="hidden" id="input-nm-barang">
                                                        <input type="hidden" id="input-bc-barang">
                                                        <input type="hidden" id="input-hj-barang">
                                                        <div class="form-group row">
                                                            <label for="total_stok"
                                                                class="col-sm-2 col-form-label">Stok</label>
                                                            <div class="col-sm-10">
                                                                <input type="number" class="form-control" id="data-stok"
                                                                    placeholder="" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="jumlah_keluar"
                                                                class="col-sm-2 col-form-label">Jumlah Keluar</label>
                                                            <div class="col-sm-10">
                                                                <input type="number" class="form-control"
                                                                    name="jumlah_keluar" onkeyup="hitung(this)"
                                                                    id="jumlah_keluar" required
                                                                    placeholder="Jumlah Keluar">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="total_stok"
                                                                class="col-sm-2 col-form-label">Total Stok</label>
                                                            <div class="col-sm-10">
                                                                <input type="number" class="form-control"
                                                                    name="total_stok" id="total-stok" placeholder=""
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label" for="">kasir</label>
                                                            <div class="col-sm-10">
                                                                <select name="user_id" class="form-control"
                                                                    id="user_id">
                                                                    <option value="{{ $user -> id }}" selected>
                                                                        {{ $user -> nama }}</option>
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
                                                            <label for="tanggal_keluar"
                                                                class="col-sm-2 col-form-label">Tanggal keluar</label>
                                                            <div class="col-sm-3">
                                                                <input type="date" class="form-control"
                                                                    value="{{ date('Y-m-d') }}" name="tanggal_keluar"
                                                                    id="tanggal_keluar" required
                                                                    placeholder="Tanggal Keluar">
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-xs-10">
                                                                <a href="#" class="text-center"></a>
                                                            </div>
                                                            <!-- /.col -->
                                                            <div class="col-xs-2">
                                                                <button type="button" onclick="addToChart()"
                                                                    class="btn btn-primary btn-block btn-flat">simpan</button>
                                                            </div>
                                                            <!-- /.col -->
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
{{-- modal --}}

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    <script type="text/javascript">
        function ambilStok(e) {
            document.querySelector('#jumlah_keluar').value = '';
            document.querySelector('#total-stok').value = '';
            let opt = e.querySelectorAll('option');
            opt.forEach(el => {
                if (el.selected) {
                    let v = el.getAttribute('stok');
                    document.querySelector('#data-stok').value = v;
                    document.querySelector('#input-nm-barang').value = el.getAttribute('nm');
                    document.querySelector('#input-bc-barang').value = el.getAttribute('bc');
                    document.querySelector('#input-hj-barang').value = el.getAttribute('hj');
                    document.querySelector('#input-id-barang').value = el.getAttribute('value');
                }
            });
           
        }
        function hitung(e) {
            let intotal = document.querySelector('#total-stok');
            if(e.value != ''){
            let val = parseInt(e.value);
            let stok = parseInt(document.querySelector('#data-stok').value);
            intotal.value = stok - val;
                if(val >=stok){
                    alert('Jumlah melebihi stok');
                   e.value = stok;
                   intotal.value = 0;
                }
             }else{
                intotal.value = 0;
            }

        }

        function addToChart(){
            let ada = false;
            let id = $('#input-id-barang').val();
            let qty= $('#jumlah_keluar').val();
          
            $('#cart_table').children('tr').each(function(e){
   
                if($(this).attr('id') == id){
                    ada = true;
                    let jml = $(this).find('.jml-dibeli').html();
                    $(this).find('.jml-dibeli').html(parseInt(jml) + parseInt(qty) );
                    
                }
            });

            if(!ada){

            let no = $('#cart_table').children('tr').length + 1;
            let nama= $('#input-nm-barang').val();
            let bc= $('#input-bc-barang').val();
            let hj= $('#input-hj-barang').val();
            let ss = $('#data-stok').val();
            
            $('#cart_table').append(`<tr id='${id}'>
                                <td>${no}
                                    <input type="hidden" name="barang_id[]" value="${id}">
                                    <input type="hidden" name="jumlah_keluar[]" value="${qty}">
                                    <input type="hidden" name="sisa_stok[]" value="${ss-qty}">
                                    </td>
                                <td>${bc}</td>
                                <td>${nama}</td>
                                <td class="total-cash">${hj}</td>
                                <td class="jml-dibeli">${qty}</td>
                                <td> <button id="hapus-btn" onclick="hapusStok('1')">Hapus</button></td>

                            </tr>`);
            }
           
            hitungTotal();
            $('#modal-item').modal('hide');               
        }
        function hitungTotal(){
            let total = 0;
            $('#cart_table').children('tr').each(function(e){
                total += parseInt($(this).find('.total-cash').html()) * parseInt($(this).find('.jml-dibeli').html());
            });
            $('#sub_total').val(total);
            $('#grand_total').val(total);
            $('#grand_total2').val(total);
        }

        function potongan(val) {
            if (val != '') {
                console.log(val);
                document.querySelector('#grand_total').value = parseInt(document.querySelector('#sub_total').value) - parseInt(val);
                document.querySelector('#grand_total2').value = parseInt(document.querySelector('#sub_total').value) - parseInt(val);

            } else {
                document.querySelector('#grand_total').value = $('#sub_total').val();
                document.querySelector('#grand_total2').value = $('#sub_total').val();
            }
        }
        function bayar(val) {
            if (val != '') {
                document.querySelector('#change').value = parseInt(val)- parseInt(document.querySelector('#grand_total').value);
                   

            } else {
                document.querySelector('#change').value = 0;
            }
        }

    </script>
    <script>
    function hapusStok(id) {
        let row = document.getElementById(id);
        let qty = parseInt(row.querySelector('.jml-dibeli').innerHTML);
        let ss = parseInt(row.querySelector('input[name="sisa_stok[]"]').value);
        let stok = ss + qty;
    
        // Mengembalikan stok ke nilai semula
        row.querySelector('input[name="sisa_stok[]"]').value = stok;
    
        // Menghapus baris dari tabel keranjang
        row.remove();
    
        // Menghitung total setelah menghapus stok
        hitungTotal();
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
