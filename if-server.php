<?php

if ($_SERVER['REMOTE_ADDR'] == '85.72.81.53'){
    //print 'Only this ip can see this!';
    csv_export();
    write_log('This ip calls the function!');
    die();
}

?>