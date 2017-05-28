<?php

/**
 * @author lolkittens
 * @copyright 2017
 */

/**
 * function for error notification.
 */
function error($error)
{
    echo ('<div class="error">');
    echo ucfirst($error);
    echo ('</div>');

}

/**
 * function for the dabase error from user posts.
 */
function db_error($post)
{
    echo mysql_error($post);
}


function check_answer_field()
{
    $config = new config;
    $recent = $config->recent_question();
    $id = $recent['questionID'];
    $db = new db;
    $get = $db->get("SELECT * FROM excercise WHERE questionID='$id' LIMIT 1");
    $num = number_rows($get);
    if ($num == 1) {
        $row = record($get);
        end_get_records($get);
        return $row;
    }
}

























?>