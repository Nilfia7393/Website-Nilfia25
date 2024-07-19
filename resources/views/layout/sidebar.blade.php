<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Main</li>

        <li>
            <a href="{{ route('dashboard') }}" class="waves-effect">
                <i class="ti-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @if (Auth::user()->level == 'Admin' || Auth::user()->level == 'User')
            <li>
                <a href="{{ route('pengguna') }}" class=" waves-effect">
                    <i class="ti-calendar"></i>
                    <span>Data Pengguna</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pemasukan') }}" class=" waves-effect">
                    <i class="ti-calendar"></i>
                    <span>Pemasukan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('pengeluaran') }}" class=" waves-effect">
                    <i class="ti-calendar"></i>
                    <span>Pengeluaran</span>
                </a>
            </li>
        @endif

        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ti-email"></i>
                <span>Laporan</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{ route('laporanPemasukan') }}">Laporan Pemasukan</a></li>
                <li><a href="{{ route('laporanPengeluaran') }}">Laporan Pengeluaran</a></li>
                <li><a href="{{ route('laporanKomulatif') }}">Laporan Komulatif</a></li>
            </ul>
        </li>
    </ul>
</div>
