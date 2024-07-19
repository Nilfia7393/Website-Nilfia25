<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.header')
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-12 mb-4">
                <h4 class="text-center">Laporan Pemasukan</h4>
            </div>
            <div class="col-md-12 col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal</th>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pemasukan as $no => $p)
                            <tr>
                                <td>{{ $no + 1 }}</td>
                                <td>{{ date('d/m/Y', strtotime($p->tanggal)) }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->jumlah }}</td>
                                <td>{{ $p->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>