<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <div class="row">
    <ol class="breadcrumb">
      <li><a href="<?= base_url('index.php/it/home') ?>">
        <em class="fa fa-home"></em>
      </a></li>
      <li class="active">Perkembangan Pengajuan Software </li>
    </ol>
  </div><!--/.row-->

  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Perkembangan Pengajuan Software</h1>
    </div>
  </div><!--/.row-->

  <?php $this->load->view('layouts/__alert') ?>

  <!-- Table -->
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
        </div>

        <div class="panel-body">
          <table id="datatable" class="table table-striped table-bordered nowrap" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>No</th>
                <th>Id Upgrade</th>
                <th>Nama Divisi</th>
                <th>Pengajuan Sistem</th>
                <th>Tanggal</th>
                <th>Aksi</th>
                <!-- <th>Aksi</th> -->
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($transaksi as $value): ?>
                <tr>
                  <td><?= $no++ ?></td>
                  <td><?= $value['no_struk'] ?></td>
                  <td><?= ucwords($value['nama_pelanggan']) ?></td>
                  <td><?= ucwords($value['nama_barang']) ?></td>
                  <td><?= substr($value['tanggal_transaksi'], 0,-9) ?></td>
                  <td align="center"><?= $value['Keterangan']?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>