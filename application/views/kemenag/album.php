<div class="main-content--section pbottom--30">
		<div class="container">
			<div class="row">
				<div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
					<div class="sticky-content-inner">
						<div class="page--title ptop--30">
							<h2 class="h2">Albums</h2>
						</div>
						
						<div class="post--items post--items-2 pd--30-0">
							<ul class="nav row AdjustRow">
							<?php
							$no = $this->uri->segment(3)+1;
							foreach ($album->result_array() as $h) {	
								$total_foto = $this->model_utama->view_where('gallery',array('id_album' => $h['id_album']))->num_rows();
							?>
								<li class="col-md-6 col-sm-12 col-xs-6 col-xss-12">
									<div class="post--item post--layout-2">
										<div class="post--img">
											<?php
											if ($h['gbr_album'] ==''){
												echo "<a class='hover-effect' href='".base_url()."albums/detail/$h[album_seo]'><img src='". base_url(). "template/" . template() . "/timthumb.php?src=" . base_url(). "asset/foto_berita/no-image.jpg &amp;w=450&amp;h=219' alt=''></a>";
											}else{
												echo "<a class='hover-effect' href='".base_url()."albums/detail/$h[album_seo]'><img src='". base_url(). "template/" . template() . "/timthumb.php?src=" . base_url(). "asset/img_album/$h[gbr_album]&amp;w=450&amp;h=219' alt='$h[gbr_album]' /></a>";
											}
											?>
											<div class="post--info">
												<ul class="nav meta">
													<li>
														<a href="#">Ada <?php echo $total_foto; ?> Foto</a>
													</li>
												</ul>
												<div class="title">
													<h3 class="h4"><a href="<?php echo base_url(). "albums/detail/$h[album_seo]";?>" class="btn-link"><?php echo $h[jdl_album]; ?></a></h3>
												</div>
											</div>
											<br/>
										</div>
									</div>
								</li>
								<?php  
								}
								?>
								<li class="col-xs-12 hidden-lg hidden-md hidden-xs shown-xss">
									<hr class="divider divider--25"></li>
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
			<?php include "sidebar_kanan.php";  ?>
			</div>
		</div>
	</div>
	