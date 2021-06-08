<div id="full-slider-wrapper">
	<div id="layerslider" style="width:100%;height:667px;">
		<?php foreach($slides->result() as $key => $value){ ?>
		<div class="ls-slide" data-ls="slidedelay: 5000; transition2d:5;">
			<?php $slide_link = base_url('uploads/slides').'/'.$value->link; ?>

			<img src="<?php echo $slide_link; ?>" class="ls-bg" alt="Slide background" width="1600" height="667">
			<h3 class="ls-l slide_typo" style="top: 50%; left: 50%;" data-ls="offsetxin:0;durationin:2000;delayin:1000;easingin:easeOutElastic;rotatexin:90;transformoriginin:50% bottom 0;offsetxout:0;rotatexout:90;transformoriginout:50% bottom 0;"><?php echo $value->title; ?></h3>
			<p class="ls-l slide_typo_2" style="top:62%; left:50%;" data-ls="durationin:2000;delayin:1000;easingin:easeOutElastic;">
				<?php echo $value->description; ?>
			</p>
		</div>
		<?php } ?>
	</div>
</div>