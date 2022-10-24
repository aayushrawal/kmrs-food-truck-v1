
<div class="box-grey rounded section-order-history" style="margin-top:0;">

<div class="bottom10">
<?php echo FunctionsV4::sectionHeader('Your Recent Booking');?>
</div>
<?php if (is_array($data) && count($data)>=1):?>

   <table class="table table-striped">
     <tbody>
     <?php foreach ($data as $val):?>     
      <tr class="tr_mobile">
        <td>
        <div class="mytable">
         <div class="mycol" style="width: 10%;"><i style="font-size: 30px;" class="ion-android-arrow-dropright"></i></div>
         <div class="mycol ">
           
           <a href="javascript:;" >
             <p><?php echo t("Booking ID")?># <?php echo $val['booking_id']?></p>
           </a>
           
           <a href="javascript:;"
           class=""  >
             <p><?php echo t("No of guest")?># <?php echo $val['number_guest']?></p>
           </a>
           
            <p><?php echo t("Book on");?> 
            <?php echo Yii::app()->functions->translateDate(prettyDate($val['date_created']))?></p>
         </div>
       </div>
        </td>
        
        <td>               
        <p><?php echo $val['booking_notes']?></p>            
        </td>
                
        
        <td>
          <a href="javascript:;" class="view-order-history" data-id="<?php echo $val['booking_id'];?>">
          <p class="green-text top10 "><?php echo t($val['status'])?></p>
          </a>
        </td>
      </tr>      
            
      <tr class="order-order-history show-history-<?php echo $val['booking_id']?>"> 
        <td colspan="5">
         <?php if ( $resh=FunctionsV4::getBookingHistory($val['booking_id'])):?>     
         <table class="table table-striped" >
           <thead>
             <tr>
             <th><?php echo t("Date/Time")?></th>
             <th><?php echo t("Status")?></th>
             <th><?php echo t("Remarks")?></th>
             </tr>
           </thead>
           <tbody>
           <?php foreach ($resh as $valh):?>
           <tr style="font-size:12px;">
             <td><?php                       
              echo FormatDateTime($valh['date_created'],true);
              ?></td>
             <td><?php echo t($valh['status'])?></td>
             <td><?php echo $valh['remarks']?></td>
           </tr>
           <?php endforeach;?>
         </tbody>
         </table>
         <?php else :?>
         <p class="text-danger small-text"><?php echo t("No history found")?></p>
         <?php endif;?>
        </td>
      </tr>      
      
      <?php endforeach;?>
     </tbody>
   </table>
<?php else :?>
   <p class="text-danger"><?php echo t("No order history")?></p>
<?php endif;?>


</div> <!--box-grey-->