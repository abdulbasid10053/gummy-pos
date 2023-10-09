<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ asset('assets/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ $user -> nama }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- sidebar menu -->
    {{-- <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
            <a href="/dashboard"><i class="fa fa-dashboard "></i> <span>Dashboard</span></a>
        </li>
        <li>
            <a href="/supplier"><i class="fa fa-truck"></i> <span>Suppliers</span></a>
        </li>

        <li class="treeview">
                <a href="#"><i class="fa fa-archive"></i> <span>Produk</span>
                <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
            <ul class="treeview-menu">
                <li class=""><a href="/satuan"><i class="fa fa-circle-o text-blue"></i> Satuan</a></li>
                <li class=""><a href="/kategori"><i class="fa fa-circle-o text-red"></i> Kategori</a></li>
                <li class=""><a href="/barang"><i class="fa fa-circle-o text-yellow"></i> Barang</a></li>
            </ul>
        </li>

        <li class="treeview">
                <a href="#">
                <i class="fa fa-dollar"></i> <span>Transaksi</span>
                <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
            <ul class="treeview-menu">
                <li class=""><a href="/barang_masuk"><i class="fa fa-circle-o text-yellow"></i> Barang masuk </a></li>
                <li class=""><a href="/penjualan"><i class="fa fa-circle-o text-red"></i> Penjualan </a></li>
                <li class=""><a href="/retur"><i class="fa fa-circle-o text-aqua"></i> Retur </a></li>
            </ul>
        </li>

        <li>
            <a href="/customer"><i class="fa fa-users"></i> <span>Costumers</span></a>
        </li>
        <li class="header">SETTINGS</li>
        <li >
            <a href="/user" ><i class="fa fa-user"></i> <span>User</span></a>
        </li>
    </ul> --}}
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
            <a href="/"><i class="fa fa-dashboard "></i> <span>Dashboard</span></a>
        </li>
        <li>
            <a href="/penjualan"><i class="fa fa-dashboard "></i> <span>Penjualan</span></a>
        </li>

        <li>
            <a href="/customer"><i class="fa fa-users"></i> <span>Costumers</span></a>
        </li>
        
    </ul>
</section>