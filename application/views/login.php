
<body>
<div class="am-g myapp-login"> 
    <div class="myapp-login-logo-block">
        <div class="myapp-login-logo">
            <img src="<?php echo base_url('image/icon.png');?>">
        </div>
        <div class="myapp-login-logo-text">
            <div class="myapp-login-logo-text">
                <span>EZ-Shopping</span>
            </div>
        </div>
        <div class="am-u-sm-12 login-am-center" style="display: block; text-align:center">
            <form class="am-form" method="POST" action="<?php echo site_url('Login/login');?>">
                <fieldset>
                    <div class="am-form-group">
                        <input type="tel" class="" id="doc-ipt-email-1" placeholder="手机号" name="phone" value="<?php echo set_value('phone'); ?>">
                    </div>
                    <?php echo form_error('phone'); ?>
                    <div class="am-form-group">
                        <input type="password" class="" id="doc-ipt-pwd-1" placeholder="密码" name="password" value="<?php echo set_value('password'); ?>">
                    </div>
                    <?php echo form_error('password'); ?>
                    <p><button type="submit" class="am-btn am-btn-default">登录</button></p>
                    <div class="login-font">
                        <a href="<?php echo site_url('register/index');?>">注册</a>
                    </div>
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
    $(document).ready(function(){
        var register = "<?php echo $msg;?>";
        if(register == "0")
            alert("注册成功");
    });

    $(".am-form-group").click(function(){
        $("div#alert").hide();
    });
</script>
</body>
</html>