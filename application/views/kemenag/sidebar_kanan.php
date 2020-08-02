<div class="main--sidebar col-md-4 col-sm-5 ptop--30 pbottom--30" data-sticky-content="true">
					<div class="sticky-content-inner">
						
						<div class="widget">
							
								<?php
							  $pasangiklan2 = $this->model_utama->view_where('pasangiklan','id_pasangiklan = 1');
							  foreach ($pasangiklan2->result_array() as $b) {
								?>
								<div class="widget--title">
								<h2 class="h4"><?php echo $b['judul'] ?></h2>
								<i class="icon fa fa-bullhorn"></i>
							</div>
							<div class="ad--widget">
								<?php
								$string = $b['gambar'];
								if ($b['gambar'] != ''){
									echo "<img style='width:250px;' src='".base_url()."asset/foto_pasangiklan/$b[gambar]' alt='$b[judul]' />";
									echo "<br/><b>" . $b['url'] . "</b>";
								}
							  }
							?>
							</div>
						</div>
						<div class="widget">
							<div class="widget--title">
								<h2 class="h4">BERITA TERPOPULER</h2>
								<i class="icon fa fa-newspaper-o"></i>
							</div>
							<div class="list--widget list--widget-1">
								<div class="post--items post--items-3" data-ajax-content="outer">
									<?php
									$populer = $this->model_utama->view_join_two('berita','users','kategori','username','id_kategori',array('berita.aktif' => 'Y'),'dibaca','DESC',0,5);
									foreach ($populer->result_array() as $r2x) {
									$tglr = tgl_indo($r2x['tanggal']);	
									$judul_berita = strip_tags($r2x['judul']); 
									if (strlen($judul_berita) >= 45){
										$jdl = substr($judul_berita,0,45); 
										$jdl = substr($judul_berita,0,strrpos($jdl," ")) . "... ";
									}else{
										$jdl = substr($judul_berita,0,45); 
										$jdl = substr($judul_berita,0,45);
									}
									$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $r2x['id_berita']))->num_rows();
									?>
									<ul class="nav" data-ajax-content="inner">
										<li>
											<div class="post--item post--layout-3">
												<div class="post--img">
													<?php
													if ($r2x['gambar'] ==''){
														?><a href="<?php echo base_url()."berita/detail/$r2x[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/no-image.jpg";?>&amp;w=100&amp;h=70" alt=""></a>
														<?php
													}else{
														?><a href="<?php echo base_url()."berita/detail/$r2x[judul_seo]";?>" class="thumb"><img src="<?php echo base_url()."template/" . template() . "/timthumb.php?src=" . base_url()."asset/foto_berita/$r2x[gambar]";?>&amp;w=100&amp;h=70" alt=""></a>
														<?php
													}
													?>
													<div class="post--info">
														<ul class="nav meta">
															<li>
																<a href="#"><?php echo "$tglr | $r2x[jam]";?></a>
															</li>
														</ul>
														<div class="title">
															<h3 class="h4"><a href="<?php echo base_url()."berita/detail/$r2x[judul_seo]";?>" class="btn-link"><?php echo"$jdl"; ?></a></h3>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
									<?php
									}
									?>
									<div class="preloader bg--color-0--b" data-preloader="1">
										<div class="preloader--inner"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="widget">
							  
							<div class="widget--title">
								<h2 class="h4">BANNER</h2>
								<i class="icon fa fa-bullhorn"></i>
							</div>
							<div class="ad--widget">
							  <?php
							  $pasangiklan2 = $this->model_utama->view_where('pasangiklan','id_pasangiklan <> 1');
							  foreach ($pasangiklan2->result_array() as $b) {
								$string = $b['gambar'];
								if ($b['gambar'] != ''){
									echo "<a href='$b[url]' target='_blank'><img style='width:250px;' src='".base_url()."asset/foto_pasangiklan/$b[gambar]' alt='$b[judul]' /></a>";
								}
							  }
							?>
							</div>
						</div>
						<div class="widget">
							<div class="widget--title">
								<h2 class="h4">POLLING</h2>
								<i class="icon fa fa-bullhorn"></i>
							</div>
							<div class="widget">
								<?php
								  $t = $this->model_utama->view_where('poling',array('aktif' => 'Y','status' => 'Pertanyaan'))->row_array();
								  echo " <div style='color:#000; font-weight:bold;'>$t[pilihan] <br></div>";
								  echo "<form method=POST action='".base_url()."polling/hasil'>";
									  $pilih = $this->model_utama->view_where('poling',array('aktif' => 'Y','status' => 'Jawaban'));
									  foreach ($pilih->result_array() as $p) {
									  echo "<input class=marginpoling type=radio name=pilihan value='$p[id_poling]'/>
											<class style=\"color:#666;font-size:12px;\">&nbsp;&nbsp;$p[pilihan]<br />";}
									  echo "<br><input style='width: 110px; padding:2px' type=submit class=simplebtn value='PILIH' />
								  </form>
								  <a href='".base_url()."polling'>
								  <input style='width: 110px; padding:2px;' type=button class=simplebtn value='LIHAT HASIL' /></a>";
								?>
							</div>
						</div>
					</div>
				</div>