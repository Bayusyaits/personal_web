<?php

function base_url($slug=false) {
	if($slug){
		if(strpos($slug, "backoffice")){
		return route("backoffice");
		}
	}
}
function _post($name, $default=null){
	return isset($_POST[$name]) && $_POST[$name] ? $_POST[$name] : $default;
}
function _get($name, $default=null){
	return isset($_GET[$name]) && $_GET[$name] ? $_GET[$name] : $default;
}
function _server($name, $default=null){
	return isset($_SERVER[$name]) && $_SERVER[$name] ? $_SERVER[$name] : $default;
}
function _session($name, $default=null){
	return isset($_SESSION[$name]) && $_SESSION[$name] ? $_SESSION[$name] : $default;
}
function _cookie($name, $default=null){
	return isset($_COOKIE[$name]) && $_COOKIE[$name] ? $_COOKIE[$name] : $default;
}
if (! function_exists('fileSize')){
	function fileSize($file) {
		$size = $request->file($file)->getClientSize();
		return $size;
	}
}
if (! function_exists('fileDimensions')) {
	function fileDimensions($file) {
		return list($width, $height) = getimagesize("$file");
	}
}
if ( ! function_exists('removeExt'))
{
function removeExt($string) {

return preg_replace('/\\.[^.\\s]{3,4}$/', '', $string);
}
}
if ( ! function_exists('cleanCharsAndSpace'))
{
function cleanCharsAndSpace($string) {
$search = array('/[^A-Za-z0-9\-]/', '_');
$replace = array(' ', ' ');
$subject = $string;
return str_replace($search, $replace, $subject); 
}
}
if ( ! function_exists('base64Image')){
 function base64Image($path)
{ 
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
return 'data:image/' . $type . ';base64,' . base64_encode($data);
}
}
if ( ! function_exists('generateToken'))
{
	function generateToken($length = null)
	{
	if(empty($length)){
    $length = 20;
    }else{
    $length = $length;
    }
	$buf = '';
    for ($i = 0; $i < $length; ++$i) {
        $buf .= chr(mt_rand(0, 255));
    }
    return bin2hex($buf);
	}

}
if ( ! function_exists('generateRandomNumeric'))
{
  function generateRandomNumeric($length = null) {
	    if(empty($length)){
	    $length = 10;
	    }else{
	    $length = $length;
	    }
	    $numeric = '0123456789';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $numeric[rand(0, strlen($numeric) - 1)];
	    }
	    return $randomString;
	}
}
if ( ! function_exists('base64_image')){
 function base64_image($path)
{ 
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
return 'data:image/' . $type . ';base64,' . base64_encode($data);
}
}
if ( ! function_exists('generateRandomString'))
{
    
  function generateRandomString($length = null) {
	    if(empty($length)){
	    $length = 10;
	    }else{
	    $length = $length;
	    }
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, strlen($characters) - 1)];
	    }
	    return $randomString;
	}
}
if ( ! function_exists('removesSpecialChars'))
{
function removesSpecialChars($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

   return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}
}
if ( ! function_exists('createHash'))
{
function createHash($stored)
	{
		$hash = password_hash(base64_encode(hash('sha256', $stored, true)), PASSWORD_DEFAULT);
		return $hash;
	}
}
if ( ! function_exists('validateHash'))
{	
function validateHash($stored, $hash_bcrypt)
	{
	$hash = $hash_bcrypt;
		if (password_verify(base64_encode(hash('sha256', $stored, true)), $hash_bcrypt))
		return true;
		
	}
}
if ( ! function_exists('dateToEn'))
{
//** Format Tanggal YYYY-MM-DD **//
function dateToEn($date){
	$date_en = date("Y-m-d H:i:s", $date);
	$month_array = date('m', strtotime($date_en));
	$dateObj   = DateTime::createFromFormat('!m', $month_array);
	$month = $dateObj->format('F');
	$date = date('d', strtotime($date_en));
	$year = substr($date_en, 0 , 4);
	$monthName = substr($month, 0 , 3);
	$date_en = $monthName." ".$date.", ".$year;
	if($date_en == '1970-01-01'){
		return '';
	} else {
		return $date_en;
	}
}//function_date_to_en
}// if_date_to_en
if ( ! function_exists('dateToTime'))
{
//** Format Tanggal YYYY-MM-DD **//
function dateToTime($date){
	$time = date('Y-m-d H:i:s', strtotime($date));
	return $time;
}//function_date_to_en
}// if_date_to_en

if ( ! function_exists('dateToId'))
{
//** Format Tanggal DD-MM-YYYY **//
function dateToId($date){
	$date_id = date("Y-m-d H:i:s", $date);
	$date_i = date('Y-m-d', strtotime($date_id));
	if($date_i == '1970-01-01'){
		return '';
	} else {
		return $date_i;
	}
}//function_date_to_id
}//if date_to_id

if ( ! function_exists('dateTimeId'))
{
//** Format Tanggal DD-MM-YYYY **//
function dateTimeId($date){
	$date_id = date("Y-m-d H:i:s", $date);
	$month_array = date('m', strtotime($date_id));
	$date_array = substr($date_id, 8 , 2);
	$newDateTime = date('h:i A', strtotime($date_id));
    $day_array = date('w', strtotime($date_id));
    $year = substr($date_id, 2 , 2);
    $date_i = $month_array." ".$date_array."' ".$year." at ".$newDateTime."";
	if($date_i == '1970-01-01'){
		return '';
	} else {
		return $date_i;
	}
}//function_date_to_id
}//if date_to_id
if ( ! function_exists('dateTimeEn'))
{
//** Format Tanggal DD-MM-YYYY **//
function dateTimeEn($date){
	$date_id = date("Y-m-d H:i:s", $date);
	$month_array = date('m', strtotime($date_id));
	$dateObj   = DateTime::createFromFormat('!m', $month_array);
	$month = $dateObj->format('F');
	$monthName = substr($month, 0 , 3);
	$date = date('d', strtotime($date_id));
	$newDateTime = date('h:i A', strtotime($date_id));
	$year = substr($date_id, 0 , 4);
    $date_i = $monthName." ".$date.", ".$year." at ".$newDateTime."";
	if($date_i == '1970-01-01'){
		return '';
	} else {
		return $date_i;
	}
}//function_date_to_id
}//if date_to_id
function controller($name,$object=true) {
	$str = "\App\Http\Controllers\\$name";
	if($object) return new $str(true);
	$str;
}
function model($model){
	$str = "App/Models/$model";
	if(!class_exists($str)) return '';
	return new $str;
}
function module($module){
	$str = "App/Models/$module";
	if(!class_exists($str)) return '';
	return new $str;
}
function user(){
	if(isset($_COOKIE['admin_auth_id']) || session('admin_auth_id')){
		return controller('AuthController')->admin();
	}
	if(isset($_COOKIE['general_auth_id']) || session('general_auth_id')){
		return controller('AuthController')->general();
	}
}