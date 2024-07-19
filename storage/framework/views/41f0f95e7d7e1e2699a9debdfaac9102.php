<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-12 mb-4">
                <h4 class="text-center">Laporan Pengeluaran</h4>
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
                        <?php $__currentLoopData = $pengeluaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($no + 1); ?></td>
                                <td><?php echo e(date('d/m/Y', strtotime($p->tanggal))); ?></td>
                                <td><?php echo e($p->nama); ?></td>
                                <td><?php echo e($p->jumlah); ?></td>
                                <td><?php echo e($p->keterangan); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        window.print();
    </script>
</body>
</html><?php /**PATH D:\Sistem-Personal\Uang-Masuk-Nilfia\resources\views/pages/laporan/print/print-laporan-pengeluaran.blade.php ENDPATH**/ ?>