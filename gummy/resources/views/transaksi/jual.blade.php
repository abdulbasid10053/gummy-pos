<form action="/penjualan/simpan" method="post">
    @csrf
    <div class="form-group row">
        <label class="col-sm-2 col-from-label" for="">Nama
            Barang</label>
        <div class="col-sm-10">
            <select name="barang_id" class="form-control"
                id="barang_id" onchange="ambilStok(this)">
                <option value="" selected disabled>Pilih barang
                </option>
                @foreach ($barang as $brg)
                <option value="{{ $brg -> id }}"
                    stok="{{ $brg -> stok }}">
                    {{ $brg -> nama_barang }}</option>
                @endforeach
            </select>
        </div>
    </div>
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
            <input type="text" class="form-control"
                name="jumlah_keluar" onkeyup="hitung(this.value)"
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
        <label class="col-sm-2 col-form-label" for="">Petugas
            Retur</label>
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
            class="col-sm-2 col-form-label">Tanggal_keluar</label>
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
            <button type="submit"
                class="btn btn-primary btn-block btn-flat">simpan</button>
        </div>
        <!-- /.col -->
    </div>
</form>
{{-- simpan 
    
    <section class="sheet">
        {{-- <?php
            echo '<table cellpadding="0" cellspacing="0">
                <tr>
                        <td> nota </td>
                        // <td>'.$profile->nota_name.'</td>
                    </tr>
                    <tr>
                        <td> nota </td>
                        // <td>'.$profile->nota_address.'</td>
                    </tr>
                    <tr>
                        <td> nota </td>
                        // <td>Telp: '.$profile->nota_phone.'</td>
                    </tr>
                </table>'; --}}
            // echo(str_repeat("=", 40)."<br/>");
            // $invoice = $d->invoice. str_repeat("&nbsp;", (40 - (strlen($d->invoice))));
            // $kasir = user('name'). str_repeat("&nbsp;", (40 - (strlen(user('name')))));
            // $tgl = date('d-m-Y H:i:s', strtotime($d->created_at)). str_repeat("&nbsp;", (40 - (strlen(date('d-m-Y H:i:s', strtotime($d->created_at))))));
            // $customer = '['. $customer->nia.'] '.$customer->name;
            // $customer = $customer. str_repeat("&nbsp;", (48 - (strlen($customer))));

            // echo '<table cellpadding="0" cellspacing="0" style="width:100%">
            //         <tr>
            //             <td align="left" class="txt-left">Nota&nbsp;</td>
            //             <td align="left" class="txt-left">:</td>
            //             <td> invoic </td>
            //             // <td align="left" class="txt-left">&nbsp;'. $invoice. '.</td>
            //         </tr>
            //         <tr>
            //             <td align="left" class="txt-left">Kasir</td>
            //             <td align="left" class="txt-left">:</td>
            //             <td> kasir </td>
            //             // <td align="left" class="txt-left">&nbsp;'. $kasir.'</td>
            //         </tr>
            //         <tr>
            //             <td align="left" class="txt-left">Tgl.&nbsp;</td>
            //             <td align="left" class="txt-left">:</td>
            //             <td> tgl </td>
            //             // <td align="left" class="txt-left">&nbsp;'. $tgl.'</td>
            //         </tr>
            //         <tr>
            //             <td> customer </td>
            //             //<td align="left" colspan="3" class="txt-left">'.$customer.'</td>
            //         </tr>
            //     </table>';
            // echo '<br/>';
            // $tItem = 'Item'. str_repeat("&nbsp;", (13 - strlen('Item')));
            // $tQty  = 'Qty'. str_repeat("&nbsp;", (6 - strlen('Qty')));
            // $tHarga= str_repeat("&nbsp;", (9 - strlen('Harga'))).'Harga';
            // $tTotal= str_repeat("&nbsp;", (10 - strlen('Total'))).'Total';
            // $caption = $tItem. $tQty. $tHarga. $tTotal;

            // echo    '<table cellpadding="0" cellspacing="0" style="width:100%">
            //             <tr>
            //                 <td align="left" class="txt-left">'. $caption . '</td>
            //             </tr>
            //             <tr>
            //                 <td align="left" class="txt-left">'. str_repeat("=", 38) . '</td>
            //             </tr>';
            // if(!empty( $d->detail ))
            // {
            //     foreach($d->detail as $k=>$v)
            //     {
            //         $item = $v->name. str_repeat("&nbsp;", (38 - (strlen($v->name))));
            //         echo '<tr>';
            //             echo'<td align="left" class="txt-left">'.$item.'</td>';
            //         echo '</tr>';

            //         echo '<tr>';
            //         $qty        = Rupiah($v->qty,0);
            //         $qty        = $qty. str_repeat("&nbsp;", ( 13 - strlen($qty)) );
                    
            //         $disk        = Rupiah($v->disc,2).'%';
            //         $disk        = str_repeat("&nbsp;", ( 6 - strlen($disk) ) ). $disk;
    
            //         $price      = Rupiah($v->price);
            //         $price      = str_repeat("&nbsp;", ( 9 - strlen($price)) ). $price;

            //         $total      = Rupiah($v->total,2);
            //         $lentotal   = strlen($total);
            //         $total      = str_repeat("&nbsp;", ( 10 - $lentotal) ). $total;
            //             echo'<td class="txt-left" align="left">'.$qty. $disk. $price. $total .'</td>';
                    
            //         echo '</tr>';
            //     }

            //     echo '<tr><td>'. str_repeat('-', 38).'</td></tr>';

            //     //Sub Total
            //     $titleST = 'Sub&nbspTotal';
            //     $titleST = $titleST. str_repeat("&nbsp;", ( 19 - strlen($titleST)) );
            //     $ST      = Rupiah($d->sub_total, 2);
            //     $ST      = str_repeat("&nbsp;", ( 23 - strlen($ST)) ). $ST;
            //     echo '<tr><td>'. $titleST. $ST.'</td></tr>';
            //     //Diskon
            //     $titleDs = 'Diskon';
            //     $titleDs = $titleDs. str_repeat("&nbsp;", ( 15 - strlen($titleDs)) );
            //     $Ds      = Rupiah($d->disc, 2);
            //     $Ds      = str_repeat("&nbsp;", ( 23 - strlen($Ds)) ). $Ds;
            //     echo '<tr><td>'. $titleDs. $Ds.'</td></tr>';
            //     //PPN
            //     $titlePPn = 'PPN';
            //     $titlePPn = $titlePPn. str_repeat("&nbsp;", ( 15 - strlen($titlePPn)) );
            //     $PPn      = Rupiah($d->ppn, 2);
            //     $PPn      = str_repeat("&nbsp;", ( 23 - strlen($PPn)) ). $PPn;
            //     echo '<tr><td>'. $titlePPn. $PPn.'</td></tr>';

            //     if( $d->payment_type == 'Angsuran' )
            //     {
            //         $tX = 'Angsuran (x)';
            //         $tX = $tX. str_repeat("&nbsp;", ( 15 - strlen($tX)) );
            //         $x  = $d->angsuran;
            //         $x  = str_repeat("&nbsp;", ( 23 - strlen($x)) ). $x;
            //         echo '<tr><td>'. $tX. $x.'</td></tr>';

            //         $tAng = 'Besar Angsuran';
            //         $tAng = $tAng. str_repeat("&nbsp;", ( 15 - strlen($tAng)) );
            //         $totalAng = Rupiah($d->total_angsuran,2);
            //         $totalAng  = str_repeat("&nbsp;", ( 23 - strlen($totalAng)) ). $totalAng;
            //         echo '<tr><td>'. $tAng. $totalAng.'</td></tr>';
            //     }

            //     //Grand Total
            //     $titleGT = 'Grand&nbspTotal';
            //     $titleGT = $titleGT. str_repeat("&nbsp;", ( 19 - strlen($titleGT)) );
            //     $GT      = Rupiah($d->grand_total, 2);
            //     $GT      = str_repeat("&nbsp;", ( 23 - strlen($GT)) ). $GT;
            //     echo '<tr><td>'. $titleGT. $GT.'</td></tr>';
                
            //     //Bayar
            //     $titlePy = 'BAYAR';
            //     $titlePy = $titlePy. str_repeat("&nbsp;", ( 15 - strlen($titlePy)) );
            //     $Py      = Rupiah($d->pay, 2);
            //     $Py      = str_repeat("&nbsp;", ( 23 - strlen($Py)) ). $Py;
            //     echo '<tr><td>'. $titlePy. $Py.'</td></tr>';

            //     $kembali= $d->payment_type == 'Angsuran' ? 0 : $d->pay - $d->grand_total;
            //     //Kembali
            //     $titleK = 'KEMBALI';
            //     $titleK = $titleK. str_repeat("&nbsp;", ( 15 - strlen($titleK)) );
            //     $Kb     = Rupiah(($kembali), 2);
            //     $Kb      = str_repeat("&nbsp;", ( 23 - strlen($Kb)) ). $Kb;
            //     echo '<tr><td>'. $titleK. $Kb.'</td></tr>';
            //     echo '<tr><td>&nbsp;</td></tr>';

            // }
        //     echo '</table>';

        //     $footer = 'Terima kasih atas kunjungan anda';
        //     $starSpace = ( 32 - strlen($footer) ) / 2;
        //     $starFooter = str_repeat('*', $starSpace+1);
        //     echo($starFooter. '&nbsp;'.$footer . '&nbsp;'. $starFooter."<br/><br/><br/><br/>");
        //     echo '<p>&nbsp;</p>';  
            
        // ?>
        </section>
    
    --}}