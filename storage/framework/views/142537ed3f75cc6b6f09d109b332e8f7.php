
<?php $__env->startSection('content'); ?>
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h6 class="page-title">Data Pemasukan</h6>
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pemasukan</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-12 col-12">
                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                data-bs-target="#myModal">
                                <i class="fa-solid fa-user-plus"></i>
                                Add New
                            </button>
                        </div>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tanggal</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $pemasukan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $no => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($no + 1); ?></td>
                                    <td><?php echo e(date('d/m/Y', strtotime($p->tanggal))); ?></td>
                                    <td><?php echo e($p->nama); ?></td>
                                    <td><?php echo e('Rp ' . number_format($p->jumlah, 0, ',', '.')); ?></td>
                                    <td><?php echo e($p->keterangan); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#myModal<?php echo e($p->id); ?>">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </button>
                                        <a href="<?php echo e(route('pemasukan.delete', $p->id)); ?>" class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>

                                <div id="myModal<?php echo e($p->id); ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">
                                                    Pemasukan
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="<?php echo e(route('pemasukan.update', $p->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for="">Nama</label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <input type="text" name="nama" value="<?php echo e($p->nama); ?>" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for="">Jumlah</label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <input type="number" name="jumlah" value="<?php echo e($p->jumlah); ?>" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-3 col-12">
                                                            <label for="">Keterangan</label>
                                                        </div>
                                                        <div class="col-md-9 col-12 mb-3">
                                                            <textarea name="keterangan" rows="3" class="form-control"><?php echo e($p->keterangan); ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                        Save Changes
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">
                        Pemasukan
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('pemasukan.add')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">Nama</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="text" name="nama" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">Jumlah</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <input type="number" name="jumlah" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label for="">Keterangan</label>
                            </div>
                            <div class="col-md-9 col-12 mb-3">
                                <textarea name="keterangan" rows="3" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Catatan-keuangan-nilfia (1)\Catatan-keuangan-nilfia\resources\views/pages/data-pemasukan.blade.php ENDPATH**/ ?>