<!-- <div class="banner_area sliderkit photoslider-bullets" style="display: block;">
<div class="sliderkit-panels">
    <?foreach ($banner_list->result() as $banner) {?>
        <div class="sliderkit-panel"><a href="<?=$banner->href?>" target="_blank"><img border="0" width="560" height="260" src="<?=$this->config->item('upload_url_prefix').'banner/'.$banner->src?>" /></a></div>
    <?}?>
 <div class="sliderkit-panel"><a href="http://vshow.global-expo.cn/" target="_blank"><img border="0" width="560" height="260" /></a></div>

</div>
<div class="sliderkit-nav">
  <div class="sliderkit-nav-clip">
    <ul>
        <?foreach ($banner_list->result() as $banner):?>
            <li><a href="#">&nbsp;</a></li>
        <?endforeach;?>
    </ul>
  </div>
</div>
</div> -->

 <div class="slide_items" id="focus_list">
    <ul class="slide_list">
        <li class="first_group current_slide"><a title="家居保暖大战" href="#" target="_blank" name="a01-0"><img title="家居保暖大战" alt="家居保暖大战" src="<?=base_url()?>webroot/images/js01.jpg"></a></li>
        <li class="first_group"><a title="家居保暖大战" href="#" target="_blank" name="a01-0"><img title="家居保暖大战" alt="家居保暖大战" src="<?=base_url()?>webroot/images/js02.jpg"></a></li>
        <li class="first_group"><a title="家居保暖大战" href="#" target="_blank" name="a01-0"><img title="家居保暖大战" alt="家居保暖大战" src="<?=base_url()?>webroot/images/js03.jpg"></a></li>
        <li class="first_group"><a title="家居保暖大战" href="#" target="_blank" name="a01-0"><img title="家居保暖大战" alt="家居保暖大战" src="<?=base_url()?>webroot/images/js04.jpg"></a></li>
        <li class="first_group"><a title="家居保暖大战" href="#" target="_blank" name="a01-0"><img title="家居保暖大战" alt="家居保暖大战" src="<?=base_url()?>webroot/images/js05.jpg"></a></li>
    </ul>
    <div class="slide_tag">
        <a class="slide_tag_a this" href="javascript:;">1</a>
        <a class="slide_tag_a" href="javascript:;">2</a>
        <a class="slide_tag_a" href="javascript:;">3</a>
        <a class="slide_tag_a" href="javascript:;">4</a>
        <a class="slide_tag_a" href="javascript:;">5</a>
    </div>
    <a class="pageBtn prev hidden" href="javascript:void(0)" title="上一页">上一页</a>
    <a class="pageBtn next hidden" href="javascript:void(0)" title="下一页">下一页</a>
</div> 


<script type="text/javascript">
    SLIDE = 
    {
        init:function()
        {
            this.count = $(".first_group").length;
            this.cur = 0;
            this.speed = 500;
            this.canclick = true;
            this.autoTime = 3000;
            this.autoSlide();
            this.bind();
        },
        goToNext:function()
        {
            var next = this.cur+1;
            this.goTo(next);
        },
        goToPrev:function()
        {
            var prev = this.cur-1;
            this.goTo(prev);
        },
        goTo:function(which)
        {
            this.stopAuto();
            var self = this;
            if(!this.canclick)
            {
                return;
            }
            this.canclick = false;
            if(which<0)
            {
                which = self.count-1;
            }
            else if(which>=this.count)
            {
                which = 0;
            }
            $(".slide_tag_a").removeClass('this');
            $(".slide_tag_a").eq(which).addClass('this');

            $(".first_group").eq(this.cur).css({'z-index':1});
            $(".first_group").eq(which).css({'z-index':0,'opacity':1});
            $(".first_group").eq(this.cur).stop().animate({'opacity':0},this.speed,function(){
                self.canclick = true;
                self.cur = which;
                $(".first_group").removeClass('current_slide');
                $(".first_group").eq(which).addClass('current_slide');
                self.autoSlide();
                });
        },
        bind:function()
        {
            var self = this;
            $(".prev").unbind("click").bind("click",function()
            {
                self.goToPrev();
            });
            $(".next").unbind("click").bind("click",function()
            {
                self.goToNext();
            });
            $(".slide_tag_a").unbind("click").bind("click",function()
            {
                self.goTo($(".slide_tag_a").index($(this)));
            });
            $(".prev,.next").stop().hover(function(){
                $(this).fadeTo(600, 1);
            },function(){
                $(this).fadeTo(600, 0.5);
            });
        },
        autoSlide:function()
        {
            var self = this;
            this.autoSlideId = setInterval(function(){self.goToNext();},this.autoTime);
        },
        stopAuto:function()
        {
            clearInterval(this.autoSlideId);
        }
    }
 
    $(function(){
       SLIDE.init();
    });
</script>