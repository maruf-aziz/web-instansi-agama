<div class="main--breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li>
					<a href="<?php echo base_url(); ?>" class="btn-link"><i class="fa fm fa-home"></i>Home</a>
				</li>
				<li class="active">
					<span>Agenda</span>
				</li>
			</ul>
		</div>
	</div>
	<div class="main-content--section pbottom--30">
		<div class="container">
			<div class="row">
				<div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
					<div class="sticky-content-inner">
						<div class="post--items post--items-5 pd--30-0">
							<ul class="nav">
								<?php
											  foreach ($agenda->result_array() as $r) {	
												  $tgl_posting = tgl_indo($r['tgl_posting']);
												  $tgl_mulai   = tgl_indo($r['tgl_mulai']);
												  $tgl_selesai = tgl_indo($r['tgl_selesai']);
												  $baca = $r['dibaca']+1;
												  $judull = substr($r['tema'],0,33); 
												  $isi_agenda =(strip_tags($r['isi_agenda'])); 
												  $isi = substr($isi_agenda,0,280); 
												  $isi = substr($isi_agenda,0,strrpos($isi," "));
												
										?>
								<li>
									<div class="post--item post--title-larger">
										<div class="row">
											<div class="col-md-4 col-sm-12 col-xs-4 col-xxs-12">
												
												<div class="post--img">
													<?php
													if ($r['gambar'] ==''){
														?><a href="<?php echo base_url()."agenda/detail/$r[tema_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/small_no-image.jpg";?>&amp;w=230&amp;h=161" alt=""></a>
														<?php
													}else{
														?><a href="<?php echo base_url()."agenda/detail/$r[tema_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_agenda/$r[gambar]";?>&amp;w=230&amp;h=161" alt=""></a>
														<?php
													}
													?>
												</div>
											</div>
											<div class="col-md-8 col-sm-12 col-xs-8 col-xxs-12">
												<div class="post--info">
													<div class="title">
														<h3 class="h4"><a href="<?php echo base_url()."agenda/detail/$r[tema_seo]";?>" class="btn-link"><?php echo $judull; ?></a></h3>
													</div>
													<ul class="nav meta">
														<li>
															<a href="#">Tgl Mulai : <?php echo $tgl_mulai; ?></a>
														</li>
														<li>
															<a href="#">Tgl Selesai : <?php echo $tgl_selesai; ?></a>
														</li>
													</ul>
													
												</div>
												<div class="post--content">
													<p>
														<?php echo $isi; ?>
													</p>
												</div>
												<div class="post--action">
													<a href="<?php echo base_url()."agenda/detail/$r[tema_seo]";?>">Read more...</a>
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
						<div class="ad--space">
							<?php
										$ia = $this->model_utama->view_ordering_limit('iklantengah','id_iklantengah','ASC',0,1)->row_array();
										echo "<a href='$ia[url]' target='_blank'>";
											$string = $ia['gambar'];
											if ($ia['gambar'] != ''){
												if(preg_match("/swf\z/i", $string)) {
													echo "<embed style='margin-top:-10px' src='".base_url()."asset/foto_iklantengah/$ia[gambar]' width='100%' height=90px quality='high' type='application/x-shockwave-flash'>";
												} else {
													echo "<img style='margin-top:-10px; margin-bottom:5px' width='100%' src='".base_url()."asset/foto_iklantengah/$ia[gambar]' title='$ia[judul]' class='center-block'/>";
												}
											}
										echo "</a>";
									?>
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
	