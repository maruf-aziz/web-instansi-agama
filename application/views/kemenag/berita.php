	<div class="main--breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li>
					<a href="<?php echo base_url(); ?>" class="btn-link"><i class="fa fm fa-home"></i>Home</a>
				</li>
				<li class="active">
					<span>Semua Berita</span>
				</li>
			</ul>
		</div>
	</div>
	<div class="contact--section pd--30-0">
		<div class="container">
			<div class="row">
				<div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
					<div class="sticky-content-inner">
						<div class="page--title ptop--30">
							<h2 class="h2">SEMUA BERITA</h2>
						</div>
						<div class="post--items post--items-5 pd--30-0">
							<ul class="nav">
										
											<?php
											  foreach ($berita->result_array() as $r) {	
												  $tglr = tgl_indo($r['tanggal']);
												  $baca = $r['dibaca']+1;	
												  $isi_berita =(strip_tags($r['isi_berita'])); 
												  $isi = substr($isi_berita,0,250); 
												  $isi = substr($isi_berita,0,strrpos($isi," ")); 
												  $judul = substr($r['judul'],0,50); 
												  $total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r['id_berita']))->num_rows();
											?>
											<li>
												<div class="post--item post--title-larger">
													<div class="row">
														<div class="col-md-4 col-sm-12 col-xs-4 col-xxs-12">
															<div class="post--img">
																<?php
																if ($r['gambar'] ==''){
																	?><a href="<?php echo base_url()."berita/detail/$r[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/no-image.jpg";?>&amp;w=450&amp;h=300" alt=""></a>
																	<?php
																}else{
																	?><a href="<?php echo base_url()."berita/detail/$r[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/$r[gambar]";?>&amp;w=450&amp;h=300" alt=""></a>
																	<?php
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
																	<h3 class="h4"><a href="<?php echo base_url()."berita/detail/$r[judul_seo]";?>" class="btn-link"><?php echo $judul;?></a></h3>
																</div>
															</div>
															<div class="post--content">
																<p>
																	<?php echo $isi;?>
																</p>
															</div>
															<div class="post--action">
																<a href="<?php echo base_url()."berita/detail/$r[judul_seo]";?>">Continue Reading...</a>
															</div>
														</div>
													</div>
												</div>
											</li>
												  
											<?php 
											
											}
										?>
										</ul>
									</div>	
										<div class="pagination--wrapper clearfix bdtop--1 bd--color-2 ptop--60 pbottom--30">
											
									<ul class="pagination float--right">
										<li>
										<?php echo $this->pagination->create_links(); ?>
										</li>
									</ul>
									
								</div>
							</div>
						</div>
						<?php include "sidebar_kanan.php"; ?>
					</div>
					
				</div>
			</div>
