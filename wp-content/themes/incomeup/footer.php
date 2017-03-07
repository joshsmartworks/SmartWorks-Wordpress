<?php

	$footer_layout = 'default';
	$footer_layout = (is_page_template('page-coming-soon.php')) ? 'coming_soon' : $footer_layout;
	$footer_layout = (is_page_template('page-onepage.php')) ? 'onepage' : $footer_layout;
	$footer_layout = (is_page_template('page-landing-page.php')) ? 'landing_page' : $footer_layout;
	get_template_part('partials/footer_layout_'.$footer_layout);

	?>

	<?php wp_footer(); ?>

	<?php echo (get_theme_mod('boxed_body', false)) ? '</div>' : '' ; ?>

</body>
</html>