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
							<h2 class="h2">Polling</h2>
						</div>
						<div class="post--items post--items-5 pd--30-0">
						<?php
						  if (get_cookie('poling')!='') {
							  echo "<center style='margin-top:19%; margin-bottom:19%; color:red'><h4>Maaf, anda sudah pernah melakukan pemilihan terhadap jajak pendapat sebelumnya!!!!. <br>
									Klik <a href='".base_url()."'>disini</a> untuk Kembali ke halaman utama.</center></h4>";
						  }else{
							  set_cookie('poling', random_string('alnum', 64), time()+3600*24);
							  echo "<center style='margin-top:5%;'><h4>Terima kasih atas partisipasi anda mengikuti polling kami</h4></center><br/>";
							  echo "<table width=100% style='border: 0pt dashed #CCC;padding: 10px;'>";
									  foreach ($polling->result_array() as $s) {
									  $prosentase = sprintf("%2.1f",(($s['rating']/$rows['jml_vote'])*100));
									  $gbr_vote   = $prosentase * 3;
										echo "<tr>
											<td width='40%'>
											  <b>$s[pilihan] <span class style=\"color:#EA1C1C;\">($s[rating])</span> </b></td><td width=200> 
											  <img src=".base_url()."asset/images/red.jpg width=$gbr_vote  width='200' height='18' border=0>   
											  <span class style=\"color:#EA1C1C;\"><b>$prosentase % </b> </span> <hr style='margin:3px 0px 3px 0px'>
											</td>
										</tr>";
									  }
							  echo "</table>
							  <br/><h4>Jumlah Pemilih: <class style=\"color:#EA1C1C;\">$rows[jml_vote]</h4>";
						  }

						?>
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
												