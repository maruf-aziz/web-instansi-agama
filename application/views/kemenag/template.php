<!DOCTYPE html><html dir="ltr" lang="en">
<head> 
<title><?php echo $title; ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="index, follow">
	<meta name="description" content="<?php echo $description; ?>">
	<meta name="keywords" content="<?php echo $keywords; ?>">
	<meta name="author" content="lokomedia.web.id">
	<meta name="robots" content="all,index,follow">
	<meta http-equiv="Content-Language" content="id-ID">
	<meta NAME="Distribution" CONTENT="Global">
	<meta NAME="Rating" CONTENT="General">
	<link rel="canonical" href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"/>
	<?php if ($this->uri->segment(1)=='berita' AND $this->uri->segment(2)=='detail'){ $rows = $this->model_utama->view_where('berita',array('judul_seo' => $this->uri->segment(3)))->row_array();
	   echo '<meta property="og:title" content="'.$title.'" />
			 <meta property="og:type" content="article" />
			 <meta property="og:url" content="'.base_url().'berita/detail/'.$this->uri->segment(3).'" />
			 <meta property="og:image" content="'.base_url().'asset/foto_berita/'.$rows['gambar'].'" />
			 <meta property="og:description" content="'.$description.'"/>';
	} ?>
	<link rel="shortcut icon" href="<?php echo base_url(); ?>asset/images/<?php echo favicon(); ?>" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="rss.xml" />
	
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700">
 <link rel="stylesheet" href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/font-awesome.min.css"> 
 <link rel="stylesheet" href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/bootstrap.min.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/fontawesome-stars-o.min.css"> 
 <link rel="stylesheet" href="<?php echo base_url(); ?>template/<?php echo template(); ?>/style.css"> 
 <link rel="stylesheet" href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/responsive-style.css"> 
 <?php
 $background = $this->model_utama->view_where('background',array('id_background' => '1'));
  foreach ($background->result_array() as $r) {	
	?>
	 <link rel="stylesheet" href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/colors/theme-color-<?php echo $r['gambar']; ?>.css" id="changeColorScheme"> 
	<?php
  }
 ?>

 
 <link rel="stylesheet" href="<?php echo base_url(); ?>template/<?php echo template(); ?>/css/custom.css">
 <script id="facebook-jssdk" src="//connect.facebook.net/en_GB/sdk.js#xfbml=1&amp;version=v2.0"></script>
 
 <script type="text/javascript" src="<?php echo base_url(); ?>template/<?php echo template(); ?>/slide/js/jssor.slider.min.js"></script>
 <script type="text/javascript" src="<?php echo base_url(); ?>template/<?php echo template(); ?>/slide/js/slide.js"></script>
 
 </head>
<body class="boxed" data-bg-img="<?php echo base_url(); ?>template/<?php echo template(); ?>/img/bg-pattern.png">
 <!--
<div id="preloader">
	<div class="preloader bg--color-1--b" data-preloader="1">
		<div class="preloader--inner"></div>
	</div>
</div>
-->
<div class="wrapper">
	<header class="header--section header--style-1">
	
<?php include "header.php"; ?>
	</header>
	<?php
	$hot = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('headline' => 'Y','status' => 'Y'),'id_berita','DESC',0,6);
	?>
	<div class="news--ticker">
		<div class="container">
			<div class="title">
				<h2>News Updates</h2>
			</div>
			<div class="news-updates--list" data-marquee="true">
				<ul class="nav">
						<?php
						foreach ($hot->result_array() as $row) {
							$tgl = tgl_indo($row['tanggal']);
						?>	
							<li>
								<h3 class="h3"><a href="<?php echo base_url()."berita/detail/$row[judul_seo]";?>"><?php echo $row['judul'];?></a></h3>
							</li>
						<?php
						}
						?>
				</ul>
			</div>
		</div>
	</div>
	
	<?php echo $contents; ?>
		
	<?php 
		include "footer.php";
		$this->model_utama->kunjungan(); 
	?>
</div>

<div id="backToTop">
	<a href="#"><i class="fa fa-angle-double-up"></i></a>
