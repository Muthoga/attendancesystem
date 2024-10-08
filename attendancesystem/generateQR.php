<?php

	require_once("vendor/autoload.php");
	require("strings.php");
	use Endroid\QrCode\QrCode;
	use Endroid\QrCode\Response\QrCodeResponse;


	if(!(isset($_SESSION['teacher-name']))){
		header('Location: teacherlogin.php');
		die();
	}
	
	if(isset($_GET['classvalue'])){	
		//course=".$_GET['course']."&year=".$_GET['year']."&subject=".$_GET['subject'];
		$parameters = $classid."-".$tablename;
	
		$q = $serverUrl."/verification"."/".$year.$coursename.'-'.$division.'/'.$newname."?vpb=".urlencode(base64_encode($parameters));
		$qrCode = new QrCode($q);
		$qrCode -> setSize(500);
		
		$qrCode->setWriterByName('png');
                
		// Set advanced options
		$qrCode->setEncoding('UTF-8');
		$qrCode->setForegroundColor(['r' => 0, 'g' => 0, 'b' => 0, 'a' => 0]);
		$qrCode->setBackgroundColor(['r' => 255, 'g' => 255, 'b' => 255, 'a' => 0]);
		
		$qrCode->setRoundBlockSize(true);
		$qrCode->setValidateResult(false);

		//header('Content-Type: '.$qrCode->getContentType());
		//echo $qrCode->writeString();
		$dirPath = __DIR__ . '/assets/qrcode/' . $year . $coursename . '-' . $division . '/';
$filePath = $dirPath . 'qrcode.png';

// Ensure the directory exists
if (!file_exists($dirPath)) {
    mkdir($dirPath, 0777, true); // Create the directory with recursive permissions
}

// Write the QR code to the file
$qrCode->writeFile($filePath);
	}else{
		die();
	}
?>