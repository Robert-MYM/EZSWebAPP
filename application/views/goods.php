
	<body>
		<div data-am-widget="slider" class="am-slider am-slider-default" data-am-slider='{}' >
			  <ul class="am-slides">
			      <li><img src="<?php echo base_url('image/banner.jpg');?>"> </li>
			      <li><img src="<?php echo base_url('image/banner1.jpg');?>"> </li>
			      <li><img src="<?php echo base_url('image/banner2.jpg');?>"> </li>
			  </ul> 
		</div>
		<div class="cate-search" style="position: relative; top: 0; border-bottom: 0;">
		<?php echo form_open('Goods/search');?>
			<input type="text" class="cate-input" placeholder="搜索商品" name="searchName" value="<?php echo set_value('searchName'); ?>">
			<input id="submit" type="submit" class="cate-btn" value="&nbsp;">
		</form>
		</div>
		<div data-am-widget="titlebar" class="am-titlebar am-titlebar-default title" style="margin-top: 0px;">
		    <h2 class="am-titlebar-title ">所有商品</h2>
		</div>
	    <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2 am-avg-md-3 am-avg-lg-4 am-gallery-default product">
	    <?php foreach($goods as $item):?>
	    	<?php if($item['state'] == 0):?>
		      <li>
		        <div class="am-gallery-item">
		            <a href="javascript:;" class="">
		              <img src="<?php echo base_url($item['image']);?>"  alt=""/>
		              <h3 class="am-gallery-title"><?php echo $item['name'];?></h3>
		              <div class="am-gallery-desc">
		              	<em>¥ <?php echo $item['price'];?></em><i class="am-icon-cart-plus"></i>
		              </div>
		            </a>
		        </div>
		      </li>
		    <?php endif;?>
		<?php endforeach;?>
		</ul>		