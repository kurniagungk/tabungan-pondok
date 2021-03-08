<html>

<head>
  <title><?php echo $title; ?></title>

  <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/jquery/jquery-3.3.1.js"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/datatable/datatables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/popper/popper.min.js"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js"></script>



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

    .figure {
      text-align: center;
    }

    #sstbprovil {

      font-size: xx-large;
    }

    #ktarik {
      display: none;
    }

    #tsetor {
      display: none;
    }

    #ttarik {
      display: none;
    }

    #user_data {
      font-size: 10;
    }

    #gbnsb {
      position: sticky;
      left: 15%;
      width: 300px;
      margin-left: auto;
      margin-left: auto;
      border: 3px solid #73AD21;
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

    .box2 {
      width: 1200px;

      border: 0px solid #ccc;
      border-radius: 5px;
      display: none;
    }

    body,
    html {
      height: 100%;
      background-repeat: no-repeat;
      background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
    }

    #gbnsb {
      position: sticky;
      left: 15%;
      width: 300px;
      margin-left: auto;
      margin-left: auto;
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

    <div class="row">
      <div class="col">
        <button type="button" id="setor" class="btn btn-primary btn-lg btn-block">setor</button>

      </div>
      <br>
      <div class="col">
        <button type="button" class="btn btn-primary btn-lg btn-block" id="tbSStarik">tarik</button>
      </div>
    </div>
    <div id="ksetor">
      <br>
      <input autocomplete="" id="csetor" class="form-control mr-sm-2 cari" type="search" placeholder="Search" aria-label="Search">
      <br>
    </div>
    <div id="ktarik">
      <br>
      <input autocomplete="" id="ctarik" class="form-control mr-sm-2 cari" type="search" placeholder="Search" aria-label="Search">
      <br>

    </div>
  </div>

  <div class="container box2">
    <div class="row" id="nsbdt">
      <div class="col head" border="1">
        <div style="overflow: auto; margin: auto; padding: 3px; background-color: none; text-align: left;">
          <h3>TRANSAKSI</h3>
          <span class="border-0" id="gambarnsb"><img id="gbnsb" src="http://localhost/tabungan_pondok/upload/profil.png" alt="..." class="img-thumbnail"></span>

        </div>
        <br>

        <table border="0">
          <thead>
            <tr>
              <td width="30%">REKENING</td>
              <td>:</td>
              <td width="300" height="100%"><input id="REKENING" value="" readonly="" type="text" class="form-control-plaintext"></td>
            </tr>
            <tr>
              <td width="30%">NAMA</td>
              <td>:</td>
              <td width="300" height="100%"><input id="NAMA" value="" readonly="" type="text" class="form-control-plaintext"></td>
            </tr>
            <tr>
              <td width="30%">ALAMAT</td>
              <td>:</td>
              <td width="300" height="100%"><input id="ALAMAT" value="" readonly="" type="text" class="form-control-plaintext"></td>
            </tr>
            <tr>
              <td width="30%">SALDO</td>
              <td>:</td>
              <td width="300" height="100%"><input id="SALDO" value="" readonly="" type="text" class="form-control-plaintext"></td>
            </tr>
            <tr>
              <td width="30%">IDTR</td>
              <td>:</td>
              <td width="300" height="100%"><input id="IDTR" value="" readonly="" type="text" class="form-control-plaintext"></td>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
        <br>
        <form id="tr">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Jumlah</label>
            <input type="number" class="form-control" name="jumlah" id="str">
          </div>



          <div class="form-group">
            <label for="exampleFormControlTextarea1">Keterangan</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan">
          </div>

          <input type="submit" id="tbtr" name="action" class="btn btn-primary btn-lg btn-block mt-3" value="" />

        </form>





      </div>

      <tr>
        <div class="col head">
          <div class="table-responsive">
            <table id="user_data" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="10%">No</th>
                  <th width="20%">Tanggal</th>
                  <th width="10%">Ambil</th>
                  <th width="10%">Setor</th>
                  <th width="10%">Jumlah</th>
                  <th width="10%">keterangan</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>

      </tr>

    </div>






  </div>


  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="post" id="spass">
          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Modal Heading</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            <span id="MGAMBAR"></span>
            <br>
            <label>NAMA</label>
            <input type="text" name="NAMA" id="MNAMA" readonly="" class="form-control" />

            <label>REKENING</label>
            <input type="text" name="REKENING" id="MREKENING" readonly="" class="form-control" />
            <label>PASWORD</label>
            <input type="password" name="PASWORD" id="pass" class="form-control" />

          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <input type="submit" name="action" class="btn btn-success" value="ok" />
          </div>

      </div>
      </form>
    </div>
  </div>

