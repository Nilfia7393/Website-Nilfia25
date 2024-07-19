<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                        <?php
                            $pemasukan = 0;
                            $pengeluaran = 0;
                        ?>
                        <?php $__currentLoopData = $pemasukanPengeluaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $pemasukan += $p->jenis == 'Pemasukan' ? $p->jumlah : 0;
                                $pengeluaran += $p->jenis == 'Pengeluaran' ? $p->jumlah : 0;
                            ?>
                            <tr>
                                <td><?php echo e($no + 1); ?></td>
                                <td><?php echo e($p->tanggal); ?></td>
                                <td><?php echo e($p->nama); ?></td>
                                <td><?php echo e($p->jenis == 'Pemasukan' ? number_format($p->jumlah, 0, ',', '.') : 0); ?></td>
                                <td><?php echo e($p->jenis == 'Pengeluaran' ? number_format($p->jumlah, 0, ',', '.') : 0); ?></td>
                                <td><?php echo e($p->keterangan); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3">Total</th>
                            <th><span id="pemasukan"><?php echo e(number_format($pemasukan, 0, ',', '.')); ?></span></th>
                            <th><span id="pengeluaran"><?php echo e(number_format($pengeluaran, 0, ',', '.')); ?></span></th>
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
</html><?php /**PATH C:\xampp\htdocs\Catatan-keuangan-nilfia (1)\Catatan-keuangan-nilfia\resources\views/pages/laporan/print/print-laporan-komulatif.blade.php ENDPATH**/ ?>