<?php echo $header; ?>
      <script type="text/javascript">
	$(function(){
		$("#todo_list_date").datepicker({
			dateFormat: 'd/m/yy'
		});
		$("#exp_finish_date").datepicker({
			dateFormat: 'd/m/yy'
		}); 
		$("#dt_start").datepicker({
			dateFormat: 'd/m/yy'
		});
		$("#dt_close").datepicker({
			dateFormat: 'd/m/yy'
		});
	});
 		function confirmSubmit() {
  				var r=confirm("!ยืนยันการบันทึกหรือไม่?");
				if(r==true) {
					return true;
				} else {
					return false;
				}
		}
       </script>
						<?php 
						foreach ($gettodo as $todo){
						$tdate =$todo['todo_list_date'];
						$tdate2 =$todo['exp_finish_date'];
						$tdate3 =$todo['dt_start'];
						$tdate4=$todo['dt_close'];
						$date = $tdate[8].$tdate[9]."/".$tdate[5].$tdate[6]."/".$tdate[0].$tdate[1].$tdate[2].$tdate[3];
						$exp_finish_date =$tdate2[8].$tdate2[9]."/".$tdate2[5].$tdate2[6]."/".$tdate2[0].$tdate2[1].$tdate2[2].$tdate2[3];
						$dt_start =$tdate3[8].$tdate3[9]."/".$tdate3[5].$tdate3[6]."/".$tdate3[0].$tdate3[1].$tdate3[2].$tdate3[3];
						$dt_close=$tdate4[8].$tdate4[9]."/".$tdate4[5].$tdate4[6]."/".$tdate4[0].$tdate4[1].$tdate4[2].$tdate4[3];

 							$attibutes = array('id'=>'form','name'=>'main', 'method'=>'post','autocomplete'=>'off');
							echo form_open('todolist/saveChange', $attibutes); ?>
                              <table class="table_form" cellpadding="3px" cellspacing="2px;" width="100%"  style="color:#FF0000;">
                                 <tbody>
									<tr class="tr_records" valign="top">
                                       <td align="left">CODE <br> 
                                            <input size="20" id="todo_list_code"  name="todo_list_code" type="text"  value='<?php echo $todo['todo_list_code']; ?>' style="width:120px;" required> 
                                       </td>
									   <td align="left">DATE <br> 
                                            <input size="15" id="todo_list_date"  name="todo_list_date" type="text"  value='<?php echo $date; ?>' style="width:80px;" required>
											<input name="id_todo_list" type="hidden"  value='<?php echo $todo['id_todo_list']; ?>'>
                                       </td>
									    <td align="left">TOPIC <br>
										<textarea cols="20" rows="1" name="topic" id="topic"><?php echo $todo['topic']; ?></textarea>
                                       </td>
                                        <td align="left" width="65%"> PROJECT <br>
                                           <select name="id_tpro" id="id_tpro" style="width:150px;" required>
										   <option value='' selected="selected">--เลือก--</option>
										   <?php
												foreach ($tpro as $rowtpro)
													{ 
													if($todo['id_tpro']==$rowtpro["id_tpro"]){
																echo "<option value='".$rowtpro["id_tpro"]."' selected='selected'>".$rowtpro["name_th"]."</option> ";
														}else{
																echo "<option value='".$rowtpro["id_tpro"]."' >".$rowtpro["name_th"]."</option> ";
														}
													}
											?>
											</select> 
										<td align="left">DESCRIPTION <br>
										<textarea cols="20" rows="1" name="description" id="description"><?php echo str_replace('<br>',"",$todo['description']); ?></textarea>
                                       </td>
									   <td align="left">PRIORITY <br>
										  <select name="id_mprio" id="id_mprio" style="width:150px;" required>
										  <option value='' selected='selected' >--เลือก--</option>
										   <?php
												foreach ($mprio as $rowmprio)
													{
 													if($todo['id_mprio']==$rowmprio["id_mprio"]){
																echo "<option value='".$rowmprio["id_mprio"]."' selected='selected'>".$rowmprio["name_th"]."</option> ";
														}else{
																echo "<option value='".$rowmprio["id_mprio"]."' >".$rowmprio["name_th"]."</option> ";
														}
													}
											?>
											</select>
                                       </td>
									   <td align="left">STATUS <br>
                                          <select name="id_msta" id="id_msta" style="width:150px;" required>
										  <option value='' selected="selected">--เลือก--</option>
										   <?php
												foreach ($msta as $rowmsta)
													{ 
													if($todo['id_msta']==$rowmsta["id_msta"]){
																echo "<option value='".$rowmsta["id_msta"]."' selected='selected'>".$rowmsta["name_th"]."</option> ";
														}else{
																echo "<option value='".$rowmsta["id_msta"]."' >".$rowmsta["name_th"]."</option> ";
														}
													}
											?>
											</select>
                                       </td>
                                       <td align="left"> ASSIGNED BY <br>
										  <select name="id_assign" id="id_assign" style="width:150px;" required>
										  <option value='' selected="selected">--เลือก--</option>
										   <?php
												foreach ($memp_list as $rowassign)
													{ 
													if($todo['id_assign']==$rowassign["memp_id"]){
																echo "<option value='".$rowassign["memp_id"]."' selected='selected'>".$rowassign["name_th"]."</option> ";
														}else{
																echo "<option value='".$rowassign["memp_id"]."' >".$rowassign["name_th"]."</option> ";
														}
													}
											?>
											</select>
                                       </td>
									   <td align="left">FORWORD TO<br>
										  <select name="id_fw_to" id="id_fw_to" style="width:150px;" >
										  <option value='' selected="selected">--เลือก--</option>
										   <?php
												foreach ($memp_list as $rowfwto)
													{ 
													if($todo['id_fw_to']==$rowfwto["memp_id"]){
																echo "<option value='".$rowfwto["memp_id"]."' selected='selected'>".$rowfwto["name_th"]."</option> ";
														}else{
																echo "<option value='".$rowfwto["memp_id"]."' >".$rowfwto["name_th"]."</option> ";
														}
													}
											?>
											</select>
											<input name="id_fw_to_old" type="hidden"  value='<?php echo $todo['id_fw_to']; ?>'>
                                       </td>
									   <td align="left">Expect to finish date<br>
                                            <input size="15" id="exp_finish_date"  name="exp_finish_date" type="text"  value='<?php echo $exp_finish_date; ?>' style="width:110px;" required>
                                       </td>
									    <td align="left">START DATE<br>
                                            <input size="15" id="dt_start"  name="dt_start" type="text"  value='<?php echo $dt_start; ?>' style="width:110px;" required>
                                       </td>
									    <td align="left">FINISH DATE<br>
                                            <input size="15" id="dt_close"  name="dt_close" type="text"  value='<?php echo $dt_close; ?>' style="width:110px;" required>
											<input  name="memp_id" type="hidden"  value='<?php echo $memp_id; ?>' >
                                       </td>
									    <td align="left" valign="center">
                                           <input type="image" src="<?php echo base_url(); ?>images/bt_save.png" onclick="return confirmSubmit()">
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           <?php } echo form_close(); ?>	
						   <br><br>

						<div  align="left" width="100%" style="padding:10px; background-color:#ffaaaa; font-size:10px;">
 						<form action="<?php echo base_url(); ?>todolist/search" method="post" name="form2">
						PROJECT : 
						<select name="id_tpro_key" > 
										   <option value='' <?php if($id_tpro_key==""){ echo "selected='selected'"; } ?> >--ทั้งหมด--</option>
										   <?php
												foreach ($tpro as $tpro_s)
													{
													if($id_tpro_key==$tpro_s["id_tpro"]){
																echo "<option value='".$tpro_s["id_tpro"]."' selected='selected'>".$tpro_s["name_th"]."</option> ";
														}else{
																echo "<option value='".$tpro_s["id_tpro"]."' >".$tpro_s["name_th"]."</option> ";
														}
													}
											?>
											</select>
						PRIORITY :
						<select name="id_mprio_key" >
										  <option value=''  <?php if($id_mprio_key==""){ echo "selected='selected'"; } ?> >--เลือก--</option>
										   <?php
												foreach ($mprio as $mprio_s)
													{
													if($id_mprio_key==$mprio_s["id_mprio"]){
																echo "<option value='".$mprio_s["id_mprio"]."' selected='selected'>".$mprio_s["name_th"]."</option> ";
														}else{
																echo "<option value='".$mprio_s["id_mprio"]."' >".$mprio_s["name_th"]."</option> ";
														}
													}
											?>
											</select>
							STATUS :
							 <select name="id_msta_key" >
										  <option value=''  <?php if($id_msta_key==""){ echo "selected='selected'"; } ?> >--ทั้งหมด--</option>
										   <?php
												foreach ($msta as $msta_s)
													{
													if($id_msta_key==$msta_s["id_msta"]){
																echo "<option value='".$msta_s["id_msta"]."' selected='selected'>".$msta_s["name_th"]."</option> ";
														}else{
																echo "<option value='".$msta_s["id_msta"]."' >".$msta_s["name_th"]."</option> ";
														}
													}
											?>
											</select>
							YEAR :
							 <select name="id_year_key" >
										  <option value=''  <?php if($id_year_key==""){ echo "selected='selected'"; } ?> >--ทั้งหมด--</option>
										  <option value='2014'  <?php if($id_year_key=="2014"){ echo "selected='selected'"; } ?> >2014</option>
										  <option value='2015'  <?php if($id_year_key=="2015"){ echo "selected='selected'"; } ?> >2015</option>
										  <option value='2016'  <?php if($id_year_key=="2016"){ echo "selected='selected'"; } ?> >2016</option>
 							</select>
							MONTHS :
							 <select name="id_mon_key" >
										  <option value=''  <?php if($id_mon_key==""){ echo "selected='selected'"; } ?> >--ทั้งหมด--</option>
										  <option value='01'  <?php if($id_mon_key=="01"){ echo "selected='selected'"; } ?> >มกราคม</option>
										  <option value='02'  <?php if($id_mon_key=="02"){ echo "selected='selected'"; } ?> >กุมภาพันธ์</option>
										  <option value='03'  <?php if($id_mon_key=="03"){ echo "selected='selected'"; } ?> >มีนาคม</option>
										  <option value='04'  <?php if($id_mon_key=="04"){ echo "selected='selected'"; } ?> >เมษายน</option>
										  <option value='05'  <?php if($id_mon_key=="05"){ echo "selected='selected'"; } ?> >พฤษภาคม</option>
										  <option value='06'  <?php if($id_mon_key=="06"){ echo "selected='selected'"; } ?> >มิถุนายน</option>
										  <option value='07'  <?php if($id_mon_key=="07"){ echo "selected='selected'"; } ?> >กรกฎาคม</option>
										  <option value='08'  <?php if($id_mon_key=="08"){ echo "selected='selected'"; } ?> >สิงหาคม</option>
										  <option value='09'  <?php if($id_mon_key=="09"){ echo "selected='selected'"; } ?> >กันยายน</option>
										  <option value='10'  <?php if($id_mon_key=="10"){ echo "selected='selected'"; } ?> >ตุลาคม</option>
										  <option value='11'  <?php if($id_mon_key=="11"){ echo "selected='selected'"; } ?> >พฤศจิกายน</option>
										  <option value='12'  <?php if($id_mon_key=="12"){ echo "selected='selected'"; } ?> >ธันวาคม</option>
 							</select>
							KEYWORD : 
						<input id="keyword" size="20" class="required" name="keyword" type="text"  value="<?php echo $keyword; ?>">
							<button type="submit" value="Submit">Search</button>
							 </form>
							 </DIV>
                            <table bgcolor="#EF7321" width="100%" border="0" cellpadding="1" cellspacing="1" style="font-size:11px;">
                              <thead>
                                 <tr bgcolor="#EF7321" >
                                    <td align="center" width="5%" class="TEXT_CAPTION_USERNAME">CODE</td>
                                    <td align="center" class="TEXT_CAPTION_USERNAME"><div style="width:70px;">DATE</div></td>
                                    <td align="center" width="15%" class="TEXT_CAPTION_USERNAME">TOPIC</td>
									<td align="center" width="10%" class="TEXT_CAPTION_USERNAME">PROJECT</td >
									<td align="center" width="20%" class="TEXT_CAPTION_USERNAME">DESCRIPTION</td >
									<td align="center" width="5%" class="TEXT_CAPTION_USERNAME">PRIORITY</td >
									<td align="center" width="5%" class="TEXT_CAPTION_USERNAME">STATUS</td >
									<td align="center" width="8%" class="TEXT_CAPTION_USERNAME">ASSIGNED BY</td>
									<td align="center" width="8%" class="TEXT_CAPTION_USERNAME">OWNER</td>
									<td align="center" class="TEXT_CAPTION_USERNAME" ><div style="width:90px;">Expect to finish date</div></td>
									<td align="center" class="TEXT_CAPTION_USERNAME"><div style="width:90px;">START DATE</div></td>
									<td align="center"  class="TEXT_CAPTION_USERNAME"><div style="width:90px;">FINISH DATE</div></td>
                                    <td align="center" width="5%" class="TEXT_CAPTION_USERNAME">UPDATE</td>
                                 </tr>
                              </thead>
                              <tbody>
                                 <?php
								 $color="";
                                       foreach ($todolist as $row)
                                       {
										$tdate =$row['todo_list_date'];
										$date = $tdate[8].$tdate[9]."/".$tdate[5].$tdate[6]."/".$tdate[0].$tdate[1].$tdate[2].$tdate[3];
										 if($row["id_todo_list"]==$id_todo_list){
											$color="#FD432E"; // Change
										}else{
											$color="#FFFFFF"; 
										}
									?>
                                 <tr this.bgColor='<?php echo $color;  ?>' onMouseout=this.bgColor='#FFFFFF'>
                                    <td align="left" bgcolor="<?php echo $color;  ?>"> <?php echo $row["todo_list_code"]; ?> </td>
                                    <td align="left" bgcolor="<?php echo $color;  ?>"> <?php echo $row['todo_list_date']; ?> </td>
									<td align="left" bgcolor="<?php echo $color;  ?>"> <?php echo $row["topic"]; ?> </td>
									<td align="left" bgcolor="<?php echo $color;  ?>"> <?php echo $row["name_tpro"]; ?> </td>
									<td align="left" bgcolor="<?php echo $color;  ?>"> <?php echo $row["description"]; ?></td>
									<td align="left" bgcolor="<?php echo $color;  ?>"> <?php echo $row["name_mprio"]; ?> </td>
									<td align="left" bgcolor="<?php echo $color;  ?>"> <?php echo $row["name_msta"]; ?> </td>
									<td align="left" bgcolor="<?php echo $color;  ?>"> <?php echo $row["name_assign"]; ?> </td>
									<td align="left" bgcolor="<?php echo $color;  ?>"> <?php echo $row["name_owner"]; ?> </td>
									<td align="center" bgcolor="<?php echo $color;  ?>"> <?php echo $row["exp_finish_date"]; ?> </td>
									<td align="center" bgcolor="<?php echo $color;  ?>"> <?php echo $row["dt_start"]; ?> </td>
									<td align="center" bgcolor="<?php echo $color;  ?>"> <?php echo $row["dt_close"]; ?> </td>
									<td align="center" bgcolor="<?php echo $color;  ?>"><a href="<?php echo base_url(); ?>todolist/change/<?php echo $row["id_todo_list"]?>">Update </a> </td>
								<?php } ?>
                              </tbody>
                           </table> 
 <?php echo $footer; ?>