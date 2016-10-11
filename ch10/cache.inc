<?php
// Example cache.inc
class Cache {
  private $name = null;
  private $value = array();
  private $ttl;

  function __construct($name, $ttl = 3600) {
    $this->name = $name;
    $this->ttl = $ttl;
  }

  function Check() {
    $cached = false;
    $file_name = $this->name . ".cache";
    if (file_exists($file_name)) {
      $modified = filemtime($file_name);
      if (time() - $this->ttl < $modified) {
        $fp = fopen($file_name, "rt");
        if ($fp) {
          $temp_value = fread($fp, filesize($file_name));
          fclose($fp);
          $this->value = unserialize($temp_value);
          $cached = true;
        }
      }
    }
    return $cached;
  }
  
  function Save() {
    $file_name = $this->name . ".cache";
    $fp = fopen($file_name, "wt");
    if ($fp) {
      fwrite($fp, serialize($this->value));
      fclose($fp);
    }
  }
  
  function SetValue($key, $value) {
    $this->value[$key] = $value;
  }
  
  function GetValue($key) {
  	if (isset($this->value[$key])) {
  	  return $this->value[$key];
  	}
  	else {
  	  return NULL;
  	}
  }
}
?>
