<?php
// Example rss_db.inc
if (!extension_loaded("fbsql")) {
  dl("php_fbsql.dll");
}

class RSSdb {
  private $con;
  function __construct($host, $user, $passwd, $database) {
    $this->con = fbsql_connect($host, $user, $passwd);
    if ($this->con) {
      fbsql_select_db($database, $this->con);
    }
  }
  
  function __dtor() {
    if ($this->$con) {
      fbsql_close($this->com);
    }
  }
  
  function GetFeeds($for_update = true) {
    $res = array();
    $ts = time();
    $SQL = "select xid, url, link, title, description from tRSSFeed";
    if ($for_update) {
      $SQL .= " where LastUpdate is null or LastUpdate + Frequency < $ts";
    }
    $rs = fbsql_query("$SQL order by title;", $this->con);
    if ($rs) {
      while ($row = fbsql_fetch_assoc($rs)) {
        if (is_array($row)) {
          $row = array_change_key_case($row, CASE_LOWER);
        }    
        $res[] = $row;
      }
      fbsql_free_result($rs);
    }
    return $res;
  }
  
  function UpdateChannel($xid, $title, $link, $description) {
    $title = str_replace("'", "''", $title);
    $description = str_replace("'", "''", $description);
    $ts = time();
    fbsql_query("update tRSSFeed " . 
      "set LastUpdate=$ts, title='$title', link='$link', description='$description' " . 
      "where xid=$xid;", $this->con);
  }
  
  function AddItem($rssxid, $title, $link, $description, $date) {
    $title = str_replace("'", "''", $title);
    $description = str_replace("'", "''", $description);
    $arrDate = split("[ T:+-]", $date);
    while(sizeof($arrDate) < 6) $arrDate[] = 0;
    $ts = gmmktime((int)$arrDate[3], (int)$arrDate[4], (int)$arrDate[5], 
      (int)$arrDate[1],(int)$arrDate[2], (int)$arrDate[0]);
    $rs = fbsql_query("select xid from tRSSItem " .
      "where ItemDate=$ts and title='$title' and rssxid=$rssxid;", $this->con);
    if ($rs) {
      $row = fbsql_fetch_assoc($rs);
      fbsql_free_result($rs);
    }
    if (empty($row)) {
      fbsql_query("insert into tRSSItem (RSSXid, title, link, description, itemdate) ".
        "values ($rssxid, '$title', '$link', '$description', $ts);", $this->con);
    }
  }
  
  function GetItems($rssxid, $count = 10) {
    $res = array();
    $rs = fbsql_query("select top $count xid, url, link, title, description, itemdate from tRSSItem " .
      "where rssxid = $rssxid order by itemdate desc;", $this->con);
    if ($rs) {
      while ($row = fbsql_fetch_assoc($rs)) {
        if (is_array($row)) {
          $row = array_change_key_case($row, CASE_LOWER);
        }    
        $res[] = $row;
      }
      fbsql_free_result($rs);
    }
    return $res;
  }
}
?>