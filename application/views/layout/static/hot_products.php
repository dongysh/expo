<div class="mode_box hotPro_mode">
	<div class="hd"><h2>热门产品</h2></div>
	<div class="bd">
		<div class="promo_slide" >
			<div class="slide_list" id="hote_product_outer">
				<ul class="pic_list clearfix slide_ul">
					<li class="cur_li"><a href="javascript:void(0)" title="" class="pic"><img src="<?=base_url()?>webroot/images/220x220.jpg" alt="" /></a>
							<h4><a href="javascript:void(0)">产品名称产品名称产品名称名称</a></h4>
					</li>
					<li  class="cur_li"><a href="javascript:void(0)" title="" class="pic"><img src="<?=base_url()?>webroot/images/220x220.jpg" alt="" /></a>
							<h4><a href="javascript:void(0)">产品名称产品名称产品名称名称</a></h4>
					</li>
					<li  class="cur_li"><a href="javascript:void(0)" title="" class="pic"><img src="<?=base_url()?>webroot/images/220x220.jpg" alt="" /></a>
							<h4><a href="javascript:void(0)">产品名称产品名称产品名称名称</a></h4>
					</li>
					<li><a href="javascript:void(0)" title="" class="pic"><img src="<?=base_url()?>webroot/images/220x220.jpg" alt="" /></a>
							<h4><a href="javascript:void(0)">产品名称产品名称产品名称名称</a></h4>
					</li>
					<li><a href="javascript:void(0)" title="" class="pic"><img src="<?=base_url()?>webroot/images/220x220.jpg" alt="" /></a>
							<h4><a href="javascript:void(0)">产品名称产品名称产品名称名称</a></h4>
					</li>
					<li><a href="javascript:void(0)" title="" class="pic"><img src="<?=base_url()?>webroot/images/220x220.jpg" alt="" /></a>
							<h4><a href="javascript:void(0)">产品名称产品名称产品名称名称</a></h4>
					</li>
					<li><a href="javascript:void(0)" title="" class="pic"><img src="<?=base_url()?>webroot/images/220x220.jpg" alt="" /></a>
							<h4><a href="javascript:void(0)">产品名称产品名称产品名称名称</a></h4>
					</li>
					<li><a href="javascript:void(0)" title="" class="pic"><img src="<?=base_url()?>webroot/images/220x220.jpg" alt="" /></a>
							<h4><a href="javascript:void(0)">产品名称产品名称产品名称名称</a></h4>
					</li>
				</ul>
			</div>
			<a class="pageBtn prev" id="hot_left_btn" href="javascript:void(0)" title="上一页">上一页</a>
			<a class="pageBtn next" id="hot_right_btn" href="javascript:void(0)" title="下一页">下一页</a>
		</div>
	</div>
	<span class="step">
		<span class="number"><em class="cur">1</em>/1</span>
		<a class="arrow-left" target="_self" href="javascript:;"><s class="arrow arrow-lthin"><s></s></s></a>
		<a class="arrow-right" target="_self" href="javascript:;"><s class="arrow arrow-rthin"><s></s></s></a>
	</span>
</div>
<style>
    #hote_product_outer
    {
        overflow: hidden;
    }
    #hote_product_outer .pic_list
    {
        position:absolute;
        top:0;
        left:0;
    }
    #hote_product_outer .pic_list li
    {
        margin:0;
        padding:0 4px;
    }
</style>
<script>
    (function($){
        $.fn.extend({
            slide_pic:function(option){
                var option = option || {};
                var setting =
                {
                    speed:1000,
                    move_num:1,
                    left_btn:'',
                    right_btn:''
                };
                $.extend(setting,option);
                var outer_div =  this.length ? this:$(".picPanel");
                outer_div.each(function(){
                    var outer_div = $(this);
                    var slide_ul = outer_div.find('.pic_list');
                    var slide_li = slide_ul.find('li');

                    var total = slide_li.length;
                    var per_width = slide_li.outerWidth();
                    var slide_ul_width = per_width*total;
                    slide_ul.css({width:slide_ul_width});
                    var outer_div_width = outer_div.innerWidth();
                    var distance = per_width*setting.move_num;
                    var left_btn = $('#'+setting.left_btn);
                    var right_btn = $('#'+setting.right_btn);
                    var canslide = true;
                    var move = function(direction)
                    {
                        if(!canslide)
                        {
                            return;
                        }
                        if(direction == 'left')
                        {
                            if(slide_ul.position().left<=(0-(slide_ul_width-outer_div_width)))
                            {
                                return;
                            }
                            else
                            {
                                var direction_distance = 0-distance;
                            }
                        }
                        else if(direction == 'right')
                        {
                            if(slide_ul.position().left>=0)
                            {
                                return;
                            }
                            else
                            {
                                direction_distance = distance;
                            }
                        }
                        else
                        {
                            return;
                        }
                        canslide = false;
                        var cur_left = slide_ul.position().left;
                        var will_left = cur_left+direction_distance;
                        if(will_left>0)
                        {
                            will_left = 0;
                        }
                        else if(will_left<(0-(slide_ul_width-outer_div_width)))
                        {
                            will_left = (0-(slide_ul_width-outer_div_width));
                        }
                        slide_ul.stop().animate({left:will_left},setting.speed,function(){
                            canslide = true;
                        });
                    };
                    var bind = function()
                    {;
                        left_btn.unbind('click').bind('click',function(){
                            move('right');
                        });
                        right_btn.unbind('click').bind('click',function(){
                            move('left');
                        });
                    }
                    bind();
                });
                return outer_div;
            }
        });
    })(jQuery);
</script>