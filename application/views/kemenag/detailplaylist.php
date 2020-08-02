	<div class="main--breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li>
					<a href="<?php echo base_url(); ?>" class="btn-link"><i class="fa fm fa-home"></i>Home</a>
				</li>
				<li class="active">
					<span>Video</span>
				</li>
			</ul>
		</div>
	</div>
	<div class="main-content--section pbottom--30">
		<div class="container">
			<div class="row">
				<div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
					<div class="sticky-content-inner">
						<div class="page--title ptop--30">
							<h2 class="h2"><?php echo "$rows[jdl_playlist]"; ?></h2>
						</div>
						<div class="post--items post--items-5 pd--30-0">
							<ul class="nav">
							
							<?php
							  foreach ($detailplaylist->result_array() as $r) {	
								  $tglr = tgl_indo($r['tanggal']);
								  $lihat = $r['dilihat']+1;
								  $judull = substr($r['jdl_video'],0,33); 
								  $isi_berita =(strip_tags($r['keterangan'])); 
								  $isi = substr($isi_berita,0,280); 
								  $isi = substr($isi_berita,0,strrpos($isi," "));
								  $total_komentar = $this->model_utama->view_where('komentarvid',array('id_video' => $r['id_video']))->num_rows();
							?>
							<li>
									<div class="post--item post--title-larger">
										<div class="row">
											<div class="col-md-4 col-sm-12 col-xs-4 col-xxs-12">
												<div class="post--img">
													<?php
													if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $r['youtube'], $match)) {
														echo "<iframe width='210' height='150' src='https://www.youtube.com/embed/".$match[1]."' frameborder='0' allowfullscreen></iframe>";
													} 
													?>
												</div>
											</div>
											<div class="col-md-8 col-sm-12 col-xs-8 col-xxs-12">
												<div class="post--info">
													<ul class="nav meta">
															<li>
																<a href="#"><?php echo $r['nama_lengkap'];?></a>
															</li>
															<li>
																<a href="#"><?php echo "$tglr | $r[jam]";?></a>
															</li>
														</ul>
													<div class="title">
														<h3 class="h4"><a href="<?php echo base_url()."playlist/watch/$r[video_seo]";?>" class="btn-link"><?php echo $judull;?></a></h3>
													</div>
												</div>
												<div class="post--content">
													<p>
														<?php echo $isi;?>
													</p>
												</div>
												<div class="post--action">
													<a href="<?php echo base_url()."playlist/watch/$r[video_seo]";?>">Continue Reading...</a>
												</div>
											</div>
										</div>
									</div>
								</li>
							<?php
							  }
						?>
											
														
						<div class="pagination--wrapper clearfix bdtop--1 bd--color-2 ptop--60 pbottom--30">
											
							<ul class="pagination float--right">
								<li>
								<?php echo $this->pagination->create_links(); ?>
								</li>
							</ul>
							
						</div>
					</div>
				</div>
				
			</div>
			<?php include "sidebar_kanan.php"; ?>
		</div>
	</div>
				
						
					