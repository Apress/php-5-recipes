<?php
  # This is the Date class introduced in Recipe 5-12

  //  An emulation of the JavaScript Date() object for PHP 4
  //  includes all methods for ECMA-262 standard (as of JavaScript 1.2)

  //  See ECMAScript Specification, 3rd ed.:
  //  http://www.ecma-international.org/publications/standards/ECMA-262.htm


  //  --  Change History  --

  //  Version 1.0 (2003-04-05)

  //  Version 1.5 (2003-10-23)
  //    --  implemented getUTC*() methods

  //  Version 2.0 (2004-09-15)
  //    --  converted to PHP5-style class
  //    --  renamed all methods to match ECMA names (intercap)
  //    --  reimplemented setUTC*() methods

  //  Version 3.0 (2005-03-21)
  //    --  For inclusion in PHP 5 Recipes book
  //    --  fixed set* methods to conform to ECMA-262
  //        (should return new timestamp value)
  //    --  changed Date::parse() method def
  //        (dropped second parameter)
  //    --  changed default Date constructor
  //        (now uses mktime() rather than time())
  //    --  updated toString() and toLocaleString() methods
  //    --  renamed setTimezoneOffSet() as setTimeZoneOffset()
  //    --  fixed broken Date::UTC() method

  //  Version 3.1 (2005-05-25)
  //    --  Date::UTC() now conforms to ECMA-specified behaviour for arguments
  //    --  dropped $UTCDate instance variable (unnecessary)
  //    --  Rewrote DateExtended for compatibility with Date version 3.0+

  //  Copyright 2003-2005, Jonathan R. Stephens (jon@hiveminds.net)
  //  This code may be used and redistributed without charge
  //  under the terms of the GNU General Public
  //  License version 2.0 or later -- www.gnu.org
  //  Subject to the retention of this copyright
  //  and GPL Notice in all copies or derived works

  //  Notes:
  //  1. All methods NOT including "UTC" in their names
  //  reflect local time; those that DO contain "UTC" in their
  //  names express universal time (UTC)
  //
  //  2. Due to the problem of trying to get time values of
  //  less than one second for any time other than the present
  //  in PHP, this class is based on seconds; e.g., the constructor
  //  called with a single integer argument expects this to be
  //  seconds since the Unix Epoch, and there are no milliseconds
  //  getter or setter methods enabled.

  //  TO DO:
  //  1.  Throw exceptions for invalid/missing arguments
  //      (add DateException class to handle these)
  //  2.  Convert to milliseconds-based and implement related methods.
  //      This should make the class (more or less) ECMA-compliant.

class Date
{
  //  this is the internal representation
  //  of the local date/time in seconds
  //  elapsed since the Unix Epoch (1970-01-01 00:00:00 UTC)
  protected $time;

  //  local time offset from UTC (in minutes)
  protected $offset;

  //  STATIC METHODS

  //  $date should be in RFC-1123 format (although
  //  strtotime() will accept other arguments);
  //  returns a timestamp in seconds
  //  (this should actually be in milliseconds
  //  for ECMA compliance)
  public static function parse($date)
  {
    return strtotime($date);
  }

  //  this also returns seconds instead of milliseconds

  //  $year is a 4-digit year; $month is 0-11; $day is 1-31
  //  $hours is a digit 0-23; $minutes and seconds are digits 0-59

  //  $year, $month, $day are required; $seconds may be omitted;
  //  if $seconds is omitted, then $minutes may also be omitted;
  //  if $minutes is omitted, then $hours may also be omitted

  //  (this behaviour is not strictly enforced here,
  //  but should be for ECMA compliance)

  //  **    WARNING   **
  //  This method is BROKEN on Win32 for dates <= 01 January 1970 12:00:00 AM

  public static function UTC($year, $month, $day)
  {
    $hours = $minutes = $seconds = 0;
    $num_args = func_num_args();

    if($num_args > 3)
      $hours = func_get_arg(3);
    if($num_args > 4)
      $minutes = func_get_arg(4) + ((int)date('Z') * 60);
    if($num_args > 5)
      $seconds = func_get_arg(5);

    return mktime($hours, $minutes, $seconds, ($month + 1), $day, $year);
  }


  //  CONSTRUCTOR
  //  input parameter options:
  //  1. none: current day/time
  //  2. one, of type int: time in seconds
  //  3. one, of type string: date/time in RFC-1123 format (e.g. Wed, 8 May 1996 17:46:40 -0500)
  //  4. two to six arguments, each of type int (in order):
  //      4-digit year
  //      month (0=January, 11=December)
  //      day of month (0-31) (optional)
  //      hours (24-hour format, i.e. 0-23) (optional)
  //      minutes (0-59) (optional)
  //      seconds (0-59) (optional)

