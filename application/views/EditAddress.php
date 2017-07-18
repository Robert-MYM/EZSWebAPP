
<body>
<div style="position:fixed; z-index:50;width:100%;height:10px;background:#ffffff;"></div>
    <header data-am-widget="header" class="am-header am-header-default header" style="position:fixed; z-index:50;top:10px">
      <div class="am-header-left am-header-nav">
         <a href=<?php echo site_url('My/getAddress');?> class=""> 
           <i class="am-header-icon am-icon-angle-left"></i>
         </a>
      </div>
      <h1 class="am-header-title"> <a id="title" href="#title-link" class="" style="color: #333;">编辑收货地址</a></h1>
      <div class="am-header-right am-header-nav">
         <a href="#right-link" class=""> 
         </a>
      </div>
  </header>
  <div style="width:100%;height:60px;background:#ffffff;"></div>
    <div class="am-g myapp-login"> 
        <div class="myapp-login-logo-block">
        <div class="am-u-sm-12 login-am-center" style="display: block; text-align:center">
            <form class="am-form" method="POST" action="<?php echo isset($address)?site_url('My/UpdateAddress/'.$address->id):site_url('My/AddAddress');?>">
                <fieldset>
                   <div class="am-form-group">
                        <input type="tel" class="" id="phone" placeholder="手机号" name="phone" value="<?php echo set_value('phone'); ?>">
                    </div>
                    <?php echo form_error('phone'); ?>
                    <div class="am-form-group">
                        <input type="text" class="" id="name" placeholder="姓名" name="name" value="<?php echo set_value('name'); ?>">
                    </div>
                    <?php echo form_error('name'); ?>
                    <div class="am-form-group">
                        <input type="text" class="" id="address" placeholder="地址" name="address" value="<?php echo set_value('address'); ?>">
                    </div>
                    <?php echo form_error('address'); ?>
                    <p><button type="submit" class="am-btn am-btn-default">确认</button></p>
                      <?php if(!empty($msg)):?>
                        <div class="alert alert-danger alert-dismissible" role="alert" id="alert" style="color: #FF0000"><?php echo $msg;?>
                        </div>
                    <?php endif;?> 
                </fieldset>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    var index = "<?php echo isset($index)?1:0;?>";

    if(index == "1"){
        $('#phone').attr('value','<?php echo isset($address)?$address->realphone:"";?>');
        $('#name').attr('value','<?php echo isset($address)?$address->name:"";?>');
        $('#address').attr('value','<?php echo isset($address)?$address->address:"";?>');
    };

    if(index == "0"){
        $('#title').text('添加收货地址');
    }

    $(".am-form-group").click(function(){
        $("div#alert").hide();
    });
</script>
</body>
</html>