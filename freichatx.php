<?php  
/*
Plugin Name: FreiChatX - I
Plugin URI: http://www.evnix.com
Description: FreiChatX Integrator frontend-only
Author: Avinash and Adesh D'silva
Version: 1.0 For FreiChatX 
Author URI: http://www.evnix.com


Copyright (C) 2011  Avinash and Adesh D'silva

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

*/
if (file_exists(ABSPATH . 'wp-includes/pluggable.php')) {
require_once(ABSPATH . 'wp-includes/pluggable.php');
}
function freichatx_get_hash($ses){

$url  = dirname(dirname(dirname(dirname((__FILE__)))));
$file = $url."/freichat/arg.php";

       if(is_file($file)){

               require $file;

               $temp_id=$ses.$uid;
               return md5($temp_id);

       }
       else
       {
               echo "<script>alert('module freichatx says: arg.php file not
found!');</script>";
       }

       return 0;
}



function getid()
{
  $current_user=wp_get_current_user() ;
  $ses=$current_user->ID; 
  
  return $ses;
}

function enque()
{
   $path = get_bloginfo( 'wpurl' );
   $id = getid();
   $url = $path.'/freichat/client/main.php?id='.$id.'&xhash='.freichatx_get_hash($id);
   $css_url = $path.'/freichat/client/jquery/freichat_themes/freichatcss.php';

   
   wp_enqueue_script( 'freijs', $url);
   wp_enqueue_style ( 'freicss',$css_url);
}
enque();
?>  
