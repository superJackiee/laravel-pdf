<?php require '../includes/app_config.php';
      require '../includes/session.php';
        
?>
   <div class="body-content">
                           <div class="modal-row clearfix">
                              <ul  class="list-unstyled">
                                 <li><span class="list-modalrow">Checkout Date</span>  <span class="list-modalrow"><input type="rent_end_date" class="calendar-design" id="<?=$end_date_id?>" value="<?=date("m/d/Y")?>"/></span></li>
                                 <li><span class="list-modalrow">Reason</span>  <span class="list-modalrow"><textarea class="reason-text-field" id="<?=$reason_id?>" placeholder="Enter reason to leave flat"></textarea></span></li>
                                 <li><span class="list-modalrow"><input type="button" name="save" value="Save" id="btn-save" data-map="<?=$_GET["map_id"]?>" /></span></li>
                              </ul>
                           </div>
                        </div>
