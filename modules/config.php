<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once ('database-file.php');
include_once ('security_rules.php');
include_once ('page.php');
include_once ('functions.php');


date_default_timezone_set('Africa/Kampala');
class config
{


    /**
     * function that switches the menu content.
     */
    static function page()
    {
        $menu = $_GET['ref_content'];
        if ($menu != "") {
            if ($_SESSION['ID'] == "") {
                if ($menu == "login") {
                    $content = true;
                    if ($content == true) {
                        $page = new page;
                        $page->login_interface();
                    }
                } elseif ($menu == "register") {
                    $content = true;
                    $page = new page;
                    $page->signup_interface();
                } else {
                    $content = false;
                    echo page::page_error($content);
                    $page = new page;
                    $page->home_interface();
                }
            } elseif ($_SESSION['ID'] != "") {
                $page = new page;
                if ($menu == 1) {
                    $page->count_dashboard();
                } elseif ($menu == 2) {

                } elseif ($menu == 3) {

                } elseif ($menu == 4) {

                } elseif ($menu == 5) {

                } elseif ($menu == 6) {

                } elseif ($menu == 7) {

                } elseif ($menu == 8) {

                } elseif ($menu == md5('logout_learnview')) {
                    if (session_destroy()) {
                        header('Location:index.php');
                    }
                }
            }
        } else {
            $page = new page;
            $page->home_interface();
        }
    }
    /**
     * function checks if the user is registered or not
     */
    function reg_check($session)
    {
        if ($session != "") {
            $db = new db;
            $get = $db->get("SELECT ID FROM signup WHERE contact='$session' LIMIT 1");
            $num = number_rows($get);
            if ($num == 0) {
                $status = 'new';
            } elseif ($num == 1) {
                $status = 'exist';
            }
            return $status;
        }
    }


    /**
     * Function returns user details
     */
    function return_user()
    {
        $session = $_SESSION['ID'];
        if ($session != "") {
            $db = new db;
            $get = $db->get("SELECT * FROM signup WHERE contact='$session' LIMIT 1");
            $num = number_rows($get);
            if ($num == 1) {
                $row = record($get);
                return $row;
            } else {
                error('user cannot be found');
            }
        }
    }


    /**
     * Establishing the learning session 
     */
    function session_establish()
    {
        $id = $_SESSION['ID'];
        if ($id != "") {
            $sessionID = $_GET['ref_content'];
            $db = new db;
            return $post = $db->post("INSERT INTO session(userID,name,status)VALUES('$id','$sessionID','started')");

        }
    }


    /**
     * function that terminates the learning session 
     */
    function session_terminate()
    {
        $id = $_SESSION['ID'];
        if ($id != "") {
            $sessionID = $_GET['ref_content'];
            $db = new db;
            return $post = $db->post("UPDATE session SET status='completed' WHERE userID='$id' AND name='$sessionID'");
        }
    }


    /**
     * function retrieves questions on session start 
     */
    function get_questions()
    {
        $sessionID = $_GET['ref_content'];
        $db = new db;
        $get = $db->get("SELECT * FROM question WHERE subjectID='$sessionID'");
        $num = number_rows($get);
        if ($num > 0) {
            while ($row = record($get)) {
                echo ('<a href="?ref_content=' . $_GET['ref_content'] . '&qn_ans=' . $row['tag'] .
                    '"><img src="' . $row['image'] .
                    '" style="width:170px;height:180px;margin:3px;"></a>');
            }
            end_get_records($get);

        } else {
            error('No content');
        }
    }


