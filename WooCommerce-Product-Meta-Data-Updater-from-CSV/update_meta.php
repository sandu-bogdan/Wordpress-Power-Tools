<?php
error_reporting(E_ALL);

$meta_key = 'price-prediction';
$csv_file = '/var/www/gabmag.ro/scripts/price-prediction.csv';

$products = get_posts([
    'post_type'      => [ 'product' ],
    'posts_per_page' => -1,
    'fields'         => 'ids',
]);

function get_value_csv($csv_file,$sku) {
	$f = fopen($csv_file, "r");
	$result = false;
	while ($row = fgetcsv($f)) {
		if ($row[0] == $sku) {
			return $row[1];
			break;
		}
	}
	fclose($f);
}

$progress = \WP_CLI\Utils\make_progress_bar( 'Updating prices', count( $products ) );

foreach ($products as $product_id) {
    $product = wc_get_product($product_id);
    $product_data = get_value_csv($csv_file,$product->get_sku());
    if($product_data){
        update_post_meta($product_id, $meta_key, $product_data);
    }
    $progress->tick();
}

$progress->finish();
?>
