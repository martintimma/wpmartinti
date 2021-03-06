<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Para_Blog
 */

get_header(); 
$sidebar = para_blog_get_sidebar_option();
$main_box_class = para_blog_get_main_class($sidebar);
$sidebar_class = para_blog_get_sidebar_class($sidebar);
?>
<div class="row">
	<div class="<?php echo esc_attr( $main_box_class ); ?>">
		<div id="primary" class="content-area">
			<main id="main" class="site-main all-blogs" role="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'para-blog' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header><!-- .page-header -->

					<?php /* Start the Loop */ ?>
					<?php while ( have_posts() ) : the_post(); ?>

						<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );
				?>

			<?php endwhile; ?>

			<div class="post-navigation-block">
				<?php the_posts_navigation(); ?>
			</div>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

	 </main>

	</div>

</div>

<?php if($sidebar != 'no-sidebar'){ ?>
<div class="<?php echo esc_attr( $sidebar_class )?>">
	<?php get_sidebar(); ?>
</div> 

<?php } ?>

</div> 
<?php get_footer(); ?>
