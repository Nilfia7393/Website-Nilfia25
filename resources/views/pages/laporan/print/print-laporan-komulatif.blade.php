<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.header')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-12 mb-4">
                <h4 class="text-center">Laporan Komulatif</h4>
            </div>
            <div class="col-md-12 col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2" style="vertical-align: middle;">No.</th>
                            <th rowspan="2" style="vertical-align: middle;">Tanggal</th>
                            <th rowspan="2" style="vertical-align: middle;">Nama</th>
                            <th colspan="2">Jumlah</th>
                            <th rowspan="2" style="vertical-align: middle;">Keterangan</th>
                        </tr>
                        <tr>
                            <th>Pemasukan</th>
                            <th>Pengeluaran</th>
                        </tr>
                    </thead>
                    <tbody id="dataPemasukan">
                        @php
                            $pemasukan = 0;
                            $pengeluaran = 0;
                        @endphp
                        @foreach ($pemasukanPengeluaran as $no => $p)
                            @php
                                $pemasukan += $p->jenis == 'Pemasukan' ? $p->jumlah : 0;
                                $pengeluaran += $p->jenis == 'Pengeluaran' ? $p->jumlah : 0;
                            @endphp
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ $p->tanggal }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->jenis == 'Pemasukan' ? number_format($p->jumlah, 0, ',', '.') : 0 }}</td>
                                <td>{{ $p->jenis == 'Pengeluaran' ? number_format($p->jumlah, 0, ',', '.') : 0 }}</td>
                                <td>{{ $p->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total</th>
                            <th><span id="pemasukan">{{ number_format($pemasukan, 0, ',', '.') }}</span></th>
                            <th><span id="pengeluaran">{{ number_format($pengeluaran, 0, ',', '.') }}</span></th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>