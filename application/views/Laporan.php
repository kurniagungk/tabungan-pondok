<!DOCTYPE html>
<html>

<head>
  <title>laporan</title>

  <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/jquery/jquery-3.3.1.js"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/popper/popper.min.js"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/print/print.min.js"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/datatable/datatables.min.js"></script>
  <script type="text/javascript" charset="utf8" src="<?php echo base_url() ?>asset/jqueryui/jquery-ui.js"></script>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/datatable/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/jqueryui/jquery-ui.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/jqueryui/jquery-ui.theme.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/datatable/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/print/print.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css">
  <style>
    body,
    html {
      height: 100%;
      background-repeat: no-repeat;
      background-image: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));
    }

    body {
      margin: 0;
      padding: 0;
      background-color: #f1f1f1;
    }

    .box {
      width: 1200px;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      margin-top: 10px;
      padding: 20px;
    }

    #judul {
      text-align: center;
      font-size: 15px;
    }

    .asd {

      border: 1px solid #ccc;
      ;
      margin-top: 10px;
    }

    #sss {
      border: 1px solid #ccc;
      ;
    }

    #ssss {
      border: 1px solid #ccc;
      ;

    }

    .pilih {
      display: none;
    }

    .pilih1 {
      display: none;
    }

    .head {
      border: 1px solid #ccc;
      ;
      background-color: #fff;
      padding: 10px;
      border-radius: 10px;
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
  </style>
</head>

<body>

  <div class="container box1">
    <div class="row">
      <div class="col-sm head">
        <span>
          <a href="http://localhost/tabungan_pondok">
            <img src="<?php echo base_url() ?>upload/icon/home.png" width="64px" class="rounded mx-auto d-block" alt="...">
            <h3>HOME</h3>
          </a>

        </span>
      </div>
      <div class="col-sm head">
        <span>
          <a href="<?php echo base_url() ?>datansb">
            <img src="<?php echo base_url() ?>upload/icon/data.png" width="64px" class="rounded mx-auto d-block" alt="...">
            <h3>DATA NASABAH</h3>
          </a>

        </span>


      </div>
      <div class="col-sm head">
        <span>
          <a href="<?php echo base_url() ?>transaksi">
            <img src="<?php echo base_url() ?>upload/icon/transaksi.png" width="64px" class="rounded mx-auto d-block" alt="...">
            <h3>TRANSAKSI</h3>
          </a>

        </span>


      </div>
      <div class="col-sm head">
        <div class="col-sm">
          <span>
            <a href="<?php echo base_url() ?>laporan">
              <img src="<?php echo base_url() ?>upload/icon/laporan.png" width="64px" class="rounded mx-auto d-block" alt="...">
              <h3>LAPORAN</h3>
            </a>

          </span>


        </div>

      </div>

      <div class="col-sm head">
        <div class="col-sm">
          <span>
            <a href="<?php echo base_url() ?>login/logout">
              <img src="<?php echo base_url() ?>upload/icon/logout.png" width="64px" class="rounded mx-auto d-block" alt="...">
              <h3>logout</h3>
            </a>

          </span>
        </div>
      </div>

    </div>

  </div>


  <div class="container box">
    <div class="container">
      <div class="row">
        <div class="col">
          <button type="button" class="btn btn-danger btn-lg btn-block" id="tpnasaba">PERNASABA</button>
        </div>
        <div class="col">
          <button type="button" class="btn btn-success btn-lg btn-block" id="tlsn">SEMUA</button>
        </div>
      </div>
    </div>
  </div>
  <!-- -->
  <div class="container box pilih" id="psnasaba">
    <div class="row">
      <div class="col-2">
        <input type="text" class="form-control-plaintext" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="PERIODE" readonly>
      </div>
      <div class="col-3">
        <input id="dari1" type="text" autocomplete="off" class="form-control tanggal" aria-label="Large" aria-describedby="inputGroup-sizing-sm">
      </div>
      <div class="col-3">
        <input id="sampai1" autocomplete="off" type="text" class="form-control tanggal" aria-label="Large" aria-describedby="inputGroup-sizing-sm">

      </div>
      <div class="col-4">
        <button id="ok1" type="button" class="btn btn-warning tn-lg btn-block" width="250">Cari</button>

      </div>
    </div>
  </div>
  <!-- -->
  <div class="container box pilih1" id="pnasaba">
    <div class="row">
      <div class="col-2">
        <input type="text" class="form-control-plaintext" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="NO REKENING" readonly="">
      </div>
      <div class="col-1">
        <input type="text" class="form-control-plaintext" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value=":" readonly="" autofocus="" autocomplete="">

      </div>
      <div class="col-9">
        <input type="text" class="form-control" aria-label="Large" id="rek1" aria-describedby="inputGroup-sizing-sm">
      </div>
    </div>
    <br>
    <br>
    <div class="row">
      <div class="col-2">
        <input type="text" class="form-control-plaintext" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value="PERIODE" readonly>
      </div>
      <div class="col-1">
        <input type="text" class="form-control-plaintext" aria-label="Large" aria-describedby="inputGroup-sizing-sm" value=":" readonly="">
      </div>
      <div class="col-3">
        <input type="text" class="form-control tanggal" id="dari2" aria-label="Large" autocomplete="off" aria-describedby="inputGroup-sizing-sm">
      </div>
      <div class="col-3">
        <input type="text" class="form-control tanggal" id="sampai2" aria-label="Large" autocomplete="off" aria-describedby="inputGroup-sizing-sm">

      </div>
      <div class="col-3">
        <button type="button" class="btn btn-warning tn-lg btn-block" width="250" id="cr1n">Cari</button>

      </div>
    </div>
  </div>

  <!-- -->

  <div class="container box pilih" id="dlsn">
    <div>


      <button type="button" id="printall" class="btn btn-warning">Print</button>

    </div>
    <div id="asd">
      <div class="row">
        <div class="col">

          <br>

        </div>
        <div class="col-5">
          <p id="judul">LAPORAN SELURUH NASABAH</p>
        </div>
        <div class="col">

        </div>

      </div>

      <div class="row ">
        <div class="col">
          <table class="" height="10px">
            <thead>
            </thead>
            <tbody>
              <tr>
                <td width="30%" height="10%">PERIODE</td>
                <td width="10%" height="10%">:</td>
                <td width="30%" height="10%">
                  <input type="text" class="form-control-plaintext" id="periode" readonly="">
                </td>
              </tr>
              <tr>
                <td width="30%" height="10%">TOTAL SALDO</td>
                <td width="10%" height="10%">:</td>
                <td width="30%" height="10%">
                  <input type="text" class="form-control-plaintext" id="tsaldoa" readonly="">
                </td>
              </tr>

              <tr>
                <td width="30%" height="10%">TOTAL SETOR</td>
                <td width="10%" height="10%">:</td>
                <td width="30%" height="10%">
                  <input type="text" class="form-control-plaintext" id="tsetora" readonly="">
                </td>
              </tr>
              <tr>
                <td width="30%" height="10%">TOTAL TARIK</td>
                <td width="10%" height="10%">:</td>
                <td width="30%" height="10%">
                  <input type="text" class="form-control-plaintext" id="ttarika" readonly="">
                </td>
              </tr>

            </tbody>
          </table>

        </div>
      </div>

      <div class="row">
        <div class="col">
          <table class="table table-striped" id="lpsn">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Rekening</th>
                <th scope="col">Nama</th>
                <th scope="col">Ambil</th>
                <th scope="col">Simpan</th>
                <th scope="col">Jumlah</th>
                <th scope="col">keterangan</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>

        </div>

      </div>
    </div>
  </div>
  <!-- -->
  <div class="container box pilih1" id="dtln">
    <button type="button" id="printn" class="btn btn-warning">Print</button>
    <div id="asda">


      <div class="row head">
        <div class="col">

          <br>

        </div>
        <div class="col-7">
          <h1 id="judul">LAPORAN PERNASABAH</H1>
        </div>
        <div class="col">

        </div>

        <br>
        <br>

      </div>
      <div class="row" id="">
        <div class="col-8">

          <table class="table" height="10px">
            <thead>
            </thead>
            <tbody>

              <tr>
                <td width="30%" height="10%">REKENING</td>
                <td width="10%" height="10%">:</td>
                <td width="30%" height="10%">
                  <input type="text" class="form-control-plaintext" id="nrekening" readonly="">
                </td>
              </tr>

              <tr>
                <td width="30%" height="10%">NAMA</td>
                <td width="10%" height="10%">:</td>
                <td width="30%" height="10%">
                  <input type="text" class="form-control-plaintext" readonly="" id="nnasaba">
                </td>
              </tr>
              <tr>
                <td width="30%" height="10%">ALAMAT</td>
                <td width="10%" height="10%">:</td>
                <td width="30%" height="10%">
                  <input type="text" class="form-control-plaintext" id="nalamat" readonly="">
                </td>
              </tr>




              <tr>
                <td width="30%" height="10%">TOTAL SALDO</td>
                <td width="10%" height="10%">:</td>
                <td width="30%" height="10%">
                  <input type="text" class="form-control-plaintext" id="tsaldo1" readonly="">
                </td>
              </tr>

              <tr>
                <td width="30%" height="10%">TOTAL SETOR</td>
                <td width="10%" height="10%">:</td>
                <td width="30%" height="10%">
                  <input type="text" class="form-control-plaintext" id="tsetora1" readonly="">
                </td>
              </tr>
              <tr>
                <td width="30%" height="10%">TOTAL TARIK</td>
                <td width="10%" height="10%">:</td>
                <td width="30%" height="10%">
                  <input type="text" class="form-control-plaintext" id="ttarika1" readonly="">
                </td>
              </tr>

            </tbody>
          </table>


        </div>
        <div class="col-4">

          <span id="user_uploaded_image">
            <img id="gbnsb" src="<?php echo base_url() ?>upload/profil.png" alt="..." class="img-thumbnail" width="400px">

          </span>

        </div>

      </div>
      <br>
      <div class="row head" id="">
        <div class="col">

          <table class="" height="10px">
            <thead>
            </thead>
            <tbody>
              <tr>
                <td width="30%" height="10%">PERIODE</td>
                <td width="10%" height="10%">:</td>
                <td width="30%" height="10%">
                  <input type="text" class="form-control-plaintext" id="periode1" readonly="">
                </td>
              </tr>

            </tbody>
          </table>

          <br>
          <table class="table table-striped" id="tnsn">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Id transaksi</th>
                <th scope="col">Ambil</th>
                <th scope="col">Simpan</th>
                <th scope="col">Jumlah</th>
                <th scope="col">keterangan</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>


        </div>

      </div>
    </div>
  </div>





</body>

<script>
  $(document).ready(function() {

    $('#lpsn').DataTable({
      destroy: true,
      paging: false,
      searching: false,
    });

    $(function() {
      $(".tanggal").datepicker({
        dateFormat: "yy-mm-dd",
        uiLibrary: 'bootstrap4'
      });
    });


    $("#ok1").on('click', function() {
      var awal = $("#dari1").val();
      var ahir = $("#sampai1").val();
      if (awal != "" && ahir != "") {} else {
        alert("harap masukan tanggal laporan")
        return false;
      }
      $('#dlsn').show();

      $("#periode").val(awal + " sampai " + ahir);


      $.ajax({
        url: "<?php echo base_url(); ?>laporan/total",
        method: "post",
        data: {
          awal: awal,
          ahir: ahir
        },
        dataType: "json",
        success: function(data) {
          $("#tsetora").val(data.totalsetor);
          $("#tsaldoa").val(data.totalsaldo);
          $("#ttarika").val(data.totaltarik);
        }
      });

      $('#lpsn').DataTable({
        destroy: true,
        paging: false,
        searching: false,
        ajax: {
          url: '<?php echo base_url() . 'laporan/tabelsm' ?>',
          type: 'POST',
          data: {
            awal: awal,
            ahir: ahir
          },
        },
        "columns": [{
            data: "no"
          },
          {
            data: "tanggal"
          },
          {
            data: "rekening"
          },
          {
            data: "nama"
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






    });

    $('#printall').on('click', function() {
      printJS(
        'asd', 'html',

      );
    });

    $('#printn').on('click', function() {
      printJS(
        'asda', 'html',

      );

    });


    $('#cr1n').on('click', function() {
      var awal = $("#dari2").val();
      var ahir = $("#sampai2").val();
      var rekening = $("#rek1").val();
      if (awal != "" && ahir != "") {} else {
        alert("harap masukan tanggal laporan")
        return false;
      }
      if (rekening != "") {} else {
        alert("harap masukan no rekening")
        return false;
      }
      $("#periode1").val(awal + " sampai " + ahir);

      $('#dtln').show();

      $.ajax({
        url: "<?php echo base_url(); ?>laporan/totaln",
        method: "post",
        data: {
          awal: awal,
          ahir: ahir,
          rekening: rekening
        },
        dataType: "json",
        success: function(data) {
          $("#tsetora1").val(data.totalsetor);
          $("#tsaldo1").val(data.totalsaldo);
          $("#ttarika1").val(data.totaltarik);
        }
      })
      $.ajax({
        url: "<?php echo base_url(); ?>Datansb/fetch_single_usern",
        method: "POST",
        data: {
          REKENING: rekening
        },
        dataType: "json",
        success: function(data) {
          $("#nnasaba").val(data.NAMA);
          $("#nrekening").val(data.REKENING);
          $("#nalamat").val(data.ALAMAT);
          $('#user_uploaded_image').html(data.user_image);

        }
      });
      $('#tnsn').DataTable({
        destroy: true,
        paging: false,
        searching: false,
        ajax: {
          url: '<?php echo base_url() . 'laporan/tabelsmn' ?>',
          type: 'POST',
          data: {
            awal: awal,
            ahir: ahir,
            rekening: rekening
          },
        },
        "columns": [{
            data: "no"
          },
          {
            data: "tanggal"
          },
          {
            data: "idtr"
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


    });


    $('#tpnasaba').on('click', function() {
      $('#pnasaba').show();
      $('.pilih').hide();

    });

    $('#tlsn').on('click', function() {
      $('#psnasaba').show();
      $('.pilih1').hide();

    });






  });
</script>

</html>