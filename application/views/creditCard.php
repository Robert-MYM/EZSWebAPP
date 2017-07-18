	<body style="background:#7A7A7A">
	<div style="position:fixed; z-index:50;width:100%;height:10px;background:#ffffff;"></div>
		 <header data-am-widget="header" class="am-header am-header-default header" style="position:fixed; z-index:50;top:10px">

		
		  <div class="am-header-left am-header-nav">
		     <a id="left" href="<?php echo site_url('My');?>" class=""> 
		       <i class="am-header-icon am-icon-angle-left"></i>
		     </a>
		  </div>
		  <h1 class="am-header-title"> <a href="#title-link" class="" style="color: #333;">绑定银行卡</a></h1>
		  <div class="am-header-right am-header-nav">
		     <a id="right" href="<?php echo site_url('My/addCreditCardTable');?>" class="">
		     	<i class="am-header-icon am-icon-plus"></i>
		     </a>
		  </div>
	  </header>
	  <div style="width:100%;height:80px;background:#7A7A7A;"></div>
	  <?php echo form_open('Button/add/undo');?>
	 <?php foreach($creditCards as $index => $creditCard):?>
		<div class="page zShow" id="couponDetail" refresh="0" style="background:#7A7A7A">
		  <?php switch ($creditCard['bank']) {
		  	case '工商银行':?>
		    <div class="coupon-wrap" style="background:#b22c1e;">
		    <img src="<?php echo base_url('image/bank2.jpg');?>" alt="logo" class="logo">
		  <?php break;case '中国银行':?>
		    <div class="coupon-wrap" style="background:#9a1e24;">
		    <img src="<?php echo base_url('image/bank1.jpg');?>" alt="logo" class="logo">		 
		  <?php break;case '招商银行':?>
		    <div class="coupon-wrap" style="background:#409180;">
		    <img src="<?php echo base_url('image/bank3.jpg');?>" alt="logo" class="logo">		  
		  <?php break;case '建设银行' :?>
		    <div class="coupon-wrap" style="background:#18308f;">
		    <img src="<?php echo base_url('image/bank4.jpg');?>" alt="logo" class="logo">		
		  <?php break;}?>
		  	<input type="radio" name="cardid" value="<?php echo $creditCard['id'];?>" hidden>
		  	<input type="radio" name="card" value="<?php echo $creditCard['cardID'];?>" hidden>
		    <h1 class="name"><?php echo $creditCard['bank'];?></h1>
		 	<h1 class="name">**** **** **** <?php echo substr($creditCard['cardID'],-4);?></h1>
		    </div>
		</div>
	<?php endforeach;?>
	<div hidden>
		<div class="cate-search" style="position: relative; top: 0; border-bottom: 0;">
			<input type="text" class="cate-input" placeholder="绑定按钮" name="aksid" value="<?php echo isset($button['aksid'])?$button['aksid']:'';?>">
			<a href="#" class="cate-scan-btn" ></a>
		</div>
		<div class="cate-search" style="position: relative; top: 0; border-bottom: 0;">
			<input type="text" class="cate-input" placeholder="选择商品" name="goodsid" value="<?php echo isset($button['goodsid'])?$button['goodsid']:'';?>" >
			<a  id="goods" href="javascript:;" class="cate-btn" ></a>
		</div>
		<div class="cate-search" style="position: relative; top: 0; border-bottom: 0;">
			<input type="text" class="cate-input" placeholder="选择收货地址" name="address" value="<?php echo isset($button['address'])?$button['address']:'';?>" >
			<input type="text" class="cate-input" placeholder="选择收货地址" name="addressid" value="<?php echo isset($button['addressid'])?$button['addressid']:'';?>" >
			<a  id="address" href="javascript:;" class="cate-address-btn" ></a>
		</div>
		<div class="cate-search" style="position: relative; top: 0; border-bottom: 0;">
			<input type="text" class="cate-input" placeholder="数量" name="num" value="<?php echo isset($button['num'])?$button['num']:'';?>">
			<a  class="cate-num-btn" ></a>
		</div>
	</div>
<div id="submit" class="cate-search" style="position: relative; top: 0; border-bottom: 0;background:#7A7A7A;" hidden>
		<button type="submit" class="cate-button" style="background:#fff;color:#000;">确认</button>
	</div>
	</form>
	<script type="text/javascript">
		var choose = "<?php echo isset($choose)?1:0;?>";
		if(choose == '1'){
			$('#right').hide();
			$('.coupon-wrap').click(function(){
			 	$('.coupon-wrap').removeClass('curr');
				$(this).addClass('curr');
			 	$(this).find('input').attr('checked',true);
			 });

			$('form .coupon-wrap:first').click();

			$('#left').attr('href', "javascript:;");
			$('#left').click(function(){
				$('button').click();
			});
			$('#submit').show();
		}

	</script>
	</body>
</html>
