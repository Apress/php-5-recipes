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
  
  private function _decode_body($encoding, $part) {
    switch($encoding) {
      case 3: // Base64
        $strPart = imap_base64($part);
        break;
      case 4: // Quoted printable
        $strPart = imap_qprint($part);
        break;
      case 0: // 7bit
      case 1: // 8bit
      case 2: // Binary
      case 5: // Other
      default:
        break;
    }
    return $part;
  }
  
  private function _mimetype($structure) { 
    $mime_type = array("TEXT", "MULTIPART", "MESSAGE", "APPLICATION", "AUDIO", "IMAGE", "VIDEO", "OTHER"); 
    if($structure->subtype) { 
      return $mime_type[(int) $structure->type] . '/' . $structure->subtype; 
    } 
    return "TEXT/PLAIN"; 
  }

  private function _get_mime_parts($struct, $msg, &$parts, $options = 0, $part_number = false) {
    switch ($struct->type) {
      case 0 :  // TEXT
      case 2 :  // MESSAGE
      case 3 :  // APPLICATION
      case 4 :  // AUDIO
      case 5 :  // IMAGE
      case 6 :  // VIDEO
      case 7 :  // OTHER
        if(!$part_number) { 
          $part_number = "1"; 
        } 
        $data = imap_fetchbody($this->mh, $msg, $options, $part_number); 
        $parts[] = array(
          "DATA" => $this->_decode_body($struct->encoding, $data),
          "MIMETYPE" => $this->_mimetype($struct)
        );
        break;
      case 1 :  // MULTIPART
        $prefix = "";
        while(list($index, $sub_struct) = each($struct->parts)) { 
          if($part_number) { 
            $prefix = $part_number . '.'; 
          } 
          $this->_get_mime_parts($sub_struct, $msg, $parts, $options, $prefix . ($index + 1)); 
        } 
        break;
    } 
  }
  
  function body($msg, $options = 0) {
    $parts = array();
    $struct = imap_fetchstructure($this->mh, $msg, $options);
    $this->_get_mime_parts($struct, $msg, $parts, $options);
    return $parts;
  }
}
?>