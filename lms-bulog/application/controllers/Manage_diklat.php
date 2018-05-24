<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin
 *
 * @author NVM Team Creative
 */
class Manage_diklat extends CI_Controller {

    var $assets;
    var $API ="";
	
	public function __construct()

	{
		parent::__construct();
        
        //{{host}}
        $this->API="https://api-bulog.sobatteknologi.xyz/";
        
        /*- load library -*/
//		$this->load->library('template');
        $this->load->library('session');
        $this->load->library('curl');
        
        /*- load helper -*/
		$this->load->helper('form');
        $this->load->helper('url');
        
        /*- load template assets -*/
		$this->assets     = base_url().'assets/';        
	}
	public function index()
	{
        /*- manage data throw -*/
        $data['diklatlist'] = json_decode($this->curl->simple_get($this->API.'diklat'));
        
        /*- define reference assets -*/
        $data['assets']=$this->assets;
        $data['title']= 'Manage Diklat';
        
        /*- define reference section view -*/
		$data['head']=$this->load->view('template/head',$data, true);
        $data['menu_profile']=$this->load->view('template/menu_profile',$data, true);
        $data['container']=$this->load->view('content/learning-management/manage-diklat-home',$data, true);
        $data['content_sidebar']=$this->load->view('template/content-sidebar',$data, true);
        $data['top_navigation']=$this->load->view('template/top_navigation',$data, true);
        $data['foot']=$this->load->view('template/foot',$data, true);
        
		$this->load->view('template/index',$data);
	}
    public function detail($kodediklat)
	{
        /*- manage data throw -*/
        $data['diklatlist'] = json_decode($this->curl->simple_get($this->API.'diklat?kode_diklat='.$kodediklat));
        
        /*- define reference assets -*/
        $data['assets']=$this->assets;
        $data['title']= 'Manage Diklat';
        
        /*- define reference section view -*/
		$data['head']=$this->load->view('template/head',$data, true);
        $data['menu_profile']=$this->load->view('template/menu_profile',$data, true);
        $data['container']=$this->load->view('content/learning-management/manage-diklat-home',$data, true);
        $data['content_sidebar']=$this->load->view('template/content-sidebar',$data, true);
        $data['top_navigation']=$this->load->view('template/top_navigation',$data, true);
        $data['foot']=$this->load->view('template/foot',$data, true);
        
		$this->load->view('template/index',$data);
	}
    public function add()
	{
        /*- manage data throw -*/
        $data['kompetensi'] = json_decode($this->curl->simple_get($this->API.'kompetensi'));
        
        
        /*- define reference assets -*/
        $data['assets']=$this->assets;
        $data['title']= 'Add New Diklat';
        
        /*- define reference section view -*/
		$data['head']=$this->load->view('template/head',$data, true);
        $data['menu_profile']=$this->load->view('template/menu_profile',$data, true);
        $data['container']=$this->load->view('content/learning-management/manage-diklat-add',$data, true);
        $data['content_sidebar']=$this->load->view('template/content-sidebar',$data, true);
        $data['top_navigation']=$this->load->view('template/top_navigation',$data, true);
        $data['foot']=$this->load->view('template/foot',$data, true);
        
		$this->load->view('template/index',$data);
	}
    public function update($kode_diklat)
	{
        /*- manage data throw -*/
        $data['diklat']                 = json_decode($this->curl->simple_get($this->API.'diklat?kode_diklat='.$kode_diklat));
        $data['kompetensi']             = json_decode($this->curl->simple_get($this->API.'kompetensi'));
        
        /*- define reference assets -*/
        $data['assets']=$this->assets;
        $data['title']= 'Update Diklat';
        
        /*- define reference section view -*/
		$data['head']=$this->load->view('template/head',$data, true);
        $data['menu_profile']=$this->load->view('template/menu_profile',$data, true);
        $data['container']=$this->load->view('content/learning-management/manage-diklat-update',$data, true);
        $data['content_sidebar']=$this->load->view('template/content-sidebar',$data, true);
        $data['top_navigation']=$this->load->view('template/top_navigation',$data, true);
        $data['foot']=$this->load->view('template/foot',$data, true);
        
		$this->load->view('template/index',$data);
	}
    public function post(){
        if(isset($_POST['submit'])){
            $data = array(
                'kode_diklat'       =>  $this->input->post('kode_diklat'),
                'kode_kompetensi'   =>  $this->input->post('kompetensi'),
                'nama_diklat'       =>  $this->input->post('nama_diklat'),
                'materi'            =>  $this->input->post('materi'),
                'master_plan'       =>  $this->input->post('master_plan'),
                'tujuan'            =>  $this->input->post('tujuan'));
            $insert =  $this->curl->simple_post($this->API.'/diklat', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
//                $this->session->set_flashdata('hasil','Insert Data Berhasil');
                redirect(base_url().'/learning-management/manage-diklat');
            }else
            {
//               $this->session->set_flashdata('hasil','Insert Data Gagal');
                echo'<script>alert("Gagal menambahkan diiklat'.error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE).'");
                window.location="'.base_url().'/learning-management/manage-diklat/add-diklat";
                </script>';
            }
//            redirect('mahasiswa');
        }
    }
    public function put(){
        if(isset($_POST['update'])){
            $data = array(
                'kode_diklat'       =>  $this->input->post('kode_diklat'),
                'kode_kompetensi'   =>  $this->input->post('kompetensi'),
                'nama_diklat'       =>  $this->input->post('nama_diklat'),
                'materi'            =>  $this->input->post('materi'),
                'master_plan'       =>  $this->input->post('master_plan'),
                'tujuan'            =>  $this->input->post('tujuan'));
            $update =  $this->curl->simple_put($this->API.'/diklat', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
//                $this->session->set_flashdata('hasil','Insert Data Berhasil');
                redirect(base_url().'/learning-management/manage-diklat');
            }else
            {
//               $this->session->set_flashdata('hasil','Insert Data Gagal');
                echo'<script>alert("Gagal menambahkan learning plan'.error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE).'");
                window.location="'.base_url().'/learning-management/manage-learning-plan/"'.$this->input->post('kode_lp').'";
                </script>';
            }
//            redirect('mahasiswa');
        }
    }
}
