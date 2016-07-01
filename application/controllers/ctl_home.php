<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ctl_home extends CI_Controller {

 public function __construct()
   {
      parent::__construct();   
      $this->load->model('mdl_memp');
	  $this->load->library('template');
	  $this->load->library('session');
	  // echo($this->session->userdata('id_memp'));
		if($this->session->userdata('id_memp')==""){ 
			redirect('authen/');
		}
	}

	public function index()
	{
		$this->data['tempheader']=$this->template->getHeader();
		$this->data['showuser'] = $this->mdl_memp->showname();
		$this->data['tempfooter']=$this->template->getFooter();
		$this->load->view('home',$this->data);
	}
	public function bootbox()
	{
		$this->load->view('bootbox');
	}
}
