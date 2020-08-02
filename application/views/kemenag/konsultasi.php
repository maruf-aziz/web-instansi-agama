<?php if ($this->uri->segment(3) == ''){ $stat = 'Pertanyaan'; $id = '0'; }else{ $stat = 'Jawaban'; $id = $this->uri->segment(3); } ?>

<div class="main--breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li>
					<a href="<?php echo base_url(); ?>" class="btn-link"><i class="fa fm fa-home"></i>Home</a>
				</li>
				<li class="active">
					<span>Berita Kategori</span>
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
							<h2 class="h2">Tuliskan <?php echo "$stat"; ?> Anda Pada Form Dibawah Ini</h2>
						</div>
						<div class="post--items post--items-5 pd--30-0">
							<ul class="nav">
							<form action="<?php echo base_url(); ?>konsultasi/reply" method="POST" onSubmit="return validasi(this)" id="form_komentar">
							<input type="hidden" value='<?php echo $id; ?>' name='a'>
							
							<div class="row">
								<div class="col-xs-6 col-xxs-12">
									<label><span>Nama Anda *</span><input type="text" placeholder="Nama Anda" id="nama" value='<?php echo "$usr[nama_lengkap]"; ?>' name='b' class="form-control" required></label>
									<label><span>Email Address *</span><input type="text" name='c' placeholder="Alamat E-mail" id="email" value='<?php echo "$usr[email]"; ?>' class="form-control" required></label>
								<?php 
								$tanya = $this->model_utama->view_where('tbl_comment',array('id_komentar'=>$this->uri->segment(3)))->row_array();
									if ($this->uri->segment(3) != ''){  
										echo "<p><label for='c_email'><b>Pertanyaan</b><span class='required'></span></label>
												<div style='margin-left:8px;'>$tanya[isi_pesan] ? </div>
											  </p>";
									}
								?>
								</div>
								<div class="col-xs-6 col-xxs-12">
									<label><span>Comment *</span><textarea name='d' placeholder="Tuliskan <?php echo "$stat"; ?> Anda.." class="form-control" required></textarea></label>
								</div>
								<div class="col-md-12">&nbsp;<br/></div>
								<div class="col-md-12">
								<?php if ($this->uri->segment(3) == ''){ ?>
									<input type="submit" name="submit" class="btn btn-primary" value="Kirimkan Pertanyaan" onclick="return confirm('Yakin ingin mengirimkan pertanyaan ini ?')"/>
								<?php }else{ ?>
									<input type="submit" name="submit" class="btn btn-primary" value="Kirimkan Balasan" onclick="return confirm('Kirimkan Sebagai Balasan Pesan terpilih?')"/>
								<?php } ?>
								</div>
							</form>
							<div class="col-md-12">&nbsp;<br/></div>
							<div class="page--title ptop--30">
								<h3><?php $total = $this->model_utama->view_where('tbl_comment',array('reply'=>0))->num_rows();
									echo "Total Ada $total Pertanyaan"; ?>
								</h3>
							</div>
							
								
							</div>
							
							<div class="block-content">
					<div class="comment-block">
						<ol class="comments">
							<li>
								<?php
									$no = 1;
									foreach ($konsultasi->result_array() as $kka) {
										$isian=nl2br($kka['isi_pesan']); 
										$komentarku=sensor($isian); 
										if(($no % 2)==0){ $warna="#ffffff;"; }else{ $warna="#e3e3e3"; }
										$test = md5(strtolower(trim($kka['alamat_email'])));	
										echo "<div id='reply$kka[id_komentar]' style='background:$warna' class='commment-content'>
												<div class='user-avatar'>
													<a href='#' class='hover-effect'>";
														if ($kka['alamat_email'] == ''){
															echo "<img class='setborder' src='".base_url()."asset/foto_user/blank.png'/>";
														}else{
															echo "<img class='setborder' src='http://www.gravatar.com/avatar/$test.jpg?s=100'/>";
														}
													echo "</a>
												</div>
												<strong class='user-nick'><a href='#'>$kka[nama_lengkap]</a></strong>
												<span class='time-stamp'>".tgl_indo($kka['tanggal_komentar']).", $kka[jam_komentar] WIB</span>
												<div class='comment-text'>
													<p>$komentarku</p>";
													if ($this->session->level!=''){
														echo "<a class='button' style='background:#bf0000; color:#ffffff; float:right; padding:2px 10px' href='".base_url()."administrator/logout'>Logout</a> 
														      <a class='button' style='background:#29b332; color:#ffffff; float:right; padding:2px 10px' href='".base_url()."konsultasi/delete/$kka[id_komentar]'>Hapus</a> 
														      <a class='button' style='background:#6cd43f; color:#ffffff; float:right; padding:2px 10px' href='".base_url()."konsultasi/index/$kka[id_komentar]'>Berikan Jawaban</a>";
													}
													
												echo "</div><div style='clear:both'></div>";
												
												$reply = $this->model_utama->view_where('tbl_comment',array('reply'=>$kka['id_komentar']));
												  foreach ($reply->result_array() as $r) {
												  	$testt = md5(strtolower(trim($r['alamat_email'])));
													echo "<div style='background:$warna; margin-top:0px; margin-left:40px;'>
															<h4 style='background:lightgreen; color:#fff; margin-bottom:5px; padding:4px'>
																Dibalas Oleh : $r[nama_lengkap], Pada : ".tgl_indo($r['tanggal_komentar']).", $kka[jam_komentar] WIB  
															</h4>
															<div class='user-avatar'>
																<a href='#' class='hover-effect'>";
																	if ($r['alamat_email'] == ''){
																		echo "<img class='setborder' src='".base_url()."asset/foto_user/blank.png'/>";
																	}else{
																		echo "<img class='setborder' src='http://www.gravatar.com/avatar/$testt.jpg?s=100'/>";
																	}
																echo "</a>
															</div>
															<div style='padding:left:10px'>
															<i style='color:red;'>$r[alamat_email]</i> - 
															$r[isi_pesan]
															</div><div style='clear:both'></div>
														  </div>";
												  }	
											  echo "</div>";
										$no++;
									}
								?>
							</li>
							
						</ol>

					</div>

				</div>
							
							
							
							
							
							
						
							</ul>
						</div>
						<div class="ad--space">
							<a href="#"><img src="img/ads-img/ad-728x90-02.jpg" alt="" class="center-block"></a>
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