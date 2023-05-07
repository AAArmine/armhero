<?php

  // Store the file name into variable 
  $file = "terms-am.pdf";


  // Header content type 
  header('Content-type: application/pdf');

  header('Content-Disposition: inline; filename="' . $file . '"');

  header('Content-Transfer-Encoding: binary');

  header('Accept-Ranges: bytes');

  // Read the file 
  @readfile($file);

  ?> 