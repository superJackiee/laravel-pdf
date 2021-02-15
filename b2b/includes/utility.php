<?php
       function getFileExt($filename)
       {
             $info = explode(".", $filename);
             return $info[count($info)-1];
       }
?>