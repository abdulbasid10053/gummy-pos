<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Stuk Belanja Gummy Store</title>
</head>
<body>
  
   <p> "Data Pembelian Barang"</p>
   -----------------------------------------------------------------------
<table id="struk">

    <tr align='center'>
        <td>No</td>
        <td>Kode Barang</td>
        <td>Nama Barang</td>
        <td>Harga</td>
        <td>Qty</td>
        <td>Total</td>
    </tr>
        @foreach ($detail as $d)
        <tr>
            <td>{{ $loop -> iteration }}</td>
            <td>{{ $d -> barcode }}</td>
            <td>{{ $d -> nama_barang }}</td>
            <td>{{ $d -> harga_jual }}</td>
            <td>{{ $d -> jumlah_keluar }}</td>
            <td>{{ (int)$d -> jumlah_keluar * (int)$d -> harga_jual }}</td>
         
        </tr>
        @endforeach
        <tr><td colspan="6" style="border-bottom : 1px solid black;"></td></tr>
        <tr>
            <td colspan="5">Total</td>
            <td>Rp. {{ number_format($jual->total_harga,2,",",".") }}</td>
        </tr>
        <tr>
            <td colspan="5">Dibayar</td>
            <td>Rp. {{ number_format($jual->cash,2,",",".") }}</td>
        </tr>
        <tr><td colspan="6" style="border-bottom : 1px solid black;"></td></tr>
        <tr>
            <td colspan="5">Kembalian</td>
            <td>Rp. {{ number_format((int)$jual->cash - (int)$jual->total_harga,2,",",".") }}</td>
        </tr>
</table>
   <a href="/penjualan">Gummy</a>
</body>
<script>
    var i;
    parseint(i);
</script>
<script>
    $(document).ready(function () {
        var table = $('#struk').DataTable({
            paging : true,
            dom: 'Bfrtip',
            buttons: [
                 
    {
        extend: 'print',
        text: '<i class="fa fa-save"></i> PDF'
    },
],
         

        });

        table.buttons().container().appendTo();
    });
</script>

</html>