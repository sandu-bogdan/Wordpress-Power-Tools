# WooCommerce Product Meta Data Updater from CSV

## Overview

This PHP script facilitates the update of meta data in WooCommerce products from a CSV file. The script reads a CSV file and updates the meta data of each product based on the SKU.

## Usage

1. Set the `$meta_key` variable to the meta key you want to update.
2. Set the `$csv_file` variable to the path of your CSV file. The CSV file should have SKUs in the first column and the corresponding meta data in the second column.
3. Run the script in ssh console. 
``` cd /var/www/yoursite.com/public_html/ && /usr/local/bin/wp eval-file /var/www/scripts/update_meta.php ```

## Code Explanation

The script follows these steps:

1. Retrieves all product IDs.
2. For each product, it gets the SKU and looks up the corresponding value in the CSV file.
3. If a value is found, it updates the product's meta data with this value.

## Requirements

- This script requires WooCommerce and WP-CLI to be installed and configured on your WordPress site.
- The CSV file should be formatted with SKUs in the first column and the corresponding meta data in the second column.
