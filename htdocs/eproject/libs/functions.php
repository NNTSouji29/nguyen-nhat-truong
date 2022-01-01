<?php

function recursiveOption ($data,$selected,$parent = 0,$str = "") {
    foreach ($data as $key => $value) {
        if ($value["parent"] == $parent) {
            $selected_option = '';
            if ($value["id"] == $selected) {
                $selected_option = "selected";
            }
            echo '<option value="'.$value["id"].'" '.$selected_option.'>'.$str.$value["name"].'</option>';
            unset($data[$key]);
            recursiveOption ($data,$selected,$value["id"],$str."---| ");
        }
    }
}

function recursiveTable($data, $parent = 0,$str = ""){
    foreach($data as $key => $value){
        if( $value["parent"] == $parent){
            echo '           
           <tr>
                <td>'.$str.$value["name"].'</td>
                <td><a onclick="return checkDelete(\'Bạn có chắc muốn xóa thể loại này không ?\')" href="index.php?module=category&action=delete&id='.$value["id"].'">Xóa</a></td>
                <td><a href="index.php?module=category&action=edit&id='.$value["id"].'">Sửa</a></td>
            </tr>';
            unset($data[$key]);
            recursiveTable($data, $value["id"],$str."---|");
        }
    }
}

function checkExt ( $filename){
        $pos = strrpos($filename,".") + 1;
        $ext = substr($filename,$pos);
        if ($ext != "png" && $ext != "jpeg" && $ext != "gif"  && $ext != "ai"   && $ext != "psd"  && $ext != "pdf"  && $ext != "jfif"  && $ext != "jpg") {
            return false;
        } else {
            return true;
        }
}
function changeNameFile($filename){
    $filename = trim($filename);
    $filename = mb_strtolower($filename);
    $filename = preg_replace('!\s+!', ' ', $filename);
    $filename = str_replace(" ","-",$filename);
    $filename = time()."-".$filename;
    return $filename;
}
?>