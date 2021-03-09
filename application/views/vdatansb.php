<html>

<head>
     <title><?php echo $title; ?></title>




     <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/jquery/jquery-3.3.1.js"></script>
     <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/datatable/datatables.min.js"></script>
     <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/datatable/dataTables.buttons.min.js"></script>
     <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/datatable/buttons.html5.min.js"></script>
     <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/popper/popper.min.js"></script>
     <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js"></script>
     <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/datatable/buttons.flash.min.js"></script>
     <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/datatable/buttons.flash.min.js"></script>
     <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/datatable/pdfmake.min.js"></script>
     <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/datatable/jszip.min.js"></script>



     <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/datatable/datatables.min.css">
     <link rel="stylesheet" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css">
     <style>
          body {
               margin: 0;
               padding: 0;
               background-color: #f1f1f1;
          }

          .box {
               width: 1200px;
               padding: 20px;
               background-color: #fff;
               border: 1px solid #ccc;
               border-radius: 5px;
               margin-top: 10px;
          }

          h3 {
               margin-top: 2px;
               text-align: center;
               font-size: 15px;

          }

          .box1 {
               width: 1200px;

               border: 0px solid #ccc;
               border-radius: 5px;

          }

          .head {
               border: 1px solid #ccc;
               ;
               background-color: #fff;
               padding: 10px;
               border-radius: 10px;
               margin-top: 10px;
          }

          body,
          html {
               height: 100%;
               background-repeat: no-repeat;
               background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
          }
     </style>
</head>

<body>

     <div class="container box1">
          <div class="row">
               <div class="col-sm head">
                    <span>
                         <a href="http://localhost/tabungan_pondok">
                              <img src="http://localhost/tabungan_pondok/upload/icon/home.png" width="64px" class="rounded mx-auto d-block" alt="...">
                              <h3>HOME</h3>
                         </a>

                    </span>
               </div>
               <div class="col-sm head">
                    <span>
                         <a href="http://localhost/tabungan_pondok/datansb">
                              <img src="http://localhost/tabungan_pondok/upload/icon/data.png" width="64px" class="rounded mx-auto d-block" alt="...">
                              <h3>DATA NASABAH</h3>
                         </a>

                    </span>


               </div>
               <div class="col-sm head">
                    <span>
                         <a href="http://localhost/tabungan_pondok/transaksi">
                              <img src="http://localhost/tabungan_pondok/upload/icon/transaksi.png" width="64px" class="rounded mx-auto d-block" alt="...">
                              <h3>TRANSAKSI</h3>
                         </a>

                    </span>


               </div>
               <div class="col-sm head">
                    <div class="col-sm">
                         <span>
                              <a href="http://localhost/tabungan_pondok/laporan">
                                   <img src="http://localhost/tabungan_pondok/upload/icon/laporan.png" width="64px" class="rounded mx-auto d-block" alt="...">
                                   <h3>LAPORAN</h3>
                              </a>

                         </span>


                    </div>

               </div>
               <div class="col-sm head">
                    <div class="col-sm">
                         <span>
                              <a href="http://localhost/tabungan_pondok/login/logout">
                                   <img src="http://localhost/tabungan_pondok/upload/icon/logout.png" width="64px" class="rounded mx-auto d-block" alt="...">
                                   <h3>logout</h3>
                              </a>

                         </span>
                    </div>
               </div>

          </div>

     </div>


     <div class="container box">
          <h3 align="center"><?php echo $title; ?></h3><br />
          <div class="table-responsive">
               <br />
               <button type="button" id="add_button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Tambah Nasabah</button>
               <a role="button" class="btn btn-outline-success" href="<?= base_url("Datansb/excel"); ?>">Expor Data</a>
               <br /><br />
               <table id="user_data" class="table table-bordered table-striped">
                    <thead>
                         <tr>
                              <th width="10%">Image</th>
                              <th width="5%">REKENING</th>
                              <th width="25%">NAMA</th>
                              <th width="20%">ALAMAT</th>
                              <th width="15%">SALDO</th>
                              <th width="5%">EDIT</th>
                              <th width="5%">HAPUS</th>
                         </tr>
                    </thead>
               </table>
          </div>
     </div>

     <div class="modal fade" id="myModal">
          <div class="modal-dialog">
               <div class="modal-content">
                    <form method="post" id="user_form">
                         <!-- Modal Header -->
                         <div class="modal-header">
                              <h4 class="modal-title">Modal Heading</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                         </div>

                         <!-- Modal body -->
                         <div class="modal-body">

                              <label>REKENING</label>
                              <input type="text" name="REKENING" id="REKENING" readonly="" class="form-control" />
                              <br />
                              <label>NAMA</label>
                              <input type="text" name="NAMA" id="NAMA" class="form-control" />
                              <br />
                              <label>ALAMAT</label>
                              <input type="text" name="ALAMAT" id="ALAMAT" class="form-control" />
                              <br />
                              <label>SALDO</label>
                              <input type="number" name="SALDO" id="SALDO" class="form-control" />
                              <br />
                              <label>PASSWORD</label>
                              <input type="password" name="PASWORD" id="PASWORD" class="form-control" />
                              <br />
                              <label>Select User Image</label>
                              <input type="file" name="user_image" id="user_image" />
                              <span id="user_uploaded_image"></span>
                              <input type="hidden" id="action" name="action" class="btn btn-success" value="Add" />

                         </div>

                         <!-- Modal footer -->
                         <div class="modal-footer">
                              <input type="submit" name="action" class="btn btn-success" value="Add" />
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                         </div>

               </div>
               </form>
          </div>
     </div>



