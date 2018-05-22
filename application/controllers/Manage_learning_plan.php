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
class Manage_learning_plan extends CI_Controller {

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
        $data['lplist'] = json_decode($this->curl->simple_get($this->API.'learning_plan'));
        
        /*- define reference assets -*/
        $data['assets']=$this->assets;
        $data['title']= 'Manage Learning Plan';
        
        /*- define reference section view -*/
		$data['head']=$this->load->view('template/head',$data, true);
        $data['menu_profile']=$this->load->view('template/menu_profile',$data, true);
        $data['container']=$this->load->view('content/learning-management/manage-learning-plan-home',$data, true);
        $data['content_sidebar']=$this->load->view('template/content-sidebar',$data, true);
        $data['top_navigation']=$this->load->view('template/top_navigation',$data, true);
        $data['foot']=$this->load->view('template/foot',$data, true);
        
		$this->load->view('template/index',$data);
	}
    public function detail($kodelp)
	{
        /*- manage data throw -*/
        $data['lplist'] = json_decode($this->curl->simple_get($this->API.'learning_plan?kode_lp='.$kodelp));
        
        /*- define reference assets -*/
        $data['assets']=$this->assets;
        $data['title']= 'Detail Learning Plan';
        
        /*- define reference section view -*/
		$data['head']=$this->load->view('template/head',$data, true);
        $data['menu_profile']=$this->load->view('template/menu_profile',$data, true);
        $data['container']=$this->load->view('content/learning-management/manage-learning-plan-home',$data, true);
        $data['content_sidebar']=$this->load->view('template/content-sidebar',$data, true);
        $data['top_navigation']=$this->load->view('template/top_navigation',$data, true);
        $data['foot']=$this->load->view('template/foot',$data, true);
        
		$this->load->view('template/index',$data);
	}
    public function add()
	{
        /*- manage data throw -*/
        $data['diklat']                 = json_decode($this->curl->simple_get($this->API.'diklat'));
        $data['akademi']                = json_decode($this->curl->simple_get($this->API.'akademi'));
        $data['performance_issue']      = json_decode($this->curl->simple_get($this->API.'performance_issue'));
        $data['competence_issue']       = json_decode($this->curl->simple_get($this->API.'competence_issue'));
        $data['strategic_innitiative']  = json_decode($this->curl->simple_get($this->API.'strategic_innitiative'));
        $data['business_issue']         = json_decode($this->curl->simple_get($this->API.'business_issue'));
        $data['tempat']                 = json_decode($this->curl->simple_get($this->API.'tempat'));
        
        
        /*- define reference assets -*/
        $data['assets']=$this->assets;
        $data['title']= 'Add Learning Plan';
        
        /*- define reference section view -*/
		$data['head']=$this->load->view('template/head',$data, true);
        $data['menu_profile']=$this->load->view('template/menu_profile',$data, true);
        $data['container']=$this->load->view('content/learning-management/manage-learning-plan-add',$data, true);
        $data['content_sidebar']=$this->load->view('template/content-sidebar',$data, true);
        $data['top_navigation']=$this->load->view('template/top_navigation',$data, true);
        $data['foot']=$this->load->view('template/foot',$data, true);
        
		$this->load->view('template/index',$data);
	}
    public function update($kodelp)
	{
        /*- manage data throw -*/
        $data['diklat']                 = json_decode($this->curl->simple_get($this->API.'diklat'));
        $data['akademi']                = json_decode($this->curl->simple_get($this->API.'akademi'));
        $data['performance_issue']      = json_decode($this->curl->simple_get($this->API.'performance_issue'));
        $data['competence_issue']       = json_decode($this->curl->simple_get($this->API.'competence_issue'));
        $data['strategic_innitiative']  = json_decode($this->curl->simple_get($this->API.'strategic_innitiative'));
        $data['business_issue']         = json_decode($this->curl->simple_get($this->API.'business_issue'));
        $data['tempat']                 = json_decode($this->curl->simple_get($this->API.'tempat'));
        $data['lplist']                 = json_decode($this->curl->simple_get($this->API.'learning_plan?kode_lp='.$kodelp));
        
        
        /*- define reference assets -*/
        $data['assets']=$this->assets;
        $data['title']= 'Add Learning Plan';
        
        /*- define reference section view -*/
		$data['head']=$this->load->view('template/head',$data, true);
        $data['menu_profile']=$this->load->view('template/menu_profile',$data, true);
        $data['container']=$this->load->view('content/learning-management/manage-learning-plan-update',$data, true);
        $data['content_sidebar']=$this->load->view('template/content-sidebar',$data, true);
        $data['top_navigation']=$this->load->view('template/top_navigation',$data, true);
        $data['foot']=$this->load->view('template/foot',$data, true);
        
		$this->load->view('template/index',$data);
	}
    public function post(){
        if(isset($_POST['submit'])){
            $data = array(
                'kode_lp'           =>  $this->input->post('kode_lp'),
                'kode_diklat'       =>  $this->input->post('diklat'),
                'kode_akademi'      =>  $this->input->post('akademi'),
                'kode_pi'           =>  $this->input->post('performance_issue'),
                'kode_si'           =>  $this->input->post('strategic_innitiative'),
                'kode_bi'           =>  $this->input->post('business_issue'),
                'kode_ci'           =>  $this->input->post('competence_issue'),
                'tgl_mulai'         =>  $this->input->post('tgl_mulai'),
                'tgl_selesai'       =>  $this->input->post('tgl_selesai'),
                'tahun'             =>  $this->input->post('tahun'),
                'tempat'            =>  $this->input->post('tempat'),
                'total_anggaran'    =>  $this->input->post('total_anggaran'));
            $insert =  $this->curl->simple_post($this->API.'/learning_plan', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
//                $this->session->set_flashdata('hasil','Insert Data Berhasil');
                redirect(base_url().'/learning-management/manage-learning-plan');
            }else
            {
//               $this->session->set_flashdata('hasil','Insert Data Gagal');
                echo'<script>alert("Gagal menambahkan learning plan'.error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE).'");
                window.location="'.base_url().'/learning-management/manage-learning-plan/add";
                </script>';
            }
//            redirect('mahasiswa');
        }
    }
    public function put(){
        if(isset($_POST['update'])){
            $data = array(
                'kode_lp'           =>  $this->input->post('kode_lp'),
                'kode_diklat'       =>  $this->input->post('diklat'),
                'kode_akademi'      =>  $this->input->post('akademi'),
                'kode_pi'           =>  $this->input->post('performance_issue'),
                'kode_si'           =>  $this->input->post('strategic_innitiative'),
                'kode_bi'           =>  $this->input->post('business_issue'),
                'kode_ci'           =>  $this->input->post('competence_issue'),
                'tgl_mulai'         =>  $this->input->post('tgl_mulai'),
                'tgl_selesai'       =>  $this->input->post('tgl_selesai'),
                'tahun'             =>  $this->input->post('tahun'),
                'tempat'            =>  $this->input->post('tempat'),
                'total_anggaran'    =>  $this->input->post('total_anggaran'));
            $update =  $this->curl->simple_put($this->API.'/learning_plan', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
//                $this->session->set_flashdata('hasil','Insert Data Berhasil');
                redirect(base_url().'/learning-management/manage-learning-plan');
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
