<?php

function redirect_to($page,$username,$empid){
	header('Location:'.$page."?username=".$username);
}
?>