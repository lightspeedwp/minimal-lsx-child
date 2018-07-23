<?php
if ( ! class_exists( 'MINIMAL_LSX_Widget_Posts' ) ) {

	/**
	 * LSX MINIMAL Widget Posts Class
	 *
	 * @package minimal-lsx
	 */
	class MINIMAL_LSX_Widget_Posts extends WP_Widget {

		public function __construct() {
			$widget_ops = array(
				'classname' => 'lsx-minimal-widget-posts',
			);

			parent::__construct( 'MINIMAL_LSX_Widget_Posts', esc_html__( 'MINIMAL Posts', 'minimal-lsx' ), $widget_ops );
		}

		public function widget( $args, $instance ) {
			echo wp_kses_post( $args['before_widget'] );
			echo wp_kses_post( $args['before_title'] . $instance['title'] . $args['after_title'] );

			$this->output( $args, $instance );

			echo wp_kses_post( $args['after_widget'] );
		}

		public function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance['title'] = wp_kses_post( force_balance_tags( $new_instance['title'] ) );

			return $instance;
		}

		public function form( $instance ) {
			$defaults = array(
				'title' => 'Latest posts',
			);

			$instance = wp_parse_args( (array) $instance, $defaults );
			$title = esc_attr( $instance['title'] );
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'minimal-lsx' ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<?php
		}

		public function output( $args, $instance ) {
			$args = array(
				'post_type' => 'post',
				'posts_per_page' => 3,
				'orderby' => 'date',
				'order' => 'DESC',

				'tax_query' => array(
					array(
						'taxonomy' => 'post_format',
						'field' => 'slug',
						'terms' => array(
							'post-format-aside',
							'post-format-audio',
							'post-format-chat',
							'post-format-gallery',
							'post-format-image',
							'post-format-link',
							'post-format-quote',
							'post-format-status',
							'post-format-video',
						),
						'operator' => 'NOT IN',
					),
				),
			);

			$posts = new \WP_Query( $args );

			if ( $posts->have_posts() ) {
				global $post;

				echo '<div class="minimal-posts-wrapper">';
				echo '<div class="row">';

				while ( $posts->have_posts() ) {
					$posts->the_post();

					$image_src = '';

					if ( has_post_thumbnail() ) {
						$image_id  = get_post_thumbnail_id( $post->ID );
						$image_arr = wp_get_attachment_image_src( $image_id, 'large' );

						if ( ! empty( $image_arr ) ) {
							$image_src = $image_arr[0];
						}
					}

					echo '<div class="col-xs-12 col-md-4">';
					echo '<div class="minimal-post-slot" style="background-image:url(' . esc_attr( $image_src ) . ')">';

					the_title( '<h4 class="minimal-post-title">', '</h4>' );

					printf(
						'<time class="minimal-post-date entry-date published updated" datetime="%1$s">%2$s</time>',
						esc_attr( get_the_date( 'c' ) ),
						get_the_date()
					);

					echo '<div class="minimal-post-content">' . wp_kses_post( get_the_excerpt() ) . '</div>';

					printf(
						'<a href="%1$s" class="minimal-post-read-more">%2$s</a>',
						esc_url( get_permalink() ),
						esc_html__( 'Read all' )
					);

					echo '</div>';
					echo '</div>';
				}

				echo '</div>';
				echo '</div>';
			}
		}

	}

	add_action( 'widgets_init', create_function( '', 'return register_widget( "MINIMAL_LSX_Widget_Posts" );' ) );

}
