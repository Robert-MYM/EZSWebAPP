
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
            <form class="am-form" method="POST" action="<?php echo site_url('Register/register');?>">
                <fieldset>
                   <div class="am-form-group">
                        <input type="tel" class="" id="phone" placeholder="手机号" name="phone" value="<?php echo set_value('phone'); ?>">
                    </div>
                    <?php echo form_error('phone'); ?>
                    <div class="am-form-group">
                        <input type="email" class="" id="email" placeholder="邮箱" name="email" value="<?php echo set_value('email'); ?>">
                    </div>
                    <?php echo form_error('email'); ?>
                    <div class="am-form-group">
                        <input type="text" class="" id="name" placeholder="姓名" name="name" value="<?php echo set_value('name'); ?>">
                    </div>
                    <?php echo form_error('name'); ?>
                    <div class="am-form-group">
                        <input type="password" class="" id="password" placeholder="密码" name="password" value="<?php echo set_value('password'); ?>">
                    </div>
                    <?php echo form_error('password'); ?>
                    <div class="am-form-group">
                        <input type="password" class="" id="confrim" placeholder="确认密码" name="confirm">
                    </div>
                    <?php echo form_error('confirm'); ?>
                    <p><button type="submit" class="am-btn am-btn-default">注册</button></p>
                    <div class="login-font">
                        <a href="<?php echo site_url('login/index');?>"><i>登录</i></a>
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
    $(".am-form-group").click(function(){
        $("div#alert").hide();
    });
</script>
</body>
</html>