</body>

</html>
<script stype="text/javascript" language="javascript">
  $(document).ready(function() {

    $("#csetor").hide();
    $("#ctarik").hide();


    $("#setor").click(function() {
      $("#tbSStarik").removeClass("btn btn-danger");
      $("#setor").removeClass("btn btn-danger");
      $("#setor").removeClass("btn btn-primary");
      $("#setor").addClass("btn btn-success");
      $("#tbSStarik").addClass("btn btn-danger");
      $("#tbSStarik").removeClass("btn btn-success");
      $(".box2").hide();
      $("#ktarik").hide();
      $("#ksetor").show();
      $("#csetor").show();
      $("#csetor").val("");
      $("#csetor").focus();
    });

    $("#tbSStarik").click(function() {
      $("#setor").removeClass("btn btn-danger");
      $("#tbSStarik").removeClass("btn btn-danger");
      $("#tbSStarik").removeClass("btn btn-primary");
      $("#tbSStarik").addClass("btn btn-success");
      $("#setor").addClass("btn btn-danger");
      $("#setor").removeClass("btn btn-success");
      $(".box2").hide();
      $("#ksetor").hide();
      $("#ktarik").show();
      $("#ctarik").show();
      $("#ctarik").val("");
      $("#ctarik").focus();
    });

    $('#csetor').on('keyup', function() {
      var REKENING = $('#csetor').val();

      $.ajax({
        url: "<?php echo base_url(); ?>transaksi/fetch_single_user",
        method: "POST",
        data: {
          REKENING: REKENING
        },
        dataType: "json",
        success: function(data) {
          if (data != "") {
            $('.box2').show();
            $('#REKENING').val(data.REKENING);
            $('#NAMA').val(data.NAMA);
            $('#ALAMAT').val(data.ALAMAT);
            $('#SALDO').val(data.SALDO);
            $('#gambarnsb').html(data.user_image);
            $.get("<?php echo base_url() . 'transaksi/idtr' ?>", function(data, status) {
              $('#IDTR').val(data);
            });
            $("#str").val("");
            setTimeout(function() {
              $("#str").focus();
            }, 1000);

            $("#tbtr").val("setor");
            $('#user_data').DataTable({
              destroy: true,
              ajax: {
                url: '<?php echo base_url() . 'transaksi/tablensb' ?>',
                type: 'POST',
                data: {
                  REKENING: REKENING
                },
              },
              "columns": [{
                  data: "No"
                },
                {
                  data: "tanggal"
                },
                {
                  data: "ambil"
                },
                {
                  data: "simpan"
                },
                {
                  data: "jumlah"
                },
                {
                  data: "keterangan"
                },

              ]
            });

          }

        }
      });

    });



    $(document).on('submit', '#tr', function(event) {
      event.preventDefault();

      var saldo = $("#SALDO").val();
      var jumlah = $("#str").val();
      var idtr = $("#IDTR").val();
      var rekening = $("#REKENING").val();
      var jenis = $("#tbtr").val();
      var keterangan = $("#keterangan").val();

      $.ajax({
        url: "<?php echo base_url() . 'transaksi/transaksi' ?>",
        method: 'POST',
        data: {
          jumlah: jumlah,
          idtr: idtr,
          rekening: rekening,
          saldo: saldo,
          jenis: jenis,
          keterangan: keterangan,

        },
        success: function(data) {


          if ($("#tbtr").val() == "tarik" && data !== "saldo") {
            alert("berhasil tarik");
            $('#REKENING').val("");
            $('#NAMA').val("");
            $('#ALAMAT').val("");
            $('#SALDO').val("");
            $("#ktarik").show();
            $("#ksetor").hide();
            $("#ctarik").val("");
            $("#ctarik").focus();
            $("#gambarnsb").html('<img id="gbnsb" src="http://localhost/tabungan_pondok/upload/profil.png" alt="..." class="img-thumbnail" >');
            setTimeout(function() {
              $('.box2').hide();
            }, 2000);
            location.reload();
          } else if ($("#tbtr").val() == "tarik" && data == "saldo") {
            alert("saldo tidak mencukupi");
          }

          if ($("#tbtr").val() == "setor" && data != "saldo") {
            alert("berhasil setor");
            $('#REKENING').val("");
            $('#NAMA').val("");
            $('#ALAMAT').val("");
            $('#SALDO').val("");
            $("#ktarik").hide();
            $("#ksetor").show();
            $("#csetor").val("");
            $("#csetor").focus();
            $("#gambarnsb").html('<img id="gbnsb" src="http://localhost/tabungan_pondok/upload/profil.png" alt="..." class="img-thumbnail" >');
            setTimeout(function() {
              $('.box2').hide();
            }, 2000);
            location.reload();
          }



        }
      });



    });



    $('#ctarik').on('keyup', function() {
      var REKENING = $('#ctarik').val();

      $.ajax({
        url: "<?php echo base_url(); ?>transaksi/fetch_single_user",
        method: "POST",
        data: {
          REKENING: REKENING
        },
        dataType: "json",
        success: function(data) {
          if (data != "") {
            $('#myModal').modal('show');
            $("#pass").val("");
            $('#MREKENING').val(data.REKENING);
            $('#MNAMA').val(data.NAMA);
            $('#MGAMBAR').html(data.user_image);
            setTimeout(function() {
              $('#pass').focus();
            }, 1000);
          }
        }
      });



    });



    $(document).on('submit', '#spass', function(event) {
      event.preventDefault();
      var REKENING = $("#MREKENING").val();
      var pass = $('#pass').val();
      if (pass != '') {

        $.ajax({
          url: "<?php echo base_url() . 'transaksi/pass' ?>",
          method: 'POST',
          data: new FormData(this),
          contentType: false,
          processData: false,
          success: function(data) {
            if (data == "benar") {
              $.ajax({
                url: "<?php echo base_url(); ?>Datansb/fetch_single_user",
                method: "POST",
                data: {
                  REKENING: REKENING
                },
                dataType: "json",
                success: function(data) {
                  alert("PASSWORD BENAR");
                  $('#myModal').modal('hide').removeData();
                  $('.box2').show();
                  $("#csetor").val("");
                  $('#REKENING').val(data.REKENING);
                  $('#NAMA').val(data.NAMA);
                  $('#ALAMAT').val(data.ALAMAT);
                  $('#SALDO').val(data.SALDO);
                  $('#gambarnsb').html(data.user_image);
                  $.get("<?php echo base_url() . 'transaksi/idtr' ?>", function(data, status) {
                    $('#IDTR').val(data);
                  });
                  $("#str").val("");
                  setTimeout(function() {
                    $("#str").focus();
                  }, 1000);
                  $("#tbtr").val("tarik");
                  $('#user_data').DataTable({
                    destroy: true,
                    ajax: {
                      url: '<?php echo base_url() . 'transaksi/tablensb' ?>',
                      type: 'POST',
                      data: {
                        REKENING: REKENING
                      },
                    },
                    "columns": [{
                        data: "No"
                      },
                      {
                        data: "tanggal"
                      },
                      {
                        data: "ambil"
                      },
                      {
                        data: "simpan"
                      },
                      {
                        data: "jumlah"
                      },
                      {
                        data: "keterangan"
                      },

                    ]
                  });


                }
              });
            } else {
              alert("password salah");
              $('#pass').val("");
              $('#pass').focus();

            }

          }
        });
      } else {
        alert("silahkan masukan password");
      }



    });

































  });
</script>