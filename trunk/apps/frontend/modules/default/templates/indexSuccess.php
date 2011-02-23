<div class="inicio_contenedor">
    <h1><?php echo __("inicio_titulo");?></h1>
    <div class="clear"></div>
    <span><?php echo __("inicio_texto");?></span>
    <div class="clear"></div>
</div>
<?php use_helper('mdAsset');?>
<?php
    use_plugin_javascript('mastodontePlugin', 'easySlider1.5.js', 'last');
?>
<?php if(count($images)>0):?>
<div id="slider">
    <ul id="home">
        <?php foreach($images as $image): ?>
            <li><img alt="image" src="<?php echo mdWebImage::getUrl($image, array(mdWebOptions::WIDTH => 810, mdWebOptions::HEIGHT => 329,  mdWebOptions::CODE => mdWebCodes::RESIZECROP))?>" /></li>
        <?php endforeach;?>
    </ul>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$("#slider").easySlider({
		auto: true,
		speed: 1000,
		continuous: true,
                controlsShow: false
	});
});
</script>



<?php endif;?>