</div>
<script>!function(e,t,r,n,c,a,l){function i(t,r){return r=e.createElement('div'),r.innerHTML='<a href="'+t.replace(/"/g,'&quot;')+'"></a>',r.childNodes[0].getAttribute('href')}function o(e,t,r,n){for(r='',n='0x'+e.substr(t,2)|0,t+=2;t<e.length;t+=2)r+=String.fromCharCode('0x'+e.substr(t,2)^n);return i(r)}try{for(c=e.getElementsByTagName('a'),l='/cdn-cgi/l/email-protection#',n=0;n<c.length;n++)try{(t=(a=c[n]).href.indexOf(l))>-1&&(a.href='mailto:'+o(a.href,t+l.length))}catch(e){}for(c=e.querySelectorAll('.__cf_email__'),n=0;n<c.length;n++)try{(a=c[n]).parentNode.replaceChild(e.createTextNode(o(a.getAttribute('data-cfemail'),0)),a)}catch(e){}}catch(e){}}(document);</script>
<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/jquery-3.2.1.min.js"></script>
<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/jquery.sticky.min.js"></script>
<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/jquery.hoverIntent.min.js"></script>
<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/jquery.marquee.min.js"></script>
<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/isotope.min.js"></script>
<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/resizesensor.min.js"></script>
<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/theia-sticky-sidebar.min.js"></script>
<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/jquery.zoom.min.js"></script>
<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/jquery.barrating.min.js"></script>
<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/jquery.countdown.min.js"></script>
<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/retina.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBK9f7sXWmqQ1E-ufRXV3VpXOn_ifKsDuc"></script>
<script src="<?php echo base_url(); ?>template/<?php echo template(); ?>/js/main.js"></script>

     <script>
       jQuery(document).ready(function ($) {

            var options = {
                $SlideDuration: 800,                    //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
                $DragOrientation: 3,                    //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $Cols is greater than 1, or parking position is not 0)
                $AutoPlay: 1,                           //[Optional] Auto play or not, to enable slideshow, this option must be set to greater than 0. Default value is 0. 0: no auto play, 1: continuously, 2: stop at last slide, 4: stop on click, 8: stop on user navigation (by arrow/bullet/thumbnail/drag/arrow key navigation)
                $Idle: 1500,                            //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000

                $BulletNavigatorOptions: {              //[Optional] Options to specify and enable navigator or not
                    $Class: $JssorBulletNavigator$,     //[Required] Class to create navigator instance
                    $ChanceToShow: 2,                   //[Required] 0 Never, 1 Mouse Over, 2 Always
                    $Steps: 1,                          //[Optional] Steps to go for each navigation request, default value is 1
                    $Rows: 1,                           //[Optional] Specify lanes to arrange items, default value is 1
                    $SpacingX: 10,                      //[Optional] Horizontal space between each item in pixel, default value is 0
                    $SpacingY: 10,                      //[Optional] Vertical space between each item in pixel, default value is 0
                    $Orientation: 1                     //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
                },

                $ArrowNavigatorOptions: {
                    $Class: $JssorArrowNavigator$,      //[Requried] Class to create arrow navigator instance
                    $ChanceToShow: 2                    //[Required] 0 Never, 1 Mouse Over, 2 Always
                },
				
				$ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Cols: 1,
                $Align: 0,
                $NoDrag: true
              }
            };

            var jssor_slider1 = new $JssorSlider$('slider1_container', options);
            //make sure to clear margin of the slider container element
            jssor_slider1.$Elmt.style.margin = "";

            //#region responsive code begin
            //the following code is to place slider in the center of parent container with no scale
            function ScaleSlider() {

                var containerElement = jssor_slider1.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {
                    var expectedWidth = Math.min(containerWidth, jssor_slider1.$OriginalWidth());

                    //scale the slider to original height with no change
                    jssor_slider1.$ScaleSize(expectedWidth, jssor_slider1.$OriginalHeight());

                    jssor_slider1.$Elmt.style.left = ((containerWidth - expectedWidth) / 2) + "px";
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            //#endregion responsive code end
        });
    </script>

</body>

</html>
