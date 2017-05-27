<?php

/**
 * @author lolkittens
 * @copyright 2017
 */

/**
 * function for error notification.
 */
function error($error){
echo('<div class="error">');
echo ucfirst($error);    
echo('</div>');

}

/**
 * function for the dabase error from user posts.
 */
function db_error($post){
echo mysql_error($post);
}






























?>