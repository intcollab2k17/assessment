<?php
if (($ext=="jpg") or ($ext=="jpeg") or ($ext=="png") or ($ext=="gif") or ($ext=="ico")  or ($ext=="JPG"))	
  {		
	$display="ico/psd.jpg";
  }	
elseif (($ext=="ppt") or ($ext=="pptx"))		
  {			
	$display="ico/ppt.png";
  }
elseif (($ext=="doc") or ($ext=="docx") or ($ext=="txt"))		
  {		
	$display="ico/word.png";
  }
elseif (($ext=="xls") or ($ext=="xlsx"))		
  {		
	$display="ico/excel.png";
  }  
elseif ($ext=="pdf")		
  {		
	$display="ico/pdf.jpeg";
  }
elseif ($ext=="sql")		
  {		
	$display="ico/sql.png";
  }
elseif ($ext=="psd")		
  {		
	$display="ico/psd.jpg";
  }
elseif ($ext=="zip")		
  {		
	$display="ico/zip.png";
  }
elseif (($ext=="mp3") or ($ext=="wav"))	
  {		
	$display="ico/sound.png";
  }
elseif (($ext=="mp4") or ($ext=="mpeg") or ($ext=="flv") or ($ext=="3gp"))	
  {		
	$display="ico/video.png";
  }
elseif (($ext=="html") or ($ext=="htm"))  
  {   
  $display="ico/chrome.png";
  }  
else
  {		
	$display="unknown.jpg";
  }
?>  