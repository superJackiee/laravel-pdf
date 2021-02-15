<?php
if (! function_exists('languages')) {
    function languages($cv,$css,$p_sub_heding_left)
    { //echo '<pre>';print_r($cv); exit;?>
      <h4 <?php echo $css ;?>> Languages</h4>
      <ul style="margin-left:40px; color:#333; font-size:14px;">
        <?php foreach($cv['languages'] as $val){
          echo '<li style="color:#333; font-size:14px;">';
            echo $val->name;
            for($i = 1; $i <= 5; $i++){
             ?>
              <span class="fa fa-star <?php if($i < $val->rating) {
                echo 'checked' ;  } ?> "></span>
                <?php
          }
        echo  '</li>';
        }
        echo  '</ul>';

    }
}

if (! function_exists('experience')) {
    function experience($cv,$css,$p_sub_heding_right)
    { ?>
      <h4  <?php echo $css ;?>> WORK EXPERIENCE </h4>
       <?php foreach($cv['experience'] as $val){?>
	 		<p <?php echo $p_sub_heding_right;?>> <?php echo $val->position_or_job_title;?></p>
	 		<p style="margin-left:40px; margin-bottom:5px; color:#333; font-size:14px;">
	 			<?php echo $val->company_name.' ,'. $val->city_country.' ('. $val->start_date.'-'.$val->end_date.')';?>
	 			</p><ul style="margin-left:40px; color:#333; font-size:14px;">
	 				<li style="color:#333; font-size:14px;">
           <?php echo $val->responsibilities;?>
	 				</li>

	 			</ul>

	 		<p></p>
    <?php }

    }
}

if (! function_exists('skills')) {
    function skills($cv,$h4_left,$p_sub_heding_right)
    { ?>
      <h4 <?php echo $h4_left;?>>
       SKILLS AND ABILITIES
      </h4>
      <ul style="margin-left:40px; color:#333; font-size:14px;">
         <?php foreach($cv['skills'] as $val) {?>
          <li style="color:#333; font-size:14px;">
          <?php echo  $val->name;
            for($i = 1; $i <= 5; $i++){ ?>
                <span class="fa fa-star <?php if($i < $val->rating) {?>checked <?php } ?>"></span>
           <?php } ?>
          </li>
      <?php } ?>

        </ul>	<br>
    <?php }
}

if (! function_exists('education')) {
    function education($cv,$h4_right,$p_sub_heding_right)
    { ?>
      <h4 <?php echo $h4_right ;?>> PREVIOUS EDUCATION </h4>
  <?php foreach($cv['education'] as $val){ ?>
	 		<p <?php echo $p_sub_heding_right;?>>	<?php echo  $val->school_university;?></p>
	 		<p style="margin-left:40px; margin-bottom:5px; color:#333; font-size:14px;">
	 		<?php echo $val->city_country;?>
	 			</p><ul style="margin-left:40px; color:#333; font-size:14px;">
	 				<li style="color:#333; font-size:14px;">
	 				 	<?php echo $val->field_of_study.' '. $val->start_date.' '. $val->end_date; ?>
	 				</li>
	 				<li style="color:#333; font-size:14px;">
	 				   <?php echo $val->description;?>
	 				</li>
	 				</ul>
	 		<p></p>

    <?php }
     }
 }
?>
