<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Todolist extends CI_Controller 
{
   public $data;
   
   public function __construct()
   {
      parent::__construct();   
      $this->load->model('mdl_memp');
	  $this->load->library('template');
      date_default_timezone_set('Asia/Bangkok');
		if($this->session->userdata('memp_id')==""){
			redirect('authen/');
		}
	}

	public function index()
	{
			$this->data["SCREENID"]     = "TODO LIST";
			$this->data["SCREENNAME"]     = "TODO LIST";
			$this->data["email"]     = $this->session->userdata('email');
			$this->data["date"]=date("d/m/Y");
			$this->data["month"]=date("m");
			$this->data["year"]= date("Y");
			$this->data["memp_id"]   = $this->session->userdata('memp_id');
			$this->data['keyword'] ="";
			$this->data['id_tpro_key'] ='';
			$this->data['id_mprio_key'] ='';
			$this->data['id_msta_key'] ='';
			$this->data['id_year_key'] =date("Y");
			$this->data['id_mon_key'] =date("m");
			$this->data["todolist"] = $this->mdl_memp->getTodoList($this->data["memp_id"],$this->data['keyword'],$this->data['id_tpro_key'],$this->data['id_mprio_key'],$this->data['id_msta_key'],'','',''); 
			$this->data["tpro"]   = $this->mdl_memp->getTpro();
			$this->data["mprio"]   = $this->mdl_memp->getMprio();
			$this->data["msta"]   = $this->mdl_memp->getMsta('2');
			$result = $this->mdl_memp->getListMemp();
			$this->data["memp_list"]   = $result['result'];
			$this->data['header'] = $this->template->getHeader($this->config->item('base_url'),$this->session->userdata('email'),$this->data["SCREENNAME"],$this->data["memp_id"]);
			$this->data['footer'] = $this->template->getFooter();
			$this->load->view('todolist/N001', $this->data);
	}


		public function search()
		{
			$this->data["SCREENID"]     = "TODO LIST";
			$this->data["SCREENNAME"]     = "TODO LIST";
			$this->data["email"]     = $this->session->userdata('email');
			$this->data["date"]=date("d/m/Y");
			$this->data["month"]=date("m");
			$this->data["year"]= date("Y");
			$this->data["memp_id"]   = $this->session->userdata('memp_id');
			$this->data['keyword'] =$this->input->post("keyword"); 
			$this->data['id_tpro_key'] =$this->input->post("id_tpro_key");
			$this->data['id_mprio_key'] =$this->input->post("id_mprio_key");
			$this->data['id_msta_key'] =$this->input->post("id_msta_key");
			$this->data['id_year_key'] =$this->input->post("id_year_key");
			$this->data['id_mon_key'] =$this->input->post("id_mon_key");
			$this->data["todolist"]   = $this->mdl_memp->getTodoList( $this->data["memp_id"],$this->data['keyword'],$this->data['id_tpro_key'],$this->data['id_mprio_key'],$this->data['id_msta_key'],'',$this->data['id_year_key'],$this->data['id_mon_key']); 
			$this->data["tpro"]   = $this->mdl_memp->getTpro();
			$this->data["mprio"]   = $this->mdl_memp->getMprio();
			$this->data["msta"]   = $this->mdl_memp->getMsta('2');
			$result = $this->mdl_memp->getListMemp();
			$this->data["memp_list"]   = $result['result'];
			$this->data['header'] = $this->template->getHeader($this->config->item('base_url'),$this->session->userdata('email'),$this->data["SCREENNAME"],$this->data["memp_id"]);
			$this->data['footer'] = $this->template->getFooter();
			$this->load->view('todolist/N001', $this->data);
		}

		public function change($id)
		{
			$this->data["SCREENID"]     = "Time Sheet";
			$this->data["SCREENNAME"]     = "Time Sheet";
			$this->data["email"]     = $this->session->userdata('email');
			$this->data["id_todo_list"]     = $id;
			$this->data["date"]=date("d/m/Y");
			$this->data["month"]=date("m");
			$this->data["year"]= date("Y");
			$this->data["memp_id"]   = $this->session->userdata('memp_id');
			$this->data['keyword'] =""; 
			$this->data['id_tpro_key'] ='';
			$this->data['id_mprio_key'] ='';
			$this->data['id_msta_key'] ='';
			$this->data['id_year_key'] =date("Y");
			$this->data['id_mon_key'] =date("m");
			$this->data["todolist"]   = $this->mdl_memp->getTodoList( $this->data["memp_id"],$this->data['keyword'],$this->data['id_tpro_key'],$this->data['id_mprio_key'],$this->data['id_msta_key'],'','','');
			$this->data["gettodo"]   = $this->mdl_memp->getTodo($id); 
			$this->data["tpro"]   = $this->mdl_memp->getTpro();
			$this->data["mprio"]   = $this->mdl_memp->getMprio();
			$this->data["msta"]   = $this->mdl_memp->getMsta('2');
			$result = $this->mdl_memp->getListMemp();
			$this->data["memp_list"]   = $result['result'];
			$this->data['header'] = $this->template->getHeader($this->config->item('base_url'),$this->session->userdata('email'),$this->data["SCREENNAME"],$this->data["memp_id"]);
			$this->data['footer'] = $this->template->getFooter();
			$this->load->view('todolist/E001', $this->data);
		}

		public function alert($massage, $url)
		{
			echo "<meta charset='UTF-8'>
					<SCRIPT LANGUAGE='JavaScript'>
					window.alert('$massage')
					window.location.href='".site_url($url)."';
					</SCRIPT>";
		}
		public function convert_date($val_date)
		{
			$date = str_replace('/', '-',$val_date);
			$date = date("Y-m-d", strtotime($date));
			return $date;
		}

		public function getCode($id_memp)
		{
			/*-------------------------------Create TransactionCode-----------------------------------------*/
 				$code_memp=$this->mdl_memp->getMempCode($id_memp);
				$getcode =  $this->mdl_memp->getCodetodolist($id_memp,$code_memp); 
				$getcode =  $this->mdl_memp->getCodetodolist($id_memp,$code_memp);
   				$code_sel2= $getcode[0]. $getcode[1]. $getcode[2]. $getcode[3]. $getcode[4]. $getcode[5]. $getcode[6].$getcode[7]. $getcode[8]. $getcode[9]. $getcode[10];
 				$code_sel3= $getcode[11]. $getcode[12]. $getcode[13]. $getcode[14];		
 						
 							$now = new DateTime(null, new DateTimeZone('Asia/Bangkok'));
							$datetime = $now->format('Y/m');
							$dt="TD".$code_memp.$datetime[2]. $datetime[3]. $datetime[5]. $datetime[6];
																																		
								if($code_sel2==$dt)
								{
									$running=$code_sel3+1;
									$run= sprintf("%04d", $running);
									$transactionCode=$dt.$run;
 								}
								else
								{
									$transactionCode=$dt."0001";
 								}
			/*-------------------------------- END TransactionCode -----------------------------------------*/
			return $transactionCode;

		}

		public function saveTodoList()
		{
 			$id_memp=$this->input->post("memp_id");
			$code = $this->getCode($id_memp);
			$date=$this->convert_date($this->input->post("todo_list_date"));
			$exp_finish_date=$this->convert_date($this->input->post("exp_finish_date"));
			$dt_start=$this->convert_date($this->input->post("dt_start"));
			$dt_close=$this->convert_date($this->input->post("dt_close"));
 
 			if($id_memp !=""){

 					$data = array(
							"id_todo_list"			=> '',
							"todo_list_code"		=> $code,
							"todo_list_date"		=> $date,
							"topic"					=> $this->input->post("topic"),
							"id_tpro"				=> $this->input->post("id_tpro"),
							"description"			=> str_replace("\n", "<br>\n",$this->input->post("description")),
							"id_mprio"				=> $this->input->post("id_mprio"),
							"id_msta"				=> $this->input->post("id_msta"),
							"id_assign"				=> $this->input->post("id_assign"),
							"id_owner"				=> $this->input->post("memp_id"),
							"exp_finish_date"	=> $exp_finish_date,
							"dt_start"				=> $dt_start,
							"dt_close"				=> $dt_close,
							"status"					=>1,
							"comment"				=>'',
							"id_create"				=> $this->input->post("memp_id"),
							"dt_create"			=>date("Y-m-d H:i:s"),
							"id_update"			=> $this->input->post("memp_id"),
							"dt_update"			=> date("Y-m-d H:i:s")
					);
					$this->mdl_memp->addTodoList($data);

					$massage = "บันทึกข้อมูลเรียบร้อยแล้ว"; 
					$url = "todolist/";
					$this->alert($massage, $url);
			}else{
				$massage = "บันทึกข้อมูล ผิดพลาด !"; 
					$url = "todolist/";
					$this->alert($massage, $url);
					exit();		
	
			}
 		}

		public function saveChange()
		{
 			$id_memp=$this->input->post("memp_id");
			$id=$this->input->post("id_todo_list");
			$date=$this->convert_date($this->input->post("todo_list_date"));
			$exp_finish_date=$this->convert_date($this->input->post("exp_finish_date"));
			$dt_start=$this->convert_date($this->input->post("dt_start"));
			$dt_close=$this->convert_date($this->input->post("dt_close"));
 
 			if($id_memp !=""){

 					$data = array( 
							"todo_list_date"		=> $date,
							"topic"					=> $this->input->post("topic"),
							"id_tpro"				=> $this->input->post("id_tpro"),
							"description"			=> str_replace("\n", "<br>\n",$this->input->post("description")),
							"id_mprio"				=> $this->input->post("id_mprio"),
							"id_msta"				=> $this->input->post("id_msta"),
							"id_assign"				=> $this->input->post("id_assign"),
							"id_owner"				=> $this->input->post("memp_id"),
							"id_fw_to"				=> $this->input->post("id_fw_to"),
							"exp_finish_date"	=> $exp_finish_date,
							"dt_start"				=> $dt_start,
							"dt_close"				=> $dt_close, 
							"id_update"			=> $this->input->post("memp_id"),
							"dt_update"			=> date("Y-m-d H:i:s")
					);
					$this->mdl_memp->updateTodoList($data,$id);
					
					if($this->input->post("id_fw_to") != $this->input->post("id_fw_to_old"))
						{
							if($this->input->post("id_fw_to") !="")
								{
								$fwcode = $this->getCode($this->input->post("id_fw_to"));

								$data = array(
									"id_todo_list"			=> '',
									"todo_list_code"		=> $fwcode,
									"todo_list_date"		=> $date,
									"topic"					=> $this->input->post("topic"),
									"id_tpro"				=> $this->input->post("id_tpro"),
									"description"			=> str_replace("\n", "<br>\n",$this->input->post("description")),
									"id_mprio"				=> $this->input->post("id_mprio"),
									"id_msta"				=> $this->input->post("id_msta"),
									"id_assign"				=> $this->input->post("id_assign"),
									"id_owner"				=> $this->input->post("id_fw_to"),
									"exp_finish_date"	=> $exp_finish_date,
									"dt_start"				=> $dt_start,
									"dt_close"				=> $dt_close,
									"status"					=>1,
									"comment"				=> "FW Form : ".$this->input->post("todo_list_code"),
									"id_create"				=> $this->input->post("memp_id"),
									"dt_create"			=>date("Y-m-d H:i:s"),
									"id_update"			=> $this->input->post("memp_id"),
									"dt_update"			=> date("Y-m-d H:i:s")
								);
							$this->mdl_memp->addTodoList($data);
							
							}
						}
 
					$massage = "บันทึกข้อมูลเรียบร้อยแล้ว"; 
					$url = "todolist/";
					$this->alert($massage, $url);
			}else{
				$massage = "ข้อมูล ผิดพลาด !"; 
					$url = "todolist/";
					$this->alert($massage, $url);
					exit();		
			}
 		}

}

?>

