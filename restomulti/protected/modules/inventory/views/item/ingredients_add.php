<?php
 echo CHtml::beginForm('','post',array(
  'id'=>"frm_ajax",
  'onsubmit'=>"return false;"	  
)); 
?> 	
	
<DIV class="main_box_wrap">

<div class="row">
<div class="col-md-6">

 <div class="card card_medium" id="box_wrap">
	<div class="card-body">
			 
	   <?php MultilangForm::setForm(array(
	      'Ingredients name',''
	   ), array(
	      'ingredients_name','sequence'
	   ), (array)$data,
	      array(
	        true, false
	      ),array(
	       'text','hidden'
	      )
	   );
	   
	   MultilangForm::setStatusList($data);
	   ?>	  
	
	</div>
 </div>
  
 
</div> <!--COL-->


</div> <!--end row-->

</DIV>


<div class="floating_action">
       <a href="<?php echo Yii::app()->createUrl(APP_FOLDER.'/item/ingredients_list')?>" class="<?php echo ItemHtmlWrapper::cancelBtnClass()?>">
       <?php echo translate("CANCEL")?>
       </a>
       
       <?php if(is_array($data) && count($data)>=1):?>
       <a href="javascript:;" class="<?php echo ItemHtmlWrapper::deleteBtnClass()?> delete_record"><?php echo translate("DELETE")?></a>        
       <?php endif;?>
       
       <button type="submit" class="<?php echo ItemHtmlWrapper::saveBtnClass()?>"><?php echo translate("SAVE")?></button>                  
       
</div>

<?php echo CHtml::endForm(); ?>