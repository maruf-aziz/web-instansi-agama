<div class="main-content--section pbottom--30">
		<div class="container">
			<div class="row">
				<div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
					<div class="sticky-content-inner">
						<div class="page--title ptop--30">
							<h2 class="h2"><?php echo "$rows[jdl_album]"; ?></h2>
						</div>
						
						<div class="post--items post--items-2 pd--30-0">
							<ul class="nav row AdjustRow" style="padding-left:20px;">
							<p>
							<?php echo "$rows[keterangan]"; ?>
							</p>
							<?php
							  $no=$this->uri->segment(4)+1;
							  foreach ($detailalbum->result_array() as $h) {	
							  ?>
							  <li style="width:100%">
									<div class="post--item post--layout-2">
									<?php
									echo "<h4>$no. $h[jdl_gallery]</h4>
										<img class='jslghtbx-thmb' style='width:87%' title='$h[jdl_gallery]' src='".base_url()."asset/img_galeri/$h[gbr_gallery]' alt='$h[jdl_gallery]' data-jslghtbx='".base_url()."asset/img_galeri/$h[gbr_gallery]' data-jslghtbx-group='group3' data-jslghtbx-caption='$h[keterangan]' /><br>
										<br/><p>$h[keterangan]</p>";
									$no++;
									?>
									</div>
								</li>
									<?php
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