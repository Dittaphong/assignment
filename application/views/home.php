<?php echo $tempheader; ?>			
	    <div class="jumbotronaon">
				 <div class="page-header">
				   	<center><h2><font color="#2a3f52">TODO LIST</font></h2> </center>    
				 </div>
					  <p>คุณต้องทำอะไรบ้างวันนี้...</p> 

					 
			
			<div class="row " >
		    	<div class="col-md-12">
		    		<div class="content-table">
		    		<table class="box-table">
					    <thead>
					      <tr>
					        <th class="fonthead-table">วัน/เดือน/ปี</th>
					        <th class="fonthead-table">หัวข้อ</th>
					        <th class="fonthead-table">โครงการ</th>
					        <th class="fonthead-table">รายละเอียด</th>
					        <th class="fonthead-table">ระดับความสำคัญ</th>
					        <th class="fonthead-table">สถานะ</th>
					        <th class="fonthead-table">ผู้มอบหมายงาน</th>
					        <th class="fonthead-table">เสร็จสิ้นในวันที่</th>
					        <th class="fonthead-table">เริ่ม</th>
					        <th class="fonthead-table">เสร็จสิ้น</th>
					      </tr>
					    </thead>

					    <tbody>
					       <tr>
					    		<td><input type="date" class="form-control" id="sm " value=""></td>
						        <td><input type="text" class="form-control"  id="sm" style="width:100px;"></td>
						        <td><select class="form-control" id="sel1" style="width:100px;" >
								        <option>1</option>
								        <option>2</option>
								        <option>3</option>
								        <option>4</option>
								      </select>
								</td>
						        <td><input class="form-control" id="focusedInput" type="text" value="รายละเอียด" style="width:100px;"></td>
						        <td><select class="form-control" id="sel1" style="width:100px;" >
								        <option>เลือก</option>
								        <option>เลือก</option>
								        <option>เลือก</option>
								        <option>เลือก</option>
								      </select>
								</td>
						       <td><select class="form-control" id="sel1" style="width:100px;" >
								        <option>เลือก</option>
								        <option>เลือก</option>
								        <option>เลือก</option>
								        <option>เลือก</option>
								      </select>
								</td>
						        <td><select class="form-control" id="sel1" style="width:100px;" >
								        <option>เลือก</option>
								        <option>เลือก</option>
								       
								      </select>
								</td>
						        <td><input type="text" class="form-control" id="sm " style="width:100%;"></td>
						         <td><input type="text" class="form-control" id="sm " style="width:100%;"></td>
						        <td><input type="text" class="form-control" id="sm " style="width:100;"></td>
					      	 </tr>
					    </tbody>
					 </table>
					 </div>
		    	</div>
		    </div> 
		    <!-- cosle Table head -->
		    <br>

<input class="btn btn-info" type="button" name="" id="a" value="กรอกข้อมมูล"> 
					<div class="table-responsive">
				  <table class="table">
				    <tbody>
				    	<tr> 
					    	<td>ทำอะไรดี</td>
					    	<td>ก็ไม่รู้สินะ</td>
					    	<td>ใส่รายละเอียด</td>
					    	<td>ใส่รายละเอียด</td>
					    	<td>ใส่รายละเอียด</td>
					    	<td>ใส่รายละเอียด</td>
					    	<td>ใส่รายละเอียด</td>
					    	<td>ใส่รายละเอียด</td>
					    	<td>ใส่รายละเอียด</td>
					    	<td>ใส่รายละเอียด</td>
						</tr>
						<tr> 
					    	<td>ทำอะไรดี</td>
					    	<td>ก็ไม่รู้สินะ</td>
					    	<td>ใส่รายละเอียด</td>
					    	<td>ใส่รายละเอียด</td>
					    	<td>ใส่รายละเอียด</td>
					    	<td>ใส่รายละเอียด</td>
					    	<td>ใส่รายละเอียด</td>
					    	<td>ใส่รายละเอียด</td>
					    	<td>ใส่รายละเอียด</td>
					    	<td>ใส่รายละเอียด</td>
						</tr>
				    </tbody>
				  </table>
				</div>
	    </div>
  
<?php echo $tempfooter; ?>	
<script type='text/javascript'>
$(function(){ 
    click();
});

function click(){
    $('#a').on('click',function(){
        bootbox.dialog({
                title: "กรอกข้อมมูล",
                message: '<div class="row">  ' +
                    '<div class="col-md-12"> ' +
                    '<form class="form-horizontal"> ' +
                    '<div class="form-group"> ' +
                    '<label class="col-md-4 control-label" for="name">Name</label> ' +
                    '<div class="col-md-4"> ' +
                    '<input id="name" name="name" type="text" placeholder="Your name" class="form-control input-md"> ' +
                    '<span class="help-block">Here goes your name</span> </div> ' +
                    '</div> ' +
                    '<div class="form-group"> ' +
                    '<label class="col-md-4 control-label" for="awesomeness">How awesome is this?</label> ' +
                    '<div class="col-md-4"> <div class="radio"> <label for="awesomeness-0"> ' +
                    '<input type="radio" name="awesomeness" id="awesomeness-0" value="Really awesome" checked="checked"> ' +
                    'Really awesome </label> ' +
                    '</div><div class="radio"> <label for="awesomeness-1"> ' +
                    '<input type="radio" name="awesomeness" id="awesomeness-1" value="Super awesome"> Super awesome </label> ' +
                    '</div> ' +
                    '</div> </div>' +
                    '</form> </div>  </div>',
                buttons: {
                    success: {
                        label: "Save",
                        className: "btn-success",
                        callback: function () {
                            var name = $('#name').val();
                            var answer = $("input[name='awesomeness']:checked").val()
                            Example.show("Hello " + name + ". You've chosen <b>" + answer + "</b>");
                        },

                    }

                }

            }
        );
    });
}
</script>



