<?php
	$baca = $rows['dibaca']+1;	
	$total_komentar = $this->model_utama->view_where('komentar',array('id_berita' => $rows['id_berita'], 'aktif' => 'Y'))->num_rows();
?>	

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
										<a href="#"><?php echo "$rows[nama_lengkap]"; ?></a>
									</li>
									<li>
										<a href="#"><?php echo tgl_indo($rows['tanggal']).", $rows[jam]"; ?></a>
									</li>
									<li>
										<span><i class="fa fm fa-eye"></i><?php echo $rows['dibaca']; ?></span>
									</li>
								</ul>
								<div class="title">
									<h2 class="h4"><?php echo $rows['judul'];?></h2>
								</div>
							</div>
							<div class="post--content">
								<?php
								echo "$rows[isi_berita]"; 
								?>
							</div>
						</div>
						<div class="ad--space pd--20-0-40">
							<?php
							$ia = $this->model_utama->view_ordering_limit('iklantengah','id_iklantengah','ASC',8,1)->row_array();
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
						<div class="post--tags">
							<ul class="nav">
								<li>
									<span><i class="fa fa-tags"></i></span>
								</li>
									<?php
									$tags = (explode(",",$rows['tag']));
									$hitung = count($tags);
									for ($x=0; $x<=$hitung-1; $x++) {
										if ($tags[$x] != ''){
											echo "<li><a href='".base_url()."tag/detail/$tags[$x]'>$tags[$x]</a></li>";
										}
									}
								?>
								
							</ul>
						</div>
						<div class="post--social pbottom--30">
							<span class="title"><i class="fa fa-share-alt"></i></span>
							<div class="social--widget style--4">
								<ul class="nav">
								<script language="javascript">
								document.write("<a href='http://www.facebook.com/share.php?u=<?php echo base_url().'berita/detail/'.$rows['judul_seo']; ?>" . $_SERVER['REQUEST_URI'] . " ' target='_blank' class='fa fa-facebook'>&#62220;</a> <a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank' class='custom-soc icon-text'>&#62217;</a> <a href='https://plus.google.com/share?url=" + document.URL + "' target='_blank' class='custom-soc icon-text'>&#62223;</a>");
								</script>
								<a href="#" class="custom-soc icon-text">&#62232;</a>
								<a href="#" class="custom-soc icon-text">&#62226;</a>
									<li>
										<a href="http://www.facebook.com/share.php?u=<?php echo base_url().'berita/detail/'.$rows['judul_seo'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
									</li>
									<li>
										<a href="http://twitter.com/home/?status=<?php echo base_url().'berita/detail/'.$rows['judul_seo'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
									</li>
									<li>
										<a href="https://plus.google.com/share?url=<?php echo base_url().'berita/detail/'.$rows['judul_seo'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
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
						
						<div class="comment--list pd--30-0">
							<div class="post--items-title">
								<h2 class="h4">Facebook Comments</h2>
								<i class="icon fa fa-comments-o"></i>
							</div>
							<div class="comment--item clearfix">
								<div class="fb-comments" data-href="<?php echo base_url().'/berita/detail/'.$rows['judul_seo']; ?>" data-width="750" data-numposts="5" data-colorscheme="light">
								</div> 
							</div>
							
						</div>
						
						<div class="comment--list pd--30-0">
							<div class="post--items-title">
								<h2 class="h4"><?php echo $total_komentar; ?> Komentar</h2>
								<i class="icon fa fa-comments-o"></i>
							</div>
							<ul class="comment--items nav">
								<?php
									$no = 1;
									$komentar = $this->model_utama->view_where_ordering_limit('komentar',array('id_berita' => $rows['id_berita'],'aktif' => 'Y'),'id_komentar','ASC',0,100);
			  						foreach ($komentar->result_array() as $kka) {
										$isian=nl2br($kka['isi_komentar']); 
										$komentarku = sensor($isian); 
										
										if(($no % 2)==0){ $warna="#ffffff;"; }else{ $warna="#e3e3e3"; }
										$gravatar = md5(strtolower(trim($kka['url'])));	
										?>
										<li>
									<div class="comment--item clearfix">
										<div class="comment--img float--left">
										<?php
										if ($kka['url'] == ''){
											echo "<img class='setborder' src='".base_url()."asset/foto_user/blank.png'/>";
										}else{
											echo "<img class='setborder' src='http://www.gravatar.com/avatar/$gravatar.jpg?s=100'/>";
										}
										?>
										</div>
										<div class="comment--info">
											<div class="comment--header clearfix">
												<p class="name"><?php echo $kka['nama_komentar']; ?></p>
												<p class="date"><?php echo tgl_indo($kka['tgl']) . ", $kka[jam_komentar] ";?></p>
											</div>
											<div class="comment--content">
												<p>
													<?php echo $komentarku; ?>
												</p>
											</div>
										</div>
									</div>
								</li>
								<?php
										
										$no++;
									}
								?>
								
								
							</ul>
						</div>
						<form action="<?php echo base_url(); ?>berita/kirim_komentar" method="POST" onSubmit="return validasi(this)" id="form_komentar">
						<input type="hidden" name='a' value='<?php echo "$rows[id_berita]"; ?>'>
						<div class="comment--form pd--30-0">
							<div class="post--items-title">
								<h2 class="h4">TULIS KOMENTAR</h2>
								<i class="icon fa fa-pencil-square-o"></i>
							</div>
							<div class="comment-respond">
								<form action="#" data-form="validate">
									<p>
										Alamat email anda aman dan tidak akan dipublikasikan.
									</p>
									<div class="row">
										<div class="col-sm-6">
											<label><span>Comment *</span><textarea name='d' class="form-control" required></textarea></label>
										</div>
										<div class="col-sm-6">
											<label><span>Name *</span><input type="text" id="nama" name='b' class="form-control" required></label>
											<label><span>Email Address *</span><input type="email" name='e' class="form-control" required></label>
										</div>
										<div class="col-sm-6">
										<p class="contact-form-message">
											<label for="c_message">
											<?php echo $image; ?><br></label>
											<input name='secutity_code' maxlength=6 type="text" class="required" placeholder="Masukkkan kode ..">
										</p>
										</div>
										<div class="col-md-12">
											<input type="submit" name="submit" class="btn btn-primary" value="Post a Comment" onclick="return confirm('Haloo, Pesan anda akan tampil setelah kami setujui?')"/>
											
										</div>
									</div>
								</form>
							</div>
						</div>
						</form>
					</div>
				</div>
				<?php include "sidebar_kanan.php";  ?>
			</div>
		</div>
