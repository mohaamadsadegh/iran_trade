<?php
/**
 * yes test
 * for test
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;


Redux::set_section(
    $opt_name,array(
        'title' =>          esc_html__( 'لوگو سایت', 'your-textdomain-here' ),
        'id'    =>          'yes-do-test',
        'subsection' => true,
		'fields'     => array(
			array(
				'id'          => 'aaaa',
				'type'        => 'kjnEGE',
				'title'       => esc_html__( 'اضافه کردن لوگو', 'your-textdomain-here' ),
				'desc'        => esc_html__( 'اضافه کردن لوگو.', 'your-textdomain-here' ),
				'default'     => 'ehvhgv',
				'min'         => '',
				'step'        => '',
				'max'         => '',
				'suffix'      => '',
				'output_unit' => '',
				'output'      => array( 'sdkeuicfbuiecfikancf;' => 'max-width' ),
			),
		),

    )
    );