<div class="category">
<h2 class="category_hd">全部商品分类</h2>
	<div class="category_bd <?php if(isset($hide_category)&&$hide_category) echo 'hide'?>">
		<ul class="category_bd_con">
			<?php foreach ($industry_1and2_result as $keys => $value):?>
				<li class="subItem_box"><h3 class="subItem_hd"><a href="<?=base_url()?>index.php/product/result/<?=$value['id']?>/" title="<?=$value['title']?>"><?=$value['title']?></a><b class="">&gt;</b></h3>
					<ul class="subItem_bd">
					<?php foreach ($value['lv2_info'] as $key=>$val):?>
						<?php foreach ($val as $k=>$v):?>
							<li><a href="<?=base_url()?>index.php/product/result_two/<?=$v['id']?>/"><?=$v['title']?></a></li>
						<?php endforeach;?>	
					<?php endforeach;?>
					</ul>
				</li>
			<?php endforeach;?>
		</ul>
	</div>
</div>