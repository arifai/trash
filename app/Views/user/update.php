<?= $this->extend('template'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Perbarui Pengguna</h1>
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
                        <h3 class="card-title">Perbarui Pengguna</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="/user/update/<?= $user['user_id'] ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="full_name">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Nama Lengkap" value="<?= $user['full_name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="employee_id">ID Pegawai</label>
                                    <input type="text" class="form-control" id="employee_id" name="employee_id" placeholder="ID Pegawai" value="<?= $user['employee_id'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="role_level">Hak Akses</label>
                                    <select class="custom-select" name="role_level">
                                        <?php foreach ($items as $item) : ?>
                                            <option <?php if ($item['role_level_id']  == $user['role_level_id']) {echo 'selected';} ?> value="<?= $item['role_level_id'] ?>"><?= $item['role_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <!-- <div class="form-group">
                                    <label for="password">Kata Sandi</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" value="<?= set_value('password') ?>">
                                </div> -->

                                <!-- Alert if validate errors -->
                                <?php if (isset($validation)) : ?>
                                    <div class="col-12">
                                        <div class="alert alert-danger" role="alert">
                                            <?= $validation->listErrors() ?>
                                        </div>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <!-- .card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Perbarui</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>