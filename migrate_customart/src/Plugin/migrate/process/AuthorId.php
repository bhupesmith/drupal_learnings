<?php

namespace Drupal\migrate_customart\Plugin\migrate\process;

use Drupal\migrate\ProcessPluginBase;
use Drupal\migrate\MigrateExecutableInterface;
use Drupal\migrate\Row;

/**
 * Returns the User ID for the input User name.
 * 
 * Example:
 * 
 * @code
 * process:
 *   uid:
 *    -
 *      plugin: author_id
 *      source: Author
 * @endcode
 * 
 * This will provide the user id in Return.
 * 
 * @see Drupal\migrate\Plugin\MigrateProcessInterface
 * 
 * @MigrateProcessPlugin(
 *   id = "author_id"
 * )
 */

 class AuthorId extends ProcessPluginBase{
	/**
	 * {@inheritdoc}
	 */
    public function transform($value, MigrateExecutableInterface $migrate_executable, Row $row, $destination_property){
        if(is_string( $value )){
            if( $account = user_load_by_name($value) ){
               return $account->id();
            }
        }
        return 1;
    }
 }