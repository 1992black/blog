<?php
include "K-NN/K-NN.php";
include "K-NN/changeImage.php";

if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 20000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    #echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    #echo "Type: " . $_FILES["file"]["type"] . "<br />";
    #echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    #echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    
    if (file_exists("uploads/" . $_FILES["file"]["name"]))
      {
          unlink("uploads/" . $_FILES["file"]["name"]);
          #echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      
      #echo "Stored in: " . "uploads/" . $_FILES["file"]["name"];
      }
    }
    move_uploaded_file($_FILES["file"]["tmp_name"], "uploads/" . $_FILES["file"]["name"]);
    // The file
    $root_path = dirname(__FILE__);
    $filename = ("uploads/" . $_FILES["file"]["name"]);
    $target_filename_here = ("uploads/small_" . $_FILES["file"]["name"]);
    $change_image = new changeImage;
    $txt_ary = $change_image->pic2txt($root_path. '/uploads', $_FILES["file"]["name"]);
    
    $knn = new KNN;
    
    $length = count($txt_ary);
    for($i = 0; $i < $length; $i++) {
        echo 'ans: '. $knn->handwriteClassTest($root_path. '/', $txt_ary[$i]). '<br>';
    }

  }
else
  {
  echo "Invalid file<br>";
  echo "Only gif/jpeg/png/pjpeg File Can Be Upload";
  }
?>