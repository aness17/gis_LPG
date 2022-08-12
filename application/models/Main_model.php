<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model {

    function ukuran($id){
        $ukuran="<option value='0'>--pilih--</pilih>";

        $ukuran= $this->db->get_where('agen',array('d'=>$id));
        
        foreach ($ukuran->result_array() as $data ){
        $ukuran.= "<option value='$data[h]'>$data[h]</option>";
        }
    }
    function harga($id){
        $harga="<option value='0'>--pilih--</pilih>";

        $harga= $this->db->get_where('agen',array('h'=>$id));
        
        foreach ($harga->result_array() as $data ){
        $harga.= "<option value='$data[f]'>$data[f]</option>";
        }
    }
    function jam($id){
        $harga="<option value='0'>--pilih--</pilih>";
        $jam= $this->db->get_where('agen',array('f'=>$id));
        foreach ($jam->result_array() as $data ){
        $harga.= "<option value='$data[g]'>$data[g]</option>";
        }
    }

}

/* End of file Main_model.php */
