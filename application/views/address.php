	<body>
	<div style="position:fixed; z-index:50;width:100%;height:10px;background:#ffffff;"></div>
		<header data-am-widget="header" class="am-header am-header-default header" style="position:fixed; z-index:50;top:10px">
			<div class="am-header-left am-header-nav">
				<a id="left" href="<?php echo site_url('My');?>" class=""> 
					<i class="am-header-icon am-icon-angle-left"></i>
				</a>
			</div>
			<h1 class="am-header-title"> <a href="#title-link" class="" style="color: #333;">收货地址</a></h1>
			<div class="am-header-right am-header-nav">
				<a id="right" href="<?php echo site_url('My/EditAddress');?>" class=""> 
					<i class="am-header-icon am-icon-plus"></i>
				</a>
			</div>
		</header>
		<div style="width:100%;height:60px;background:#ffffff;"></div>
		<ul class="address-list" >
			<?php echo form_open('Button/add/undo');?>
			<?php foreach($address as $index => $item):?>
				<li id="<?php echo 'li'.$index;?>">
					<p>收货人：<?php echo $item['name'];?>&nbsp;&nbsp;手机号：<?php echo $item['realphone'];?></p>
					<p class="order-add1"><?php echo $item['address'];?></p>
					<hr>
					<div class="address-cz">
						<div class="default" hidden>
							<label class="am-radio am-warning">
								<input type="radio" name="addressid" value="<?php echo $item['id'];?>" data-am-ucheck="" checked="" class="am-ucheck-radio"><span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span> 设为默认
							</label>
						</div>
						<input type="radio" name="address" value="<?php echo $item['address'];?>" data-am-ucheck="" hidden>
						<div id="edit">
						<a href="<?php echo site_url('My/EditAddress/'.$item['id'].'/1');?>"><img src="<?php echo base_url('image/edit.png');?>" style="width: 18px;">&nbsp;编辑</a>
						<a href="<?php echo site_url('My/deleteAddress/'.$item['id']);?>">删除</a>
						</div>
					</div>
				</li>
			<?php endforeach;?>
		<div hidden>
			<div class="cate-search" style="position: relative; top: 0; border-bottom: 0;">
				<input type="text" class="cate-input" placeholder="绑定按钮" name="aksid" value="<?php echo isset($button['aksid'])?$button['aksid']:'';?>">
				<a href="#" class="cate-scan-btn" ></a>
			</div>
			<div class="cate-search" style="position: relative; top: 0; border-bottom: 0;">
				<input type="text" class="cate-input" placeholder="选择商品" name="goodsid" value="<?php echo isset($button['goodsid'])?$button['goodsid']:'';?>" hidden>
				<a  id="goods" href="javascript:;" class="cate-btn" ></a>
			</div>
			<div class="cate-search" style="position: relative; top: 0; border-bottom: 0;">
				<input type="text" class="cate-input" placeholder="选择银行卡" name="card" value="<?php echo isset($button['card'])?$button['card']:'';?>" hidden readonly>
				<input type="text" class="cate-input" placeholder="选择银行卡" name="cardid" value="<?php echo isset($button['cardid'])?$button['cardid']:'';?>">
				<a  id="card" href="javascript:;" class="cate-bank-btn" ></a>
			</div>
			<div class="cate-search" style="position: relative; top: 0; border-bottom: 0;">
				<input type="text" class="cate-input" placeholder="数量" name="num" value="<?php echo isset($button['num'])?$button['num']:'';?>">
				<a  class="cate-num-btn" ></a>
			</div>
		</div>
		<div id="submit" class="cate-search" style="position: relative; top: 0; border-bottom: 0;" hidden>
			<button type="submit" class="cate-button">确认</button>
		</div>
	</form>
</ul>
<script type="text/javascript">
	var choose = "<?php echo isset($choose)?1:0;?>";
	var msg = "<?php echo isset($msg)?1:0;?>"
	if(choose == '1'){
		$('#right').hide();
		$('#edit').hide();
		$('.default').show();

		$('input').click(function(){
			var index = $("form input").index(this);
			$('li').removeClass('curr');
			$("ul li").eq(index/2).addClass('curr');
			$("form input").eq(index+1).attr('checked',true);
		});
		$('input:first').click();

		$('#left').attr('href', "javascript:;");
		$('#left').click(function(){
			$('button').click();
		});

		$('#submit').show();
	}

	if(msg == '1')
		alert('该地址已被使用,无法删除');

</script>
</body>
</html>
