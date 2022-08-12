<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function index()
    {
        $getKecamatan=$this->db->query("select * from agen");
        foreach ($getKecamatan->result() as $row) {
            $data=null;
            $data['id']=$row->id;
            $data['kecamatan']=$row->d;
            $data['loc']=$row->e;
            $response[]=$data;
        }
        echo "var dataKecamatan=".json_encode($response,JSON_PRETTY_PRINT);
    }

}

/* End of file Api.php */
