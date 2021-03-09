<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Datansb_model extends CI_Model
{

  var $table = "akun";
  var $select_column = array("GAMBAR", "REKENING", "NAMA", "ALAMAT", "SALDO");
  var $order_column = array(null, "REKENING", "NAMA", null, "SALDO",);
  function make_query()
  {
    $this->db->select($this->select_column);
    $this->db->from($this->table);
    if (isset($_POST["search"]["value"])) {
      $this->db->like("REKENING", $_POST["search"]["value"]);
      $this->db->or_like("NAMA", $_POST["search"]["value"]);
      $this->db->or_like("ALAMAT", $_POST["search"]["value"]);
      $this->db->or_like("SALDO", $_POST["search"]["value"]);
    }
    if (isset($_POST["order"])) {
      $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
    } else {
      $this->db->order_by('NAMA', 'ASC');
    }
  }



  function make_datatables()
  {
    $this->make_query();
    if ($_POST["length"] != -1) {
      $this->db->limit($_POST['length'], $_POST['start']);
    }
    $query = $this->db->get();
    return $query->result();
  }

  function get_filtered_data()
  {
    $this->make_query();
    $query = $this->db->get();
    return $query->num_rows();
  }
  function get_all_data()
  {
    $this->db->select("*");
    $this->db->from($this->table);
    return $this->db->count_all_results();
  }

  function idnsb()
  {

    $db = $this->db->query("SELECT MAX(REKENING)as kode from AKUN");
    $query = $db->result_array()[0];
    $kode = substr($query['kode'], 3, 5);
    $tambah = $kode + 1;
    if ($tambah < 10) {
      $id = "NSB0000" . $tambah;
    } elseif ($tambah >= 10 && $tambah <= 99) {
      $id = "NSB000" . $tambah;
    } elseif ($tambah >= 100 && $tambah <= 999) {
      $id = "NSB00" . $tambah;
    } elseif ($tambah >= 1000 && $tambah <= 9999) {
      $id = "NSB0" . $tambah;
    } elseif ($tambah >= 10000 && $tambah <= 99999) {
      $id = "NSB0" . $tambah;
    }
    return $id;
  }

  function idtr()
  {
    $date = date("Y-m-d");
    $db = $this->db->query("SELECT MAX(IDTR)as kode from transaksi WHERE TANGGAL = '$date'");
    $query = $db->result_array()[0];
    $kode = substr($query['kode'], 10, 5);
    $tambah = $kode + 1;
    if ($tambah < 10) {
      $id = "0000" . $tambah;
    } elseif ($tambah >= 10 && $tambah <= 99) {
      $id = "000" . $tambah;
    } elseif ($tambah >= 100 && $tambah <= 999) {
      $id = "00" . $tambah;
    } elseif ($tambah >= 1000 && $tambah <= 9999) {
      $id = "0" . $tambah;
    } elseif ($tambah >= 10000 && $tambah <= 99999) {
      $id = "" . $tambah;
    }
    $char = "TR";

    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $hari = substr($date, 8, 2);
    $id_Order = $char . $tahun . $bulan . $hari . $id;
    return $id_Order;
  }

  function insert_crud($data)
  {
    $this->db->insert('akun', $data);
  }

  function insert_tr($data)
  {
    $this->db->insert('transaksi', $data);
  }

  function fetch_single_user($REKENING)
  {
    $this->db->where("REKENING", $REKENING);
    $query = $this->db->get('akun');
    return $query->result();
  }
  function update_crud($REKENING, $data)
  {
    $this->db->where("REKENING", $REKENING);
    $this->db->update("akun", $data);
    return $REKENING;
  }
  function gtgambar($REKENING)
  {
    $row = $this->db->where('REKENING', $REKENING)->get('akun')->row();
    unlink('./upload/' . $row->GAMBAR);
  }

  function delete_single_user($REKENING)
  {
    $row = $this->db->where('REKENING', $REKENING)->get('akun')->row();
    unlink('./upload/' . $row->GAMBAR);
    $this->db->where("REKENING", $REKENING);
    $this->db->delete("akun");
    $this->db->where("REKENING", $REKENING);
    $this->db->delete("transaksi");
  }

  function tablensb($REKENING)
  {
    $this->db->where("REKENING", $REKENING);
    $query = $this->db->get('transaksi');



    return $query->result();
  }

  function pass($REKENING)
  {

    $this->db->where("REKENING", $REKENING);
    $query = $this->db->get('akun');
    return $query->result();
  }
  function totalsaldo()
  {
    $this->db->select_sum('SALDO');
    $query1 = $this->db->get('akun')->row_array();
    return $query1['SALDO'];
  }

  function totalsetor($data)
  {
    $awal = $data['awal'];
    $ahir = $data['ahir'];
    $query = $this->db->query("SELECT JENIS, SUM(JUMLAH) as TOTAL
                FROM transaksi
                WHERE JENIS = 'Setor'
                AND (TANGGAL BETWEEN '$awal' AND  '$ahir' )")->row_array();
    return $query["TOTAL"];
  }
  function totaltarik($data)
  {
    $awal = $data['awal'];
    $ahir = $data['ahir'];
    $query = $this->db->query("SELECT JENIS, SUM(JUMLAH) as TOTAL
                FROM transaksi
                WHERE JENIS = 'Tarik'
                AND (TANGGAL BETWEEN '$awal' AND  '$ahir' )")->row_array();
    return $query["TOTAL"];
  }

  function tablesm($data)
  {
    $awal = $data['awal'];
    $ahir = $data['ahir'];
    $query = $this->db->query(
      "SELECT TANGGAL, REKENING, NAMA, JENIS, JUMLAH, KETERANGAN
     FROM akun
     JOIN transaksi USING (REKENING)
     WHERE (TANGGAL BETWEEN '$awal' AND  '$ahir' )"
    );

    return $query->result();
  }

  function totalsetorn($data)
  {
    $awal     = $data['awal'];
    $ahir     = $data['ahir'];
    $rekening = $data['rekening'];
    $query = $this->db->query("SELECT JENIS, SUM(JUMLAH) as TOTAL
                FROM transaksi
                WHERE JENIS = 'Setor'
                AND REKENING = '$rekening'
                AND (TANGGAL BETWEEN '$awal' AND  '$ahir' )")->row_array();
    return $query["TOTAL"];
  }

  function totaltarikn($data)
  {
    $awal     = $data['awal'];
    $ahir     = $data['ahir'];
    $rekening = $data['rekening'];
    $query = $this->db->query("SELECT JENIS, SUM(JUMLAH) as TOTAL
                FROM transaksi
                WHERE JENIS = 'Tarik'
                AND REKENING = '$rekening'
                AND (TANGGAL BETWEEN '$awal' AND  '$ahir' )")->row_array();
    return $query["TOTAL"];
  }

  function tablesmn($data)
  {
    $awal = $data['awal'];
    $ahir = $data['ahir'];
    $rekening = $data['rekening'];
    $query = $this->db->query(
      "SELECT TANGGAL, REKENING, NAMA, JENIS, JUMLAH, IDTR, KETERANGAN
     FROM akun
     JOIN transaksi USING (REKENING)
     WHERE REKENING = '$rekening'
     AND (TANGGAL BETWEEN '$awal' AND  '$ahir' )"
    );

    return $query->result();
  }

  function jnsb()
  {
    $query = $this->db->query(
      "SELECT Count(NAMA) as jnsb
                              FROM akun"
    )->row_array();
    return $query["jnsb"];
  }
  function tsaldon()
  {
    $query = $this->db->query("SELECT SUM(SALDO) as tsaldo
                FROM akun")->row_array();
    return $query["tsaldo"];
  }
  function ttariknsb()
  {
    $tanggal = date("Y-m-d");
    $query = $this->db->query("SELECT SUM(JUMLAH) AS TOTAL
                                FROM transaksi
                                WHERE JENIS = 'tarik' 
                                AND TANGGAL = '$tanggal' ")->row_array();
    return $query["TOTAL"];
  }
  function tsetornsb()
  {
    $tanggal = date("Y-m-d");
    $query = $this->db->query("SELECT SUM(JUMLAH) AS TOTAL
                                FROM transaksi
                                WHERE JENIS = 'setor'
                                AND TANGGAL = '$tanggal'")->row_array();
    return $query["TOTAL"];
  }

  function can_login($username, $password)
  {
    $this->db->where('username', $username);
    $this->db->where('password', $password);
    $query = $this->db->get('admin');
    //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
    if ($query->num_rows() > 0) {
      return true;
    } else {
      return false;
    }
  }

  function chartambil()
  {
    $query =  $this->db->query(" SELECT `TANGGAL`, SUM(JUMLAH) as  TOTAL
                                  FROM `transaksi` 
                                  WHERE JENIS = 'setor' 
                                  GROUP BY `TANGGAL` 
                                  LIMIT 30 ");
    return $query->result_array();
  }

  function cekrekap()
  {
    $tanggal = date("Y-m-d");
    $query =  $this->db->query(" SELECT *
                                  FROM `laporan` 
                                  WHERE tanggal = '$tanggal' 
                                ")->row_array();
    return $query;
  }

  function sawal($data)
  {

    $this->db->insert('laporan', $data);
  }
  function usawal($data)
  {
    $tanggal = date("Y-m-d");
    $this->db->where("tanggal", $tanggal);
    $this->db->update("laporan", $data);
  }


  function stambah($data)
  {
    $this->db->insert('laporan', $data);
  }

  function ustambah($data)
  {
    $tanggal = date("Y-m-d");
    $this->db->where("tanggal", $tanggal);
    $this->db->update("laporan", $data);
  }

  function irekap($data)
  {
    $this->db->insert('laporan', $data);
  }

  function urekap($data)
  {
    $tanggal = date("Y-m-d");
    $this->db->where("tanggal", $tanggal);
    $this->db->update("laporan", $data);
  }

  function stambahj($data)
  {
    $this->db->insert('jurnal', $data);
  }

  function iuangyd($data)
  {
    $this->db->insert('laporan', $data);
  }

  function uuangyd($data)
  {
    $tanggal = date("Y-m-d");
    $this->db->where("tanggal", $tanggal);
    $this->db->update("laporan", $data);
  }
	
	function exceln()
  {
    $this->db->select('
    akun.NAMA,
    akun.ALAMAT,
    ');
    $this->db->select('SUM(IF(JENIS = "Setor", JUMLAH, 0)) - SUM(IF(JENIS = "Tarik", JUMLAH, 0)) as "SALDO"');
    $this->db->from('akun');
    $this->db->join('transaksi', 'transaksi.REKENING = akun.REKENING');
    $this->db->group_by('NAMA');
    $query = $this->db->get();
    return $query->result();
  }
	
	
}
