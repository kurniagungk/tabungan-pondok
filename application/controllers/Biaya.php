<?php


class Biaya extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();


        $this->load->model('Datansb_model');
    }

    public function mulai()
    {
        $this->hapus();
        $this->biaya();
    }

    public function hapus()
    {
        $nasabah = $this->Datansb_model->getAllNasabahHapus();
        if (!empty($nasabah))
            foreach ($nasabah as $data) {
                $this->Datansb_model->delete_single_user($data->REKENING);
            }
    }


    public function biaya()
    {
        $tanggal = (int) date("d");
        $biaya_tanggal = $this->Datansb_model->getSetting('biaya_tanggal');
        $biaya_jumlah = $this->Datansb_model->getSetting('biaya_jumlah');



        if ($tanggal == (int) $biaya_tanggal[0]->isi) {


            $biaya = $this->Datansb_model->biayaHistori();

            if (empty($biaya)) {



                $nasabah = $this->Datansb_model->getAllNasabah();

                $this->db->trans_begin();

                $biaya = 0;

                foreach ($nasabah as $data) {

                    if ($data->SALDO <= 0) {
                        $this->Datansb_model->delete_single_user($data->REKENING);
                    } else {
                        $idnsb = $this->Datansb_model->idtr();
                        $transaksi = array(
                            'TANGGAL'       =>  date("Y-m-d"),
                            'IDTR'             => $idnsb,
                            'JUMLAH'         => $biaya_jumlah[0]->isi,
                            'JENIS'            => "Tarik",
                            'REKENING'         => $data->REKENING,
                            'KETERANGAN'         => "Biaya Admin",
                        );
                        $this->Datansb_model->insert_tr($transaksi);
                        $user = array('SALDO' => $data->SALDO - $biaya_jumlah[0]->isi);
                        $this->Datansb_model->update_crud($data->REKENING, $user);
                        $biaya +=  $biaya_jumlah[0]->isi;
                    }
                }


                if ($this->db->trans_status() === FALSE) {
                    echo "gagal";
                    $this->db->trans_rollback();
                } else {

                    $insert_data = array(
                        'tanggal'          =>     date("Y-m-d"),
                        'jumlah'          =>    $biaya,
                    );

                    $this->Datansb_model->biaya($insert_data);
                    $this->db->trans_commit();
                    echo "berhasil";
                }
            } else
                echo "Biaya Admin Sudah Diambil";
        } else echo "belum Waktunya";
    }
}