  public function __construct()
  {
    $num_args = func_num_args();
    
    if($num_args > 0)
    {
      $args = func_get_args();

      if( is_array($args[0]) )
      {
        $args = $args[0];
        $num_args = count($args);
      }
      if($num_args > 1)
        $seconds = $minutes = $hours = $day = $month = $year = 0;
    }

    switch($num_args)
    {
      case 6:
        $seconds = $args[5];
      case 5:
        $minutes = $args[4];
      case 4:
        $hours = $args[3];
      case 3:
        $day = $args[2];
      case 2:
        $month = $args[1];
        $year = $args[0];
        $this->time = mktime($hours, $minutes, $seconds, ($month + 1), $day , $year);
        break;
      case 1:
        if( is_int($args[0]) )
        {
          $this->time = $args[0];
        }
        elseif( is_string($args[0]) )
        {
          $this->time = strtotime($args[0]);
        }
        break;
      case 0:
        $this->time = mktime();
        break;
    }

    //  note that this offset is ADDED to
    //  local time in order to convert to UTC!!
    //  in other words:
    //  $localNow = new Date();
    //  $UTCNow = $localNow->setMinutes(
    //              $localNow->getMinutes() + $localNow->getTimeZoneOffset()
    //                                 );

    $temp = gettimeofday();
    $this->offset = (int)$temp["minuteswest"];
  }

  //  according to the ECMA spec, this should return
  //  an implementation-dependent string representation
  //  of the local date/time that's human-readable but that
  //  DOESN'T use locale-specific formatting
  public function toString()
  {
    return str_replace('T', ' ', date('c', $this->time));
  }

  //  returns day of month (1-31)
  public function getDate()
  {
    return (int)date("j", $this->time);
  }

  //  returns day of week (0=Sunday, 6=Saturday)
  public function getDay()
  {
    return (int)date("w", $this->time);
  }

  //  returns 4-digit year
  public function getFullYear()
  {
    return (int)date("Y", $this->time);
  }

  //  returns hours field (0-23)
  public function getHours()
  {
    return (int)date("H", $this->time);
  }

/*
  //  NOT IMPLEMENTED AT THIS TIME
  //  returns milliseconds (0-999)
  function getMilliseconds()
  {
  }
*/

  //  returns minutes field (0-59)
  public function getMinutes()
  {
    return (int)date("i", $this->time);
  }

  //  returns month (0=January, 11=December)
  public function getMonth()
  {
    $temp = (int)date("n", $this->time);
    return --$temp;
  }

  //  returns seconds field (0-59)
  public function getSeconds()
  {
    return (int)date("s", $this->time);
  }

  //  returns a complete Date as elapsed seconds
  //  since the Unix Epoch (midnight 01 January 1970 UTC)
  //  note that this is not actually ECMA-compliant since
  //  it returns seconds and not milliseconds
  public function getTime()
  {
    return $this->time;
  }

  //  returns difference between local time and UTC
  //  as measured in minutes
  public function getTimezoneOffset()
  {
    return $this->offset;
  }

  //  returns day of month (1-31) (UTC)
  public function getUTCDate()
  {
    return (int)gmdate("j", $this->time);
  }

  //  returns day of week (0=Sunday, 6=Saturday) (UTC)
  public function getUTCDay()
  {
    return (int)gmdate("w", $this->time);
  }

  //  returns the 4-digit year (UTC)
  public function getUTCFullYear()
  {
    return (int)gmdate("Y", $this->time);
  }

  //  returns the hours field (0-59) (UTC)
  public function getUTCHours()
  {
    return (int)gmdate("H", $this->time);
  }

  /*  ** Not currently implemented

  //  returns milliseconds field (0-999) (UTC)
  function getUTCMilliseconds()
  {
  }
*/
  //  returns minutes field (0-59) (UTC)
  public function getUTCMinutes()
  {
    return (int)gmdate("i", $this->time);
  }

  //  returns month (0=January, 11=December) (UTC)
  public function getUTCMonth()
  {
    $temp = (int)gmdate("n", $this->time);
    return ($temp - 1);
  }

  //  returns seconds field (0-59) (UTC)
  public function getUTCSeconds()
  {
    return (int)gmdate("s", $this->time);
  }

/*
  //  deprecated in JS 1.2 in favour of Date.getFullYear()
  //  because it was so badly implemented in JS 1.0/1.1
  //  I have chosen not even to bother implementing here
  function getYear()
  {
  }
*/

  //  set day of month (1-31)
  public function setDate($date)
  {
    $this->time = mktime(
                          $this->getHours(),
                          $this->getMinutes(),
                          $this->getSeconds(),
                          $this->getMonth() + 1,
                          $date,
                          $this->getFullYear()
                        );

    return $this->time;
  }

  //  set 4-digit year
  public function setFullYear($year)
  {
    $this->time = mktime(
                          $this->getHours(),
                          $this->getMinutes(),
                          $this->getSeconds(),
                          $this->getMonth() + 1,
                          $this->getDate(),
                          $year
                        );

    return $this->time;
  }