</body>

</html>




<script type="text/javascript" language="javascript">
     $(document).ready(function() {
          var dataTable = $('#user_data').DataTable({

               "processing": true,
               "serverSide": true,
               "order": [],

               "ajax": {
                    url: "<?php echo base_url() . 'Datansb/fetch_user'; ?>",
                    type: "POST"
               },
               "columnDefs": [{
                    "targets": [0, 3, 5, 6],
                    "orderable": false,
               }, ],
          });

          $('#add_button').click(function() {
               $('#user_form')[0].reset();
               $('.modal-title').text("Add User");
               $('#action').val("Add");
               $('#user_uploaded_image').html('');
               $('#SALDO').prop('readonly', false);
               $.get("<?php echo base_url() . 'Datansb/idnsb' ?>", function(data, status) {
                    $('#REKENING').val(data);
               });
          });



          $(document).on('submit', '#user_form', function(event) {
               event.preventDefault();
               var REKENING = $('#REKENING').val();
               var ADD = $('#ADD').val();
               var NAMA = $('#NAMA').val();
               var ALAMAT = $('#ALAMAT').val();
               var SALDO = $('#SALDO').val();
               var extension = $('#user_image').val().split('.').pop().toLowerCase();
               if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1)
                    if (extension != '') {
                         alert("Invalid Image File");
                         $('#user_image').val('');
                         return false;
                    }
               if (REKENING != '' && NAMA != '') {
                    $.ajax({
                         url: "<?php echo base_url() . 'Datansb/user_action' ?>",
                         method: 'POST',
                         data: new FormData(this),
                         contentType: false,
                         processData: false,
                         success: function(data) {
                              alert(data);
                              $('#user_form')[0].reset();
                              $('#myModal').modal('hide').removeData();
                              dataTable.ajax.reload();

                         }
                    });
               } else {
                    alert("Bother Fields are Required");
               }
          });


          $(document).on('click', '#update', function(event) {

               var REKENING = $(this).attr("REKENING");
               $.ajax({
                    url: "<?php echo base_url(); ?>Datansb/fetch_single_user",
                    method: "POST",
                    data: {
                         REKENING: REKENING
                    },
                    dataType: "json",
                    success: function(data) {
                         $('#myModal').modal('show');
                         $('#PASWORD').type = 'text';
                         $('#REKENING').val(data.REKENING);
                         $('#NAMA').val(data.NAMA);
                         $('#ALAMAT').val(data.ALAMAT);
                         $('#SALDO').val(data.SALDO).prop('readonly', true);
                         $('#ALAMAT').val(data.ALAMAT);
                         $('#PASWORD').val(data.PASSWORD);
                         $('.modal-title').text("Edit User");
                         $('#user_uploaded_image').html(data.user_image);
                         $('#action').val("Edit");
                    }
               })
               event.preventDefault();
          });

          $(document).on('click', '#delete', function() {
               var REKENING = $(this).attr("REKENING");
               if (confirm("Are you sure you want to delete this?")) {
                    $.ajax({
                         url: "<?php echo base_url(); ?>Datansb/delete_single_user",
                         method: "POST",
                         data: {
                              REKENING: REKENING
                         },
                         success: function(data) {
                              alert(data);
                              dataTable.ajax.reload();
                         }
                    });
               } else {
                    return false;
               }
          });








     });
</script>
