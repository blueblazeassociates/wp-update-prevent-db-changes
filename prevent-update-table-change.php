<?php
/*
Plugin Name: Prevent Update Table Change
Plugin URI:  https://github.com/Hube2/wp-update-prevent-db-changes
Description: Prevent tables from being altered during WP update
Version:     0.0.1
Author:      John A. Huebner II
Author URI:  https://github.com/Hube2
License:     GPL v2 or later
*/

/*
 * For this plugin to work it must be located in your Must Use Plugins folder
 * usually /wp-content/mu-plugins/
 */

/*
 * For information about why this plugin is needed. See:
 * https://core.trac.wordpress.org/ticket/13310#comment:38
 */

new prevent_update_table_change();

/**
 * @author John A. Huebner II
 */
class prevent_update_table_change {
  /**
   *
   */
  public function __construct() {
    add_filter( 'dbdelta_queries', array( $this, 'dbdelta_queries' ) );
  }

  /**
   * @param array $queries
   *
   * @return array
   */
  public function dbdelta_queries( $queries ) {
    if ( is_array( $queries ) && count( $queries ) ) {
      foreach ( $queries as $key => $query ) {
        $query = preg_replace( '/option_name\s+varchar\s*\([^\)]*\)/is', 'option_name varchar(191)', $query );
        $queries[$key] = $query;
      }
    }

    return $queries;
  }
}
