<?php

function listDir($dir){
  echo "<ul>\n";
  if(is_dir($dir) && $dh = opendir($dir)){
    while (($file = readdir($dh)) !== false) {
      if ((is_dir($dir.'/'.$file) && $file != '.' && $file != '..' && strpos('.',$file) !== false)) {
        echo "<li><font color=\"#ff00cc\"><b>$file</b></font></li>\n";
        listDir($dir.'/'.$file);
      }else{
        if($file!="." && $file!=".."){
          echo "<li><a href='".$file."'>$file</a></li>\n";
        }
      }
    }
  }
  echo "</ul>\n";
}
$base_dir = dirname(__FILE__);
listDir($base_dir);
 ?>
