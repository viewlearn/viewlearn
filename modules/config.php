<?php
error_reporting(E_ALL ^ E_NOTICE);
include_once('database-file.php');
include_once('security_rules.php');
include_once('page.php');
include_once('functions.php');



date_default_timezone_set('Africa/Kampala');
class config{


/**
 * function that switches the menu content.
 */
static function page(){
$menu=$_GET['ref_content'];
if($menu!=""){
if($_SESSION['ID']==""){
if($menu=="login"){
$content=true;
if($content==true){
$page=new page;
$page->login_interface();
}    
}elseif($menu=="register"){
$content=true;
$page=new page;
$page->signup_interface();    
}else{
$content=false;
echo page::page_error($content);
$page=new page;
$page->home_interface(); 
}
}elseif($_SESSION['ID']!=""){
$page=new page;
if($menu==1){
$page->count_dashboard();    
}elseif($menu==2){
    
}elseif($menu==3){
    
}elseif($menu==4){
    
}elseif($menu==5){
    
}elseif($menu==6){
    
}elseif($menu==7){
    
}elseif($menu==8){
    
}elseif($menu==md5('logout_learnview')){
if(session_destroy()){
header('Location:index.php');
}
}    
}
}else{
$page=new page;
$page->home_interface();
}
}    
/**
     * function checks if the user is registered or not
     */    
function reg_check($session){
if($session!=""){
$db=new db;
$get=$db->get("SELECT ID FROM signup WHERE contact='$session' LIMIT 1");
$num=number_rows($get);
if($num==0){
$status='new';
}elseif($num==1){
$status='exist';
}
return $status;
}
}    
    
    
/**
     * Function returns user details
     */    
function return_user(){
$session=$_SESSION['ID'];
if($session!=""){
$db=new db;
$get=$db->get("SELECT * FROM signup WHERE contact='$session' LIMIT 1");
$num=number_rows($get);
if($num==1){
$row=record($get);
return $row;
}else{
error('user cannot be found');
}
}    
}    
    
    
/**
     * Establishing the learning session 
     */    
function session_establish(){
$id=$_SESSION['ID'];
if($id!=""){
$sessionID=$_GET['ref_content'];
$db=new db;
return $post=$db->post("INSERT INTO session(userID,name,status)VALUES('$id','$sessionID','started')");    

}    
}    
    
    
/**
     * function that terminates the learning session 
     */    
function session_terminate(){
$id=$_SESSION['ID'];
if($id!=""){
$sessionID=$_GET['ref_content'];
$db=new db;
return $post=$db->post("UPDATE session SET status='completed' WHERE userID='$id' AND name='$sessionID'");    
}
}    
        
    
/**
     * function retrieves questions on session start 
     */    
function get_questions(){
$sessionID=$_GET['ref_content'];
$db=new db;
$get=$db->get("SELECT * FROM question WHERE subjectID='$sessionID'");
$num=number_rows($get);
if($num>0){
while($row=record($get)){
echo('<a href="?ref_content='.$_GET['ref_content'].'&qn_ans='.$row['question'].'"><img src="'.$row['image'].'" style="width:170px;border:solid thin silver;height:180px;margin:3px;"></a>');   
}     
end_get_records($get);    

$config=new config;
$qn=$config->audio_answers($_GET['qn_ans']);




}else{
error('No content');
}    
}     


/**
 * question buttion
 */
function qn_button(){
$config=new config;
echo $ask=$config->ask_question();
if($ask==0){

$config->def_qn();
    
}elseif($ask>0){
    

}
//echo('<form method="POST"><input type="submit" class="btn btn-success" name="ask" value="LISTEN TO QUESTION"/></form>');         
}








function def_qn(){
$db=new  db;
$get=$db->get("SELECT qn_file FROM question ORDER BY ID ASC LIMIT 1");
$num=number_rows($get);
if($num==1){
$row=record($get);
echo('<form method="POST"><input type="submit" class="btn btn-success" name="ask" value="LISTEN TO QUESTION"/>
<input type="hidden" name="'.$row['qn_file'].'"/></form>'); 
}   
}






    
/**
* ASK QUESTION 
*/    
function ask_question(){
$sessionID=$_GET['ref_content'];
$user=$_SESSION['ID'];
$db=new db;
$get=$db->get("SELECT ID FROM excercise WHERE sessionID='$sessionID' AND user='$user' LIMIT 1");    
return $num=number_rows($get);

}    
    
    
/**
     audio function* 
     */    
function audio_answers($option){
if($option!=""){
$db=new db;
$get=$db->get("SELECT ans_file,question FROM question WHERE question='$option' LIMIT 1");
$num=number_rows($get);
if($num==1){
$row=record($get);
end_get_records($get);
echo('<audio autoplay style="display:none;">
  <source src="'.$row['ans_file'].'" type="audio/ogg">
  <source src="'.$row['ans_file'].'" type="audio/mpeg">
  Your browser does not support the audio tag.
</audio>');
return $row['question'];
}    
}
}  
    
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
    
    
    
    
    
} 
    











?>