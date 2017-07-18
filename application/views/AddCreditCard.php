
<body>
<div style="position:fixed; z-index:50;width:100%;height:10px;background:#ffffff;"></div>
    <header data-am-widget="header" class="am-header am-header-default header" style="position:fixed; z-index:50;top:10px">
      <div class="am-header-left am-header-nav">
         <a href=<?php echo site_url('My/getCreditCard');?> class=""> 
           <i class="am-header-icon am-icon-angle-left"></i>
         </a>
      </div>
      <h1 class="am-header-title"> <a id="title" href="#title-link" class="" style="color: #333;">绑定银行卡</a></h1>
      <div class="am-header-right am-header-nav">
         <a href="#right-link" class=""> 
         </a>
      </div>
  </header>
  <div style="width:100%;height:60px;background:#ffffff;"></div>
    <div class="am-g myapp-login"> 
    <div class="am-g myapp-login"> 
        <div class="myapp-login-logo-block">
        <div class="am-u-sm-12 login-am-center" style="display: block; text-align:center">
            <form class="am-form" method="POST" action="<?php echo site_url('My/AddCreditCard');?>">
                <fieldset>
                   <div class="am-form-group">
                        <input type="text" class="" id="cardID" placeholder="银行卡卡号" name="cardID" value="<?php echo set_value('cardID'); ?>">
                    </div>
                    <?php echo form_error('cardID'); ?>
                    <div class="am-form-group">
                        <input type="password" class="" id="password" placeholder="银行卡密码" name="password" value="<?php echo set_value('password'); ?>">
                    </div>
                    <div class="am-form-group">
                      <select class="" id="name" placeholder="" name="name" value="<?php echo set_value('name'); ?>">
                        <option value="工商银行">工商银行</option>
                        <option value="中国银行">中国银行</option>
                        <option value="招商银行">招商银行</option>
                        <option value="建设银行">建设银行</option>
                        </select>
                    </div>
                    <p><button type="submit" class="am-btn am-btn-default">确认</button></p>
                    <?php if(isset($msg)):?>
                        <div class="alert alert-danger alert-dismissible" role="alert" id="alert" style="color: #FF0000"><?php echo $msg;?>
                        </div>
                    <?php endif;?> 
                </fieldset>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(".am-form-group").click(function(){
        $("div#alert").hide();
    });
</script>
</body>
</html>