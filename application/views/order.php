	<body>
		<header data-am-widget="header" class="am-header am-header-default header" style="position:fixed; z-index:50;display:block;">
		<div style="width:100%;height:10px;background:#ffffff;"></div>
			<div class="am:-header-left am-header-nav" style="padding-top:10px">
				<a href="<?php echo site_url('My');?>" class=""> 
					<i class="am-header-icon am-icon-angle-left"></i>
				</a>
			</div>
		
			<h1 class="am-header-title"> <a href="#title-link" class="" style="color: #333;">全部订单</a></h1>
			
			<div class="am-header-right am-header-nav">
				<a href="#right-link" class=""> </a>
			</div>
			
		</header>
		<div class="cate-search" style="position: fixed; margin-top:0px; border-bottom: 0px;">
		<?php echo form_open('');?>
			<input type="text" class="cate-input" placeholder="搜索全部订单" name="searchName" value="<?php echo set_value('searchName'); ?>">
			<input id="submit" type="submit" class="cate-btn" value="&nbsp;">
		</form>
		</div>
		
		<ul class="order-style" style="position:fixed; margin-top:105px; width: 100%;z-index:50;">
			<li id="all" ><a href="javascript:;" onclick="send(-1)">全部</a></li>
			<li id="all-0"><a href="javascript:;" onclick="send(0)">待发货</a></li>
			<li id="all-1"><a href="javascript:;" onclick="send(1)">待收货</a></li>
			<li id="all-2"><a href="javascript:;" onclick="send(2)">已完成</a></li>
		</ul>
		<div style="width:100%;height:160px;">
		</div>
		<?php foreach($orders as $index => $order):?>
			<div style="postion:relative;">
			<div class="c-comment" style="">
				<span class="c-comment-num">订单编号：<?php echo $order['orderid'];?></span>
				<span class="c-comment-suc">
					<?php switch ($order['condition']) {
						case 0:
						echo "待发货";break;
						case 1:
						echo "待收货";break;
						case 2:
						echo "已完成";break;
					}?>
				</span>
			</div>
			<div class="c-comment-list" style="border: 0;">
				<a class="o-con" href="">
					<div class="o-con-img"><img src="<?php echo base_url($order['image']);?>"></div>
					<div class="o-con-txt">
						<p><?php echo $order['name'];?></p>
						<p class="price">￥<?php echo $order['price'];?></p>
						<p>合计：<span>￥<?php echo $order['num']*$order['price'];?></span></p>
					</div>
					<div class="o-con-much"> <h4>x<?php echo $order['num'];?></h4></div>

				</a>
				<div class="c-com-money">日期：<?php echo $order['date'];?>&nbsp;&nbsp;实付金额：<span>￥ <?php echo $order['num']*$order['price'];?></span></div>
			</div>

			<div class="c-com-btn">
				<?php switch ($order['condition']){
					case 0:?>
					<a href="#">取消订单</a>
					<?php break;case 1:?>
					<a href="<?php echo site_url('My/confirm/'.$order['orderid']);?>">确认收货</a>
					<?php break;case 2:?>
					<?php break;}?>
			</div>
			<div class="clear"></div>
			</div>
		<?php endforeach;?>

		<script type="text/javascript">
			var tag = "<?php echo $state;?>";
			switch(tag){
				case '-1': $('#all').addClass('current');break;
				case '0': $('#all-0').addClass('current');break;
				case '1': $('#all-1').addClass('current');break;
				case '2': $('#all-2').addClass('current');break;
			};

			function send(state){
				$('form').attr('action','<?php echo site_url('My/getOrder/');?>'+state);
				$('#submit').click();
			}
		</script>
	</body>
	</html>
