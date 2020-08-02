	<div class="main--breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li>
					<a href="home-1.html" class="btn-link"><i class="fa fm fa-home"></i>Home</a>
				</li>
				<li class="active">
					<span>About</span>
				</li>
			</ul>
		</div>
	</div>
	<div class="main-content--section pbottom--30">
		<div class="container">
			<div class="main--content">
				<div class="post--item post--single pd--30-0">
					<div class="row">
					<div style="padding:15px;"
					<div class="sticky-content-inner">
						<div class="page--title ptop--30">
							<h2 class="h2"><?php echo "$rows[nama_kategori]"; ?></h2>
						</div>
									
									<div class="map-border">
										<div class="google-maps">
											<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo "$iden[maps]"; ?>"></iframe>
										</div>
									</div>

									<div class="paragraph-row">
										<div class="column6">
											<?php echo "$rows[alamat]";?>
										</div>
									</div>
									
								</div>
							</div>

						</div>