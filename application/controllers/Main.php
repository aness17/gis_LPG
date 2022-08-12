<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        if (!$this->session->userdata("id")) {
            redirect('welcome', 'refresh');
        }
    }

    public function index()
    {
        $this->load->view('assets/atas');
        $this->load->view('assets/index');
        $this->load->view('assets/bawah');
    }

    public function sebaran()
    {
        $this->load->view('assets/atas');
        $this->load->view('assets/sebaran');
        $this->load->view('assets/bawah');
    }

    public function kontak()
    {
        $this->load->view('assets/atas');
        $this->load->view('assets/kontak');
        $this->load->view('assets/bawah');
    }
    public function editagen($id = '')
    {
        $data['id'] = $id;
        $this->load->view('assets/atas');
        $this->load->view('assets/editagen', $data);
        $this->load->view('assets/bawah');
    }


    public function addagen()
    {
        $this->load->view('assets/atas');
        $this->load->view('assets/addagen');
        $this->load->view('assets/bawah');
    }

    public function saveagen()
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']  = '2000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload("gambar")) { //upload file
            $gbr = $this->upload->data();
            $config['image_library']    = 'gd2';
            $config['source_image']     = './image/' . $gbr['file_name'];
            $config['create_thumb']     = FALSE;
            $config['maintain_ratio']   = TRUE;
            $config['quality']          = '80%';
            $config['width']            = 1024;
            $config['height']           = 768;
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $lat = $_POST['lat'];
            $lng = $_POST['lng'];
            $a = $_POST['a'];
            $b = $_POST['b'];
            $c = $_POST['c'];
            $d = $_POST['d'];
            $f = $_POST['f'];
            $g = $_POST['g'];
            $h = $_POST['h'];
            $i = $_POST['i'];
            $k = $_POST['k'];
            $gambar = $gbr['file_name'];
            $this->db->query("insert into agen values('','$a','$b','$c','$d','$lat,$lng','$f','$g','$h','$i','$gambar','$k')");
            $this->session->set_flashdata('msg', 'success');
            redirect('main/agen');
        } else {
            $this->session->set_flashdata('msg', 'error');
            redirect('main/agen');
        }
    }

    public function hapusagen($id = '')
    {
        $q = $this->db->query("select * from agen where id='$id'");
        $row  = $q->row();
        unlink('./image/' . $row->j);
        $this->db->query("delete from agen where id='$id'");
        $this->session->set_flashdata('msg', 'hapus');
        redirect('main/agen', 'refresh');
    }


    public function updateagen($id = '')
    {
        $config['upload_path'] = './image/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size']  = '3000';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        if (!empty($_FILES['gambar']['name'])) {
            if (!$this->upload->do_upload('gambar')) {
                echo false;
            } else {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library']    = 'gd2';
                $config['source_image']     = './image/' . $gbr['file_name'];
                $config['create_thumb']     = TRUE;
                $config['maintain_ratio']   = TRUE;
                $config['quality']          = '50%';
                $config['width']            = 256;
                $config['height']           = 256;
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                $lat = $_POST['lat'];
                $lng = $_POST['lng'];
                $a = $_POST['a'];
                $b = $_POST['b'];
                $c = $_POST['c'];
                $d = $_POST['d'];
                // $e = $_POST['e'];
                $f = $_POST['f'];
                $g = $_POST['g'];
                $h = $_POST['h'];
                $i = $_POST['i'];
                $k = $_POST['k'];
                // $gambar = $gbr['file_name'];
                $gambar = $gbr['file_name'];
                $q  = $this->db->query("select * from agen where id='$id'");
                $row = $q->row();
                unlink('./image/' . $row->j);
                $this->db->query("UPDATE agen SET a='$a',b='$b',c='$c',d='$d',e='$lat,$lng',f='$f',g='$g',h='$h',i='$i',j='$gambar',k='$k'  WHERE id='$id'");
                $this->session->set_flashdata('msg', 'edit');
                redirect('main/agen');
            }
        } else {
            $lat = $_POST['lat'];
            $lng = $_POST['lng'];
            $a = $_POST['a'];
            $b = $_POST['b'];
            $c = $_POST['c'];
            $d = $_POST['d'];
            // $e = $_POST['e'];
            $f = $_POST['f'];
            $g = $_POST['g'];
            $h = $_POST['h'];
            $i = $_POST['i'];
            $k = $_POST['k'];
            // $gambar = $gbr['file_name'];
            $this->db->query("UPDATE agen SET a='$a',b='$b',c='$c',d='$d',e='$lat,$lng',f='$f',g='$g',h='$h',i='$i',k='$k'  WHERE id='$id'");
            $this->session->set_flashdata('msg', 'edit');
            redirect('main/agen');
        }
    }


    public function hpskontak($id = '')
    {
        $this->db->query("delete from kontak where id='$id'");
        $this->session->set_flashdata('msg', 'hapus');
        redirect("main/kontak");
    }


    public function agen()
    {
        $this->load->view('assets/atas');
        $this->load->view('assets/agen');
        $this->load->view('assets/bawah');
    }
}

/* End of file Main.php */
