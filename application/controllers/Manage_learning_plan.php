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
}
