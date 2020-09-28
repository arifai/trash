<!-- Menggunakan default template -->
<?= $this->extend('template'); ?>

<!-- Memberitahu bahwa kode di bawah adalah sebuah konten.
Untuk lebih jelas buka file 'app/Views/template.php'-->
<?= $this->section('content'); ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fa fa-trash"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Sampah Masuk</span>
                        <?php foreach ($in_tajam as $t) : ?>
                            <span class="info-box-number">Tajam: <?= ($t['weight'] == null) ? 0 : $t['weight'] ?> Kg</span>
                        <?php endforeach; ?>
                        <?php foreach ($in_jerigen as $j) : ?>
                            <span class="info-box-number">Jerigen: <?= ($j['weight'] == null) ? 0 : $j['weight'] ?> Kg</span>
                        <?php endforeach; ?>
                        <?php foreach ($in_cair as $c) : ?>
                            <span class="info-box-number">Cair: <?= ($c['weight'] == null) ? 0 : $c['weight'] ?> Kg</span>
                        <?php endforeach; ?>
                        <?php foreach ($in_padat as $p) : ?>
                            <span class="info-box-number">Padat: <?= ($p['weight'] == null) ? 0 : $p['weight'] ?> Kg</span>
                        <?php endforeach; ?>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <?php if (session()->get('role_level_id') == 1) : ?>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-minus-circle"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Sampah Keluar</span>
                            <?php foreach ($out_tajam as $ot) : ?>
                                <span class="info-box-number">Tajam: <?= ($ot['weight'] == null) ? 0 : $ot['weight'] ?> Kg</span>
                            <?php endforeach; ?>
                            <?php foreach ($out_jerigen as $oj) : ?>
                                <span class="info-box-number">Jerigen: <?= ($oj['weight'] == null) ? 0 : $oj['weight'] ?> Kg</span>
                            <?php endforeach; ?>
                            <?php foreach ($out_cair as $oc) : ?>
                                <span class="info-box-number">Cair: <?= ($oc['weight'] == null) ? 0 : $oc['weight'] ?> Kg</span>
                            <?php endforeach; ?>
                            <?php foreach ($out_padat as $op) : ?>
                                <span class="info-box-number">Padat: <?= ($op['weight'] == null) ? 0 : $op['weight'] ?> Kg</span>
                            <?php endforeach; ?>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pengguna</span>
                            <span class="info-box-number"><?= $users->countAllResults() ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
            <?php endif; ?>
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection(); ?>