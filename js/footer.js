		<script type="text/javascript">
				var tag = "<?php echo $tag;?>";
				switch(tag){
					case "shopping": $('#shopping').attr("src","<?php echo base_url('image/Category-2.png');?>");break;
					case "setting": $('#setting').attr("src","<?php echo base_url('image/all-2.png');?>");break;
					case "my": $('#my').attr("src","<?php echo base_url('image/account-2.png');?>");break;
				}
		</script>