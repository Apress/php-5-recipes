<?php
// Example 16-4-5.php
function GetContent($host, $user, $pass, $folder) {
  $content = array();
  $conn = ftp_connect($host);
  if ($conn) {
    $session = ftp_login($conn, $user, $pass);
    if ($session) {
      if (empty($folder) || ftp_chdir($conn, $folder)) {
        $files = ftp_nlist($conn, ".");
        if (is_array($files)) {
          foreach($files as $file) {
            $size = ftp_size($conn, $file);
            if ($size > 0) {
              $content[] = array(
                "name" => $file,
                "url" => "ftp://$user:$pass@$host/$folder/$file",
                "size" => $size
              );
            }
          }
        }
      }
    }
    ftp_close($conn);
  }
  return $content;
}

$files = GetContent("ftp.somedomain.com", "user", "pass", "/somedir");
echo "<html><body><table width=100% border=0>" .
    "<tr><td>Name</td><td align=right>Size</td></tr>";
foreach ($files as $file) {
  echo "<tr><td><a href='$file[url]'>$file[name]</a></td><td align=right>$file[size]</td></tr>";
}    
echo "</table></body></html>";
?>