<div class="content">
	<div class="bread_crumbs"><a href="javascript:void(0)">首页</a><span class="gt">&gt;</span><a href="javascript:void(0)">搜索</a></div>
	<div class="full">
		<div class="error_mode"><span class="error_tips">我们还没有找到结果为“<strong class="highlight"><?=$key_word?></strong>”<?if($list_type == 1):?>的公司。您可以根据以下分类进行筛选符合您需要的公司!<?else:?>的产品。您可以根据以下分类进行筛选符合您需要的产品!<?endif;?></span></div>
		<div class="mode_box hotCg_mode">
			<div class="hd"><h2>热门产品</h2><a href="javascript:void(0)" title="更多" class="more">更多&gt;</a></div>
			<div class="bd">
				<div class="category_col clearfix">
					<?php foreach ($industry_1and2_result as $keys => $value):?>
					<dl class="item_col" style="min-height:160px">
						<dt><a href="javascript:void(0)"><?=$value['title']?></a></dt>
						<?php foreach ($value['lv2_info'] as $key=>$val):?>
							<?php foreach ($val as $k=>$v):?>
								<dd><a href="javascript:void(0)"><?=$v['title']?></a></dd>
							<?php endforeach;?>	
						<?php endforeach;?>	
					</dl>
					<?php endforeach;?>
				</div>
			</div>
		</div>
	</div> 
</div>
<script type="text/javascript">
$(document).ready(function() {
	$(".category_bd").hide();
	$(".category").hover(function(){
		$(".category_bd").slideDown(400);
	},function(){
		$(".category_bd").slideUp(400);
	})
});
</script>