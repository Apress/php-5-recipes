<?php
// Example 16-4-4.php
$conn = ftp_connect("ftp.somedomain.com");
if ($conn) {
  $session = ftp_login($conn, "user", "pass");
  if ($session) {
    if (ftp_chdir($conn, "somedir")) {
      ftp_put($conn, "remote.txt", "local.txt", FTP_ASCII);
    }
  }
  ftp_close($conn);
}
?>