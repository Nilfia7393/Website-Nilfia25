@extends('layout.app')
@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Laporan Komulatif</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Komulatif</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('laporanKomulatif.print') }}" method="post" target="_blank">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-md-2 col-12">
                                <input type="date" id="start" name="start" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-2 col-12">
                                <input type="date" id="end" name="end" class="form-control form-control-sm">
                            </div>
                            <div class="col-md-8 col-12">
                                <a type="button" onclick="cariData()" class="btn btn-sm btn-info">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                    Cari
                                </a>
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fa-solid fa-print"></i>
                                    Print
                                </button>
                            </div>
                        </div>
                    </form>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap text-center"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
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
    </div>
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript">
        function cariData() {
            var start = $('#start').val();
            var end = $('#end').val();

            $('#dataPemasukan').empty();
            $.ajax({
                type: "get",
                url: "{{ route('laporanKomulatif.ajax.cariData') }}",
                data: {
                    start,
                    end
                },
                dataType: "json",
                success: function(pemasukanPengeluaran) {
                    var pemasukan = 0;
                    var pengeluaran = 0;
                    $.each(pemasukanPengeluaran, function(no, p) {
                        pemasukan += parseFloat(p.jenis == 'Pemasukan' ? p.jumlah : 0);
                        pengeluaran += parseFloat(p.jenis == 'pengeluaran' ? p.jumlah : 0);
                        $('#dataPemasukan').append(
                            `<tr>
                                <td>${no+1}</td>                                 
                                <td>${p.tanggal}</td>                                 
                                <td>${p.nama}</td>                                 
                                <td>${p.jenis == 'Pemasukan' ? formatRupiah(p.jumlah) : 0}</td>                                 
                                <td>${p.jenis == 'Pengeluaran' ? formatRupiah(p.jumlah) : 0}</td>                                 
                                <td>${p.keterangan}</td>
                            </tr>`
                        );
                    });
                    $('#pemasukan').html(formatRupiah(pemasukan));
                    $('#pengeluaran').html(formatRupiah(pengeluaran));
                }
            });
        }

        function formatRupiah(angka, prefix) {
            let numberString = angka.toString().replace(/[^,\d]/g, ''),
                split = numberString.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp' + rupiah : '');
        }
    </script>
@endsection
