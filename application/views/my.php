<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>EZS</title>
		<meta name="description" content="EZS" />
		<meta name="keywords" content="EZS"/>
		<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link rel="stylesheet" href="<?php echo base_url('css/amazeui.min.css');?>"/>
		<link rel="stylesheet" href="<?php echo base_url('css/style.css');?>" />
		<script type="text/javascript" src="<?php echo base_url('js/jquery.min.js');?>" ></script>
		<script type="text/javascript" src="<?php echo base_url('js/amazeui.min.js');?>"></script>
		
	</head>
	<body>
		<div class="member">
			<div class="member-pic">
				<img src="<?php echo base_url('image/default_photo.png');?>"/>
			</div>
			<div class="member-infor"><?php echo $phone;?></div>
		</div>
		<ul class="member-nav">
			<li><a href="<?php echo site_url('My/getAddress');?>"><i class="am-icon-map-marker"></i><span>收货地址</span></a></li>
			<li><a href="<?php echo site_url('My/getOrder');?>"><i class="am-icon-newspaper-o"></i><span>我的订单</span></a></li>
			<li><a href="<?php echo site_url('My/getCreditCard');?>"><i class="am-icon-bank"></i><span>银行卡</span></a></li>
			<li><a href="javascript:;"><i class="am-icon-cart-arrow-down"></i><span>购物车</span></a></li>
			<li><a href="javascript:;"><i class="am-icon-bell-o"></i><span>系统通知</span></a></li>
		</ul>
		<ul class="member-nav mt">
			<li><a href="javascript:;"><i class="am-icon-phone"></i>联系我们</a></li>
		</ul>
		<ul class="member-nav mt">
			<li><a href="<?php echo site_url('Login/logout');?>"><i class="am-icon-sign-out"></i>退出登录</a></li>
		</ul>