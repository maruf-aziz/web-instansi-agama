<div class="container">
	<div class="row">
		<div class="main--content col-md-8" data-sticky-content="true">
			<div class="sticky-content-inner">
				<div class="post--item post--single post--title-largest pd--30-0">
					<div class="post--img">
					<?php 
						if ($rows['gambar'] !=''){ echo "<a href='#' class='thumb'><img style='width:100%' src='".base_url()."asset/foto_berita/$rows[gambar]' alt='$rows[judul]' /></a>"; }
						if ($rows['keterangan_gambar'] !=''){ echo "<center><p><i><b>Keterangan Gambar :</b> $rows[keterangan_gambar]</i></p></center><br>"; }
					
						if ($rows['youtube']!=''){
							echo "<h4>Video Terkait:</h4>";
							if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $rows['youtube'], $match)) {
								echo "<iframe width='100%' height='350px' id='ytplayer' type='text/html'
									src='https://www.youtube.com/embed/".$match[1]."?rel=0&showinfo=1&color=white&iv_load_policy=3'
									frameborder='0' allowfullscreen></iframe><div class='garis'></div><br/>";
							} 
						}
					?>
				</div>
					<div class="post--info">
						<ul class="nav meta">
							<li>
								<a href="#"><?php echo tgl_indo($rows['tgl_posting']).", $rows[jam]"; ?></a>
							</li>
						</ul>
						<div class="title">
							<h2 class="h4"><?php echo $rows['judul'];?></h2>
						</div>
					</div>
					<div class="post--content">
						<?php
						echo "$rows[isi_halaman]"; 
						?>
					</div>
				</div>
				<div class="post--social pbottom--30">
							<span class="title"><i class="fa fa-share-alt"></i></span>
							<div class="social--widget style--4">
								<ul class="nav">
								<script language="javascript">
								document.write("<a href='http://www.facebook.com/share.php?u=" . $_SERVER['REQUEST_URI'] . " ' target='_blank' class='fa fa-facebook'>&#62220;</a> <a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank' class='custom-soc icon-text'>&#62217;</a> <a href='https://plus.google.com/share?url=" + document.URL + "' target='_blank' class='custom-soc icon-text'>&#62223;</a>");
								</script>
								<a href="#" class="custom-soc icon-text">&#62232;</a>
								<a href="#" class="custom-soc icon-text">&#62226;</a>
									<li>
										<a href="http://www.facebook.com/share.php?u=<?php echo $_SERVER['REQUEST_URI']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
									</li>
									<li>
										<a href="http://twitter.com/home/?status=<?php echo $_SERVER['REQUEST_URI']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
									</li>
									<li>
										<a href="https://plus.google.com/share?url=<?php echo $_SERVER['REQUEST_URI']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa fa-linkedin"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa fa-rss"></i></a>
									</li>
									<li>
										<a href="#"><i class="fa fa-youtube-play"></i></a>
									</li>
								</ul>
							</div>
						</div>
						</div>
				</div>
				<?php include "sidebar_kanan.php";  ?>
			</div>
		</div>