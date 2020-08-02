<?php
	$tgl_posting   = tgl_indo($rows['tgl_posting']);
	$tgl_mulai   = tgl_indo($rows['tgl_mulai']);
	$tgl_selesai = tgl_indo($rows['tgl_selesai']);
	$isi_agenda=nl2br($rows['isi_agenda']);
	$baca = $rows['dibaca']+1;
?>	
<div class="main-content--section pbottom--30">
		<div class="container">
			<div class="row">
				<div class="main--content col-md-8 col-sm-7" data-sticky-content="true">
					<div class="sticky-content-inner">
						<div class="page--title ptop--30">
							<h2 class="h2"><?php echo "$rows[tema]"; ?></h2>
						</div>
						
						<div class="post--items post--items-2 pd--30-0">
							<ul class="nav row AdjustRow">
							
							
				
							<div class="column9">
								<?php 
									echo "<img width='100%' src='".base_url()."asset/foto_agenda/$rows[gambar]'><hr>
										  <table>
										  <tr><td width=65px><b>Tema</b><br><br></td> <td width=15px> : </td> 	<td>$rows[isi_agenda]<br><br></td></tr>
										  <tr><td><b>Tanggal</b></td> 	<td> : </td> <td>$tgl_mulai s/d $tgl_selesai</td></tr>
										  <tr><td><b>Tempat</b></td> 	<td> : </td> <td>$rows[tempat]</td></tr>
										  <tr><td><b>Jam</b></td> 	<td> : </td> <td>$rows[jam]</td></tr>
										  </table><br><br>";
								?>
							</div>
						</div>
						
						
					</div>
				</div>
				<?php include "sidebar_kanan.php";  ?>
			</div>
			
		</div>
	</div>
