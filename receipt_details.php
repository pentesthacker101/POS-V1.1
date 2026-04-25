<?php
// open the file for reading only
$file_handle = fopen("sales_data_1.txt", "r");


// read the data from the file
if($file_handle){
    // read item details
    $content = fread($file_handle, filesize("sales_data_1.txt"));
    
    // prepare the data
    $lines = explode("\n", trim($content));

    // diplay the data
    foreach ($lines as $i => $line) {
        echo ++$i.". ".$line."<br>";
    }
}
?>