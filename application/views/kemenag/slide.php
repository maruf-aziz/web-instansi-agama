<div id="jssor_1" class='jssor_1'>
<div style="position:relative;top:0;left:0;width:100%;overflow:hidden;">

        <!--#region Jssor Slider Begin -->
        <div id="slider1_container" style="position: relative; margin: 0 auto; top: 0px; left: 0px; max-width: 750px; height: 350px;">
            <!-- Loading Screen -->
            <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="<?php echo base_url(); ?>template/<?php echo template(); ?>/svg/loading/static-svg/spin.svg" />
            </div>

            <!-- Slides Container -->
            <div u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width:750px; min-width: 350px;  height: 350px; overflow: hidden;">
                <?php
                $slide1 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('headline' => 'Y','status' => 'Y'),'id_berita','DESC',0,4);
                $no=1;
                foreach ($slide1->result_array() as $row) {
                    if ($row['gambar'] ==''){ $foto_slide = 'no-image.jpg'; }else{ $foto_slide = $row['gambar']; }
                    if (strlen($row['judul']) > 40){ $judul = substr($row['judul'],0,40).',..';  }else{ $judul = $row['judul']; }
                    echo "<div>
                            <img u='image' src='".base_url()."asset/foto_berita/$foto_slide'/>
                            <div u='thumb'><a style='font-size:12pt; color:#fff' href='".base_url()."berita/detail/$row[judul_seo]'>$judul</a></div>
                        </div>"; 
                    $no++;
                }
            ?>
            </div>
            
			<!--#region Thumbnail Navigator Skin Begin -->
        <!-- Help: https://www.jssor.com/development/thumbnail-navigator.html -->
        <!-- thumbnail navigator container -->
        <div u="thumbnavigator" class="jssort09" style="position: absolute; bottom: 0px; left: 0px; height:60px; width:750px; background-color: rgba(0,0,0,.4);">
            <!-- Thumbnail Item Skin Begin -->
            <div u="slides">
                <div u="prototype" style="POSITION: absolute; WIDTH: 750px; HEIGHT: 60px; TOP: 0; LEFT: 0;">
                    <div u="thumbnailtemplate" style="font-family: verdana; font-weight: normal; POSITION: absolute; WIDTH: 100%; HEIGHT: 100%; TOP: 0; LEFT: 0; color:#fff; line-height: 60px; font-size:20px; padding-left:10px;"></div>
                </div>
            </div>
            <!-- Thumbnail Item Skin End -->
        </div>
        <!--#endregion ThumbnailNavigator Skin End -->
        
		
            <!--#region Bullet Navigator Skin Begin -->
            <!-- Help: https://www.jssor.com/development/slider-with-bullet-navigator.html -->
            <style>
                .jssorb051 .i {position:absolute;cursor:pointer;}
                .jssorb051 .i .b {fill:#fff;fill-opacity:0.5;stroke:#000;stroke-width:400;stroke-miterlimit:10;stroke-opacity:0.5;}
                .jssorb051 .i:hover .b {fill-opacity:.7;}
                .jssorb051 .iav .b {fill-opacity: 1;}
                .jssorb051 .i.idn {opacity:.3;}
            </style>
			<div data-u="navigator" class="jssorb051" style="position:absolute;bottom:40px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                <div data-u="prototype" class="i" style="width:16px;height:16px;">
                    <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;width:100%;height:100%;">
                        <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                    </svg>
                </div>
            </div>
            <!--#endregion Bullet Navigator Skin End -->
        
            <!--#region Arrow Navigator Skin Begin -->
            <!-- Help: https://www.jssor.com/development/slider-with-arrow-navigator.html -->
            <style>
                .jssora051 {display:block;position:absolute;cursor:pointer;}
                .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
                .jssora051:hover {opacity:.8;}
                .jssora051.jssora051dn {opacity:.5;}
                .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
            </style>
            <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                </svg>
            </div>
            <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                <svg viewBox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                </svg>
            </div>
            <!--#endregion Arrow Navigator Skin End -->

        </div>
        <!--#endregion Jssor Slider End -->
    </div>
</div>	
	
	
	
	