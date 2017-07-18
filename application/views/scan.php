<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>index</title>
    <meta name="description" content="" />
    <meta name="author" content="Christoph Oberhofer" />

    <meta name="viewport" content="width=device-width; initial-scale=1.0; user-scalable=no" />
    <link rel="stylesheet" href="<?php echo base_url('css/amazeui.min.css');?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/styles.css');?>" />
  </head>

  <body>
      <header data-am-widget="header" class="am-header am-header-default header">
      <div class="am-header-left am-header-nav">
        <a id="left" href="javascript:;" class=""> 
          <i class="am-header-icon am-icon-angle-left"></i>
        </a>
      </div>
      <h1 class="am-header-title"> <a href="#title-link" class="" style="color: #333;">扫描条形码</a></h1>
    </header>
    <section id="container" class="container">
        <div class="controls" hidden>
         <label>
            <span>Camera</span>
            <select name="input-stream_constraints" id="deviceSelection">
            </select>
        </label>
      </div>
      <div id="result_strip" hidden>
      <?php echo form_open('Button/add/undo');?>
      <div hidden>
        <input id="goodsid" type="text" placeholder="商品条形码" name="goodsid" value="<?php echo isset($button['goodsid'])?$button['goodsid']:'';?>">
        <div class="cate-search" style="position: relative; top: 0; border-bottom: 0;">
          <input type="text" class="cate-input" placeholder="绑定按钮" name="aksid" value="<?php echo isset($button['aksid'])?$button['aksid']:'';?>">
          <a href="#" class="cate-scan-btn" ></a>
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
      </div>
      <input id="submit" type="submit">
      </form>
       <ul class="thumbnails"></ul>
        <ul class="collector"></ul>
      </div>
      <div id="interactive" class="viewport"></div>
    </section>

    <script src="<?php echo base_url('js/jquery.min.js');?>" type="text/javascript"></script>
    <script src="<?php echo base_url('js/amazeui.min.js');?>" type="text/javascript"></script>
   <script src="<?php echo base_url('js/adapter-latest.js');?>" type="text/javascript"></script>
   <script src="<?php echo base_url('js/quagga.js');?>" type="text/javascript"></script>
   <script src="<?php echo base_url('js/scan.js');?>" type="text/javascript"></script>
   <script type="text/javascript">
     $('#left').click(function(){
      $('#submit').click();
     });
   </script>
  </body>
</html>
