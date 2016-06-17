<?php 
class mdl_memp extends CI_Model
   {
	public function __construct()
      {
		parent::__construct();
		//$this->load->database("thainology");
      }

      public function doCheckValidUserLogin($username, $userpassword)
      { 
         $sql=" 
		SELECT memp_id
		   FROM memp 
			WHERE email='" . $this->db->escape_str(trim($username)) . "' AND userpassword= '" . MD5($userpassword)."' AND status > 0 ";
         $result=$this->db->query($sql);
         if($result->num_rows() == 1)
         {
            return true;
         }
         else
         {
            return false;
         }
      }

      public function getMempID($username)
      {
         $memp_id = 0;
         $sql = "
            SELECT memp_id
               FROM memp
               WHERE email = '" . $username . "'
                  AND memp.`status` > 0;";
         $rs = $this->db->query($sql);
         if ($rs->num_rows() == 1)
         {
            $row = $rs->row();
            $memp_id = $row->memp_id;
         }
         else
         {
            $memp_id = 0;
         }
         return $memp_id;
      }
       public function getMempCode($id)
      {
         $memp_id = 0;
         $sql = "
            SELECT code_memp
               FROM memp
               WHERE memp_id = '" . $id . "'
                  AND memp.`status` > 0;";
         $rs = $this->db->query($sql);
         if ($rs->num_rows() == 1)
         {
            $row = $rs->row();
            $code_memp = $row->code_memp;
         }
         else
         {
            $code_memp = 0;
         }
         return $code_memp;
      }

 public function getDataUser($memp_id){
	  $sql = "
	  SELECT
			a.memp_id,
			a.code_memp,
			CONCAT(a.firstname_th,' ',a.lastname_th) AS name_th,
			CONCAT(a.firstname_en,' ',a.lastname_en) AS name_en,
			b.name_th AS mpos_name,
			c.name_th AS memp_cat_name,
			a.id_mpos,
			a.id_memp_cat,
			a.birthdate,
			a.email,
			a.userpassword,
			a.status,
			a.img_name,
			a.mobile,
			a.firstname_th,
			a.lastname_th,
			a.firstname_en,
			a.lastname_en
		FROM
		memp a
		LEFT JOIN mpos b ON a.id_mpos=b.id_mpos
		LEFT JOIN memp_cat c ON a.id_memp_cat=c.id_memp_cat
	    WHERE a.memp_id='$memp_id' " ;
//   echo $sql;
         $query = $this->db->query($sql);
 		 return $query->row(); 
	  }

   }


public function getHistoryInOut($memp_id, $month,$year)
      {
          $sql = "
        SELECT 
         a.mwkd_date,
         a.is_working,
         a.name_th AS wkd_name,
         b.record_date,
         b.LOGIN,
         b.comment_login,
         b.LOGOUT,
         b.comment_logout
         FROM mwkd a
         LEFT JOIN(
            SELECT 
               date_list.record_date, 
               login.record_time LOGIN, 
               login.comment_login, 
               logout.record_time LOGOUT,
               logout.comment_logout
            FROM
               (
                 SELECT 
                   DISTINCT(record_date) record_date
                 FROM
                    memp_login 
                 WHERE  MONTH (record_date) = " . $month . "
                 AND YEAR (record_date) = " . $year . " ";
                if($memp_id !=""){
                  $sql .="  AND memp_id =" . $memp_id . "";
                }
                $sql .="  ORDER BY record_date
               ) AS date_list
               LEFT JOIN
               (
                 SELECT 
                   record_date, record_time,comment_login
                 FROM memp_login
                 WHERE MONTH (record_date) = " . $month . "
                 AND YEAR (record_date) = " . $year . " ";
             if($memp_id !=""){
                  $sql .="  AND memp_id =" . $memp_id . " ";
                }
               $sql .="    AND islogin = 1
               ) AS login
               ON date_list.record_date = login.record_date
               LEFT JOIN
               (
                 SELECT 
                   record_date, record_time,comment_logout
                 FROM memp_login
                 WHERE MONTH (record_date) = " . $month . "
                 AND YEAR (record_date) = " . $year . " ";
                if($memp_id !=""){
                  $sql .="  AND memp_id =" . $memp_id . " ";
                }
               $sql .="    AND islogin = 2
               ) AS logout
               ON date_list.record_date = logout.record_date 
               
               ) AS b ON a.mwkd_date=b.record_date
               WHERE MONTH(a.mwkd_date)=" . $month . "
               AND YEAR(a.mwkd_date)=" . $year . "  
               AND a.mwkd_date <= now() ";

     // echo $sql;
                   $query = $this->db->query($sql);
                   return $query->result_array(); 
      }
      public function getHistoryInOutAll($sql)
      {
      //  echo "<pre>$sql</pre>";
          $query = $this->db->query($sql);
          return $query->result_array(); 
      }
