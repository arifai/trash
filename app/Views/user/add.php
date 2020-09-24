<?= $this->extend('template'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tambah Pengguna</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('user') ?>">Pengguna</a></li>
                    <li class="breadcrumb-item active">Pengguna</li>
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
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambahkan Pengguna Baru</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="/user/save" method="POST">
                        <?= csrf_field() ?>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="full_name">Nama Lengkap</label>
                                    <input type="text" class="form-control <?php if ($validation->hasError('full_name')) { echo 'is-invalid'; } ?>" id="full_name" name="full_name" placeholder="Nama Lengkap" value="<?= set_value('full_name') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('full_name') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="employee_id">ID Pegawai</label>
                                    <input type="text" class="form-control <?php if ($validation->hasError('employee_id')) { echo 'is-invalid'; } ?>" id="employee_id" name="employee_id" placeholder="ID Pegawai" value="<?= set_value('employee_id') ?>">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('employee_id') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="role_level">Hak Akses</label>
                                    <select class="custom-select <?php if ($validation->hasError('role_level')) { echo 'is-invalid'; } ?>" name="role_level">
                                        <option value="">Pilih salah satu</option>
                                        <?php foreach ($items as $item) : ?>
                                            <option value="<?= $item['role_level_id'] ?>"><?= $item['role_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('role_level') ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Kata Sandi</label>
                                    <input type="password" class="form-control <?php if ($validation->hasError('password')) { echo 'is-invalid'; } ?>" id="password" name="password" placeholder="Kata Sandi">
                                    <div class="invalid-feedback">
                                        <?= $validation->getError('password') ?>
                                    </div>
                                </div>
                            </div>
                            <!-- .card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Tambahkan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>