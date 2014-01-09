<div class="banner_area sliderkit photoslider-bullets" style="display: block;">
<div class="sliderkit-panels">
    <?foreach ($banner_list->result() as $banner) {?>
        <div class="sliderkit-panel"><a href="<?=$banner->href?>" target="_blank"><img border="0" width="560" height="260" src="<?=$this->config->item('upload_url_prefix').'banner/'.$banner->src?>" /></a></div>
    <?}?>
<!--  <div class="sliderkit-panel"><a href="--><?//=base_url()?><!--app.html" target="_blank"><img border="0" width="560" height="260" --><?//img_src('js01.jpg')?><!-- /></a></div>-->
<!--  <div class="sliderkit-panel"><a href="http://m.me360.com/" target="_blank"><img border="0" width="560" height="260" --><?//img_src('js02.jpg')?><!-- /></a></div>-->
<!--  <div class="sliderkit-panel"><a href="http://vshow.global-expo.cn/" target="_blank"><img border="0" width="560" height="260" --><?//img_src('js03.jpg')?><!-- /></a></div>-->
<!--  <div class="sliderkit-panel"><a href="--><?//=base_url()?><!--jwell" target="_blank"><img border="0" width="560" height="260" --><?//img_src('js04.jpg')?><!-- /></a></div>-->
<!--  <div class="sliderkit-panel"><a href="--><?//=base_url()?><!--" target="_blank"><img border="0" width="560" height="260" --><?//img_src('js05.jpg')?><!-- /></a></div>-->
</div>
<div class="sliderkit-nav">
  <div class="sliderkit-nav-clip">
    <ul>
        <?foreach ($banner_list->result() as $banner):?>
            <li><a href="#">&nbsp;</a></li>
        <?endforeach;?>
<!--      <li><a href="#">&nbsp;</a></li>-->
<!--      <li><a href="#">&nbsp;</a></li>-->
<!--      <li><a href="#">&nbsp;</a></li>-->
<!--      <li><a href="#">&nbsp;</a></li>-->
<!--      <li><a href="#">&nbsp;</a></li>-->
    </ul>
  </div>
</div>
</div>