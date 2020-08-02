<?php
$lihat = $rows['dilihat']+1;
$total_komentar = $this->model_utama->view_where('komentarvid',array('id_video' => $rows['id_video']))->num_rows();
?>	

<div class="container">
	<div class="row">
		<div class="main--content col-md-8" data-sticky-content="true">
			<div class="sticky-content-inner">
				<div class="post--item post--single post--title-largest pd--30-0">
					<div class="post--img">
					<?php 
						if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $rows['youtube'], $match)) {
						echo "<iframe width='100%' height='500px' src='https://www.youtube.com/embed/".$match[1]."' frameborder='0' allowfullscreen></iframe>";
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
										<span><i class="fa fm fa-eye"></i><?php echo $rows['dilihat']; ?></span>
									</li>
								</ul>
								<div class="title">
									<h2 class="h4"><?php echo $rows['jdl_video'];?></h2>
								</div>
							</div>
							<div class="post--content">
								<?php
								echo "$rows[keterangan]"; 
								?>
							</div>
						</div>		
						<div class="comment--list pd--30-0">
							<div class="post--items-title">
								<h2 class="h4">Facebook Comments</h2>
								<i class="icon fa fa-comments-o"></i>
							</div>
							<div class="comment--item clearfix">
								<div class="fb-comments" data-href="<?php echo base_url().'/berita/detail/'.$rows['judul_seo']; ?>" data-width="830" data-numposts="5" data-colorscheme="light">
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
									$komentar = $this->model_utama->view_where_ordering_limit('komentarvid',array('id_video' => $rows['id_video'],'aktif' => 'Y'),'id_video','ASC',0,100);
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
						<form action="<?php echo base_url(); ?>playlist/kirim_komentar" method="POST" onSubmit="return validasi(this)" id="form_komentar">
						<input type="hidden" name='a' value='<?php echo "$rows[id_video]"; ?>'>
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
											<label><span>Email Address *</span><input type="email" name='c' class="form-control" required></label>
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