    function speak_question($id)
    {
        if ($id != "") {
            $session = $_GET['ref_content'];
            $db = new db;
            $get = $db->get("SELECT qn_file FROM question WHERE ID='$id' AND subjectID='$session' LIMIT 1");
            $num = number_rows($get);
            $row = record($get);
            echo ('<audio autoplay style="display:none;">
<source src="' . $row['qn_file'] . '" type="audio/ogg">
<source src="' . $row['qn_file'] . '" type="audio/mpeg">
    Your browser does not support the audio tag.
</audio>');

        }
    }


    function submit_answer($id)
    {
        if ($id != "") {
            $db = new db;
            return $db->post("UPDATE excercise SET answer=''");

        }
    }


    /**
     * question buttion
     */
    function qn_button()
    {
        $db = new db;
        $session = $_GET['ref_content'];
        $user = $_SESSION['ID'];
        $get1 = $db->get("SELECT ID FROM excercise WHERE sessionID='$session' AND user='$user'");
        $num1 = number_rows($get1);
        if ($num1 == 0) {
            /**
             * first question
             */

            $get2 = $db->get("SELECT * FROM question ORDER BY ID ASC LIMIT 1");
            $num2 = number_rows($get2);
            if ($num2 == 1) {
                $record1 = record($get2);
                end_get_records($get2);
            }


            echo ('<a href="index.php?ref_content=' . $_GET['ref_content'] . '&qn_cmd=' . $record1['ID'] .
                '" class="btn btn-primary" id="listen" >LISTEN TO INSTRUCTION</a>');
            if ($_GET['qn_cmd'] != "") {
                $cmd = $_GET['qn_cmd'];
                $db = new db;
                $get_comd = $db->get("SELECT * FROM question WHERE ID='$cmd' LIMIT 1");
                $num = number_rows($get_comd);
                if ($num == 1) {
                    $row = record($get_comd);

                    echo ('<audio autoplay style="display:none;">
  <source src="' . $row['qn_file'] . '" type="audio/ogg">
  <source src="' . $row['qn_file'] . '" type="audio/mpeg">
  Your browser does not support the audio tag.
</audio>');
                    $session = $_GET['ref_content'];
                    $user = $_SESSION['ID'];
                    $qn = $row['ID'];
                    $db = new db;

                    $db->multiple_post("INSERT INTO excercise(sessionID,questionID,user)VALUES('$session','$qn','$user')");


                }
            }

        } else {

            $config = new config;
            $last = $config->recent_question();
            $mm = $last['ID'];
            if ($mm == 1) {
                $mm = 2;
            } elseif ($mm == 2) {
                $mm == 3;
            } elseif ($mm == 3) {
                $mm = 3;
            } elseif ($mm == 4) {
                $mm = 4;
            }

            echo ('<a href="index.php?ref_content=' . $_GET['ref_content'] . '&qn_cmd=' . $mm .
                '" class="btn btn-primary" id="listen">LISTEN TO INSTRUCTION</a>');
            if ($_GET['qn_cmd'] != "") {
                $cmd = $_GET['qn_cmd'];
                $db = new db;
                $get_comd = $db->get("SELECT * FROM question WHERE ID='$cmd' LIMIT 1");
                $num = number_rows($get_comd);
                if ($num == 1) {
                    $row = record($get_comd);

                    echo ('<audio autoplay style="display:none;">
  <source src="' . $row['qn_file'] . '" type="audio/ogg">
  <source src="' . $row['qn_file'] . '" type="audio/mpeg">
  Your browser does not support the audio tag.
</audio>');
                    $session = $_GET['ref_content'];
                    $user = $_SESSION['ID'];
                    $qn = $row['ID'];
                    $db = new db;

                    $db->multiple_post("INSERT INTO excercise(sessionID,questionID,user)VALUES('$session','$qn','$user')");


                }
            }


        }


        if ($_POST['ask'] == "") {
            $config = new config;
            $qn = $config->audio_answers($_GET['qn_ans']);
        }


    }


    /**
     * function to get next question.
     */
    function next_qn($recent)
    {
        $db = new db;
        $get = $db->get("SELECT * FROM question WHERE '$recent'!=ID AND '$recent'>ID ORDER BY ID ASC");
        $num = number_rows($get);
        if ($num > 0) {
            $row = record($get);

            if (isset($_POST['ask'])) {
                $config = new config;
                $recent_qn = $config->recent_question();

                $session = $_GET['ref_content'];
                $qnID = $row['ID'];
                $user = $_SESSION['ID'];
                $qn = $_POST['qn1'];
                if ($qn != "") {
                    return $post = $db->post("INSERT INTO excercise(sessionID,questionID,user)VALUE('$session','$qnID','$user')",
                        '?ref_content=' . $_GET['ref_content'] . '&asked_qn=recent');

                }
            }
            echo ('<form method="POST"><input type="submit" class="btn btn-success" name="ask" value="LISTEN TO QUESTION" id="listen"/>
<input type="hidden" name="qn1" value="' . $row['qn_file'] . '"/></form>');


            end_get_records($get);
            return $row;
        } else {
            echo 'questions are over';
        }
    }


    /**
     * function to get and submit the first question to be asked.
     */
    function def_qn()
    {
        $db = new db;
        $get = $db->get("SELECT qn_file,ID FROM question ORDER BY ID ASC LIMIT 1");
        $num = number_rows($get);
        if ($num == 1) {

            $row = record($get);
            end_get_records($get);
            if (isset($_POST['ask'])) {
                $config = new config;
                $recent_qn = $config->recent_question();

                $session = $_GET['ref_content'];
                $qnID = $row['ID'];
                $user = $_SESSION['ID'];
                $qn = $_POST['qn1'];
                if ($qn != "") {
                    return $post = $db->post("INSERT INTO excercise(sessionID,questionID,user)VALUE('$session','$qnID','$user')",
                        '?ref_content=' . $_GET['ref_content'] . '&asked_qn=recent');

                }
            }


            echo ('<form method="POST"><input type="submit" class="btn btn-success" name="ask" value="LISTEN TO QUESTION" id="listen"/>
<input type="hidden" name="qn1" value="' . $row['qn_file'] . '"/></form>');


        }
    }


    function recent_question()
    {
        $session = $_GET['ref_content'];
        $user = $_SESSION['ID'];
        if ($session != "") {
            $db = new db;
            $get = $db->get("SELECT * FROM excercise WHERE sessionID='$session' AND user='$user' ORDER BY date DESC LIMIT 1");
            $num = number_rows($get);
            $row = record($get);
            end_get_records($get);
            return $row;
        }
    }


    /**
     * ASK QUESTION 
     */
    function ask_question()
    {
        $sessionID = $_GET['ref_content'];
        $user = $_SESSION['ID'];
        $db = new db;
        $get = $db->get("SELECT ID FROM excercise WHERE sessionID='$sessionID' AND user='$user' LIMIT 1");
        return $num = number_rows($get);

    }


    /**
     * audio function* 
     */
    function audio_answers($option)
    {
        if ($option != "") {
            $db = new db;
            $get = $db->get("SELECT ans_file,question FROM question WHERE tag='$option' LIMIT 1");
            $num = number_rows($get);
            if ($num == 1) {
                $row = record($get);
                end_get_records($get);
                echo ('<audio autoplay style="display:none;">
  <source src="' . $row['ans_file'] . '" type="audio/ogg">
  <source src="' . $row['ans_file'] . '" type="audio/mpeg">
  Your browser does not support the audio tag.
</audio>');
                return $row['question'];
            }
        }
    }


    /**
     * function for attempted questions
     */

    function attempted_questions()
    {
        $user = $_SESSION['ID'];
        $session = $_GET['ref_content'];
        if ($session != "" and $user != "") {
            $db = new db;
            $get = $db->get("SELECT questionID,answer,status FROM excercise WHERE user='$user' AND sessionID='$session' ORDER BY date DESC");
            $num = number_rows($get);
            if ($num > 0) {

                $config = new config;

                echo ('<ul style="font-size:14px;margin:0;padding:0;text-align:left;">');
                for ($x = 1; $x <= $num; $x++) {
                    $row = record($get);
                    $qn_details = $config->return_question($row['questionID']);


                    echo ('<li style="color:gray;">');
                    echo '(' . ($x) . ') ';

                    echo ucfirst($qn_details['question']);
                    echo ('?');

                    if (isset($_GET['qn_ans'])) {
                        if ($qn_details['tag'] == $row['answer']) {
                            echo ('<span style="color:green;float:right;">Correct</span>');

                        } elseif ($qn_details['tag'] != $row['answer']) {
                            echo ('<span style="color:red; float:right;">Wrong <strong>(' . ucfirst($row['answer']) .
                                ')</strong></span>');
                        }
                    }


                    echo ('<hr/></li>');
                }
                echo ('</ul>');
                end_get_records($get);
            } else {
                echo ('<span style="color:gray;">No questions attempted</span>');
            }
        }
    }


    /**
     * function returns question details
     */
    function return_question($qnID)
    {
        if ($qnID != "") {
            $db = new db;
            $get = $db->get("SELECT * FROM question WHERE ID='$qnID' LIMIT 1");
            $num = number_rows($get);
            if ($num == 1) {
                $row = record($get);
                end_get_records($get);
                return $row;
            } else {
                echo ('Invalid question details.');
            }
        }
    }


}












?>