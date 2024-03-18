<?php

global $post;

$badges = [];

$current_date    = ( new \DateTimeImmutable( 'midnight' ) );
$expiration_date = ( new \DateTimeImmutable( $post->subscription_expiration_date ) )->setTime( 0, 0 );

$is_active    = empty( $post->subscription_cancel_date ) || $expiration_date > $current_date;
$is_cancelled = isset( $post->subscription_cancel_date );
$is_expired   = $current_date > $expiration_date;

if ( $is_active ) {
	$badges[] = [
		'variation' => 'success',
		'content'   => 'Actief',
	];
}

if ( $is_cancelled ) {
	$badges[] = [
		'variation' => 'warning',
		'content'   => 'Opgezegd',
	];
}

if ( $is_expired ) {
	$badges[] = [
		'variation' => $is_cancelled ? 'danger' : 'info',
		'content'   => 'Verlopen',
	];
}

foreach ( $badges as $badge ) {
	$classes = [
		'badge',
		'text-bg-' . $badge['variation'],
	];

	printf(
		'<span class="%s">%s</span> ',
		esc_attr( implode( ' ', $classes ) ),
		esc_html( $badge['content'] )
	);
}
