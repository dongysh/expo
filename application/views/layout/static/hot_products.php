<<<<<<< HEAD
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
=======
<div class="hot_products">
<div class="hot_products_title">
	<div class="title_text">
		<span>Hot Products</span>&nbsp;&nbsp;&nbsp;&nbsp;What other customers are looking at
	</div>
</div>
<div class="space_15"></div>
<div class="banner_area sliderkit photoslider-bullets1" style="display: block; height: 180px;">
<div class="sliderkit-nav">
  <div class="sliderkit-nav-clip">
    <ul>
      <li><a href="#">&nbsp;</a></li>
      <li><a href="#">&nbsp;</a></li>
      <li><a href="#">&nbsp;</a></li>
      <li><a href="#">&nbsp;</a></li>
      <li><a href="#">&nbsp;</a></li>
    </ul>
  </div>
</div>
<div class="sliderkit-panels">
  <div class="sliderkit-panel">
  	<?//1-4?>
  	<div class="product_pic_and_title">
		<div class="product">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/plastic-product-making-machinery-parts_9741/pet-strap-extrusion-line_27.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/8a/8a3d235cf1eb814f575c914501564a7f.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/plastic-product-making-machinery-parts_9741/pet-strap-extrusion-line_27.html" target="_blank">PET strap extrusion line</a>
			</div>
		</div>
		<div class="product">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/rubber-product-making-machinery_9748/supply-plastic-shredder-for-recycling_4.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/f6/f6c23884502af010879e2f3e5c4a671d.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/rubber-product-making-machinery_9748/supply-plastic-shredder-for-recycling_4.html" target="_blank">Supply Plastic shredder for recycling</a>
			</div>
		</div>
		<div class="product">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/plastic-product-making-machinery_9740/common-diameter-hdpe-pipe-extrusion-line_62.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/85/85bf4a73f1bcfcc297983430ddb26cdd.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/plastic-product-making-machinery_9740/common-diameter-hdpe-pipe-extrusion-line_62.html" target="_blank">Common Diameter HDPE Pipe Extrusion Line</a>
			</div>
		</div>
		<div class="product_last">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/construction-tools_7390/ppr-reducer-socket-pipe-fitting-mould_22.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/2f/2fb07cbd839ad3007425923dea440684.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/construction-tools_7390/ppr-reducer-socket-pipe-fitting-mould_22.html" target="_blank">PPR Reducer Socket pipe fitting mould</a>
			</div>
		</div>
		<div class="clear"></div>
	</div>
  </div>
  <div class="sliderkit-panel">
  	<?//5-8?>
	<div class="product_pic_and_title">
		<div class="product">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/building-material-machinery_9063/eva-sheet-extrusion-line_25.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/c2/c2cedf039640049345f7ede76284f62c.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/building-material-machinery_9063/eva-sheet-extrusion-line_25.html" target="_blank">EVA sheet extrusion line</a>
			</div>
		</div>
		<div class="product">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/plastic-product-making-machinery_9740/special-use-single-wall-and-double-wall-corrugated-pipe-extrusion-line_64.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/3d/3d128ebdc77d035a76a1fee28835a6b6.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/plastic-product-making-machinery_9740/special-use-single-wall-and-double-wall-corrugated-pipe-extrusion-line_64.html" target="_blank">CPE Gloves</a>
			</div>
		</div>
		<div class="product">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/construction-tools_7390/pvc-bend-pipe-fitting-mould_37.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/58/58d4a07aaf339c3aea9d61cb689333e9.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/construction-tools_7390/pvc-bend-pipe-fitting-mould_37.html" target="_blank">PVC bend pipe fitting mould</a>
			</div>
		</div>
		<div class="product_last">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/plastic-rubber-machinery-parts_9739/screw-barrel-for-injection-molding-machine_26.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/dd/dd3cf1589d4d9922ef9d3a738ff7ffe6.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/plastic-rubber-machinery-parts_9739/screw-barrel-for-injection-molding-machine_26.html" target="_blank">screw barrel for injection molding machine</a>
			</div>
		</div>
		<div class="clear"></div>
	</div>
  </div>
  <div class="sliderkit-panel">
  	<?//9-12?>
	<div class="product_pic_and_title">
		<div class="product">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/construction-tools_7390/pvc-tee-pipe-fitting-mould_39.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/10/103984d8768d9ce0901e5b535a19efe4.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/construction-tools_7390/pvc-tee-pipe-fitting-mould_39.html" target="_blank">PVC tee pipe fitting mould</a>
			</div>
		</div>
		<div class="product">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/plastic-rubber-machinery-parts_9739/conical-twin-screw-barrel_30.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/0e/0ed70bfb7e82f24a2abca376bb329898.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/plastic-rubber-machinery-parts_9739/conical-twin-screw-barrel_30.html" target="_blank">conical twin screw barrel</a>
			</div>
		</div>
		<div class="product">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/plastic-rubber-machinery-parts_9739/screw-and-barrel-element-extruder-screw-element_33.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/ce/cef8012a37456c980032346db10bb0a4.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/plastic-rubber-machinery-parts_9739/screw-and-barrel-element-extruder-screw-element_33.html" target="_blank">screw and barrel element/extruder screw element</a>
			</div>
		</div>
		<div class="product_last">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/plastic-product-making-machinery_9740/gfq-series-automatic-pipe-no-dust-cutter-and-planetary-cutter_68.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/e7/e730ffe5fa664ac92277223b25407bed.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/plastic-product-making-machinery_9740/gfq-series-automatic-pipe-no-dust-cutter-and-planetary-cutter_68.html" target="_blank">GFQ Series Automatic Pipe No-dust Cutter and Planetary Cutter</a>
			</div>
		</div>
		<div class="clear"></div>
	</div>
  </div>
  <div class="sliderkit-panel">
  	<?//13-16?>
	<div class="product_pic_and_title">
		<div class="product">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/other-plastic-products_9719/hdpe-gloves_6.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/04/049736937fd8f0cf218a7a2b1befff22.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/other-plastic-products_9719/hdpe-gloves_6.html" target="_blank">HDPE Gloves</a>
			</div>
		</div>
		<div class="product">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/other-plastic-products_9719/t-shirt-bags_12.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/cf/cfcc26fa7dce54f2ef9afa5a71a638c6.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/other-plastic-products_9719/t-shirt-bags_12.html" target="_blank">T-Shirt Bags</a>
			</div>
		</div>
		<div class="product">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/other-plastic-products_9719/plastic-pallets_80.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/dc/dcd9a29ae69babef265cd3ac6f52045c.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/other-plastic-products_9719/plastic-pallets_80.html" target="_blank">Plastic Pallets</a>
			</div>
		</div>
		<div class="product_last">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/plastic-product-making-machinery-parts_9741/single-screw-barrel-for-extruder-machine_5.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/51/5175231c6d83f040639ddde85e17ab1a.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/plastic-product-making-machinery-parts_9741/single-screw-barrel-for-extruder-machine_5.html" target="_blank">single screw barrel for extruder machine</a>
			</div>
		</div>
		<div class="clear"></div>
	</div>
  </div>
  <div class="sliderkit-panel">
  	<?//17-20?>
	<div class="product_pic_and_title">
		<div class="product">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/packaging-machinery_9046/blowing-mould-machine_57.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/fe/fe6b9ce2223367c4b754dee74cc38f58.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/packaging-machinery_9046/blowing-mould-machine_57.html" target="_blank">Blowing Mould Machine</a>
			</div>
		</div>
		<div class="product">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/packaging-machinery_9046/blowing-machine_56.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/4a/4ad0ab630e86bb5d980dace7035d545c.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/packaging-machinery_9046/blowing-machine_56.html" target="_blank">Blowing Machine</a>
			</div>
		</div>
		<div class="product">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/construction-machinery-parts_14733/stamping-parts-with-assembling-process_46.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/5c/5cb117702812e5436c373fae2774fc96.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/construction-machinery-parts_14733/stamping-parts-with-assembling-process_46.html" target="_blank">Stamping parts with assembling process</a>
			</div>
		</div>
		<div class="product_last">
			<div class="product_pic">
				<a href="http://www.global-expo.cn/industrial-filtration-equipment_9268/plastic-injection-parts_17.html" target="_blank"><img border="0" src="http://www.global-expo.cn/webroot/user_upload/sma/df/df2732c2fa46a8bebb30b6f5748a7bc6.jpg" width="120" height="90" /></a>
			</div>
			<div class="product_title">
				<a href="http://www.global-expo.cn/industrial-filtration-equipment_9268/plastic-injection-parts_17.html" target="_blank">Plastic injection parts</a>
			</div>
		</div>
		<div class="clear"></div>
	</div>
  </div>
</div>
</div>
<div class="clear"></div>
</div>
>>>>>>> 45dad3a572d5d7ea9d42e1bc662d5f932f47f01f
