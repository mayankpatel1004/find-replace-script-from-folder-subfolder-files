<?php
function getDirList($dirName)
{
    $files = scandir($dirName);
    foreach($files AS $file)
    {
        if($file != '.' && $file != "..")
        {
            if(is_dir($dirName."/".$file))
            {
                echo "<b>Directory:".$file."</b><br/>";
                getDirList($dirName."/".$file);
            }
            else
            {
               echo "File:".$file."<br/>";
			   //echo $dirName."/".$file."<br />";
			   //$filecontent = fopen($dirName."/".$file);
			   $strFiledir = $dirName."/".$file;
               $filecontent = file_get_contents($strFiledir);
			   $replace = str_replace("test","",$filecontent);
            }
        }
    }
    /*
    if ($handle = opendir($dirName)) {
        echo "Directory handle: $handle\n";
        echo "Entries:\n";
        
        while (false !== ($entry = readdir($handle))) {
            echo "$entry - 1<br/>";
            if(is_dir( $dirName."/".$entry))
            {
                getDirList($dirName."/".$entry);
            }
        }
        closedir($handle);
    }
    */
}
getDirList("testfolder");
?>