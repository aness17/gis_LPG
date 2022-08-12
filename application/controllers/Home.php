<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('main_model');
    }

    public function index()
    {
        $this->load->view('frontend/atas');
        $this->load->view('frontend/index');
        $this->load->view('frontend/bawah');
    }
    public function sebaran()
    {
        $this->load->view('frontend/atas');
        $this->load->view('frontend/sebaran');
        $this->load->view('frontend/bawah');
    }

    public function pencarian()
    {
        $q = $this->db->query("Select DISTINCT(d) as kecamatan from agen")->result();
        $data['kecamatan'] = $q;
        $data['filterkecamatan'] = "";
        if ($_POST) {
            $hasilFilter = $this->db->query("select * from agen where  d='" . $_POST['kec'] . "' and  g='" . $_POST['jam'] . "'")->result();
            $data['filter'] = $hasilFilter;
            $data['filterkecamatan'] = $_POST['jam'];
        }
        $this->load->view('frontend/atas');
        $this->load->view('frontend/pencarian', $data);
        $this->load->view('frontend/bawah');
    }
    public function kontak()
    {
        $this->load->view('frontend/atas');
        $this->load->view('frontend/kontak');
        $this->load->view('frontend/bawah');
    }

    // public function kecamatan()
    // {
    //     $q = $this->db->query("Select DISTINCT(d) as kecamatan from agen")->result();
    //     $data['kecamatan'] = $q;
    //     $data['filterkecamatan'] = "";
    //     if ($_POST) {
    //         $hasilFilter = $this->db->query("select * from agen where  d='" . $_POST['kec'] . "' and i='" . $_POST['filterkecamatan'] . "'")->result();
    //         $data['filter'] = $hasilFilter;
    //         $data['filterkecamatan'] = $_POST['filterkecamatan'];
    //     }
    //     $this->load->view('frontend/atas');
    //     $this->load->view('frontend/kecamatan', $data);
    //     $this->load->view('frontend/bawah');
    // }

    public function kecamatan()
    {
        // $q = $this->db->query("Select DISTINCT(d) as kecamatan from agen")->result();
        // $data['kecamatan'] = $q;
        // $data['filterkecamatan'] = "";
        $data=null;
        if ($_POST) {
            // $hasilFilter = $this->db->query("select * from agen where  d='" . $_POST['kec'] . "' and i='" . $_POST['filterkecamatan'] . "'")->result();
            $hasilFilter = $this->filterResult($_POST['filterKec'], $_POST['filterJam'], $_POST['filterHarga'], $_POST['filterUkuran']);
            $data['filter'] = $hasilFilter;
            // $data['filterkecamatan'] = $_POST['filterkecamatan'];
        }
        $this->load->view('frontend/atas');
        $this->load->view('frontend/kecamatan', $data);
        $this->load->view('frontend/bawah');
    }

    public function harga()
    {
        $q = $this->db->query("select DISTINCT(f) as harga, h as ukuran from agen")->result();
        $data['harga'] = $q;
        $data['filterHarga'] = "";
        if ($_POST) {
            // $filter["harga"] = $_POST['harga'];
            // $filter["ukuran"] = $_POST['ukuran'];
            $hasilFilter = $this->db->query("select * from agen where f='" . $_POST['harga'] . "' and h='" . $_POST['ukuran'] . "'")->result();
            $data['filter'] = $hasilFilter;
            $data['filterHarga'] = $_POST['filterHarga'];
        }
        $this->load->view('frontend/atas');
        $this->load->view('frontend/harga', $data);
        $this->load->view('frontend/bawah');
    }

    public function jam()
    {
        $q = $this->db->query("Select DISTINCT(g) as jam from agen")->result();
        $data['jam'] = $q;
        $data['filterjam'] = "";
        if ($_POST) {
            $hasilFilter = $this->db->query("select * from agen where g='" . $_POST['jam'] . "'")->result();
            $data['filter'] = $hasilFilter;
            $data['filterjam'] = $_POST['filterjam'];
        }
        $this->load->view('frontend/atas');
        $this->load->view('frontend/jam', $data);
        $this->load->view('frontend/bawah');
    }

    public function detail($id = '')
    {
        $data['id'] = $id;
        $this->load->view('frontend/atas');
        $this->load->view('frontend/detail', $data);
        $this->load->view('frontend/bawah');
    }

    public function send()
    {
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $pesan = $_POST['pesan'];
        $this->db->query("insert into kontak values('','$nama','$telp','$pesan')");
        $this->session->set_flashdata('msg', 'send');
        redirect('home/kontak', 'refresh');
    }

    public function filterResult($kec,$jam,$harga,$ukuran){
        $filter[0] = ($kec != null ? "d='$kec'": null);
        $filter[1] = ($jam != null ? "g='$jam'":null) ;
        $filter[2] = ($harga != null ? "f='$harga'":null) ;
        $filter[3] = ($ukuran != null ? "h='$ukuran'":null) ;

        $a=array();
        for ($i=0; $i < 4 ; $i++) {
            if ($filter[$i] != null) {
                array_push($a,$filter[$i]);
            }
        }

        $query = 'select * from agen where ';
        for ($i=0; $i < count($a); $i++) { 
            if ($i==0) {
               $query .= $a[$i];
            } else {
               $query .= " AND " .$a[$i];
            }
        }
        $data = $this->db->query($query)->result();
        return $data;
    }

    public function filterCategory($kec,$jam,$harga,$ukuran){
        $filter[0] = ($kec != null ? "d='$kec'": null);
        $filter[1] = ($jam != null ? "g='$jam'":null) ;
        $filter[2] = ($harga != null ? "f='$harga'":null) ;
        $filter[3] = ($ukuran != null ? "h='$ukuran'":null) ;

        $a=array();
        for ($i=0; $i < 4 ; $i++) {
            if ($filter[$i] != null) {
                array_push($a,$filter[$i]);
            }
        }

        $query = 'select * from agen where ';
        for ($i=0; $i < count($a); $i++) { 
            if ($i==0) {
               $query .= $a[$i];
            } else {
               $query .= " AND " .$a[$i];
            }
        }
        $data = $this->db->query($query)->result();
        return $data;
    }

    public function filter(){
        $kec = $this->input->post('kec', TRUE);
        $jam = $this->input->post('jam', TRUE);;
        $harga = $this->input->post('ukuran', TRUE);;
        $ukuran = $this->input->post('harga', TRUE);;
        $data = $this->filterResult($kec, $jam, $harga, $ukuran);
        echo json_encode($data);
    }

    public function getJamByKec()
    {
        $id = $this->input->post('id', TRUE);
        $data = $this->db->query("select * from agen where d='$id'")->result();
        echo json_encode($data);
    }
    
    public function getUkuranByJam()
    {
        $id = $this->input->post('id', TRUE);
        $data = $this->db->query("select * from agen where d='$id' ")->result();
        echo json_encode($data);
    }

    public function getUkuranByUkuran()
    {
        $id = $this->input->post('idukuran', TRUE);
        $data = $this->db->query("select * from agen where h='$id' ")->result();
        echo json_encode($data);
    }

    public function cekjam()
    {
        $id = $this->input->post('id', TRUE);
        $data = $this->db->query("select * from agen where d='$id' group by g")->result();
        echo json_encode($data);
    }

    public function cek()
    {
        $modul = $this->input->post('modul');
        $id = $this->input->post('id');
        if ($modul == "ukuran") {
            echo $this->main_model->ukuran($id);
        } else if ($modul == "harga") {
            echo $this->main_model->harga($id);
        } else if ($modul == "jam") {
            echo $this->main_model->jam($id);
        }
    }
}

/* End of file Home.php */
