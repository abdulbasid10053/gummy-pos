@extends('layouts.master')
@section('container')

<section class="content">
    <div class="content">
        <div class="box box-warning">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3 id="barang">
                                        {{ $barang }}
                                    </h3>
            
                                    <p>Data Barang</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="/laporanbarang" class="small-box-footer">Detail Laporan <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    {{-- <h3>53<sup style="font-size: 20px">%</sup></h3> --}}
                                    <h3>{{ $sales }}</h3>
                                    <p>Barang Terjual</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="laporanjual" class="small-box-footer">Detail Laporan <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>{{ $barang_masuk }}</h3>
            
                                    <p>Barang Masuk</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="laporanbarangmasuk" class="small-box-footer">Detail Laporan <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>{{ $retur }}</h3>
            
                                    <p>Barang Keluar</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="laporanbarangkeluar" class="small-box-footer">Detail Laporan <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
            
                </div>
            
            
            </div>
</div>
<script>
var brg = {{ $barang }}
var sls = {{ $sales }}
var rtr ={{ $retur }}
var bm ={{ $barang_masuk }}
parseInt(brg);
parseInt(sls);
parseInt(rtr);
parseInt(bm);
</script>

</section>
@endsection