<?php

$sections = apply_filters( 'orbis_company_sections', array() );

if ( ! empty( $sections ) ) : ?>

	<div class="card mb-3 with-cols clearfix">
		<div class="card-header">
			<ul class="nav nav-tabs card-header-tabs" id="company-tabs" role="tablist">
				<?php $active = true; ?>

				<?php foreach ( $sections as $section ) : ?>

					<li class="nav-item" role="presentation">
						<?php

						$id    = $section['id'];
						$label = $section['name'];

						$classes = [
							'nav-link',
						];

						if ( $active ) {
							$classes[] = 'active';
						}

						$button_id = $id . '-tab';

						printf(
							'<button class="%s" id="%s" data-bs-toggle="tab" data-bs-target="%s" type="button" role="tab" aria-controls="%s" aria-selected="true">%s</button>',
							\esc_attr( implode( ' ', $classes ) ),
							\esc_attr( $button_id ),
							\esc_attr( '#' . $id ),
							\esc_attr( $id ),
							\esc_html( $label )
						);

						?>
					</li>

					<?php $active = false; ?>

				<?php endforeach; ?>
			</ul>
		</div>

		<div class="tab-content">
			<?php $active = true; ?>

			<?php foreach ( $sections as $section ) : ?>

				<?php

				$id = $section['id'];

				$button_id = $id . '-tab';

				$classes = [
					'tab-pane',
					'fade',
				];

				if ( $active ) {
					$classes[] = 'show';
					$classes[] = 'active';
				}

				$class = implode( ' ', $classes );

				?>

				<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $class ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $button_id ); ?>">
					<?php

					if ( isset( $section['action'] ) ) {
						do_action( $section['action'] );
					}

					if ( isset( $section['callback'] ) ) {
						call_user_func( $section['callback'] );
					}

					if ( isset( $section['template_part'] ) ) {
						get_template_part( $section['template_part'] );
					}

					?>
				</div>

				<?php $active = false; ?>

			<?php endforeach; ?>
		</div>
	</div>

<?php endif; ?>
