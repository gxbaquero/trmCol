<?php 
function trm_col_gxb_register_Widget() {
	register_widget( 'trm_col_gxb_Widget' );
}

add_action( 'widgets_init', 'trm_col_gxb_register_Widget' );

class trm_col_gxb_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
		// widget ID
		'trm_col_gxb_Widget',
		// widget name
		__('TRM', ' trm_col_gxb'),
		// widget description
		array( 'description' => __( 'Este widget trae los datos de la tasa representativa del mercado que rige para hoy', 'trm_col_gxb' ), )
		);
	}

	public function widget( $args, $instance ) {
		$title = 'TMR';//apply_filters( 'TRM', $instance['title'] );
		echo $args['before_widget'];
		//if title is present
		if ( ! empty( $title ) )
		echo $args['before_title'] . $title . $args['after_title'];
		//output
		include 'getValue.php';
		$trm=trm_col_gxb_getAll();
		echo __( $trm, 'trm_col_gxb' );
		echo $args['after_widget'];
	}

	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) )
		$title = $instance[ 'title' ];
		else
		$title = __( 'TRM', 'trm_col_gxb' );
	}
}
?>