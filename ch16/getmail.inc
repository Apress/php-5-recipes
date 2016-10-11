<?php
// Example getmail.inc
if (!extension_loaded("imap")) {
  dl("php_imap.dll");
}

class GetMail {
  private $host;
  private $user;
  private $pass;  
  private $type;
  private $mbox;
  private $port;
  private $mh = null;
  
  function __construct($host, $user, $pass, $type = 'imap', $mbox = 'INBOX', $port = null) {
    $this->host = $host;
    $this->user = $user;
    $this->pass = $pass;
    $this->type = strtolower($type);
    if (is_null($port)) {
      switch($this->type) {
        case 'imap' :
          $this->port = 143;
          break;
        case 'pop3' :
          $this->port = 110;
          break;
        case 'nntp' :
          $this->port = 119;
          break;
      }
    }
    else {
      $this->port = $port;
    }
    $this->mbox = $mbox;
    $mailbox = "$this->host:$this->port/$this->type";
    $this->mh = imap_open("{" . $mailbox . "}$this->mbox", $this->user, $this->pass, 16);
  }
  
  function __destruct() {
    if ($this->mh) {
      imap_close($this->mh);
    }
  }
  
  function num_msg() {
    return imap_num_msg($this->mh);
  }

  function num_recent() {
    return imap_num_recent($this->mh);
  }
  
  function headers($offset = 1, $max = 0) {
    $msg_from = $offset;
    if ($max > 0) {
      $msg_to = min($max + $offset, $this->num_msg());
    }
    else {
      $msg_to = $this->num_msg();
    }
    $headers = array();
    for ($i = $msg_from; $i <= $msg_to; $i++) {
      $headers[imap_uid($this->mh, $i)] = imap_headerinfo($this->mh, $i);
    }
    return $headers;
  }
  
  function format_address($obj) {
    if (isset($obj->personal)) {
      return imap_rfc822_write_address($obj->mailbox, $obj->host, $obj->personal);
    }
    else {
      return imap_rfc822_write_address($obj->mailbox, $obj->host, '');
    }
  }

  function format_address_list($array, $sep = ", ") {
    $list = array();
    foreach($array as $obj) {
      $list[] = $this->format_address($obj);
    }
    return implode($sep, $list);
  }
}
?>