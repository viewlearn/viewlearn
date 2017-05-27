<?php

/**
 * @author lolkittens
 * @copyright 2017
 */


function error($error){
echo('<div class="error">');
echo ucfirst($error);    
echo('</div>');

}


function db_error($post){
echo mysql_error($post);
}






























?>