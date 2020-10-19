<?= $this->extend('template'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Riwayat</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Riwayat</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <?php if (session()->get('success')) : ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <?= session()->get('success') ?>
                    </div>
                <?php endif; ?>

                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="data_table" class="table table-bordered table-hover">
                            <thead>
                                <tr role="row" class="odd">
                                    <th>No.</th>
                                    <th>Berat (Kg)</th>
                                    <th>Kategori</th>
                                    <th>Waktu Timbang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $num = 1 ?>
                                <?php foreach ($items as $item) : ?>
                                    <tr>
                                        <td><?= $num ?></td>
                                        <td class="text-capitalize"><?= $item['weight'] ?></td>
                                        <td class="text-capitalize"><?= $item['category_name'] ?></td>
                                        <td class="text-capitalize"><?= simple_datetime_parse($item['dates']) ?></td>
                                    </tr>
                                    <?php $num++ ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Berat (Kg)</th>
                                    <th>Kategori</th>
                                    <th>Waktu Timbang</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
</section>
<?= $this->endSection(); ?>