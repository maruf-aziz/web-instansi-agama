	<div class="main--breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li>
					<a href="home-1-boxed.html" class="btn-link"><i class="fa fm fa-home"></i>Home</a>
				</li>
				<li class="active">
					<span>Download</span>
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
							<h2 class="h2">Download Area</h2>
						</div>
						<div class="post--items post--items-5 pd--30-0">
							
							<ul class="nav row AdjustRow">
							<table class='table-download' style='font-weight:bold; border:1px solid #e3e3e3;' width='100%'>
									<tr style='background:#8a8a8a'>
										<th>No</th>
										<th>Nama File</th>
										<th>Hits</th>
										<th style='width:70px'></th>
									</tr>
									<?php
										$no=$this->uri->segment(3)+1;
										foreach ($download->result_array() as $r) {	
										if(($no % 2)==0){ $warna="#ffffff";}else{ $warna="#E1E1E1"; }
											echo "<tr bgcolor=$warna>
													<td>$no</td>
												  	<td>$r[judul]</td>
												  	<td>$r[hits] Kali</td>
												  	<td><a class='button' style='background:#29b332; color:#ffffff; padding:2px 10px' href='".base_url()."download/file/$r[nama_file]'>Download</a></td>
												  </tr>";
										$no++;
										}
									?>
								</table>
								
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