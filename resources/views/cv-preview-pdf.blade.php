<?php
if($cv['personal_info']->resume_templet_id=='2'){
  $arraycolor =explode(",",$cv['personal_info']->color);
$maincolor = $arraycolor['0'];
$subcolor = $arraycolor['1'];
$font_size =  $cv['personal_info']->font_size;
$font_size_sub= $font_size-2;
  $h1  ='style="margin-left:40px; color: ' .$maincolor .'; font-family:"Bell MT"; font-size:46px; font-weight:500;"';
  $h3  ='style="margin-left:40px; color:'.$subcolor.';; font-size:20px; font-weight:500"';
  $h4_left ='style="margin-left:40px;margin-bottom: 20px color: ' .$maincolor .'; font-family:'.$cv['personal_info']->font_style.'; font-size:'.$font_size.'px;"';
  $h4_right  ='style="margin-right:40px; color:' .$maincolor .'; font-family:'.$cv['personal_info']->font_style.';margin-bottom:20px; letter-spacing:-1px; font-size:'.$font_size.'px;"';
  $p_sub_heding_right='style="margin-left:40px;margin-bottom:5px; color:'.$subcolor.'; font-size:'.$font_size_sub.'px; font-weight:500; font-style:italic;"';
  $p_sub_heding_left='style="margin-left:40px; margin-bottom:5px; color:'.$subcolor.'; font-size:'.$font_size_sub.'px; font-weight:500; font-style:italic;"';

  $tr_close='';
if($cv['personal_info']->layout == '1'){
  $h4_right =$h4_left;
  $p_sub_heding_right =	$p_sub_heding_left;
  $tr_close='</tr><tr>';
}
?>
<style>
ul li {list-style: none;}
.resume-wdth {
  width: 920px;
  background: #f8f9f0;
  max-width: 100%;
  margin: 0 auto;
  border-spacing: 0;
  box-shadow: 0px 0px 12px rgba(2, 2, 2, 0.3);
}
div#base {
  display: inline-block;
  position: relative;
  width: 280px;
}
div#base:before {
  border-bottom: 50px solid black;
  border-left: 140px solid transparent;
  border-right: 140px solid transparent;
  content: "";
  height: 0;
  left: 0;
  position: absolute;
  width: 0;
  right: 0;
  margin: 0 auto;
  transform: rotate(180deg);
  top: -18px;
}
td, th {
  border: none;
  padding: 0;
}
</style>
<table class="table-responsive resume-wdth">
  <tbody style="display:inline-table; width:100%;">
      <tr>
    <td style="width:50%;padding: 0px 20px 40px;position: relative;top: 0;">
      <table style="width: 280px;">
        <tr>
          <td style=" margin-bottom: -50px;background: #5ce1e6; padding-top: 20px;">
            <?php if( $cv['personal_info']->photo!=''){
                $url_photo = URL::to('/public/thumbnail/'.$cv['personal_info']->photo);
              }else {
                $url_photo = URL::to('/public/thumbnail/rsz_profile-placeholder.png');
              } 
            ?>
            <img src="<?php echo  $url_photo ;?>" style=" width: 120px;   max-width: 100%; height: 120px;  border-radius: 50%; margin: 0 auto; display: block; margin-top: 0;  ">
          </td> 
        </tr>
        <tr>
          <td style=" background: #000;color:#fff;bottom: 0;text-align: center;font-family: Roboto;padding: 15px 0;">
            <h1 style=" margin-top: 50px; font-family: 'Poppins', sans-serif; color: #ffffff; font-weight: 300;">
            {{$cv['personal_info']->name}} </h1>
            <p style=" margin: 0;letter-spacing: 8px; font-size: 13px; ">
              {{$cv['personal_info']->resume_name}}
            </p>
          </td>
        </tr>
        <tr>
          <td><div id="base"></div></td>
        </tr>
      </table>
       </td>
    <td style="width:50%;padding: 20px;">
      <h4 style="color: #000000; font-size:20px;text-transform:uppercase;margin-bottom: 20px;">PROFESSIONAL PROFILE</h4>
      {{$cv['personal_info']->summary}}
    </td>
      </tr>
      <tr>
          <?php
        $cv_id = Request::segment(2) ;
        $cv_sections = DB::table('cv_section')->where('cv_id',$cv_id)->orderByRaw('order_by ASC')->get();
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
<?php
}else if($cv['personal_info']->resume_templet_id=='5'){
$arraycolor =explode(",",$cv['personal_info']->color);
$maincolor = $arraycolor['0'];
$subcolor = $arraycolor['1'];
$font_size =  $cv['personal_info']->font_size;
$font_size_sub= $font_size-2;
$h1  ='style="margin-left:40px; color: ' .$maincolor .'; font-family:"Bell MT"; font-size:46px; font-weight:500;"';
$h3  ='style="margin-left:40px; color:'.$subcolor.';; font-size:20px; font-weight:500"';
$h4_left ='style="margin-left:40px; color: ' .$maincolor .'; font-family:'.$cv['personal_info']->font_style.'; font-size:'.$font_size.'px;"';
$h4_right  ='style="margin-right:40px; color:' .$maincolor .'; font-family:'.$cv['personal_info']->font_style.';margin-bottom:20px; letter-spacing:-1px; font-size:'.$font_size.'px;"';
$p_sub_heding_right='style="margin-left:40px;margin-bottom:5px; color:'.$subcolor.'; font-size:'.$font_size_sub.'px; font-weight:500; font-style:italic;"';
$p_sub_heding_left='style="margin-left:40px; margin-bottom:5px; color:'.$subcolor.'; font-size:'.$font_size_sub.'px; font-weight:500; font-style:italic;"';
$tr_close='';

if($cv['personal_info']->layout == '1'){
  $h4_right =$h4_left;
  $p_sub_heding_right =	$p_sub_heding_left;
  $tr_close='</tr><tr>';
}
?>
<style>td, th {padding:0px; border:0px solid #e4e7e8} </style>
<table class="table-responsive">
   <tbody style="display:inline-table; width:100%;">
     <tr>
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
         </td><?php echo $tr_close; ?>
         <td style="width:50%">
        <h4 <?php echo $h4_right ;?>>CONTACT DETAILS	</h4>
        <ul style="margin-left:40px; color:#333; font-size:14px;">
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
       $i=1;
           foreach ($cv_sections as $cv_section){
          $fun_name = $cv_section->url;
      ?>
          <td style="width:50%"><?php echo $fun_name($cv ,$h4_left ,$p_sub_heding_right) ?> </td>
          <?php echo $tr_close;
         if($i%2 =='0'){?></tr><tr><?php }
         $i++; }
    ?>
   </tbody>
 </table>
<?php }else if($cv['personal_info']->resume_templet_id=='6'){ ?>
<style type="text/css">
.marcelinecv-bg {
  position: relative;overflow: hidden;
  min-height: 1300px;
}
.light-blue {
  background-color: #a6c9d4;

}
.round-social {
  width: 30px;
  height: 30px;
  padding: 9px;
  border-radius: 50px;                  			
  color: white;
}
.marcelinecv-bg p {
  margin-bottom: 10px !important;                   
  color: #222;
}
</style>
<div style="position: absolute; width: 100%; height: 100%;top: 0;">
<div style="background-color: #f5f5f5; position: relative; width: 100%; height: 100%;">
  <div style="position: absolute; width: 50%; height: 120%; bottom:20%;left: -2px; background-color: #a6c9d4; transform: skewY(12deg);"></div>
  <div style="position: absolute; width: 50%; height: 120%; top:30%;right: -2px; background-color: #e6a490; transform: skewY(12deg);"></div>
</div>
</div>
<div style="width: 40%; position: absolute; padding-top: 50px;bottom: 0px;left: 10%; margin-bottom: 50px;">
<h3>Skills</h3>
<?php
  foreach ($cv['skills'] as $skill){
?>
  <div style="width: 30%; float: left; position: relative;">
    <canvas class="skill" width="70" height="70" value="{{$skill->rating}}"></canvas>
    <div style="position: absolute;top: 17px;left: 21px;">
      <i class="fa fa-google" aria-hidden="true"style="font-size: 35px;"></i>
    </div>
    <p style="font-size: 11px; line-height: 1.1; width: 70px; text-align: center;">{{$skill->name}}</p>
  </div>
<?php } ?>
<script type="text/javascript">
  var skills = document.getElementsByClassName("skill");
  for(var i=0; i<=skills.length; i++){
    var canvas = skills[i];
    var rating = skills[i].getAttribute("value");
    var ctx = canvas.getContext('2d');
    var x = 35;
    var y = 35;
    var radius = 32;

    var startAngle = 0 * Math.PI;
    var endAngle = 2 * Math.PI;
    var counterClockwise = false;
    ctx.beginPath();
    ctx.arc(x, y, radius, startAngle, endAngle, counterClockwise);
    ctx.lineWidth = 3;
    // line color
    ctx.strokeStyle = '#a6c9d4';
    ctx.stroke();

    var startAngle = -0.5 * Math.PI;
    var endAngle = (-0.5+2*(rating/5)) * Math.PI;
    var counterClockwise = false;
    ctx.beginPath();
    ctx.arc(x, y, radius, startAngle, endAngle, counterClockwise);
    ctx.lineWidth = 3;
    // line color
    ctx.strokeStyle = '#de7352';
    ctx.stroke();
  }
</script>
</div>
<div style=" position: absolute; margin:auto; top:50px;width: 250px; height: 250px;border-radius: 500px; -webkit-transform: translateX(-50%); transform: translateX(-50%);z-index: 1;margin-left: 50%; border: 5px solid #5cb4d0;padding: 5px; ">
<?php if( $cv['personal_info']->photo!=''){
  $url_photo = URL::to('/public/thumbnail/'.$cv['personal_info']->photo);
}else {
  $url_photo = URL::to('/public/thumbnail/rsz_profile-placeholder.png');
} ?>
<div style="width: 100%; height: 100%;background-image: url(<?php echo $url_photo; ?>);background-position:center; background-size: cover;border-radius: 500px;position: relative;">
  <h1 style="position: absolute;bottom: 100px;left:-20px;text-align: center;width: 70px;z-index: 99;">JS</h1>
  <div style="position: absolute;left: -20px;bottom: 90px;width: 70px; height: 500px;background-color: #e46d6d;transform: skewY(12deg);">
    
  </div>
</div>
</div>
<div style="position: relative; width: 90%; margin:auto;height: 100%;margin-top: 70px; ">
<div style="padding-left: 67%;">
  <h1 style="margin-bottom: 0px;">{{$cv['personal_info']->name}}</h1>
  <!--<h1 style="margin-bottom: 10px;">Smith</h1>-->
  <p style="font-size: 22px; font-weight: 500; margin-bottom: 60px!important">{{$cv['personal_info']->job_tittle}}</p>
</div>
<div style="position: relative; width:100%; overflow: hidden;padding-left: 42px;">
  <h3 style="margin-bottom: 10px;">Profile</h3>
</div>
<div style="position: relative; width:100%; background-color: white;padding: 52px 42px 20px 42px;overflow: hidden;">
  <div style="width: 50%;float: left; line-height: 1.8;">{{$cv['personal_info']->summary}}</div>
  <div style="width: 50%;padding-left: 40px;float: left;">
    <h3>Contact</h3>
    <p style="font-weight: bold;">{{$cv['personal_info']->address}}</p>
    <p>Lorem ipsum dolor sit met</p>
    <p>{{$cv['personal_info']->mobile_number}}</p>
    <p style="margin-bottom: 20px !important;">{{$cv['personal_info']->email}}</p>
    <i class="fa fa-facebook light-blue round-social" aria-hidden="true"></i>
    <i class="fa fa-twitter light-blue round-social" aria-hidden="true"></i>
    <i class="fa fa-linkedin light-blue round-social" aria-hidden="true"></i>
    <p style="margin-top: 10px;">/{{$cv['personal_info']->name}}</p>
  </div>
</div>
<div style="position: relative;width: 100%;">
  <div style="width: 50%;padding: 40px;float: left;">
    <h3>
      Education
    </h3>
    <?php
           foreach ($cv['education'] as $education){
        $start_date=strtotime($education->start_date);
        $start_year=date("Y", $start_date);
        $end_date=strtotime($education->end_date);
        $end_year=date("Y", $end_date);
       ?>
      <p style="font-weight: 700;">{{$education->school_university}}</p>
      <p style="color: white;">( {{$start_year}} > {{$end_year}} )</p>
      <p>{{$education->description}}</p>
    <?php } ?>
  </div>
</div>
<div style="position: relative;width: 100%;">
  <div style="width: 50%;padding: 40px;padding-left: 90px; float: left;">
    <h3>
      Work Experience
    </h3>
    <?php
           foreach ($cv['experience'] as $experience){
        $start_date=strtotime($experience->start_date);
        $start_year=date("Y", $start_date);
        $end_date=strtotime($experience->end_date);
        $end_year=date("Y", $end_date)
       ?>
      <div style="overflow: hidden;width: 100%; display: block;margin-left: -65px;">
        <p style="color: white; float: left;">{{$start_year}}</p>
        <div style=" width: 20px;height: 5px;background-color: white;float: left;margin-left: 15px; margin-top: 8px;"></div>
      </div>						    		
      <p style="font-weight: 700;">{{$experience->position_or_job_title}}</p>
      <p style="font-weight: 500;">{{$experience->company_name}}</p>
      <p>{{$experience->responsibilities}}</p>
    <?php } ?>
  </div>
</div>

</div>
<?php }else if($cv['personal_info']->resume_templet_id=='7'){ ?>
<style type="text/css">
.marcelinecv-bg{
  position: relative;overflow: hidden;height: 1500px;
}
.light-blue{
  background-color: #a6c9d4;

}
.round-social{
  width: 30px;
  height: 30px;
  padding: 9px;
  border-radius: 50px;                  			
  color: white;
}
.marcelinecv-bg p{
  margin-bottom: 10px !important;         
  margin-bottom: 5px !important;             
  font-size: 15px ; 
  font-weight: 400;    
  color: #222;
}
h1{
  font-weight: 400;
}
p.bold{
  font-weight: 500;
}
.skill_container{
  margin-bottom: 20px;
}
</style>
<div style="position: absolute;width: 40%;height: 100%;left: 0px; top: 0px;"></div>
<div style="position: absolute;width: 60%;height: 100%;left: 40%; top: 0px;background-color: #f7f7f7;"></div>
<div style="width: 40%;position: relative;overflow: hidden;float: left;">
<?php if( $cv['personal_info']->photo!=''){
  $url_photo = URL::to('/public/thumbnail/'.$cv['personal_info']->photo);
}else {
  $url_photo = URL::to('/public/thumbnail/rsz_profile-placeholder.png');
} ?>
<div style="width: 270px;height: 270px; background-image: url(<?php echo $url_photo; ?>); background-position:center; background-size: cover; margin:auto;position: relative;margin-top:70px;border-radius: 500px;"></div>
</div>
<div style="width: 60%;position: relative;float: left;padding-top: 80px;padding-left: 60px;">
<h1 style="font-size: 55px; font-weight: 700px; margin-bottom: 5px;">{{$cv['personal_info']->name}}</h1>
<p class="bold" style="font-size: 26px; letter-spacing:7px;font-weight: 300; color:#2ed0d8;">{{$cv['personal_info']->job_tittle}}</p>
<div style="position: absolute;right: 0; width: 104%; background-color: #43d4db;border-bottom-left-radius: 15px;    border-top-left-radius: 15px;padding-left: 4%;">
  <div style="position: relative; width: 100%; height: 100%;">
    <span style="    top: 42px;    height: 100%;    position:absolute;    right: 104%;    /* height: 50%; */    border-right: solid 12px #43d4db;    border-top: solid 18px #0000;    border-bottom: solid 18px #0000;"></span>
    <div style="width: 50%; padding: 15px 60px;float: left;">
      <p class="bold" style="font-weight: 700; position: relative;"><i style="position: absolute; right: 105%;font-size: 33px; margin-top: -3px;" class="fa fa-map-marker" aria-hidden="true"></i>{{$cv['personal_info']->address}}</p>
      <p class="bold">Lorem dolar is set met</p>
      <p class="bold">{{$cv['personal_info']->mobile_number}}</p>
    </div>
    <div style="width: 50%; padding: 15px 60px;float: left;">
      <p class="bold" style="font-weight: 700; position: relative;font-size:20px;letter-spacing: 5px;">
        <i class="fa fa-facebook " aria-hidden="true"></i>
        <i class="fa fa-twitter " aria-hidden="true"></i>
        <i class="fa fa-linkedin " aria-hidden="true"></i>
        <i class="fa fa-instagram" aria-hidden="true"></i>
      </p>
      <p class="bold" style="margin-bottom: 0px !important;">/{{$cv['personal_info']->name}}</p>
      <p class="bold">{{$cv['personal_info']->ulr}}</p>
    </div>
  </div>
</div>
</div>

<div style="width: 100%;overflow: hidden;padding-top: 60px;">
<div style="width: 40%; padding-left: 8%; padding-right: 4%;float: left;">
  <h1 style="font-weight: 400; color: #43d4db;">About Me</h1>
  <p style="font-size: 29px; line-height: 1.3; font-weight: 400; font-style: italic;position: relative;">
    <i style="position: absolute;right: 104%;font-size:45px;color: #e6a490;" class="fa fa-quote-left" aria-hidden="true"></i>
    {{$cv['personal_info']->summary}}
  </p>
  <!--<p style="margin-top:15px;">Lorem ipsum dolor sit amet, consectetur adispadicng elit. Duis velvelti purus. Donec turpic tuoror, convaliis sit smet sem id, varius mollis ex. p. Prellendtsqu blandit nisi ut massag moleti effeit. Suspendsisdf posendi. Nulla di adcuman odlor.</p>-->
  <h1 style="font-weight: 400; color: #43d4db; margin-top: 50px;">Skills</h1>
  <?php
    foreach ($cv['skills'] as $skill){
      $rating=($skill->rating/5)*100;
  ?>
  <div class="bold skill_container" style="width: 100%;overflow: hidden;">
    <p class="bold" style="margin-bottom: 15px !important;">{{$skill->name}}</p>
    <div style="width: 100%;height: 22px;padding: 4px;border: solid 2px #bbb; border-radius: 50px;">
      <div style="width: {{$rating}}%; background-color:#43d4db;height: 100%;border-radius: 50px;position: relative;">
        <span style="position: absolute; right: -7px; top:-15px; border-top: solid 7px #bbb; border-left: solid 7px #0000; border-right: solid 7px #0000;"></span>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
<div style="width: 60%; float: left;position: relative; padding-right: 6%;">
  <div style="margin-bottom: 30px; padding-left: 50px;position: relative;">
    <div style="position: absolute;left: -35px; top: -12px; width: 70px; height: 70px;background-color: #43d4db; border-radius: 100px;color: white;text-align: center;font-size: 30px;padding-top: 13px;"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
    <h1>Work Experience</h1>
    <?php
           foreach ($cv['experience'] as $experience){
        $start_date=strtotime($experience->start_date);
        $start_year=date("Y", $start_date);
        $end_date=strtotime($experience->end_date);
        $end_year=date("Y", $end_date)
       ?>
    <div style="width: 100%; overflow: hidden; margin-top: 30px;">
      <div style="width: 30%;float: left;">
        <p class="bold" style="font-size: 18px;">{{$start_year}} - {{$end_year}}</p>
      </div>
      <div style="width: 70%; float: left;">
        <p class="bold" style="font-size: 17px;">{{$experience->position_or_job_title}}</p>
        <P class="bold" style="font-size: 17px;">{{$experience->company_name}}</P>
        <P style="margin-top: 15px;">{{$experience->responsibilities}}</P>
      </div>
    </div>
    <?php } ?>
  </div>

  <div style="margin-bottom: 30px; padding-left: 50px;position: relative;">
    <div style="position: absolute;left: -35px; top: -12px; width: 70px; height: 70px;background-color: #43d4db; border-radius: 100px;color: white;text-align: center;font-size: 30px;padding-top: 13px;"><i class="fa fa-graduation-cap" aria-hidden="true"></i></div>
    <h1>Education</h1>
    <?php
           foreach ($cv['education'] as $education){
        $start_date=strtotime($education->start_date);
        $start_year=date("Y", $start_date);
        $end_date=strtotime($education->end_date);
        $end_year=date("Y", $end_date);
       ?>
    <div style="width: 100%; overflow: hidden; margin-top: 30px;">
      <div style="width: 30%;float: left;">
        <p class="bold" style="font-size: 18px;">{{$start_year}} - {{$end_year}}</p>
      </div>
      <div style="width: 70%; float: left;">
        <p class="bold" style="font-size: 17px;">{{$education->school_university}}</p>
        <P style="margin-top: 15px;">{{$education->description}}</P>
      </div>
    </div>
    <?php } ?>
  </div>
  <div style="margin-bottom: 30px; padding-left: 50px;position: relative;">
    <div style="position: absolute;left: -35px; top: -12px; width: 70px; height: 70px;background-color: #43d4db; border-radius: 100px;color: white;text-align: center;font-size: 30px;padding-top: 13px;"><i class="fa fa-trophy" aria-hidden="true"></i></div>
    <h1>AWARD</h1>
    <div style="width: 100%; overflow: hidden; margin-top: 30px;">
      
      <div style="width: 100%; float: left;">
        <p class="bold" style="font-size: 17px;">SCHOOL NAME</p>
        
        <P style="margin-top: 15px;">Lorem ipsum dolor sit amet, consectetur adispadicng elit. Duis velvelti purus. Donec turpic convaliis.</P>
      </div>
    </div>
  </div>
</div>
</div>
<?php }else if($cv['personal_info']->resume_templet_id=='8'){ ?>
<style type="text/css">
.marcelinecv-bg{
  position: relative;overflow: hidden;padding-bottom: 50px;
}
.light-blue{
  background-color: #a6c9d4;

}
.round-social{
  width: 30px;
  height: 30px;
  padding: 9px;
  border-radius: 50px;                  			
  color: white;
}
.marcelinecv-bg p{
  margin-bottom: 10px !important;         
  margin-bottom: 5px !important;             
  font-size: 15px ; 
  font-weight: 400;    
  color: #222;
}
h1{
  font-weight: 400;
}
p.bold{
  font-weight: 500;
}
.skill_container{
  margin-bottom: 20px;
}
.white p{
  color: white !important;
}
.white h3{
  color: white !important;
}
.white i{
  color: #54649c;
}
.skill_dot{
  margin-right: 4px;
  float: left;
  width: 16px;
  height: 16px;
  border-radius: 100px;
  background-color: #54649c;
}
.skill_dot_active{
  margin-right: 4px;
  float: left;
  width: 16px;
  height: 16px;
  border-radius: 100px;
  background-color: #ffa919;
}
.skill_dots{
  width: 160px;
  position: relative;
}
.skill_dots_active{
  position: absolute;
  width: 100%;
  height: 100%;
}
.skill_sub_section{
  margin-bottom: 20px;
  overflow: hidden;
}
.title_background_heavy{
  transform: skewX(-20deg);
  position: absolute;
  height: 140%;
  width: 500px;
  right: -29px;
  background-color: #54649c;
  top: -14%;
}
.title_background_light{
  transform: skewX(-20deg);
  position: absolute;
  height: 140%;
  width: 500px;
  right: -29px;
  background-color: #dfe5f7;
  top: -14%;
}
.section_title_content{
  position: relative;
}
.left_section_title{
  position: relative;
  float: left;
  overflow: visible;
  color: #a26161;
}
.left_section_title_container{
  width: 100%;
  display: block;
  padding-bottom: 54px;
  margin-top: 30px;
}
.skill_sub_section{
  width: 100%;                    			
}
.about_content{
  width: 100%;                    			
}
.year_heading{
  font-size: 23px;
  margin-bottom: 10px;
}
.position_heading{
  color: #6c88ec;
  font-size: 17px;
}
.location{
  font-style: italic;
  font-size: 14px;
  font-weight: 500;
  color: #000;
}
.school_name{
  font-size: 17px;
  font-weight: 500;
  font-style: italic;
}
</style>
<div style="position: absolute;width: 40%;height: 100%;left: 0px; top: 0px;background-color: #26325d;"></div>
<div style="position: absolute;width: 60%;height: 100%;left: 40%; top: 0px;background-color: #f7f7f7;"></div>
<div class="white" style="width: 40%;position: relative;overflow: hidden;float: left;padding: 0% 6% 0% 7%;background-color: #26325d;">
<?php if( $cv['personal_info']->photo!=''){
  $url_photo = URL::to('/public/thumbnail/'.$cv['personal_info']->photo);
}else {
  $url_photo = URL::to('/public/thumbnail/rsz_profile-placeholder.png');
} ?>	
<div style="width: 270px;height: 270px; background-image: url(<?php echo $url_photo; ?>);background-position:center; background-size: cover; margin:auto;position: relative;margin-top:70px;border-radius: 500px;"></div>
<div class="contact_info_container" style="width: 100%;margin-top: 30px;">
  <div style="overflow: hidden;">
    <i style="float: left;width:25%;font-size: 45px; " class="fa fa-map-marker" aria-hidden="true"></i>
    <p style="float: left;width: 75%;">{{$cv['personal_info']->address}}, {{$cv['personal_info']->nationality}}</p>
  </div>
  <div style="margin-top: 5px;overflow: hidden;">
    <i style="float: left;width:25%;font-size: 45px; " class="fa fa-mobile" aria-hidden="true"></i>
    <p style="margin-top:12px; float: left;width: 75%;">{{$cv['personal_info']->mobile_number}}</p>
  </div>
  <div  style="font-size: 25px;display: block;overflow: hidden;margin-top: 5px;letter-spacing: 5px;margin-top: 15px;">
    <i class="fa fa-facebook " aria-hidden="true"></i>
    <i class="fa fa-twitter " aria-hidden="true"></i>
    <i class="fa fa-linkedin " aria-hidden="true"></i>
    <i class="fa fa-instagram" aria-hidden="true"></i>	
  </div>
  <div style="overflow: hidden;margin-top: 5px;margin-bottom: 50px;">
    <p>/{{$cv['personal_info']->name}}</p>
  </div>
  <div class="left_section">
    <div class="left_section_title_container"> 					
      <h3 class="left_section_title">
        <div class="title_background_heavy"></div>
        <span class="section_title_content">Skills</span>
      </h3>
    </div>
    <div class="skill_sub_section">
      <?php
        foreach ($cv['skills'] as $skill){
      ?>
      <p>{{$skill->name}}</p>
      <div style="width: 160px;" class="skill_dots">
        <div class="skill_dots_active" >
          <?php for($i=0; $i<$skill->rating; $i++){ ?>
          <div class="skill_dot_active"></div>
          <?php } ?>
        </div>
      </div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
    </div>
    <?php } ?>
  </div>
  <div class="left_section">
    <div class="left_section_title_container"> 					
      <h3 class="left_section_title">
        <div class="title_background_heavy"></div>
        <span class="section_title_content">Honors and Awards</span>
      </h3>
    </div>
    <div class="award_sub_section">
      <h3 class="award_year">
        2018
      </h3>
      <p>College of Healthcare Operations Management Best Paper Competition, runner-up.</p>
    </div>

    <div class="award_sub_section">
      <h3 class="award_year">
        2018
      </h3>
      <p>College of Healthcare Operations Management Best Paper Competition, runner-up.</p>
    </div>
  </div>

</div>
<div style="width: 60%;position: relative;float: left;padding-top: 80px;padding-left: 60px;overflow: hidden;">
<h1 style="font-size: 55px; font-weight: 700px; margin-bottom: 5px;">{{$cv['personal_info']->name}}</h1>
<p class="bold" style="font-size: 26px; letter-spacing:7px;font-weight: 300; color:#2ed0d8;">{{$cv['personal_info']->job_tittle}}</p>
<p style="font-style: italic;">{{$cv['personal_info']->email}}</p>
<div class="right_section">
  <div class="left_section_title_container"> 					
    <h3 class="left_section_title">
      <div class="title_background_light"></div>
      <span class="section_title_content">About Me</span>
    </h3>
  </div>
  <div class="about_content">
    <p>{{$cv['personal_info']->summary}}</p>
  </div>
</div>
<div class="right_section">
  <div class="left_section_title_container"> 					
    <h3 class="left_section_title">
      <div class="title_background_light"></div>
      <span class="section_title_content">Professional Experience</span>
    </h3>
  </div>
  <?php
    foreach ($cv['experience'] as $experience){
      $start_date=strtotime($experience->start_date);
      $start_year=date("Y", $start_date);
      $end_date=strtotime($experience->end_date);
      $end_year=date("Y", $end_date)
  ?>
  <div class="sub_section">
    <h3 class="year_heading">{{$start_year}} - {{$end_year}}</h3>
    <p class="position_heading">{{$experience->position_or_job_title}}</p>
    <p class="location">{{$experience->company_name}}</p>
    <ul class="exp_content">
      <li>{{$experience->responsibilities}}</li>
    </ul>
  </div>
  <?php } ?>
</div>
<div class="right_section">
  <div class="left_section_title_container"> 					
    <h3 class="left_section_title">
      <div class="title_background_light"></div>
      <span class="section_title_content">Education</span>
    </h3>
  </div>
  <?php
    foreach ($cv['education'] as $education){
      $start_date=strtotime($education->start_date);
      $start_year=date("Y", $start_date);
      $end_date=strtotime($education->end_date);
      $end_year=date("Y", $end_date);
  ?>
  <div class="sub_section">
    <p class="position_heading">
    {{$education->field_of_study}}
    </p>
    <p class="school_name">{{$education->school_university}}</p>
    <p class="school_location">
    {{$education->city_country}}
    </p>
  </div>
  <?php } ?>
</div>
</div>
</div>
<?php }else if($cv['personal_info']->resume_templet_id=='9'){ ?>
<style type="text/css">
.marcelinecv-bg{
  position: relative;overflow: hidden;padding-bottom: 50px;background-color: #e0e5f3;
}
p{
  font-size: 16px;
  font-weight: 400;
  color: #222;
}
.company_name{
  font-weight: 500;
}
li{
  color: #222;
}
.avatar{
  height: 320px;
  width: 320px;
  background-size: cover;
  background-position: center;
  margin: auto;
}
.top_section{
  position: relative;
  width: 100%;
  height: 320px;
  background-color: #313131;
}
.top_section_big_title{
  position: absolute;
  font-size: 97px;
  font-weight: 700;
  transform: scaleY(1.3);
  letter-spacing: -3px;
  top: 50%;
  transform: translateY(-50%);
  left: 50px;
  color: #8c898b;
}
.name_section{
    position: absolute;
    transform: translateY(-50%);
    top: 50%;
    left: 59%;
}
.resume{
  color: white;
  font-size: 24px;
  letter-spacing: 3px;
  margin-bottom: -11px;
}
.name{
    color: #ecb5e1;
    font-size: 61px;
    font-weight: 400;
}
.contact_info_container{
  padding: 30px 6%;
  overflow: hidden;
}
.contact{
  width: 65%;
  float: left;
  padding-right: 30px;
}
.contact_info_container h4{
  margin-bottom: 10px;
}
.contact_info_container p{
  margin-bottom: 0px;
}
.contact_info_container i{
  margin-right: 10px;
}

.portfolio{
  width: 35%;
  float: left;
}

.portfolio_icon{
  float: left;
  padding: 10px;
  width: 60px;
  height: 60px;
  background-color: #333;
  border-radius: 7px;
  margin: 0px 15px 10px 0px;
}

.portfolio_icon i{
  font-size: 40px;
  color: white;
}

.section_title{
    padding-bottom: 10px;
    border-bottom: solid 1px #000;
}

.position_title{
  margin-bottom: 0px !important;
  color: #3c5394;
}

.company_name{
  font-size: 16px;
  letter-spacing: 1px;
  margin-bottom: 7px !important;
}

.exp_item{
  margin-left: 50px;
  padding-left: 50px;
  border-left: solid 1px #444;
  padding-bottom: 20px;
  position: relative;
}

.year_container{
  position: absolute;
  left: -40px;
  background-color: #f0ccff;
  width: 80px;
  text-align: center;
  padding-top: 2px;
  padding-bottom: 3px;
  border: solid 1px #777;
}
.year{
  margin-bottom: 0px !important;
}
.software li{
  display: inline-block;
  margin: 0px 5px;
}
.language li{
  display: inline-block;
  margin: 0px 5px;
  position: relative;
}
.soft_content{
  font-size: 32px;
  top: 10px;
  left: 21px;
  position: absolute;
  color: #333;
}
.lang_content{
  position: absolute;
  top: 0;
  width: 100%;
  margin-top: 15px;
}
.lang_name{
  font-size: 10px;
  margin-bottom: 0px !important;
}
.lang_name{
  font-size: 10px;
}
.skill_dot{
  margin-top: 11px;
  width: 7px;
  height: 7px;
  background-color: white;
  float: left;
  margin-right: 5px;
}
.skill_dot_active{
  margin-top: 11px;
  width: 7px;
  height: 7px;
  background-color: #333;
  float: left;
  margin-right: 5px;
}
.qualification_item{
  overflow: hidden;
}
.qualification_item p{
  margin-bottom: 15px;
}
.lang_content{
  position: absolute;
  top: 0;
  width: 100%;
  margin-top: 15px;
}
.interests li{
  display: inline-block;
  margin: 0px 5px;
  text-align: center;
  padding: 7px;

}
.interests li i{
  font-size: 45px;

}
</style>
<div class="top_section">
<h1 class="top_section_big_title">HELLO</h1>
<div class="name_section">
  <p class="resume">RESUME</p>
  <h1 class="name">{{$cv['personal_info']->name}}</h1>
</div>
<?php if( $cv['personal_info']->photo!=''){
  $url_photo = URL::to('/public/thumbnail/'.$cv['personal_info']->photo);
}else {
  $url_photo = URL::to('/public/thumbnail/rsz_profile-placeholder.png');
} ?>
<div class="avatar" style="background-image: url(<?php echo $url_photo; ?>);"></div>
</div>
<div class="contact_info_container">
<div class="contact">
  <div style="width: 50%; float: left;">
    <h4>CONTACT</h4>
    <P><i class="fa fa-phone" aria-hidden="true"></i>{{$cv['personal_info']->mobile_number}}</P>
    <P><i class="fa fa-envelope" aria-hidden="true"></i>{{$cv['personal_info']->email}}</P>
  </div>
  <div style="width: 50%; float: left;">
    <h4>ADDRESS</h4>
    <P><i class="fa fa-map-marker" aria-hidden="true"></i>{{$cv['personal_info']->address}}, {{$cv['personal_info']->nationality}}</P>
  </div>
</div>
<div class="portfolio">
  <div class="portfolio_icon">
    <i class="fa fa-folder-open" aria-hidden="true"></i>
  </div>
  <div class="portfolio_content">
    <h4>PORTFOLIO</h4>
    <P>{{$cv['personal_info']->ulr}}</P>
  </div>
</div>
</div>
<div style="width: 100%;padding-top: 30px;padding-left: 6%;padding-right: 6%;">
<div style="width: 65%;padding-right: 30px; float: left;">
  <h4 class="section_title">WORK EXPERIENCE</h4>
  <?php
    foreach ($cv['experience'] as $experience){
      $start_date=strtotime($experience->start_date);
      $start_year=date("Y", $start_date);
      $end_date=strtotime($experience->end_date);
      $end_year=date("Y", $end_date)
  ?>
  <div class="exp_item">
    <div class="year_container">
      <p class="year">{{$start_year}}</p>
    </div>
    <p class="position_title">
    {{$experience->position_or_job_title}}
    </p>
    <p class="company_name">
    {{$experience->company_name}}
    </p>
    <ul class="exp_ul">
      <li>{{$experience->responsibilities}}</li>
    </ul>
  </div>
  <?php } ?>
</div>
<div style="width: 35%;float: left;">
  <h4 class="section_title">SOFTWARE</h4>
  <ul class="software" style="padding: 0px; text-align: center;list-style: none;">
    <li>
      <div style= "float: left;position: relative;">
        <canvas id="skill1" width="70" height="70" ></canvas>
        <div class="soft_content">
          Ai
        </div>				
        
      </div>
    </li>
    <li>
      <div style="width: 30%; float: left;position: relative;">
        <canvas id="skill2" width="70" height="70" ></canvas>
        <div class="soft_content" >
          Ai
        </div>
        
        
      </div>
    </li>
    <li>
      <div style="width: 30%; float: left;position: relative;">
        <canvas id="skill3" width="70" height="70" ></canvas>
        <div class="soft_content" >
          Ai
        </div>
        
        
      </div>
    </li>
    <li>
      <div style="width: 30%; float: left;position: relative;">
        <canvas id="skill4" width="70" height="70" ></canvas>
        <div class="soft_content" >
          Ai
        </div>
        
        
      </div>
    </li>
    <li>
      <div style="width: 30%; float: left;position: relative;">
        <canvas id="skill5" width="70" height="70" ></canvas>
        <div class="soft_content" >
          Ai
        </div>
        
        
      </div>
    </li>

  </ul>
  <script type="text/javascript">
    var canvas = document.getElementById('skill1');
  var ctx = canvas.getContext('2d');
  var x = 35;
  var y = 35;
  var radius = 32;

  var startAngle = 0 * Math.PI;
  var endAngle = 2 * Math.PI;
  var counterClockwise = false;
  ctx.beginPath();
  ctx.arc(x, y, radius, startAngle, endAngle, counterClockwise);
  ctx.lineWidth = 3;
  // line color
  ctx.strokeStyle = '#fff';
  ctx.stroke();


  var startAngle = -0.5 * Math.PI;
  var endAngle = 0.2 * Math.PI;
  var counterClockwise = false;
  ctx.beginPath();
  ctx.arc(x, y, radius, startAngle, endAngle, counterClockwise);
  ctx.lineWidth = 3;
  // line color
  ctx.strokeStyle = '#01288a';
  ctx.stroke();


  var canvas = document.getElementById('skill2');
  var ctx = canvas.getContext('2d');
  var x = 35;
  var y = 35;
  var radius = 32;

  var startAngle = 0 * Math.PI;
  var endAngle = 2 * Math.PI;
  var counterClockwise = false;
  ctx.beginPath();
  ctx.arc(x, y, radius, startAngle, endAngle, counterClockwise);
  ctx.lineWidth = 3;
  // line color
  ctx.strokeStyle = '#fff';
  ctx.stroke();


  var startAngle = -0.5 * Math.PI;
  var endAngle = 1.5 * Math.PI;
  var counterClockwise = false;
  ctx.beginPath();
  ctx.arc(x, y, radius, startAngle, endAngle, counterClockwise);
  ctx.lineWidth = 3;
  // line color
  ctx.strokeStyle = '#01288a';
  ctx.stroke();

  var canvas = document.getElementById('skill3');
  var ctx = canvas.getContext('2d');
  var x = 35;
  var y = 35;
  var radius = 32;

  var startAngle = 0 * Math.PI;
  var endAngle = 2 * Math.PI;
  var counterClockwise = false;
  ctx.beginPath();
  ctx.arc(x, y, radius, startAngle, endAngle, counterClockwise);
  ctx.lineWidth = 3;
  // line color
  ctx.strokeStyle = '#fff';
  ctx.stroke();


  var startAngle = -0.5 * Math.PI;
  var endAngle = 1.5 * Math.PI;
  var counterClockwise = false;
  ctx.beginPath();
  ctx.arc(x, y, radius, startAngle, endAngle, counterClockwise);
  ctx.lineWidth = 3;
  // line color
  ctx.strokeStyle = '#01288a';
  ctx.stroke();


  var canvas = document.getElementById('skill4');
  var ctx = canvas.getContext('2d');
  var x = 35;
  var y = 35;
  var radius = 32;

  var startAngle = 0 * Math.PI;
  var endAngle = 2 * Math.PI;
  var counterClockwise = false;
  ctx.beginPath();
  ctx.arc(x, y, radius, startAngle, endAngle, counterClockwise);
  ctx.lineWidth = 3;
  // line color
  ctx.strokeStyle = '#fff';
  ctx.stroke();


  var startAngle = -0.5 * Math.PI;
  var endAngle = 1.5 * Math.PI;
  var counterClockwise = false;
  ctx.beginPath();
  ctx.arc(x, y, radius, startAngle, endAngle, counterClockwise);
  ctx.lineWidth = 3;
  // line color
  ctx.strokeStyle = '#01288a';
  ctx.stroke();


  var canvas = document.getElementById('skill5');
  var ctx = canvas.getContext('2d');
  var x = 35;
  var y = 35;
  var radius = 32;

  var startAngle = 0 * Math.PI;
  var endAngle = 2 * Math.PI;
  var counterClockwise = false;
  ctx.beginPath();
  ctx.arc(x, y, radius, startAngle, endAngle, counterClockwise);
  ctx.lineWidth = 3;
  // line color
  ctx.strokeStyle = '#fff';
  ctx.stroke();


  var startAngle = -0.5 * Math.PI;
  var endAngle = 1.5 * Math.PI;
  var counterClockwise = false;
  ctx.beginPath();
  ctx.arc(x, y, radius, startAngle, endAngle, counterClockwise);
  ctx.lineWidth = 3;
  // line color
  ctx.strokeStyle = '#01288a';
  ctx.stroke();
  </script>

  <h4 class="section_title">MY STATEMENT</h4>
  <p class="statement">{{$cv['personal_info']->summary}}</p>
</div>
</div>

<div style="width: 100%; padding-top: 30px; padding-left:6%; padding-right: 6%;overflow: hidden;">
<div style="width: 30%;float: left;margin-right: 20px;">
  <h4 class="section_title">QUALIFICATIONS</h4>
  <div class="qualification_item">
    <div style="width: 50%;float: left;">
      <p>Communication</p>
    </div>
    <div style="width: 50%; float: left;position: relative;">
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>

      <div style="width: 100%; height: 100%;position: absolute;top: 0px;left: 0px;">
        <div class="skill_dot_active"></div>
        <div class="skill_dot_active"></div>
        <div class="skill_dot_active"></div>
      </div>
    </div>
  </div>

  <div class="qualification_item">
    <div style="width: 50%;float: left;">
      <p>Hard working</p>
    </div>
    <div style="width: 50%; float: left;position: relative;">
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>

      <div style="width: 100%; height: 100%;position: absolute;top: 0px;left: 0px;">
        <div class="skill_dot_active"></div>
        <div class="skill_dot_active"></div>
        <div class="skill_dot_active"></div>
      </div>
    </div>
  </div>


  <div class="qualification_item">
    <div style="width: 50%;float: left;">
      <p>Organize</p>
    </div>
    <div style="width: 50%; float: left;position: relative;">
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>
      <div class="skill_dot"></div>

      <div style="width: 100%; height: 100%;position: absolute;top: 0px;left: 0px;">
        <div class="skill_dot_active"></div>
        <div class="skill_dot_active"></div>
        <div class="skill_dot_active"></div>
      </div>
    </div>
  </div>
</div>


<div style="width: 30%;float: left;margin-right: 20px;">
  <h4 class="section_title">LANGUAGES</h4>
  <ul class="language" style="padding: 0px; text-align: center;list-style: none;">
    <?php
      foreach ($cv['languages'] as $lang){
        $rating=$lang->rating;
    ?>
    <li>
      <div style= "float: left;position: relative;">
        <canvas class="lang" width="70" height="70" value="{{$rating}}"></canvas>
        <div class="lang_content">
          <p class="lang_name">{{$lang->name}}</p>
          <p class="lang_percent">{{($rating/5)*100}}%</p>
        </div>		
      </div>
    </li>
    <?php } ?>
  </ul>
  <script type="text/javascript">
    var langs = document.getElementsByClassName("lang");
    for(var i=0; i<=langs.length; i++){
      var canvas = langs[i];
      var rating = langs[i].getAttribute("value")
      var ctx = canvas.getContext('2d');
      var x = 35;
      var y = 35;
      var radius = 32;

      var startAngle = 0 * Math.PI;
      var endAngle = 2 * Math.PI;
      var counterClockwise = false;
      ctx.beginPath();
      ctx.arc(x, y, radius, startAngle, endAngle, counterClockwise);
      ctx.lineWidth = 3;
      // line color
      ctx.strokeStyle = '#fff';
      ctx.stroke();


      var startAngle = -0.5 * Math.PI;
      var endAngle = (-0.5+(rating/5)*2) * Math.PI;
      var counterClockwise = false;
      ctx.beginPath();
      ctx.arc(x, y, radius, startAngle, endAngle, counterClockwise);
      ctx.lineWidth = 3;
      // line color
      ctx.strokeStyle = '#01288a';
      ctx.stroke();
    }
  </script>
</div>

<div style="width: 30%;float: left;margin-right: 20px;">
  <h4 class="section_title">INTERESTS</h4>
  <ul class="interests" style="padding: 0px; text-align: center;list-style: none;">
    <li><i class="fa fa-plane" aria-hidden="true"></i></li>
    <li><i class="fa fa-pencil-square-o" aria-hidden="true"></i></li>
    <li><i class="fa fa-book" aria-hidden="true"></i></li>
  </ul>
</div>
</div>
<?php }else if($cv['personal_info']->resume_templet_id=='10'){ ?>
<style type="text/css">
.marcelinecv-bg{
  position: relative;overflow: hidden;padding-bottom: 50px;background-color: #fdfbf6;
}
p{
  font-size: 16px;
  font-weight: 400;
  color: #222;
}
.section_title_container{
  width: 100%;
  overflow: hidden;
}
.section_title{
  float: left;
  padding: 3px 25px;
  border:solid 1px #333;
}
.location_year{
  letter-spacing: 2px;
  font-size: 12px;
  font-weight: 700;
  margin-bottom: 4px !important;
}
.position_container{
  width: 100%;
  overflow: hidden;
}
.position{
  float: left;
  background-color: #f5e2e3;
  padding: 4px 20px;
  font-size: 20px;
  color: #9a8f9c;
  font-weight: 400;
}
.interest_item{
  float: left;
}
.interest_item{
  width: 50px;
  height: 50px;
  background-color: #ccc6c2;
  border-radius: 5px;
  color: #333;
  font-size: 30px;
  text-align: center;
  padding-top: 2px;
  margin-right: 10px;
  position: relative;
}
.interest_right_arrow{
    position: absolute;
    top: 50%;
    right: -5px;
    border-left: solid 6px #ccc6c2;
    border-top: solid 8px #0000;
    border-bottom: solid 8px #0000;
    transform: translateY(-50%);
}
.interest_left_arrow{
    position: absolute;
    top: 50%;
    left: 0px;
    border-left: solid 6px #fdfbf6;
    border-top: solid 8px #0000;
    border-bottom: solid 8px #0000;
    transform: translateY(-50%);
}
.contact_item i{
  border-radius: 100px;

  width: 35px;
  height: 35px;
  background-color: #908f9c;
  color: #fdfbf6;
  text-align: center;
  padding-top: 10px;
  float: left;
  margin-right: 15px;
}
.skill_item{
  margin-bottom: 15px;
}
.section{
  margin-bottom: 50px;
}
.education_item_title{
  font-size: 15px;
  font-weight: 700;
  letter-spacing: 1px;
  margin-bottom: 0px !important;
}
.skill_dot{
  width: 13px;
  height: 13px;
  background-color: #bdb8ac;
  border-radius: 50px;
  float: left;
  margin-right: 5px;
}
.skill_dot_container{
  position: relative;
  width: 100%;
  overflow: hidden;
}
.skill_dot_active_container{
    width: 100%;
    
    overflow: hidden;
    position: absolute;
    top: 0;
    left: 0;
}
.skill_dot_active{
  width: 13px;
  height: 13px;
  background-color: #8e75b5;
  border-radius: 50px;
  float: left;
  margin-right: 5px;
  z-index: 999;
}
.skill_title{
  font-size: 15px;
  font-weight: 500;
  margin-bottom: 7px !important;
}
</style>
<div style="width: 100%; height: 300px; position: relative; padding-top: 50px;" class="top_section">
<div style="position: absolute;width: 100%; height: 150px;background-color: #ccc6c2;top: 0;"></div>
<div style="margin: auto; overflow: hidden; width: 700px; position: relative;">
  <?php if( $cv['personal_info']->photo!=''){
    $url_photo = URL::to('/public/thumbnail/'.$cv['personal_info']->photo);
  }else {
    $url_photo = URL::to('/public/thumbnail/rsz_profile-placeholder.png');
  } ?>
  <div class="avatar" style="width: 200px; height: 200px; background-image: url(<?php echo $url_photo; ?>); float: left; border-radius: 20px;background-position:center;background-size:cover;"></div>
  <div class="name_container" style="border-top-right-radius: 15px; width: 500px; padding-left: 30px; padding-top: 8px; position: absolute; margin-left: 200px; top: 50%; transform: translateY(-50%); padding-bottom: 8px; background-color: #e2dfd7; border-bottom-right-radius: 15px;">
    <h1 class="name" style="font-size: 62px; font-weight: 400; margin-bottom: 3px;">
    {{$cv['personal_info']->name}}
    </h1>
    <p class="name_title" style="font-size: 28px; letter-spacing: 2px; margin-bottom: 6px;">
    {{$cv['personal_info']->job_tittle}}
    </p>
  </div>
</div>
</div>

<div style="width: 100%;overflow: hidden; padding: 0px 50px 50px 50px;">
<div style="width: 65%;overflow: hidden;float: left;">
  <div class="section">
    <div class="section_title_container">
      <h4 class="section_title">
        Profile
      </h4>
    </div>
    <p class="section_content">{{$cv['personal_info']->summary}}</p>	                    			
  </div>
  <div class="section">
    <div class="section_title_container">
      <h4 class="section_title">
        Professional Experience
      </h4>
    </div>
    <?php
      foreach ($cv['experience'] as $experience){
        $start_date=strtotime($experience->start_date);
        $start_year=date("Y", $start_date);
        $end_date=strtotime($experience->end_date);
        $end_year=date("Y", $end_date)
    ?>
    <div class="sub_section">
      <p class="location_year">
        <span class="location">{{$experience->position_or_job_title}}</span>|
        <sapn class="year">{{$start_year}} - {{$end_year}}</sapn>
      </p>
      <div class="position_container">
        <h4 class="position">
        {{$experience->company_name}}
        </h4>
      </div>
      <ul class="role_content">
        <li class="role_item">
        {{$experience->responsibilities}}
        </li>
      </ul>
    </div>
    <?php } ?>
  </div>

  <div class="section">
    <div class="section_title_container">
      <h4 class="section_title">
        INTERESTS
      </h4>
    </div>
    <div class="interest_item">
      <span class="interest_right_arrow"></span>
      <span  class="interest_left_arrow"></span>
      <i class="fa fa-futbol-o" aria-hidden="true"></i>
    </div>
    <div class="interest_item">
      <span class="interest_right_arrow"></span>
      <span  class="interest_left_arrow"></span>
      <i class="fa fa-futbol-o" aria-hidden="true"></i>
    </div>
    <div class="interest_item">
      <span class="interest_right_arrow"></span>
      <span  class="interest_left_arrow"></span>
      <i class="fa fa-futbol-o" aria-hidden="true"></i>
    </div>
    <div class="interest_item">
      <span class="interest_right_arrow"></span>
      <span  class="interest_left_arrow"></span>
      <i class="fa fa-futbol-o" aria-hidden="true"></i>
    </div>
  </div>


</div>
<div style="width: 35%; overflow: hidden;">
  <div class="section">
    <div class="contact_item">
      <i class="fa fa-phone" aria-hidden="true"></i>
      <p class="contact_content">{{$cv['personal_info']->mobile_number}}</p>
    </div>
    <div class="contact_item">
      <i class="fa fa-envelope" aria-hidden="true"></i>
      <p class="contact_content">{{$cv['personal_info']->email}}</p>
    </div>
    <div class="contact_item">
      <i class="fa fa-map-marker" aria-hidden="true"></i>
      <p class="contact_content">{{$cv['personal_info']->address}}, {{$cv['personal_info']->nationality}}</p>
    </div>
  </div>

  <div class="section">
    <div class="section_title_container">
      <h4 class="section_title">
        Education
      </h4>
    </div>
    <?php
    foreach ($cv['education'] as $education){
      $start_date=strtotime($education->start_date);
      $start_year=date("Y", $start_date);
      $end_date=strtotime($education->end_date);
      $end_year=date("Y", $end_date);
    ?>
    <div class="sub_section">
      <p class="education_item_title">
      {{$education->field_of_study}}
      </p>
      <p class="education_item_content">
      {{$education->school_university}}. {{$education->city_country}}
      </p>
    </div>
    <?php } ?>
  </div>

  <div class="section">
    <div class="section_title_container">
      <h4 class="section_title">
        Key Skills
      </h4>
    </div>
    <?php
      foreach ($cv['skills'] as $skill){
    ?>
    <div class="skill_item">
      <p class="skill_title">
      {{$skill->name}}
      </p>
      <div class="skill_dot_container">
        <div class="skill_dot"></div>
        <div class="skill_dot"></div>
        <div class="skill_dot"></div>
        <div class="skill_dot"></div>
        <div class="skill_dot"></div>
        <div class="skill_dot_active_container">
          <?php for($i=0; $i<$skill->rating; $i++){ ?>
          <div class="skill_dot_active"></div>
          <?php } ?>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>

  <div class="section">
    <div class="section_title_container">
      <h4 class="section_title">
        Awards
      </h4>
    </div>
    <div class="sub_section">
      <p class="education_item_title">
        B.A Business Management
      </p>
      <p class="education_item_content">
        Campton University. Chicago, IL 2008
      </p>
    </div>
  </div>


</div>

</div>
<?php } ?>
