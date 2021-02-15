<?php
$arraycolor =explode(",",$cv['personal_info']->color);
		$maincolor = $arraycolor['0'];
		 $subcolor = $arraycolor['1'];
		$font_size =  $cv['personal_info']->font_size;
		$font_size_sub= $font_size-2;
//if($cv['personal_info']->resume_templet_id =='1'){
    $h1  ='style="margin-left:40px; color: ' .$maincolor .'; font-family:"Bell MT"; font-size:46px; font-weight:500;"';
    $h3  ='style="margin-left:40px; color:'.$subcolor.'; font-size:20px; font-weight:500"';
		$h4_left ='style="margin-left:40px; color: ' .$maincolor .'; font-family:'.$cv['personal_info']->font_style.'; font-size:'.$font_size.'px;"';
    $h4_right  ='style="margin-right:40px; color:' .$maincolor .'; font-family:'.$cv['personal_info']->font_style.';margin-bottom:20px; letter-spacing:-1px; font-size:'.$font_size.'px;"';
    $p_sub_heding_right='style="margin-right:40px;  margin-bottom:5px; color:'.$subcolor.'; font-size:'.$font_size_sub.'px; font-weight:500; font-style:italic;"';
		$p_sub_heding_left='style="margin-left:40px; margin-bottom:5px; color:'.$subcolor.'; font-size:'.$font_size_sub.'px; font-weight:500; font-style:italic;"';

$tr_close='';

 if($cv['personal_info']->layout == '1'){
  $h4_right =$h4_left;
  $p_sub_heding_right =	$p_sub_heding_left;
	 $tr_close= '';
	 	 //$tr_close= '</tr><tr>';
	 }

		 ?>
		 <style>td, th {padding:0px; border:0px solid #e4e7e8} </style>
	 <table class="table-responsive">
	 	<tbody style="display:inline-table; width:100%;">
	 	<tr >
	 		<td style="width:50%" >

	 		<h1 <?php echo  $h1 ;?>>{{$cv['personal_info']->name}} </h1>
	 		<h3 <?php echo  $h3 ;?>>{{$cv['personal_info']->resume_name}}</h3>
  	</td>
	 		<td align="right" style="width:50%"><img src="{{ URL::to('/')}}/public/assets2/img/cv/cv-round.png" alt="" style="align-ri"></td>
	 	</tr>
	 	<tr>
	 		<td style="width:50%"><br><br>
	 		<h4 <?php echo $h4_left;?>>PROFESSIONAL PROFILE</h4>
	 		<p style="margin-left:40px; color:#333; font-size:14px;">{{$cv['personal_info']->summary}}</p><br>

       </td><?php echo $tr_close; ?>	<td style="width:50%">
			<h4 <?php echo $h4_right ;?>>CONTACT DETAILS	</h4>
	 		<ul style="margin-right:40px; color:#333; font-size:14px;">
	 				<li style="color:#333; font-size:14px;">
	 					Mobile: {{$cv['personal_info']->mobile_number}}
	 				</li>
	 				<li style="color:#333; font-size:14px;">
	 					  {{$cv['personal_info']->email}}
	 				</li>
	 			</ul><br>
				</td>
					<tr>
				<?php
				$cv_id = Request::segment(2) ;
				$cv_sections = DB::table('cv_section')->where('cv_id',$cv_id)->orderByRaw('order_by ASC')->get();
      //  echo '<pre>';
			//	print_r($cv_sections);

				$i=1;
         foreach ($cv_sections as $cv_section){
				    $fun_name = $cv_section->url;
				?>
    	<td style="width:50%"><?php echo $fun_name($cv ,$h4_left ,$p_sub_heding_right) ?> </td>
      <?php echo $tr_close;
			     if($i%2 ==0){?></tr><tr><?php }
		     	$i++; }
			?>

	 	</tbody>
	 </table>
	 	<?php // echo "test";exit; ?>
<?php //} ?>