  //  set hours (0-23)
  public function setHours($hours)
  {
    $this->time = mktime(
                          $hours,
                          $this->getMinutes(),
                          $this->getSeconds(),
                          ($this->getMonth() + 1),
                          $this->getDate(),
                          $this->getFullYear()
                        );

    return $this->time;
  }

  //  set minutes (0-59)
  public function setMinutes($minutes)
  {
    $this->time = mktime(
                          $this->getHours(),
                          $minutes,
                          $this->getSeconds(),
                          ($this->getMonth() + 1),
                          $this->getDate(),
                          $this->getFullYear()
                        );

    return $this->time;
  }

  //  set month (0-11)
  public function setMonth($month)
  {
    $this->time = mktime(
                          $this->getHours(),
                          $this->getMinutes(),
                          $this->getSeconds(),
                          $month + 1,
                          $this->getDate(),
                          $this->getFullYear()
                        );

    return $this->time;
  }

  //  set seconds (0-59)
  public function setSeconds($seconds)
  {
    $this->time = mktime(
                          $this->getHours(),
                          $this->getMinutes(),
                          $seconds,
                          $this->getMonth() + 1,
                          $this->getDate(),
                          $this->getFullYear()
                        );

    return $this->time;
  }

  //  set time in seconds since the Unix Epoch
  //  note that in ECMA-262 this should actually
  //  be a value in milliseconds, not seconds
  public function setTime($time)
  {
    $this->time = $time;

    return $this->time;
  }

  //  set time zone offset in minutes
  //  (negative values for points west of Greenwich,
  //  positive values are east of it)
  public function setTimeZoneOffset($offset)
  {
    $this->offset = $offset;

    return $this->time;
  }

  //  set day of month (1-31) (UTC)
  public function setUTCDate($date)
  {
    $this->time = mktime(
                          $this->getUTCHours(),
                          $this->getUTCMinutes() - $this->offset,
                          $this->getUTCSeconds(),
                          $this->getUTCMonth() + 1,
                          $date,
                          $this->getUTCFullYear()
                        );

    return $this->time;
  }

  //  set 4-digit year (UTC)
  public function setUTCFullYear($year)
  {
    $this->time = mktime(
                          $this->getUTCHours(),
                          $this->getUTCMinutes() - $this->offset,
                          $this->getUTCSeconds(),
                          $this->getUTCMonth() + 1,
                          $this->getUTCDate(),
                          $year
                        );

    return $this->time;
  }

  //  set hours (0-23) (UTC)
  public function setUTCHours($hours)
  {
    $this->time = mktime(
                          $hours,
                          $this->getUTCMinutes() - $this->offset,
                          $this->getUTCSeconds(),
                          $this->getUTCMonth() + 1,
                          $this->getUTCDate(),
                          $this->getUTCFullYear()
                        );

    return $this->time;
  }

  //  set minutes (0-59) (UTC)
  public function setUTCMinutes($minutes)
  {
    $this->time = mktime(
                          $this->getUTCHours(),
                          $minutes - $this->offset,
                          $this->getUTCSeconds(),
                          $this->getUTCMonth() + 1,
                          $this->getUTCDate(),
                          $this->getUTCFullYear()
                        );

    return $this->time;
  }

  //  set month (0-11) (UTC)
  public function setUTCMonth()
  {
    $this->time = mktime(
                          $this->getUTCHours(),
                          $this->getUTCMinutes() - $this->offset,
                          $this->getUTCSeconds(),
                          $month + 1,
                          $this->getUTCDate(),
                          $this->getUTCFullYear()
                        );

    return $this->time;
  }

  //  set seconds (0-59) (UTC)
  public function setUTCSeconds($seconds)
  {
    $this->time = mktime(
                          $this->getUTCHours(),
                          $this->getUTCMinutes() - $this->offset,
                          $seconds,
                          $this->getUTCMonth() + 1,
                          $this->getUTCDate(),
                          $this->getUTCFullYear()
                        );

    return $this->time;
  }

/*
  //  NOT IMPLEMENTED

  //  same deal as with getYear() --
  //  deprecated in ECMAScript due its
  //  inconsistent implementation
  //  elsewhere, so I've chosen not to
  //  bother with it at all here

  //  set year
  function setYear()
  {
  }
*/

  //  returns the date in RFC-1123/IETF format
  //  after converting it to UTC
  //  deprecated in ECMAScript in favour of
  //  toUTCString() -- implemented here as an
  //  alias of to_UTC_string()
  public function toGMTString()
  {
    return $this->toUTCString();
  }

  //  returns the date formatted according to local
  //  conventions and using local time
  public function toLocaleString()
  {
    return date('r', $this->time);
  }

  //  returns RFC formatted date (see toGMTString())
  public function toUTCString()
  {
    return date("D d M Y H:i:s", ($this->time + ($this->offset * 60))) . " UTC";
  }

  //  this is an alias for getTime()
  //  once again ECMA specifies milliseconds rather than seconds
  //  as it's implemented here
  public function valueOf()
  {
    return $this->time;
  }
}

?>