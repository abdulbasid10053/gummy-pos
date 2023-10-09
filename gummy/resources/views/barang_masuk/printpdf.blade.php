<div class="content">
    <div class="box">
            <div class="box-body table-responsive">
                    <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
                            <thead>
                                    <tr>
                                            <th>NO</th>
                                            <th>Barcode</th>
                                            <th>Nama Barang</th>
                                            <th>Supplier</th>
                                            <th>Jumlah Masuk</th>
                                            <th>Total Stok</th>
                                            <th>Penerima</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Action</th>
                                    </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang_masuk as $bm)
                                <tr>
                                    <td>{{ $loop -> iteration }}</td>
                                    <td>{{ $bm -> barang ['barcode'] }}</td>
                                    <td>{{ $bm -> barang ['nama_barang'] }}</td>
                                    <td>{{ $bm -> supplier ['nama'] }}</td>
                                    <td>{{ $bm -> jumlah_masuk.' '. $bm -> satuan ['nama_satuan'] }}</td>
                                    <td>{{ $bm -> barang ['stok'].' '. $bm ->satuan ['nama_satuan'] }}</td>
                                    <td>{{ $bm -> user ['nama']}}</td>
                                    <td>{{ $bm -> tanggal_barang_masuk }}</td>
                                                                                
                                    <td class="text-center" width="160px">
                                            <a href="/barang_masuk/{{ $bm -> id }}/edit" class="btn btn-warning btn-xs">
                                            <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="/barang_masuk/{{ $bm -> id }}" class="inline" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-xs">
                                                        <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                    </td>
                               </tr>
                                @endforeach
                            </tbody>
                    </table>
                    {{-- {{ $barang_masuk -> links() }} --}}
            </div>
    </div>
</div>