<?php

/**
 * @author crude
 * @copyright 2013
 */
/**
 * database connection
 */
 
$con = mysql_connect("localhost","root","");
if(!$con){
mysql_ping($con);
echo("Databse error connection");    
mysql_close($con);
invalid_page("Server connection error");
}    
elseif($con){
$database = mysql_select_db("viewlearn",$con);
if(!$database){
return header("Refresh: 0;");    
}  
}    




/**
 * close database connection.
 */
function db_close(){
$db= mysql_connect('localhost','root','');    
return mysql_close($db);
}





/**
 * database query function.
 */
function data($query){
if($query!=''){
$data=mysql_query($query);
if($data){
return $data;    
}else{
die(mysql_error());    
}    
}else{
error("fill in the data for the query");    
}    
}










/**
*get data from the database 
*/  

  
function get_records($table,$fields,$condition,$order,$limit){
$fields=vars($fields);
$table=vars($table);
$condition=$condition;
$order=vars($order); 
$limit=vars($limit);    
     
if($table!=''){
$table=$table;    
}else{
error('table was not selected');    
}


if($fields!=''){
$fields=$fields;    
}else{
$fields=' * ';    
}


if($condition!=""){
$condition=$condition;    
}

if($order!=""){
$order=$order;    
}else{
$order='ASC';    
}
if($limit!=""){
$limit=$limit;    
}

if($table!=''){
$query='SELECT '.$fields.' FROM '.$table;
if($condition!=''){   
$query=$query.' WHERE '.$condition;    
}elseif($order!=''){
$query.' ORDER BY date '.$order;   
}elseif($limit!=''){
$query.' LIMIT '.$limit;    
}
return mysql_query($query);
}   
}    
    



/**
 * return number of rows.
 */
function number_rows($num){
if($num!=''){
return mysql_num_rows($num);    
}else{
error('functional argument is missing for  number of rows');    
}
}    







    



/**
 * fetch array data loop .
 */
function all_records($get){
while($row=mysql_fetch_array($get)){
return $row;    
}
}


/**
 * fetch single data array.
 */
function record($get){
if($get!=''){
if($row=mysql_fetch_array($get)){
return $row;    
}    
}else{
error('returned empty records');    
}
}    



/**
 * free resource at the end of the query.
 */
function end_get_records($get){
if($get!=''){
return mysql_free_result($get);    

}else{
error('functional argument is missing for end get records');    
}
}




/**
 * Get a specific data from a specific field from the database.
 */
function single_record($get,$num){
if($get!='' and $num!=''){
return mysql_result($get,$num);    
}else{
error('Some functional arguments are missing for 1 record');    
}    
}



/**
 * update class.
 */

class update_article{
/**
 * update subject.
 */
function update_subject($id,$subject){
$subject=vars($subject);
$id=vars($id);
if($subject!='' and $id!=''){
$update=mysql_query("UPDATE article SET subject='$subject' WHERE ID='$id'");
if(!$update){
error('subject was not update');    
}    
}else{
error('fill in the sunject');    
}    
}



/**
 * update content.
 */
function update_content($id,$content){
$content=vars($content);
$id=vars($id);
if($content!='' and $id!=''){
$update=mysql_query("UPDATE article SET content='$content' WHERE ID='$id'");
if(!$update){
error('subject was not update');    
}    
}else{
error('fill in the sunject');    
}    
}


/**
 * update image.
 */
function update_image($id,$old_image,$new_image){
$old_image=vars($old_image);
$new_image=vars($new_image);
$id=vars($id);
if($old_image!='' and $id!='' and $new_image!=''){
if($old_image!='no image'){
remove_file($old_image);
$image=image_upload($new_image);   
}    
     
$update=mysql_query("UPDATE article SET image='$image' WHERE ID='$id'");
if(!$update){
error('subject was not update');    
}    
}else{
error('fill in the sunject');    
}    
}

}








/**
 * database class
 */
class db{

/**
     * post data to the database.
     */    
function post($query,$url=""){
if($query!=''){
$post=mysql_query($query);   
if($post){ 
if($url!=""){
return header("Location:".$url);
}else{
return(header('Location:'.$_SERVER['REQUEST_URI']));
}   
}else{
return db_error($post);    
} 
}else{
error('fill in the function parameter for post');    
} 
exit;  
}




function multiple_post($query){
return mysql_query($query);    
}


    
    

/**
  * query results from the database.
 */
function get($query){
if($query!=''){
$get=mysql_query($query);   
if($get){
return $get;    
}else{
return db_error($get);   
} 
}else{
error('fill in the function parameter for post');    
}
exit;    
}






























}


























































































































































































































































































































































































































































































































































































































?>