<?php
if(isset($_REQUEST['submit']))
{
  $filename=  $_FILES["imgfile"]["name"];
  if ((($_FILES["imgfile"]["type"] == "image/gif")|| ($_FILES["imgfile"]["type"] == "image/jpeg") || ($_FILES["imgfile"]["type"] == "image/png")  || ($_FILES["imgfile"]["type"] == "image/pjpeg")) && ($_FILES["imgfile"]["size"] < 200000))
  {
    if(file_exists($_FILES["imgfile"]["name"]))
    {
      echo "File name exists.";
    }
    else
    {
      move_uploaded_file($_FILES["imgfile"]["tmp_name"],"uploads/$filename");
      echo "Upload Successful . <a href='uploads/$imagename'>Click here</a> to view the uploaded image";
    }
  }
  else
  {
    echo "invalid file.";
  }
}
else
{
?>
