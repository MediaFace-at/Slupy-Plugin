<!--<header class="girls-header parallax_container">
			<style>
				.girl_image{
					background-image:url("<?php echo $imgdata; ?>");
				}
				.girls-banner:after {
					background-image: url(<?php echo get_template_directory_uri().'/pattern_header.png'; ?>);
				}
			</style>
			<div class="girls-banner" data-src="<?php echo $imgdata; ?>" data-parallax></div>-->
			<!--<div class="girls-banner thumbnail d-block d-lg-none et_parallax_bg" style="background-image:url(<?php echo $thumbnailhorizontal; ?>);"></div>
			<div class="girls-banner-container container">
            <?php the_title( '<h1 class="girls-title headline shimmerfx"><span class="available-state dot-green"></span><i class="round-flag-icon round-flag-us"></i>', '</h1>' ); ?>
				<div class="item round-flag-icon round-flag-<?php if($girlsNational[0]->slug == 'belgien'){ echo 'be';	
					} elseif($girlsNational[0]->slug == 'daenemark'){
						echo 'dk';
					} elseif($girlsNational[0]->slug == 'england'){
						echo 'en';
					} elseif($girlsNational[0]->slug == 'europa'){
						echo 'european-union';
					} elseif($girlsNational[0]->slug == 'daenemark'){
						echo 'dk';
					} elseif($girlsNational[0]->slug == 'england'){
						echo 'en';
					} elseif($girlsNational[0]->slug == 'europa'){
						echo 'european-union';
					} elseif($girlsNational[0]->slug == 'finnland'){
						echo 'fi';
					} elseif($girlsNational[0]->slug == 'frankreich'){
						echo 'fr';
					} elseif($girlsNational[0]->slug == 'griechenland'){
						echo 'gr';
					} elseif($girlsNational[0]->slug == 'irland'){
						echo 'ie';
					} elseif($girlsNational[0]->slug == 'italien'){
						echo 'it';
					} elseif($girlsNational[0]->slug == 'norwegen'){
						echo 'no';
					} elseif($girlsNational[0]->slug == 'oesterreich'){
						echo 'at';
					} elseif($girlsNational[0]->slug == 'polen'){
						echo 'pl';
					} elseif($girlsNational[0]->slug == 'rumaenien'){
						echo 'ro';
					} elseif($girlsNational[0]->slug == 'schweden'){
						echo 'se';
					} elseif($girlsNational[0]->slug =='schweiz'){
						echo 'ch';
					} elseif($girlsNational[0]->slug == 'slowakei'){
						echo 'sk';
					} elseif($girlsNational[0]->slug == 'slowenien'){
						echo 'si';
					} elseif($girlsNational[0]->slug == 'tschechien'){
						echo 'cz';
					} elseif($girlsNational[0]->slug == 'ukraine'){
						echo 'ua';
					} elseif($girlsNational[0]->slug == 'ungarn'){
						echo 'hu';
					} else {
						var_dump( 'wieso?');
					} ?>">
				</div>
				<?php // if($girlsBirthday): ?>
				<div class="item">
					<?php// echo $girlsBirthday[0]; ?>
				</div>
				<?php// endif; ?>
				<?php// if($girlsSize[0]): ?>
				<div class="item">
					<?php// echo $girlsSize[0]; ?>
				</div>
				<?php// endif; ?>
			</div>
			<?php 
			the_post_navigation(
				array(
					'prev_text' => '<svg class="arrow-left_girls"
					viewBox="0 0 490.787 490.787">
			   <path d="M362.671,490.787c-2.831,0.005-5.548-1.115-7.552-3.115L120.452,253.006
				   c-4.164-4.165-4.164-10.917,0-15.083L355.119,3.256c4.093-4.237,10.845-4.354,15.083-0.262c4.237,4.093,4.354,10.845,0.262,15.083
				   c-0.086,0.089-0.173,0.176-0.262,0.262L143.087,245.454l227.136,227.115c4.171,4.16,4.179,10.914,0.019,15.085
				   C368.236,489.664,365.511,490.792,362.671,490.787z"/>
			   <path d="M362.671,490.787c-2.831,0.005-5.548-1.115-7.552-3.115L120.452,253.006c-4.164-4.165-4.164-10.917,0-15.083L355.119,3.256
				   c4.093-4.237,10.845-4.354,15.083-0.262c4.237,4.093,4.354,10.845,0.262,15.083c-0.086,0.089-0.173,0.176-0.262,0.262
				   L143.087,245.454l227.136,227.115c4.171,4.16,4.179,10.914,0.019,15.085C368.236,489.664,365.511,490.792,362.671,490.787z"/>
			   </svg><span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-title">%title</span><svg class="arrow-right_girls"
					viewBox="0 0 490.8 490.8" xml:space="preserve">
			   <path d="M135.685,3.128c-4.237-4.093-10.99-3.975-15.083,0.262c-3.992,4.134-3.992,10.687,0,14.82
				   l227.115,227.136L120.581,472.461c-4.237,4.093-4.354,10.845-0.262,15.083c4.093,4.237,10.845,4.354,15.083,0.262
				   c0.089-0.086,0.176-0.173,0.262-0.262l234.667-234.667c4.164-4.165,4.164-10.917,0-15.083L135.685,3.128z"/>
			   <path d="M128.133,490.68c-5.891,0.011-10.675-4.757-10.686-10.648c-0.005-2.84,1.123-5.565,3.134-7.571l227.136-227.115
				   L120.581,18.232c-4.171-4.171-4.171-10.933,0-15.104c4.171-4.171,10.933-4.171,15.104,0l234.667,234.667
				   c4.164,4.165,4.164,10.917,0,15.083L135.685,487.544C133.685,489.551,130.967,490.68,128.133,490.68z"/>
			   </svg>',
				)
			); ?>
			<a href="#down" id="scrolldown">
				<svg viewBox="0 0 490.656 490.656">
					<g>
						<g>
							<path d="M487.536,120.445c-4.16-4.16-10.923-4.16-15.083,0L245.339,347.581L18.203,120.467c-4.16-4.16-10.923-4.16-15.083,0
								c-4.16,4.16-4.16,10.923,0,15.083l234.667,234.667c2.091,2.069,4.821,3.115,7.552,3.115s5.461-1.045,7.531-3.136l234.667-234.667
								C491.696,131.368,491.696,124.605,487.536,120.445z"/>
						</g>
					</g>
				</svg>
				<img src="<?php echo get_template_directory_uri().'/scroll_down.gif'; ?>">
			</a>
	</header>-->
	<!-- .entry-header -->
<?php 
