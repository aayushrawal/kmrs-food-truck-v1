<DIV class="main_box_wrap">

<?php
 echo CHtml::beginForm('','post',array(
  'id'=>"frm_table_filter",		  
  'onsubmit'=>"return false;"	  
)); 
echo CHtml::hiddenField('range1',$start_date,array(
 'class'=>"range1"
));
echo CHtml::hiddenField('range2',$end_end,array(
 'class'=>"range2"
));
$x = 0;
?> 	   

<div class="row top_filter">

<div class="col-md-8"  >

	   
	   
<div class="row action_top_wrap button_small_wrap ">

<div class="col-lg-4 col-md-4 col-sm-4">
<div class="card"><div class="card-body">
  <?php echo CHtml::textField('date_range','',array(
    'class'=>"form-control date_range no_border",
    'readonly'=>true
  ))?>
</div></div> <!--card-->
</div> <!--col-->


<div class="col-lg-3 col-md-4 col-sm-4">
<div class="card"><div class="card-body">
<div class="dropdown">
  <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" 
     aria-haspopup="true" aria-expanded="true">
     <i class="glyphicon glyphicon-cog"></i>
     <span class="filter_label" data-field="status">
      <?php 
       if(is_array($default_status) && count($default_status)>=1){
       	 echo translate("[count] status",array(
       	   '[count]'=>count($default_status)
       	 ));
       } else echo translate("All status");       
     ?>
     </span>
     <span class="caret"></span>
  </button>
  
  <?php $x = 0;?>
  <ul class="dropdown-menu checkbox-menu allow-focus" aria-labelledby="dropdownMenu1">  
    <?php  foreach ($order_status as $order_status_key=>$order_status_val):?>
    <li>
      <label>       
        <?php 
        
        $class_name = "filter_data";
        if($order_status_key=="all"){
        	$class_name = "filter_all";
        }
        
        echo CHtml::checkBox("status[$x]",
        in_array($order_status_key, (array) $default_status)?true:false
        ,array(
         'value'=>$order_status_key,
         'class'=>$class_name
        ));
        $x++;
        ?>
        
        <?php echo $order_status_val;?>
        
      </label>      
      <?php if($order_status_key=="all"):?>
      <hr></hr>
      <?php endif;?>
    </li>        
    <?php endforeach;?>
  </ul>
</div> <!--dropdown-->
</div></div> <!--card-->
</div> <!--col-->

<div class="col-lg-3 col-md-4 col-sm-4">
 <div class="card"><div class="card-body">
 <button type="submit" class="btn btn-info">
   <?php echo translate("Apply Filter")?>
 </button>
 </div></div> <!--card-->
</div>


</div> <!--row-->

</div> <!--COL-->

<DIV class="col-md-4 text-right relative">

<div class="search_wrap">
 <button type="submit" class="btn" style="width:auto;">
	<i class="fas fa-search"></i>
 </button>  	       
 <?php 
 echo CHtml::textField('search_field','',array(
  'placeholder'=>translate("Search order id"),
  'class'=>"form-control search_field",	      
 ));
 ?>
 <a href="javascript:;" class="icon close_search"><i class="fas fa-times"></i></a>
</div> <!--search_wrap-->


<a href="javascript:;" class="icon init_field_search">
  <i class="fas fa-search"></i>
</a>
</DIV>

</div> <!--ROW-->

<?php echo CHtml::endForm(); ?>	     
</DIV>

<div class="pt-3"></div>

<div class="row">
<div class="col-md-12">


<div class="card card_medium" id="box_wrap">
	<div class="card-body">

<?php
 echo CHtml::beginForm('','post',array(
  'id'=>"frm_table",
  'onsubmit'=>"return false;"
)); 
?> 	    

<table id="table_list" class="table data_tables table-hover table_receipt  ">
<thead>
<tr> 
 <th width="5%" ><?php echo translate("Order id")?></th> 
 <th width="9%" ><?php echo translate("Date")?></th> 
 <th width="8%" ><?php echo translate("Type")?></th> 
 <th width="12%" ><?php echo translate("Customer name")?></th> 
 <th width="10%" ><?php echo translate("Payment type")?></th> 
 <th width="10%" ><?php echo translate("Request from")?></th> 
 <th width="5%" ><?php echo translate("Status")?></th> 
 <th width="8%" class="col-qty xno-sort"><?php echo translate("Total")?></th> 
</tr>
</thead>
<tbody>  
</tbody>
</table>
    
<?php echo CHtml::endForm(); ?>
	
	</div> <!--body-->
</div> <!--card-->

<div class="sidebars">
  <div class="sidebar right">
  
   <div class="siderbar_nav">
    <a href="javascript:;" ><i class="fas fa-times"></i></a>    
   </div>
   
   <div class="sidebars_content"></div>
   
  </div>
</div> <!--sidebars-->
 
</div> <!--COL-->
</div> <!--end row-->
</DIV>


