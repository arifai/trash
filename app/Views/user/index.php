<?= $this->extend('template'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Daftar Pengguna</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Pengguna</li>
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
                    <div class="card-header">
                        <button type="button" class="btn btn-primary btn-sm float-right" onclick="location.href='<?= base_url('user/add') ?>'">Tambah Pengguna</button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="data_table" class="table table-bordered table-hover">
                            <thead>
                                <tr role="row" class="odd">
                                    <th>No.</th>
                                    <th>Nama Lengkap</th>
                                    <th>ID Pegawai</th>
                                    <th>Hak Akses</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $num = 1 ?>
                                <?php foreach ($items as $item) : ?>
                                    <tr>
                                        <td><?= $num ?></td>
                                        <td class="text-capitalize"><?= $item['full_name'] ?></td>
                                        <td class="text-capitalize"><?= $item['employee_id'] ?></td>
                                        <td class="text-capitalize"><?= $item['role_name'] ?></td>
                                        <td>
                                            <a href="/user/edit/<?= $item['user_id'] ?>" class="btn btn-warning btn-sm">Perbarui</a>
                                            <form action="/user/<?= $item['user_id'] ?>" method="post" class="d-inline">
                                                <?= csrf_field() ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger btn-sm inline" onclick="return confirm('Apakah anda yakin?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php $num++ ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Lengkap</th>
                                    <th>ID Pegawai</th>
                                    <th>Hak Akses</th>
                                    <th>Tindakan</th>
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