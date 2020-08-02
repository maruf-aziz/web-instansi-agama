<div class="container">
	<div class="row">
		<div class="main--content col-md-8" data-sticky-content="true">
			<div class="sticky-content-inner">
				<div class="post--item post--single post--title-largest pd--30-0">
							<div class="column9">
								<?php
								echo "<center style='margin-top:5%; margin-bottom:5%;'><h4>Berikut Adalah hasil Perhitungan sementara Poling yang masuk. <br>
											Silahkan untuk selalu mengunjungi halaman ini untuk melihat hasil terbarunya.<br>
											Terima kasih,..</center></h4>";
											
								 echo "<table height=50% style='height:200px; border: 0pt dashed #CCC;padding: 10px;'>";
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
								?>
							</div>
						<div class="ad--space pd--20-0-40">
					<?php
					$ia = $this->model_utama->view_ordering_limit('iklantengah','id_iklantengah','ASC',0,1)->row_array();
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
				</div>
				<div class="post--social pbottom--30">
							<span class="title"><i class="fa fa-share-alt"></i></span>
							<div class="social--widget style--4">
								<ul class="nav">
								<script language="javascript">
								document.write("<a href='http://www.facebook.com/share.php?u=" . $_SERVER['REQUEST_URI'] . " ' target='_blank' class='fa fa-facebook'>&#62220;</a> <a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank' class='custom-soc icon-text'>&#62217;</a> <a href='https://plus.google.com/share?url=" + document.URL + "' target='_blank' class='custom-soc icon-text'>&#62223;</a>");
								</script>
								<a href="#" class="custom-soc icon-text">&#62232;</a>
								<a href="#" class="custom-soc icon-text">&#62226;</a>
									<li>
										<a href="http://www.facebook.com/share.php?u=<?php echo $_SERVER['REQUEST_URI']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
									</li>
									<li>
										<a href="http://twitter.com/home/?status=<?php echo $_SERVER['REQUEST_URI']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
									</li>
									<li>
										<a href="https://plus.google.com/share?url=<?php echo $_SERVER['REQUEST_URI']; ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
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
						</div>
				</div>
				<?php include "sidebar_kanan.php";  ?>
			</div>
		</div>