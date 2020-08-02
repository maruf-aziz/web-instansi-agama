<footer class="footer--section">
	<div class="footer--widgets pd--30-0 bg--color-2">
		<div class="container">
			<div class="row AdjustRow">
				<div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
					<div class="widget">
						<div class="widget--title">
							<h2 class="h4">Hubungi Kami</h2>
							
						</div>
						<div class="about--widget">
							<ul class="nav">
								<?php
								  $identitas = $this->model_utama->view_ordering_limit('identitas','id_identitas','ASC',0,1);
								  foreach ($identitas->result_array() as $x) {
										
								?>
								<li>
									<i class="fa fa-map"></i><span><?php echo $x['nama_website']; ?></span>
								</li>
								<li>
									<i class="fa fa-envelope-o"></i><span><?php echo $x['email']; ?></span>
								</li>
								<li>
									<i class="fa fa-phone"></i><a href="tel:+123456789"><?php echo $x['no_telp']; ?></a>
								</li>
								<?php
								  }
								?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
					<div class="widget">
						<div class="widget--title">
							<h2 class="h4">TAG BERITA</h2>
							<i class="icon fa fa-bullhorn"></i>
						</div>
						<div class="tags--widget style--1" style="background-color:#1d1d1d; padding-top:0px; padding-bottom:0px;padding-left:0px;">
							<ul class="nav">
								<?php 
									$tag = $this->model_utama->view_ordering_limit('tag','id_tag','RANDOM',0,50);
									foreach ($tag->result_array() as $row) {
										echo "<li><a href='".base_url()."tag/detail/$row[tag_seo]'>$row[nama_tag]</a></li>";
									}
								?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
					<div class="widget">
						<div class="widget--title">
							<h2 class="h4">Link Terkait</h2>
							<i class="icon fa fa-expand"></i>
						</div>
						<div class="links--widget">
							<ul class="nav">
								<?php
								  $banner = $this->model_utama->view_ordering_limit('banner','id_banner','ASC',0,7);
								  foreach ($banner->result_array() as $b) {
											echo "<li><a class='fa-angle-right' target='_BLANK' href='$b[url]'>$b[judul]</a></li>";
								  }
								?>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-xs-6 col-xxs-12 ptop--30 pbottom--30">
					<div class="widget">
						<div class="widget--title">
							<h2 class="h4">AGENDA</h2>
							<i class="icon fa fa-user-o"></i>
						</div>
						<div class="links--widget">
							<ul class="nav">
							<?php
							  $agenda = $this->model_utama->view_ordering_limit('agenda','id_agenda','DESC',0,7);
							  foreach ($agenda->result_array() as $r) {	
							  $tgl_posting = tgl_indo($r['tgl_posting']);
							  $tgl_mulai   = tgl_indo($r['tgl_mulai']);
							  $tgl_selesai = tgl_indo($r['tgl_selesai']);
							  $baca = $r['dibaca']+1;
							  $judull = substr($r['tema'],0,33); 
							?>
								<li>
									<a href="<?php echo base_url()."agenda/detail/$r[tema_seo]";?>" class="fa-angle-right"><?php echo $judull;?></a>
								</li>
							<?php
							}
							?>							
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer--copyright bg--color-3">
		<div class="social--bg bg--color-1"></div>
		<div class="container">
			<p class="text float--left">
				&copy; 2018 <a href="http://members.lokomedia.web.id">Lokomedia.web.id</a>. All Rights Reserved.
			</p>
			<ul class="nav social float--right">
				<li>
					<a href="#"><i class="fa fa-facebook"></i></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-twitter"></i></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-google-plus"></i></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-linkedin"></i></a>
				</li>
				<li>
					<a href="#"><i class="fa fa-youtube-play"></i></a>
				</li>
			</ul>
			
		</div>
	</div>
	</footer>