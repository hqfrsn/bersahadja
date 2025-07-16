<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Data Pesanan</title>

    <link href="<?php echo base_url() ?>sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="<?php echo base_url() ?>sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>sbadmin2/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>sbadmin2/toastr/flashdata.css" rel="stylesheet">
</head>

<body id="page-top">
    <div id="wrapper">
        <?php $this->load->view('admin/template/sidebar'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?php $this->load->view('admin/template/header'); ?>
                <div class="container-fluid">
                    <div id="modalContainer"></div>
                    <div id="flashdata">
                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger" id="error-alert">
                                <?= $this->session->flashdata('error') ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->session->flashdata('success')): ?>
                            <div class="alert alert-success" id="success-alert">
                                <?= $this->session->flashdata('success') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <h1 class="h3 mb-2 text-gray-800">Data Pesanan</h1>
                    <div class="card shadow mb-4 mt-3">
                        <div class="card-header d-flex">
                            <h6 class="font-weight-bold text-primary mt-2 col-10">Data Pesanan</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <?php foreach ($pesanan as $p): ?>
                                            <tr>
                                              <td><?= $p['id_pesanan'] ?></td>
                                              <td><?= $p['tanggal_pesanan'] ?></td>
                                              <td><span class="badge bg-<?= $p['status_pesanan'] == 'proses' ? 'warning' : ($p['status_pesanan'] == 'selesai' ? 'success' : 'danger') ?>">
                                                <?= ucfirst($p['status_pesanan']) ?>
                                              </span></td>
                                              <td>
                                                <?php if ($p['status_pesanan'] == 'proses'): ?>
                                                  <a href="<?= base_url('admin/pesanan/status_pesanan/' . $p['id_pesanan'] . '/selesai') ?>" class="btn btn-sm btn-success">Selesai</a>
                                                  <a href="<?= base_url('admin/pesanan/status_pesanan/' . $p['id_pesanan'] . '/cancel') ?>" class="btn btn-sm btn-danger">Cancel</a>
                                                <?php else: ?>
                                                  <span class="text-muted">Sudah <?= $p['status_pesanan'] ?></span>
                                                <?php endif; ?>
                                              </td>
                                            </tr>
                                            <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php $this->load->view('admin/template/footer'); ?>
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <script>
        setTimeout(function() {
            var errorAlert = document.getElementById('error-alert');
            var successAlert = document.getElementById('success-alert');
            if (errorAlert) {
                errorAlert.style.display = 'none';
            }
            if (successAlert) {
                successAlert.style.display = 'none';
            }
        }, 3000);
    </script>
    <script src="<?php echo base_url() ?>sbadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="<?php echo base_url() ?>sbadmin2/js/sb-admin-2.min.js"></script>
    <script src="<?php echo base_url() ?>sbadmin2/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>sbadmin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>sbadmin2/js/demo/datatables-demo.js"></script>
</body>
</html>
