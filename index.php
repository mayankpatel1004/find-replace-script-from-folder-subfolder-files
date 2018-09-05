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
                //echo "<b>Directory:".$file."</b><br/>";
                getDirList($dirName."/".$file);
            }
            else
            {
                //echo "<b>Directory:</b>".$file."<br/>";
				$ext = pathinfo($file, PATHINFO_EXTENSION);
                if($ext == "php")
                {
					$filecontent = file_get_contents($dirName."/".$file);
					if(preg_match("/test/i", $filecontent))
					{
						$replace = str_replace("test","",$filecontent);
						$putfile = htmlspecialchars(file_put_contents($dirName."/".$file,$replace));
						echo "File Affected =".$dirName."/".$file."<Br />";
					}
                }
            }
        }
    }
}
getDirList("testfolder");
?>


<?php
/*function getDirList($dirName)
{
    $files = scandir($dirName);
    foreach($files AS $file)
    {
        if($file != '.' && $file != "..")
        {
            if(is_dir($dirName."/".$file))
            {
                //echo "<b>Directory:".$file."</b><br/>";
                getDirList($dirName."/".$file);
            }
            else
            {
                //echo "<b>Directory:</b>".$file."<br/>";
				$ext = pathinfo($file, PATHINFO_EXTENSION);
                if($ext == "php")
                {
					$filecontent = file_get_contents($dirName."/".$file);
					/*if(preg_match("/test/i", $filecontent))*/
					if(stristr($filecontent,"test"))
					{
						//$replace = str_replace("test","",$filecontent);
						//$putfile = htmlspecialchars(file_put_contents($dirName."/".$file,$replace));
						echo "File Affected =".$dirName."/".$file."<Br />";
					}
                }
            }
        }
    }
}
getDirList("testfolder");*/
?>