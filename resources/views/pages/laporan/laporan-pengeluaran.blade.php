@extends('layout.app')
@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Laporan Pengeluaran</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pengeluaran</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('laporanPengeluaran.print') }}" method="post" target="_blank">
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
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody id="dataPengeluaran">
                            @foreach ($pengeluaran as $no => $p)
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
    </div>

    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript">
        function cariData() {
            var start = $('#start').val();
            var end = $('#end').val();

            $('#dataPengeluaran').empty();
            $.ajax({
                type: "get",
                url: "{{ route('laporanPengeluaran.ajax.cariData') }}",
                data: {
                    start,
                    end
                },
                dataType: "json",
                success: function(pemasukan) {
                    $.each(pemasukan, function(no, p) {
                        $('#dataPengeluaran').append(
                            `<tr>
                                <td>${no+1}</td>    
                                <td>${p.tanggal}</td>    
                                <td>${p.nama}</td>    
                                <td>${formatRupiah(p.jumlah)}</td>  
                                <td>${p.keterangan}</td>  
                            </tr>`
                        );
                    });
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
