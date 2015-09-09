<?php
/**
 * Template Name: My Category Archive
 */
get_header(); ?>


<?php genesis_before_content_sidebar_wrap(); ?>
<div id="content-sidebar-wrap">
	
	<?php genesis_before_content(); ?>
	<div id="content">
	
		<?php genesis_before_loop(); ?>
		<div class="post entry">

<!--page_archive.php -->
			<h1 class="entry-title"><?php _e("Article Archive", 'genesis'); ?></h1>

			<div class="entry-content">
			 
				<?php $categories = get_categories( $args );?> 
				<ul class="catArchive">
				<?php foreach ($categories as $category) {
					$catCounter++;

					$catLink=get_category_link($category->term_id);
					$catStyle = '';
					if (is_int($catCounter / 2)) $catStyle = ' class="catAlt"';

					echo '<br /><li'.$catStyle.'><h2 style="border-bottom: 0px;"><a href="'.$catLink.'" title="'.$category->name.'">'.$category->name.'</a></h2>';
						echo '<ul>';

						query_posts('cat='.$category->term_id.'&showposts=5');?>

						<?php while (have_posts()) : the_post(); ?>
							<li><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
						<?php endwhile; ?>
							<li><em><a href="<?php echo $catLink; ?>" title="<?php echo $category->name; ?>">More <strong><?php echo $category->name; ?> &raquo;</strong></a></em></li>
						</ul>
					</li>
				<?php } ?>
				</ul>
 			
			</div><!-- end .entry-content -->

		</div><!-- end .post -->
		<?php genesis_after_loop(); ?>
	
	</div><!-- end #content -->
	<?php genesis_after_content(); ?>

</div><!-- end #content-sidebar-wrap -->
<?php genesis_after_content_sidebar_wrap(); ?>

<?php get_footer(); ?>
