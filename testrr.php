<?php

//rename('upload/1-1000101/card_folder_16/field-post_image_temp.png',  'upload/1-1000101/card_folder_16/dodge.png');




if (file_exists('upload/1-1000101/temp_card_folder')) {
    
    rename('upload/1-1000101/temp_card_folder','upload/1-1000101/16');

} else { echo "Not working"; }

?>