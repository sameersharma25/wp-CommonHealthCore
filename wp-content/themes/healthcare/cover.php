<div class="container-fluid space cover" style="background:linear-gradient(rgba(0, 0, 0, 0.70),rgba(0, 0, 0, 0.70) ),url(<?php header_image(); ?>) no-repeat fixed;">
	<div class="container">
		<h1 class="white"><?php echo wp_kses_post(get_bloginfo('name')); ?></h1>
		<h4 class="white"><?php if (function_exists('health_care_breadcrumbs')) health_care_breadcrumbs(); ?></h4>
	</div>
</div>