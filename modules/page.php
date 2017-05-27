<?php

/**
 * @author lolkittens
 * @copyright 2017
 */

class page{
/**
 * page error function.
 */
static function page_error($content){
if($content==false){
return('
<div style="padding:10px;background:white;">
<div class="w3-panel w3-pale-red w3-leftbar w3-border-red" style="background:linen;padding:20px;border:solid 1px red;">
  <p><h3>CAUTION!</h3><br>To use this system you are required to login first</p>
</div>
</div>
');
}
}    
    
    
    
/**
     * function for displaying home page interface.
     */    
function  home_interface(){
echo('<div class="body" style="min-height: 500px;">');

echo('<div class="container-fluid bg-3 text-center">    
  <h3 style="color: white;font-size: 20px;text-shadow: 2px 2px 2px black;">Giving your child a great learning experience is our priority</h3><br>
  <div class="row">
    <div class="col-sm-3">
      <h1>COUNTING</h1>
      <a href="?ref_content=1" data-toggle="tooltip" data-placement="top" title="This section teaches your child how to count numbers."><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></a>
    </div>
    <div class="col-sm-3"> 
      <h1>SPEAKING</h1>
      <a href="?ref_content=2" data-toggle="tooltip" data-placement="top" title="This section teaches your child how to speak English language."><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></a>
    </div>
    <div class="col-sm-3"> 
      <h1>LISTENING</h1>
      <a href="?ref_content=3" data-toggle="tooltip" data-placement="top" title="This section helps your child develop listening skills."><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></a>
    </div>
    <div class="col-sm-3">
      <h1>WRITING</h1>
      <a href="?ref_content=4" data-toggle="tooltip" data-placement="top" title="This section  teaches your child writting."><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></a>
    </div>
  </div>
</div><br>

<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-3">
      <h1>SINGING</h1>
      <a href="?ref_content=5" data-toggle="tooltip" data-placement="top" title="This section contains songs that might interest your child."><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></a>
    </div>
    <div class="col-sm-3"> 
      <h1>GAMES</h1>
      <a href="?ref_content=6" data-toggle="tooltip" data-placement="top" title="This section has games that your child needs to play."><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></a>
    </div>
    <div class="col-sm-3"> 
      <h1>STORIES</h1>
      <a href="?ref_content=7" data-toggle="tooltip" data-placement="top" title="This section has stories from famous writters."><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></a>
    </div>
    <div class="col-sm-3">
      <h1>VIDEOS</h1>
      <a href="?ref_content=8" data-toggle="tooltip" data-placement="top" title="This section contains videos that might interest your child."><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></a>
    </div>
  </div>
</div><br><br></div>');        
}

    
    
/**
     * function for the login interface.
     */    
function login_interface(){
echo('<div class="w3-cell-row" style="min-height:500px;">

  <div class="" style="width: 30%;padding:10px;display: inline-table;padding-left:10%;min-width:300px;text-align:center;">
    <p style="padding:10px;">
    <h1>LOGIN </h1>
    
   Registration instructions goes here 
   Registration instructions goes here 
   Registration instructions goes here 
   Registration instructions goes here 
   Registration instructions goes here 
   Registration instructions goes here 
   Registration instructions goes here 
    
    </p>
  </div>

  <div class="" style="display: inline-table;width:50%;padding:10px;padding-right:10%;padding-left:30px;min-width:300px;text-align:center;">
    <p style="padding:10px;width:40%;">
  <form  style="margin:0;padding:0;" method="post">
  <div class="form-group" style="margin:0;padding:0;">
    <label for="email">Telephone</label>
    <input type="telephone" class="form-control" id="email" name="user">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pwd">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default" name="login">Login</button>
</form>
  
</p>');

if(isset($_POST['login'])){
$user=$_POST['user'];
$pass=$_POST['pwd'];
if($user!="" && $pass!=""){
$db=new db;
$get=$db->get("SELECT ID,contact FROM signup WHERE contact='$user' LIMIT 1"); 
$num=number_rows($get);
if($num==1){
$row=record($get);
$_SESSION['ID']=$row['contact'];
if($_SESSION['ID']!=""){
return(header('Location:index.php'));    
}    
}    
}else{
error('fill in all fields');    
}
}
echo('</div>
</div>');    
}    
    
    
    







/**
 * function for the sign up interface.
 */
function signup_interface(){
echo('<div class="w3-cell-row" style="min-height:500px;">

  <div class="" style="width: 30%;padding:10px;display: inline-table;padding-left:10%;min-width:300px;text-align:center;">
    <p style="padding:10px;">
    <h1>LOGIN </h1>
    
   Registration instructions goes here 
   Registration instructions goes here 
   Registration instructions goes here 
   Registration instructions goes here 
   Registration instructions goes here 
   Registration instructions goes here 
   Registration instructions goes here 
    
    </p>
  </div>

  <div class="" style="display: inline-table;width:50%;padding:10px;padding-right:10%;padding-left:30px;min-width:300px;text-align:center;">
    <p style="padding:10px;width:40%;">
  <form  style="margin:0;padding:0;" method="post">
  <div class="form-group" style="margin:0;padding:0;">
    <label for="email">Firstname:</label>
       <input class="form-control" id="inputdefault" type="text" name="fn">
  </div>
  
  <div class="form-group" style="margin:0;padding:0;">
    <label for="email">Lastname:</label>
       <input class="form-control" id="inputdefault" type="text" name="ln">
  </div>
  
  
  <div class="form-group" style="margin:0;padding:0;">
    <label for="email">Telephone:</label>
       <input class="form-control" id="inputdefault" type="text" name="tel">
  </div>
  
  
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="pwd">
  </div>
  
  <button type="submit" class="btn btn-default" name="reg">Register</button>
</form>
  
</p>');

if(isset($_POST['reg'])){
$fn=$_POST['fn'];
$ln=$_POST['ln'];
$tel=$_POST['tel'];
$pass=md5($_POST['pwd']);
if($fn!=""&&$ln!=""&&$tel!=""&&$pass!=""){
$config=new config;
$status=$config->reg_check($tel);

if($status=='new'){
$db=new db;
if($db->multiple_post("INSERT INTO signup(fname,lname,contact,password)VALUES('$fn','$ln','$tel','$pass')")){
$_SESSION['ID']=$tel;
return header('Location:index.php');
}    
}elseif($status=='exist'){
error('The selected telephone number already exists<br/>Register with another number please.');
}



}else{
error('fill in all fields');    
}
}



echo('</div>
</div>');        
}    
    
    
  
  
  
  
 /**
   * function for the count dashboard.
   */ 
 function count_dashboard(){
 
 echo('<div class="w3-cell-row" style="min-height:500px;">

  <div class="" style="width: 30%;padding:10px;display: inline-table;padding-left:10%;min-width:300px;text-align:center;">
    <p style="padding:10px;">
    <h3>LEARN COUNTING NUMBERS </h3>
    
   Registration instructions goes here 
   Registration instructions goes here 
   Registration instructions goes here 
   Registration instructions goes here 
   Registration instructions goes here 
   Registration instructions goes here 
   Registration instructions goes here 
   <hr/>');
$id=$_SESSION['ID'];
$db=new db;
$get_session=$db->get("SELECT ID FROM session WHERE userID='$id' AND status='started' LIMIT 1");
$num=number_rows($get_session);
if($num==1){
echo('<form method="post"><input class="btn btn-danger" name="cancel" type="submit" class="btn btn-success "value="TERMINATE SESSION"></form>');
$config=new config;
$config->session_terminate();

    
}elseif($num==0){
echo('<form method="post">
<input class="btn btn-primary" name="start" type="submit" value="START COUNTING SESSION">
</form>');    
if(isset($_POST['start'])){
$config=new config;
$config->session_establish();    
}
}   

    
    
    
echo('</p>
</div>

  <div class="" style="display: inline-table;width:50%;padding:10px;padding-right:10%;padding-left:30px;min-width:300px;text-align:center;">
    <p style="padding:10px;width:40%;">
  
  
</p>');

echo $_POST['start'];


echo('</div>
</div>'); 
 } 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}













?>