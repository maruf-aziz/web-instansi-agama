<div class="main-content--section pbottom--30">
		<div class="container">
			<div class="row">
				<div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
					<div class="sticky-content-inner">
						<div class="page--title ptop--30">
							<h2 class="h2">Playlist</h2>
						</div>
						
						<div class="post--items post--items-2 pd--30-0">
							<ul class="nav row AdjustRow">
							
							<?php 
								$no=$this->uri->segment(3)+1;
								foreach ($playlist->result_array() as $h) {	
								$total_video = $this->model_utama->view_where('video',array('id_playlist' => $h['id_playlist']))->num_rows();
									echo "<li style='width:217px; padding:10px; '>
											<div style='overflow:hidden; height:135px;' class='article-photo'>
												<a href='".base_url()."playlist/detail/$h[playlist_seo]' class='hover-effect'>";
													if ($h['gbr_playlist'] ==''){
														echo "<a class='hover-effect' href='".base_url()."playlist/detail/$h[playlist_seo]'><img style='width:215px' src='".base_url()."asset/img_playlist/no-image.jpg' alt='no-image.jpg' /></a>";
													}else{
														echo "<a class='hover-effect' href='".base_url()."playlist/detail/$h[playlist_seo]'><img style='width:215px' src='".base_url()."asset/img_playlist/$h[gbr_playlist]' alt='$h[gbr_playlist]' /></a>";
													}
											echo "</a>
											</div>
											<div class='article-content'>
												<span style='font-size:14px; color:#8a8a8a;'><center>Ada $total_video Video</center></span>
												<h4 align=center><a href='".base_url()."playlist/detail/$h[playlist_seo]'>$h[jdl_playlist]</a></h4>
											</div>
										  </li>";
								}
							?>
							</ul>
							<ul class="pagination float--right">
								<li>
								<?php echo $this->pagination->create_links(); ?>
								</li>
							</ul>
						</div>
					</div>
				</div>
			<?php include "sidebar_kanan.php";  ?>
			</div>
		</div>
	</div>