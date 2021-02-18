<?php

namespace App\Helpers;

class Helper
{
    
	//image base 64 decode
	public static function imageEncode($data)
	{
		
		if($data == ''){
			return '';
		}
		$file = $data;
		$imageFileType = $file->getClientMimeType(); 
		// dd(base64_encode(file_get_contents($file->getRealPath())));
		$contents = base64_encode(file_get_contents($file->getRealPath()));
		$image_data = 'data:image/'.$imageFileType.';base64,'.$contents;
		$image = '<p><img src="'.$image_data.'" style="width:500px;hight:200px;"/></P>';
		// dd($image);
		return $image;
	}	
	// 08/02/21
	
}
