<div class="main-content--section pbottom--30">
		<div class="container">
			
			<div class="row">
				<div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
					<div class="sticky-content-innebr">
						<div class="row">
						<div class="col-md-12 ptop--30 pbottom--30">
							<div class="post--items post--items-2" data-ajax-content="outer">
								<ul class="nav" data-ajax-content="inner">
									<?php
										$cekslide = $this->model_utama->view_single('berita',array('headline' => 'Y','status' => 'Y'),'id_berita','DESC');
										if ($cekslide->num_rows() > 0){
											echo"<li>";
										  include "slide.php";
											echo"</li>";
										}
									?>	
								</ul>
							</div>
							<?php 
							$r = $this->model_utama->view_where('kategori',array('sidebar' => 3))->row_array();
							$kategori99 = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.status' => 'Y'),'id_berita','DESC',0,10);
							$no = 1;
							?>
								
								<div class="post--items-title" data-ajax="tab">
									<h2 class="h4">BERITA TERKINI</h2>
									<div class="nav">
										<a href="#" class="prev btn-link" data-ajax-action="load_prev_home_garden_posts"><i class="fa fa-long-arrow-left"></i></a><span class="divider">/</span><a href="#" class="next btn-link" data-ajax-action="load_next_home_garden_posts"><i class="fa fa-long-arrow-right"></i></a>
									</div>
								</div>
								<div class="post--items post--items-2" data-ajax-content="outer">
									<ul class="nav" data-ajax-content="inner">
										<?php
										foreach ($kategori99->result_array() as $r99) {
											$tglr = tgl_indo($r99['tanggal']);
											$judul_berita = strip_tags($r99['judul']); 
											if (strlen($judul_berita) >= 45){
												$jdl = substr($judul_berita,0,45); 
												$jdl = substr($judul_berita,0,strrpos($jdl," ")) . "... ";
											}else{
												$jdl = substr($judul_berita,0,45); 
												$jdl = substr($judul_berita,0,45);
											}
											$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r99['id_berita']))->num_rows();
										
										
											$isi = substr($r99['isi_berita'],0,140); 
											$isi = substr($isi,0,strrpos($isi," ")) . " .... ";
										?>
										<li>
											<div class="post--item">
												<div class="row">
													<div class="col-md-6">
														<div class="post--img">
														<?php
														if ($r99['gambar'] ==''){
															?><a href="<?php echo base_url()."berita/detail/$r99[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/no-image.jpg";?>&amp;w=500&amp;h=300" alt=""></a>
															<?php
														}else{
															?><a href="<?php echo base_url()."berita/detail/$r99[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/$r99[gambar]";?>&amp;w=500&amp;h=300" alt=""></a>
															<?php
														}
														?>
															<a href="<?php echo base_url()."kategori/detail/$r99[kategori_seo]";?>" class="thumb"><img alt=""></a><a href="<?php echo base_url()."kategori/detail/$r99[kategori_seo]";?>" class="cat"><?php echo $r99["nama_kategori"]; ?></a>
														</div>
													</div>
													<div class="col-md-6">
														<div class="post--info">
														<ul class="nav meta">
															<li>
																<a href="#"><?php echo $r99['nama_lengkap'];?></a>
															</li>
															<li>
																<a href="#"><?php echo "$tglr | $r99[jam]";?></a>
															</li>
														</ul>
														<div class="title">
															<h3 class="h4"><a href="<?php echo base_url()."berita/detail/$r99[judul_seo]";?>" class="btn-link"><?php echo"$jdl"; ?></a></h3>
														</div>
													</div>
														<div class="post--content">
															<p><?php echo $isi; ?></p>
														</div>
														<div class="post--action">
															<a href="<?php echo base_url()."berita/detail/$r99[judul_seo]";?>" class="btn-link">Continue Reading...</a>
														</div>
													</div>
												</div>
											</div>
										</li>
										<li>
											<hr class="divider">
										</li>
										<?php
										}
										echo"<center><a href='" . base_url() . "berita/'><input style=width: 110px; padding:2px;' type=button class=simplebtn value='&nbsp;&nbsp;&nbsp;<< Selengkapnya >>&nbsp;&nbsp;&nbsp;' /></a></center>";
										?>
										
									</ul>
									<div class="preloader bg--color-0--b" data-preloader="1">
										<div class="preloader--inner"></div>
									</div>
								</div>
							</div>
							
							
						
							<div class="col-md-12 ptop--30 pbottom--30">
								<div class="post--items-title" data-ajax="tab">
									<a href = "<?php echo base_url(); ?>albums"><h2 class="h4">Photo Gallery</h2></a>
									<div class="nav">
									</div>
								</div>
								<div class="post--items post--items-1" data-ajax-content="outer">
									<ul class="nav row gutter--15" data-ajax-content="inner">
									<?php 
										$no = 1;
										$album = $this->model_utama->view_where_ordering_limit('album',array('aktif' => 'Y'),'id_album','RANDOM',0,3);
										
										foreach ($album->result_array() as $row) {
											$jumlah = $this->model_utama->view_where('gallery',array('id_album' => $row['id_album']))->num_rows();
											if (1 == 1){
											?>
											<li class="col-md-4 col-xs-6 col-xxs-12">
											<div class="post--item post--layout-1">
												<div class="post--img">
													<a href="news-single-v1.html" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url() . "asset/img_album/$row[gbr_album]"?>&amp;w=450&amp;h=300" alt="<?php echo $row['jdl_album']; ?>"></a>
													<div class="post--info">
														<div class="title">
															<h2 class="h4"><a href="news-single-v1.html" class="btn-link"><?php echo $row['jdl_album'] ?></a></h2>
														</div>
													</div>
												</div>
											</div>
										</li>
											<?php
											$no++;
											}
										}
								    ?>
									</ul>
									<div class="preloader bg--color-0--b" data-preloader="1">
										<div class="preloader--inner"></div>
									</div>
								</div>
							</div>
							
							
						</div>
					</div>
				</div>
				<?php include "sidebar_kanan.php"; ?>
			</div>
			
			
		</div>
	</div>
