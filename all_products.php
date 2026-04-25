<?php
// open the file for reading only
$file_handle = fopen("products_data.txt", "r");


// read the data from the file
if($file_handle){
    // read details
    $content = fread($file_handle, filesize("products_data.txt"));
    
    // prepare the data
    $lines = explode("\n", trim($content));

    // get unique values
    $unique_lines = array_unique($lines);

    // diplay the data
    foreach ($unique_lines as $i => $unique_line) {
        echo ++$i.". ".$unique_line."<br>";
    }
}
?>