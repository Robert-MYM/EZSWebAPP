 <div class="h50"></div>
		<div data-am-widget="navbar" class="am-navbar am-cf am-navbar-default footer "  id="">
		      <ul class="am-navbar-nav am-cf am-avg-sm-4">
		          <li >
		            <a href="<?php echo site_url('Goods');?>" class="">
		                <span class=""><img id="shopping" src="<?php echo base_url('image/Category.png');?>"/></span>
		                <span class="am-navbar-label">购物</span>
		            </a>
		          </li>
		          <li>
		            <a href="<?php echo site_url('Button');?>" class="">
		                <span class=""><img id="setting" src="<?php echo base_url('image/all.png');?>"/></span>
		                <span class="am-navbar-label">按钮</span>
		            </a>
		          </li>
		          <li >
		            <a href="<?php echo site_url('My');?>" class="">
		                <span class=""><img id="my" src="<?php echo base_url('image/account.png');?>"/></span>
		                <span class="am-navbar-label">我的</span>
		            </a>
		          </li>
		   
		      </ul>
		</div>
		<script type="text/javascript">
			var tag = "<?php echo $tag;?>";
			switch(tag){
				case "shopping": $('#shopping').attr("src","<?php echo base_url('image/Category-2.png');?>");break;
				case "setting": $('#setting').attr("src","<?php echo base_url('image/all-2.png');?>");break;
				case "my": $('#my').attr("src","<?php echo base_url('image/account-2.png');?>");break;
			}
		</script>
	</body>
</html>
