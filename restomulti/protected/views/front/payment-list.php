<?php FunctionsV3::sectionHeader('Payment Information')?>

<?php if (is_array($payment_list) && count($payment_list)>=1):?>
<?php foreach ($payment_list as $key => $val):?>

  <?php   
  /*if ($key=="ip8" || $key=="mol" || $key=="mri"){
  	  continue;
  }*/  
  ?>

  <div class="row top10">
    <div class="col-md-9">
       <?php echo CHtml::radioButton('payment_opt',false,
         array('class'=>"icheck payment_option",'value'=>$key))?> 
         <?php 
         switch ($key) {
         	case "pyr":
         		if ($transaction_type=="pickup"){
         		   echo t("Pay On Pickup");
         	    } else echo $val;         
         		break;
         
         	case "cod":
         		if ($transaction_type=="pickup"){
         		   echo t("Cash On Pickup");
         		} elseif ( $transaction_type=="dinein" ) {
         		   echo t("Pay in person");
         	    } else echo $val;         
         		break;
         		
         	case "pyp":         		
         	    $fee=0;
	         	if (FunctionsV3::isMerchantPaymentToUseAdmin($merchant_id)){	         		
	         		$fee=getOptionA('admin_paypal_fee');
	         	} else {	         		
	         		$fee=getOption($merchant_id,'merchant_paypal_fee');
	         	}	         	
	         	if($fee>0){
	         		echo $val= Yii::t("default","Paypal (card fee [fee])",array(
	         		  '[fee]'=>FunctionsV3::prettyPrice($fee)
	         		));
	         	} else echo $val;
         	    break;
         			
         	default:
         		echo $val; 
         		break;
         }
         ?>
     </div> 
  </div>
  
  <?php if ( $key=="cod"):?>
  <?php if ($transaction_type!="dinein"):?>
  <div class="row top10 indent20 change_wrap">
    <?php echo CHtml::textField('order_change','',array(
      'placeholder'=>t("change? For how much?"),
      'style'=>"width:200px;",
      'class'=>"grey-fields rounded"
     ))?>
  </div>
  <?php endif;?>
  <?php endif;?>
  
  <?php if ( $key=="pyr"):?>
  <?php   
  $provider_list=Yii::app()->functions->getPaymentProviderMerchant($merchant_id);
  /*if ( Yii::app()->functions->isMerchantCommission($merchant_id)){	          	
      $provider_list=Yii::app()->functions->getPaymentProviderListActive();         	
  }	*/         
  ?>
  <div class="payment-provider-wrap top10">  
   <?php if (is_array($provider_list) && count($provider_list)>=1):?>
	   <?php foreach ($provider_list as $val_provider_list): ?>
	   <div class="row">	       	       
	        <div class="col-md-3 relative">
	        <div class="checki">
	        <?php echo CHtml::radioButton('payment_provider_name',false,array(
	          'class'=>"icheck checki",
	          'value'=>$val_provider_list['payment_name']
	        ))?>	        
	        </div>
	        <img class="logo-small" src="<?php echo uploadURL()."/".$val_provider_list['payment_logo']?>">
	        </div>
	    </div>     
	   <?php endforeach;?>	   
	<?php else :?>   
	  <p class="uk-text-danger"><?php echo t("no type of payment")?></p>  
	<?php endif;?>  
  </div> <!--payment-provider-wrap-->
  <?php endif;?>
 
<?php endforeach;?>
<?php else:?>
<p class="text-danger"><?php echo t("No payment option available")?></p>
<?php endif;?>