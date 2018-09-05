<?php
$strFileDir = "/var/www/html/dawn/";

if ($handle = opendir('createPDFYogesh')) {
    echo "Directory handle: $handle\n";
    echo "Entries:\n";

    /* This is the correct way to loop over the directory. */
    while (false !== ($entry = readdir($handle))) {
        echo "$entry<br/>";
    }

    /* This is the WRONG way to loop over the directory. */
    while ($entry = readdir($handle)) {
        echo "$entry<br/>";
    }

    closedir($handle);
}
?>