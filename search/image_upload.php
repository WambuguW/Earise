<?php
error_reporting(0);
	//Define the maximum size of the uploaded photo
	define("MAX_SIZE","100000");
	//function reads the extension of the file to determine if this is an image
	function getExtension($str)
	{
		$i=strrpos($str,".");
		if(!$i){return "";}
		$l=strlen($str)-$i;
		$ext=substr($str,$i+1,$l);
		return $ext;
	}
	//variable is intialized to 0 it is used to check if an error occurs
	$error=0;
	
	
			//reads the image uploaded by the client computer
		$image=$_FILES['image']['name'];
		if($image)
		{
			//get the original name of the file from the client machine
			$filename=stripslashes($_FILES['image']['name']);
			//get the extension of the image in lower case
			$extension=getExtension($filename);
			$extension=strtolower($extension);
			//if the extension is not known an error will occur and it will not be uploaded
			if(($extension !="jpg") && ($extension !="jpeg")&& ($extension !="ico") &&($extension !="png") &&($extension !="gif") &&($extension !="bmp"))
			{
				echo "unknown image extension";
				$error=1;
			}
			else
			{
				//get the size of the image in bytes
				//$_FILES['image']['tmp_name'] is a temporaly filename if the file
				//in which the uploaded file is stored on the server
				$size=filesize($_FILES['image']['tmp_name']);
				
				//compare the size of the uploaded with the our defined size
				if($size>MAX_SIZE*1024)
				{
					echo "you have exceeded the maximum image size";
					$error=1;
				}
				//we give a unique name to the image
				
				$image_name=time().'.'.$extension;
				
				//the new name will be containing the path if the image
				$newname="members_photo/".$image_name;
				$copy=copy($_FILES['image']['tmp_name'],$newname);
				
				
				}
			}
?>



