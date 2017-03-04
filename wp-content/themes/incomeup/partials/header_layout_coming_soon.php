<header id="coming_soon_header" class="clearfix">
	<div id="logo">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
			<?php $inverted_header_logo = get_theme_mod('inverted_header_logo', '');
			if( $inverted_header_logo!='' ):?>
				<img id="main_logo" src="<?php echo $inverted_header_logo;?>" alt="<?php bloginfo('name');?>">
			<?php else: ?>
				<h1 id="main_logo_textual"><?php bloginfo('name');?></h1>
				<?php $blog_description = get_bloginfo('description');
				if( $blog_description!='' ): ?>
					<h2 id="main_logo_tagline"><?php echo $blog_description;?></h2>
				<?php endif; ?>
			<?php endif; ?>
		</a>
	</div>
</header>