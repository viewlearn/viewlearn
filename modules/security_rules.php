
<?php
/**
 * This is a secure variable for db processing.
 */
	
function vars($var){
$var=mysql_real_escape_string(trim($var));
$vars=str_replace(');',' ',$vars);
$vars=str_replace('"','&quot; ',$vars);
return strip_tags($var);    
}    
    


/**
 * function for validates email address.
 */
function email_validation($email){
if($email!=''){    
if(filter_var($email,FILTER_VALIDATE_EMAIL)){
$email=vars($email);    
}else{
$email='';
}
return $email;
}
}



    
 
 
 
/**
*Secure form from spcial character submission. 
*/    
function post_form(){
$secure='method="'. htmlspecialchars($_SERVER["PHP_SELF"]).'"';
return $secure;  
}    
    
    
    
    









/**
 * Checks for valid include files.
 */
function include_file($file){
$file=$file.'php';
if($file!=''){
$check=file_exists($file);
if($check){
include_once($file);    
}else{
error('file was not included');    
}    
}else{
error('File missing');    
}    
}

    
    
       
    
 
 
/**
 * include check.
*/ 

function file_include($file){
if($file!=""){
$file=$file.'.php';
$check=file_exists($file);
if($check){
include_once($file);    
}else{
error($file.' File was not included');    
}
}else{
error('file missing');    
}
   
}    
    
    








/**
* Integer check returns integer.
*/    
function int($val){
if(is_int($val)){
return $val;    
}else{
return false;    
}   
}    
    
    
    
    
/**
*Checks for required form fields. 
*/    
function required($field){
if($_SERVER['REQUEST_METHOD']=='POST' and $_POST[$field]==''){
$message='<span style="color:red;font-size:12px;">* Required</pan>';    
return $message;
}    
}    
    
    

/**
 * Captcha functionality.
 */

function captcha(){ 
return (rand(20, 99000));
   
}    
    
    
    


/**
 * form post check.
 */

function submit(){
if($_SERVER['REQUEST_METHOD']=='POST'){
return true;    
}else{
return false;    
}    
}





function message($tx){
echo'<div style="padding:10px;">'.ucfirst($tx).'</div>';    
}



/**
 * variable check.
 */

function var_int($val){
if(vars($val)){
$int=is_integer($val);
if($int==true){
$x='true';    
}else{
$x='false';    
}
return $x;    
}else{
error('fill in the variable');    
}    
}





/**
 * secure url data
 */

function url_data($var){
if($var!=''){
return str_replace(' ','_',$var);        
}else{
return error('fill in the url variable');    
}    
}




/**
 * Secure and hide the url variable.
 */
function secure_url($url){
if($url!=''){
return md5(vars($url));        
}else{
error('fill in secure url parameter');    
}           
}



function string_url($var){
if($var!=''){
return str_replace(' ','_',$var);        
}else{
return error('fill in the url variable');    
}    
}


function url_string($var){
if($var!=''){
return str_replace('_',' ',$var);        
}else{
return error('fill in the url variable');    
}    
}

    
    
    
    
    
    
    
    
    
    
    
    
?>



