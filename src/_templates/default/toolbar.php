<div class="toolbar">
<table id="toolbar">
<?php

global $buttons;
$buttons = array();
$buttons[] = array ("buttons/home.png",   qx_link("list", "?dir="),                      qx_msg_s("homelink"));
$buttons[] = array ("buttons/reload.png", "javascript:location.reload();",               qx_msg_s("reloadlink"));
$buttons[] = array ("buttons/search.png", qx_link("search"),                             qx_msg_s("searchlink"));
$buttons[] = array ("buttons/copy.png", "javascript:Copy();",                             qx_msg_s("copylink"),      permissions_grant_all($dir, NULL, array("create", "read")));  
$buttons[] = array ("buttons/move.png", "javascript:Move();",                             qx_msg_s("movelink"),      permissions_grant($dir, NULL, "change"));
$buttons[] = array ("buttons/delete.png", "javascript:Delete();",                         qx_msg_s("dellink"),       permissions_grant($dir, NULL, "delete"));
$buttons[] = array ("buttons/upload.png", qx_link("upload", "?dir=" . qx_directory()),   qx_msg_s("uploadlink"),    permissions_grant($dir, NULL, "create") && get_cfg_var("file_uploads"));

$buttons[] = array ("buttons/archive.png", "javascript:Archive();",                      qx_msg_s("comprlink"),     permissions_grant_all($dir, NULL, array("create", "read")));
?>

<tr>
    <?php foreach ($buttons as $btnname => $btnprops) { ?>
        <td><a href="<?php echo $btnprops[1]?>">
            <img src="<?php echo qx_var_template_dir() . "/" . $btnprops[0] ?>"
                 title="<?php echo $btnprops[2] ?>"
                 alt="<?php echo $btnprops[2] ?>" />
            </a>
        </td>
    <?php } // foreach ?> 
    <?php /** 
	
	// print the edit buttons
	_print_edit_buttons($dir);
	
	// ADMIN & LOGOUT
	if(qx_var_authenticated())
	{
		echo "<TD>::</TD>";
		// ADMIN
		_print_link("admin", 
				permissions_grant(NULL, NULL, "admin")
				|| permissions_grant(NULL, NULL, "password"),
				$dir, NULL);
		// LOGOUT
		_print_link("logout", true, $dir, NULL);
	}
	
	echo "<TD>::</TD>";
	//Languages
	
	
	foreach($GLOBALS["langs"] as $langs) {
		
		echo "<TD><A HREF=\"".make_link("list",$dir,NULL,NULL,NULL,$langs[0])."\">";
	
		if (!file_exists($langs[1]))
		{
			echo "&nbsp;$langs[0] ";
		}
		else
		{
			echo "<IMG border=\"0\" width=\"16\" height=\"11\" ";
			echo "align=\"ABSMIDDLE\" src=\"".$langs[1]."\" ALT=\"".$langs[0];
			echo "\" TITLE=\"".$langs[2]."\"/></A></TD>\n";
		}

		//list($slang,$img,$ext,$type)	= $mime;
		/*if(@eregi($ext,$item)) {
			$mime_type	= $desc;
			$image		= $img;
			if($query=="img"){ return $image;}
			else if($query=="ext"){ return $type;}
			else return $mime_type;
			
		}
	
	
	//
	// Create File / Dir
	if (permissions_grant($dir, NULL, "create"))
	{
		echo "<TD align=\"right\"><TABLE><FORM action=\"".make_link("mkitem",$dir,NULL)."\" method=\"post\">\n<TR><TD>";
		echo "<IMG border=\"0\" width=\"16\" height=\"16\" align=\"ABSMIDDLE\" src=\"".$GLOBALS["baricons"]["add"]."\" />";
		echo "<SELECT name=\"mktype\">";
		echo "<option value=\"file\">".$GLOBALS["mimes"]["file"]."</option>";
		echo "<option value=\"dir\">".$GLOBALS["mimes"]["dir"]."</option></SELECT>\n";
		echo "<INPUT name=\"mkname\" type=\"text\" size=\"15\">";
		echo "<INPUT type=\"submit\" value=\"".$GLOBALS["messages"]["btncreate"];
		echo "\"></TD></TR></FORM></TABLE></TD>\n";
	}
*/	
?>	
    </tr>
</table>
