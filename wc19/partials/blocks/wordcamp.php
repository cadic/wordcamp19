<section class="wordcamp">
	<h3><?php the_field('title') ?></h3>
	<div class="columns">
		<div class="col">
			<?php echo wp_get_attachment_image( get_field('photo'), 'large' ) ?>
		</div>
		<div class="col">
			<?php the_field('description') ?>
		</div>
	</div>
	<?php if ( have_rows('icons') ): ?>
		<ul class="icons">
			<?php while ( have_rows('icons') ): the_row(); ?>
				<li>
					<span class="dashicons dashicons-<?php the_sub_field('icon') ?>"></span>
					<div><?php the_sub_field('content') ?></div>
				</li>
			<?php endwhile; ?>
		</ul>
	<?php endif ?>
</section>