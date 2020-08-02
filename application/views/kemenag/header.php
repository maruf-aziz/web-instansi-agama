<?php
$iden = $this->model_utama->view('identitas')->row_array();

function main_menu() {
			$ci = & get_instance();
	        $query = $ci->db->query("SELECT id_menu, nama_menu, link, id_parent FROM menu where aktif='Ya' AND position='Bottom' order by urutan");
	        $menu = array('items' => array(),'parents' => array());
	        foreach ($query->result() as $menus) {
	            $menu['items'][$menus->id_menu] = $menus;
	            $menu['parents'][$menus->id_parent][] = $menus->id_menu;
	        }
	        if ($menu) {
	            $result = build_main_menu(0, $menu);
	            return $result;
	        }else{
	            return FALSE;
	        }
	    }

		function build_main_menu($parent, $menu) {
	        $html = "";
	        if (isset($menu['parents'][$parent])) {
	        	if ($parent=='0'){
		            // $html .= "<ul>";
		        }else{
		        	$html .= "<ul class='dropdown-menu' >";
		        }
	            foreach ($menu['parents'][$parent] as $itemId) {
	                if (!isset($menu['parents'][$itemId])) {
	                    if(preg_match("/^http/", $menu['items'][$itemId]->link)) {
	                        $html .= "<li><a target='_BLANK' href='".$menu['items'][$itemId]->link."'>".$menu['items'][$itemId]->nama_menu."</a></li>";
	                    }elseif($menu['items'][$itemId]->link == "" or $menu['items'][$itemId]->link == "#"){
							$html .= "<li class='dropdown'><a href='#'>".$menu['items'][$itemId]->nama_menu."</a></li>";
						}else{
	                        $html .= "<li class='dropdown'><a href='".base_url().''.$menu['items'][$itemId]->link."'>".$menu['items'][$itemId]->nama_menu."</a></li>";
	                    }
	                }
	                if (isset($menu['parents'][$itemId])) {
	                    if(preg_match("/^http/", $menu['items'][$itemId]->link)) {
	                        $html .= "<li><a target='_BLANK' href='".$menu['items'][$itemId]->link."'><span>".$menu['items'][$itemId]->nama_menu."</span></a>";
	                    }else{
							if ($parent=='0'){
								if($menu['items'][$itemId]->link == "" or $menu['items'][$itemId]->link == "#"){
									$html .= "<li class='dropdown'><a href='#'><span>".$menu['items'][$itemId]->nama_menu."</span><i class='fa flm fa-angle-down'></i></a>";
								}else{
									$html .= "<li class='dropdown'><a href='".base_url().''.$menu['items'][$itemId]->link."'><span>".$menu['items'][$itemId]->nama_menu."</span><i class='fa flm fa-angle-down'></i></a>";
								}
							}else{
								if($menu['items'][$itemId]->link == "" or $menu['items'][$itemId]->link == "#"){
									$html .= "<li class='dropdown'><a href='#'><span>".$menu['items'][$itemId]->nama_menu."</span><i class='fa flm fa-angle-right'></i></a>";
								}else{
									$html .= "<li class='dropdown'><a href='".base_url().''.$menu['items'][$itemId]->link."'><span>".$menu['items'][$itemId]->nama_menu."</span><i class='fa flm fa-angle-right'></i></a>";
								}
							}
	                        
	                    }
	                    $html .= build_main_menu($itemId, $menu);
	                    $html .= "</li>";
	                }
	            }
	            $html .= "</ul>";
	        }
	        return $html;
	    }
?>
	
	<div style="padding:0px;">
			<?php	
			  $logo = $this->model_utama->view_ordering_limit('logo','id_logo','DESC',0,1);
			  foreach ($logo->result_array() as $row) {
				echo "<a style='width:100%' href='".base_url()."' class='btn-link'><img style='width:100%' src='".base_url()."asset/logo/$row[gambar]'/>";
			  }
			?>
			<span class="hidden">Lokomedia Logo</span></a></h1>
	</div>
	
	<div class="header--navbar style--1 navbar bd--color-1 bg--color-1" data-trigger="sticky">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headerNav" aria-expanded="false" aria-controls="headerNav"><span class="sr-only">Toggle Navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
			</div>
			
			<div id="headerNav" class="navbar-collapse collapse float--left">
				
				<ul class="header--menu-links nav navbar-nav" data-trigger="hoverIntent">
				<?php
					echo main_menu();
				?>
				
				</ul>
			</div>
		</div>
	</div>
	

<?php

	// echo "
	// <div class='wrapper'>	
	
	
	// <div class='header-addons'>
		// <span class='city'>
		  // ".hari_ini(date('w')).", ".tgl_indo(date('Y-m-d')).", <span id='jam'></span></span>
		// <div class='header-search'>
			// ".form_open('berita/index')."
				// <input type='text' placeholder='Search something..'' name='kata' class='search-input' required/>
				// <input type='submit' value='Search' name='cari' class='search-button'/>
			// </form>
		// </div>
	// </div>
// </div>

// <div class='main-menu sticky'>	
	// <div class='wrapper'>";
		
	// echo "</div>
// </div>

// <div class='secondary-menu'>
	// <div class='wrapper'>
		// <ul>";
				// $tag = $this->model_utama->view_ordering_limit('tag','id_tag','RANDOM',0,14);
		  		// foreach ($tag->result_array() as $row) {
					// echo "<li><a href='".base_url()."tag/detail/$row[tag_seo]'>$row[nama_tag]</a></li>";
				// }
		// echo "</ul>
	// </div>
// </div>";
?>