<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $title ?></title>
    <!-- css -->
    <?php $this->load->view('backend/include/base_css'); ?>
  </head>
  <body id="page-top">
    <!-- navbar -->
    <?php $this->load->view('backend/include/base_nav'); ?>
    <!-- Begin Page Content -->
    <div class="container-fluid">
      
      <!-- DataTales Example -->
      <!-- Log on to codeastro.com for more projects -->
      <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h1 class="h5 text-gray-800">Booking List</h1>
        </div>
        <div class="card-body">
        
          <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
                <tr>
                  <th>#</th>
                  <th>Code</th>
                  <th>Schedule Code</th>
                  <th>Departure Date</th>
                  <th>Customer</th>
                  <th>Purchase Date</th>
                  <th>Ticket Qty.</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1;foreach ($order as $row) { ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $row['kd_order']; ?></td>
                    <td><?= $row['kd_jadwal']; ?></td>
                    <td><?= hari_indo(date('N',strtotime($row['tgl_berangkat_order']))).', '.tanggal_indo(date('Y-m-d',strtotime(''.$row['tgl_berangkat_order'].'')));?></td>
                    <td><?= $row['nama_order']; ?></td>
                    <td><?= $row['tgl_beli_order']; ?></td>
                    <?php $sqlcek = $this->db->query("SELECT * FROM tbl_order WHERE kd_order LIKE '".$row['kd_order']."'")->result_array(); ?>
                    <td><?= count($sqlcek); ?></td>
                    <?php if ($row['status_order'] == '1') { ?>
                          <td class="btn-danger"> Unpaid</td> 
                          <?php } elseif($row['status_order'] == '2') { ?>
                          <td class="btn-success"> Paid</td>
                        <?php } else { ?>
                          <td class="btn-warning"> Cancelled</td>
                          <?php } ?>
                    <td><a href="<?= base_url('backend/order/vieworder/'.$row['kd_order']) ?>" class="btn btn btn-info">View</a></td>
                  </tr>
                <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<!-- Footer -->
<?php $this->load->view('backend/include/base_footer'); ?>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div><!-- Log on to codeastro.com for more projects -->
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
<i class="fas fa-angle-up"></i>
</a>
<!-- js -->
<?php $this->load->view('backend/include/base_js'); ?>
</body>
</html>