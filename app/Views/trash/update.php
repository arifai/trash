<?= $this->extend('template'); ?>

<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Perbarui Sampah</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('trash') ?>">Sampah</a></li>
                    <li class="breadcrumb-item active">Perbarui Sampah</li>
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
                        <h3 class="card-title">Perbarui Data Sampah</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="/trash/update/<?= $item['id'] ?>" method="POST">
                        <?= csrf_field() ?>
                        <div class="card-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="weight">Berat (Kg)</label>
                                    <input type="number" class="form-control" id="weight" name="weight" placeholder="Berat (Kg)" step=".1" min="0"  value="<?= $item['weight'] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Kategori</label>
                                    <select class="custom-select" name="category_id">
                                        <?php foreach ($cats as $cat) : ?>
                                            <option <?php if ($cat['id'] == $item['category_id']) echo 'selected' ?> value="<?= $cat['id'] ?>"><?= $cat['category_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="floor_id">Lantai</label>
                                    <select class="custom-select" name="floor_id">
                                        <?php foreach ($floors as $floor) : ?>
                                            <option <?php if ($floor['id'] == $item['floor_id']) echo 'selected' ?> value="<?= $floor['id'] ?>"><?= $floor['floor_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="user_id">Nama Pegawai</label>
                                    <select class="custom-select" name="user_id">
                                        <?php foreach ($users as $user) : ?>
                                            <option <?php if ($user['user_id'] == $item['user_id']) echo 'selected' ?> value="<?= $user['id'] ?>"><?= $user['full_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="shift_id">Jadwal Shift</label>
                                    <select class="custom-select" name="shift_id">
                                        <?php foreach ($shifts as $shift) : ?>
                                            <option <?php if ($shift['id'] == $item['shift_id']) echo 'selected' ?> value="<?= $shift['id'] ?>"><?= $shift['shift_name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

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