
<body>
<div style="position:fixed; z-index:50;width:100%;height:10px;background:#ffffff;"></div>
    <header data-am-widget="header" class="am-header am-header-default header" style="position:fixed; z-index:50;top:10px">
      <div class="am-header-left am-header-nav">
         <a href=<?php echo site_url('Button');?> class=""> 
           <i class="am-header-icon am-icon-angle-left"></i>
         </a>
      </div>
      <h1 class="am-header-title"> <a id="title" href="#title-link" class="" style="color: #333;">绑定按钮</a></h1>
      <div class="am-header-right am-header-nav">
         <a href="#right-link" class=""> 
         </a>
      </div>
  </header>
<div style="width:100%;height:60px;background:#ffffff;"></div>
    <form method="POST" action="<?php echo site_url('Button/add');?>">
    <div class="cate-search" style="position: relative; top: 0; border-bottom: 0;">
      <input type="text" class="cate-input" placeholder="绑定按钮" name="aksid" value="<?php echo isset($button['aksid'])?$button['aksid']:'';?>">
      <a href="#" class="cate-scan-btn" ></a>
    </div>
    <?php echo form_error('aksid'); ?>
    <div class="cate-search" style="position: relative; top: 0; border-bottom: 0;">
      <input type="text" class="cate-input" placeholder="选择商品" name="goodsid" value="<?php echo isset($button['goodsid'])?$button['goodsid']:'';?>" >
      <a  id="goods" href="javascript:;" class="cate-btn" ></a>
    </div>
    <div class="cate-search" style="position: relative; top: 0; border-bottom: 0;">
      <input type="text" class="cate-input" placeholder="选择收货地址" name="address" value="<?php echo isset($button['address'])?$button['address']:'';?>" readonly>
      <input type="text" class="cate-input" placeholder="选择收货地址" name="addressid" value="<?php echo isset($button['addressid'])?$button['addressid']:'';?>" hidden>
      <a  id="address" href="javascript:;" class="cate-address-btn" ></a>
    </div>
    <div class="cate-search" style="position: relative; top: 0; border-bottom: 0;">
      <input type="text" class="cate-input" placeholder="选择银行卡" name="card" value="<?php echo isset($button['card'])?$button['card']:'';?>" readonly>
      <input type="text" class="cate-input" placeholder="选择银行卡" name="cardid" value="<?php echo isset($button['cardid'])?$button['cardid']:'';?>" hidden>
      <a  id="card" href="javascript:;" class="cate-bank-btn" ></a>
    </div>
    <div class="cate-search" style="position: relative; top: 0; border-bottom: 0;">
      <input type="text" class="cate-input" placeholder="数量" name="num" value="<?php echo isset($button['num'])?$button['num']:'';?>">
      <a  class="cate-num-btn" ></a>
    </div>
    <?php echo form_error('num'); ?>
    <div class="cate-search" style="position: relative; top: 0; border-bottom: 0;">
      <button type="submit" class="cate-button">确认</button>
    </div>
    </form>
</div>
<script type="text/javascript">
    $('#goods').click(function(){
      $('form').attr('action',"<?php echo site_url('Button/add/goods');?>");
      $('button').click();
    });

    $('#address').click(function(){
      $('form').attr('action',"<?php echo site_url('Button/add/address');?>");
      $('button').click();
    });

    $('#card').click(function(){
      $('form').attr('action',"<?php echo site_url('Button/add/card');?>");
      $('button').click();
    });

    $(".am-form-group").click(function(){
        $("div#alert").hide();
    });
</script>
</body>
</html>