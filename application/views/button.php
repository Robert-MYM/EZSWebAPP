
<div data-am-widget="slider" class="am-slider am-slider-default" data-am-slider='{}' >
	<ul class="am-slides">
		<li><img src="<?php echo base_url('image/banner3.jpg');?>"> </li>
		<li><img src="<?php echo base_url('image/banner4.jpg');?>"> </li>
	</ul> 
</div>
<?php if(count($buttons) == 0):?>
	<div class="nokeshuo">
		<img src="<?php echo base_url('image/none.png');?>" />
		<p>还没添加任何按钮</p>
	</div>
<?php else:?>
	<ul class="nav">
		<?php for($i=0; $i<count($buttons);$i+=1):?>
			<li>
				<a href="javascript:;">
					<img src="<?php echo base_url('image/ms.jpg');?>" />
					<p><?php echo $buttons[$i]['aksid'];?></p>
				</a>
			</li>
		<?php endfor;?>
	</ul>
<?php endif;?>
<div class="communityPage-publish-btn cmn-theme-bgcolor" id="communityPage-publish-btn"><a href="<?php echo site_url('Button/add');?>" style="color: #fff;">+</a></div>
<script type="text/javascript">
	$("a").click(function(){
		var id = $(this).find('p').text();
		$.ajax({
			url:"https://10.214.216.222:447/EZS_Seller/index.php/Sell/newOrder/"+id,
			//url:"http://127.0.0.1/EZS_Seller/index.php/sell/newOrder/"+id,
			success:function(result){
				var res = eval(result);
				if(res.state)
					alert('下单成功');
				else
					alert('下单失败');
			}});
	});
	
</script>