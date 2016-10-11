<?php
// Example 16-4-6.php
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
                "url" => $GLOBALS['PHP_SELF'] . "?mode=get&file=" . 
                urlencode($file),
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

function GetFile($host, $user, $pass, $folder, $file) {
  $ret = false;
  $conn = ftp_connect($host);
  if ($conn) {
    $session = ftp_login($conn, $user, $pass);
    if ($session) {
      if (empty($folder) || ftp_chdir($conn, $folder)) {
        $local_file = tempnam(".", "ftp");
        if (ftp_get($conn, $local_file, $file, FTP_BINARY)) {
          $ret = $local_file;
        }
      }
    }
    ftp_close($conn);
  }
  return $ret;
}

if (empty($mode)) $mode = "list";

$host = "ftp.somedomain.com";
$user = "user";
$pass = "pass";
$folder = "/somedir";

switch($mode) {
  case "list" :
    $files = GetContent($host, $user, $pass, $folder);
    echo "<html><body><table width=100% border=0>" .
        "<tr><td>Name</td><td align=right>Size</td></tr>";
    foreach ($files as $file) {
      echo "<tr><td><a href='$file[url]'>$file[name]</a></td><td align=right>$file[size]</td></tr>";
    }    
    echo "</table></body></html>";
    break;
  case "get" :
    $local_file = GetFile($host, $user, $pass, $folder, $file);
    if ($local_file) {
      header("Content-Type: application/octetstream");
      header("Content-Disposition: attachment; filename=\"$file\"");
      readfile($local_file);
      unlink($local_file);
    }
    else {
      echo "<html><body><h1>Error: </h1>Could not download $folder/$file from $host</body></html>";
    }
}
?>
