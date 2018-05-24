<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Login extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        $this->load->database();
    }

    //Menampilkan data user
    function index_get() {
//        $username = $this->get('username');
//        $password = $this->get('password');
//        if ($username == '' or $password ='') {
//            $user = array('value' => '0','result'=>'username or password invalid');
//        } else {
//            $this->db->where('username', $username);
//            $data = $this->db->get('user')->result();
//            if($data != NULL){
//                $this->db->where('password', $password);
//            $datas = $this->db->get('user')->result();
//            if($datas != NULL){
//            
//            $user = array('value' => '1','result'=>$datas,200);
//            }else{    
//            $user = array('value' => '0',502);
//            }
//            }else{    
//            $user = array('value' => '0',502);
//            }
//        }
//        $this->response($user, 200);
    }
    //Masukan function selanjutnya disini
    function index_post() {
        $email = $this->post('email');
        $password = $this->post('password');
        
        $query = $this->db->query("SELECT * FROM user where email ='$email' and password ='$password'");
        if ($query->num_rows() !=0) {
            $this->response(array('status' => 'success', 'email' => $email));
        } else {
            $this->response(array('status' => 'failed', 502));
        }
    }
    //Memperbarui data user yang telah ada
	function index_put() {
        
    }
    //Menghapus salah satu data user
	function index_delete() {
        
    }
    //Masukan function selanjutnya disini
}
?>