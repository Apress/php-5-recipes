<?php
  # Recipe 5-13
  
  //  Copyright 2004-2005, Jonathan R. Stephens (jon@hiveminds.net)
  //  This code may be used and redistributed without charge
  //  under the terms of the GNU General Public
  //  License version 2.0 or later -- www.gnu.org
  //  Subject to the retention of this copyright
  //  and GPL Notice in all copies or derived works
  
  //  See Date.class.inc.php for additional notes and change history

  require_once('./Date.class.inc.php');

  class DateExtended extends Date
  {
    public static function isLeapYear($year)
    {
      return date('L', mktime(0, 0, 0, 1, 1, $year)) == 1 ? TRUE : FALSE;
    }

    public function __construct()
    {
      parent::__construct( func_get_args() );
    }

    //  overrides Date method
    public function toLocaleString($long=FALSE)
    {
      $output = "";

      if($long)
      {
        $day = $this->getDayFullName();
        $date = $this->getOrdinalDate();
        $month = $this->getMonthFullName();
        $year = $this->getFullYear();
        $time = $this->getClockTime(TRUE, TRUE, FALSE);

        $output = "$day, $date $month $year, $time";
      }
      else
        $output = date('r', $this->getTime());

      return $output;
    }

    public function getClockTime($twelve = TRUE, $uppercaseAMPM = TRUE,
                                    $includeSeconds = TRUE, $separator = ':')
    {
      $am_pm = "";

      $hours = $this->getHours();
      if($twelve)
      {
        $am_pm = " " . ($hours >= 12 ? "pm" : "am");
        if($uppercaseAMPM)
          $am_pm = strtoupper($am_pm);

        if($hours > 12)
          $hours -= 12;
      }
      else
      {
        if($hours < 10)
          $hours = "0$hours";
      }

      $minutes = $this->getMinutes();
      if($minutes < 10)
        $minutes = "0$minutes";

      $minutes = "$separator$minutes";

      $seconds = "";

      if($includeSeconds)
      {
        $seconds = $this->getSeconds();
        if($seconds < 10)
          $seconds = "0$seconds";

      $seconds = "$separator$seconds";
      }

      return "$hours$minutes$seconds$am_pm";
    }

    public function getDayFullName()
    {
      return date('l', $this->time);
    }

    public function getDayShortName()
    {
      return date('D', $this->time);
    }

    public function getDaysInMonth()
    {
      return date('t', $this->time);
    }

    public function getDifference(Date $date)
    {
      $val1 = $this->getTime();
      $val2 = $date->getTime();
      $sec = abs($val2 - $val1);
      $units = getdate($sec);

      $hours = abs($units["hours"] - (date('Z') / 3600));
      $days = $units["mday"];

      if($hours > 23)
      {
        $days++;
        $hours %= 24;
      }

      $output = array();

      $output["components"] = array(
                                "years"   => $units["year"] - 1970,
                                "months"  => --$units["mon"],
                                "days"    => --$days,
                                "hours"   => $hours,
                                "minutes" => $units["minutes"],
                                "seconds" => $units["seconds"]
                              );

      $output["elapsed"] = array(
                                  "years"   => $sec / (365 * 24 * 60 * 60),
                                  "months"  => $sec / (30 * 24 * 60 * 60),
                                  "weeks"   => $sec / (7 * 24 * 60 * 60),
                                  "days"    => $sec / (24 * 60 * 60),
                                  "hours"   => $sec / (60 * 60),
                                  "minutes" => $sec / 60,
                                  "seconds" => $sec
                                );

      $output["order"] = $val2 < $val1 ? -1 : 1;

      return $output;
    }

    public function getMonthFullName()
    {
      return date('F', $this->time);
    }

    public function getMonthShortName()
    {
      return date('M', $this->time);
    }

    public function getOrdinalDate()
    {
      return date('jS', $this->time);
    }

    public function getTimeZoneName()
    {
      return date('T', $this->time);
    }

    public function getISOWeek()
    {
      return (int)date('W', $this->time);
    }

    public function isDST()
    {
      return date('I', $this->time) == 1 ? TRUE : FALSE;
    }

    public function isWeekDay()
    {
      $w = $this->getDay();
      return ($w > 0 && $w < 6) ? true : FALSE;
    }

    public function toISOString()
    {
      return date('c', $this->time);
    }

    //  returns "friendly" representation of UTC time
    //  see getClockTime() for parameters
    public function getUTCClockTime($twelve = TRUE, $uppercaseAMPM = TRUE,
                                    $includeSeconds = TRUE, $separator = ':')
    {
      $am_pm = "";

      $hours = $this->getUTCHours();
      if($twelve)
      {
        $am_pm = " " . ($hours >= 12 ? "pm" : "am");
        if($uppercaseAMPM)
          $am_pm = strtoupper($am_pm);

        if($hours > 12)
          $hours -= 12;
      }
      else
      {
        if($hours < 10)
          $hours = "0$hours";
      }

      $minutes = $this->getUTCMinutes();
      if($minutes < 10)
        $minutes = "0$minutes";

      $minutes = "$separator$minutes";

      $seconds = "";

      if($includeSeconds)
      {
        $seconds = $this->getUTCSeconds();
        if($seconds < 10)
          $seconds = "0$seconds";

        $seconds = "$separator$seconds";
      }

      return "$hours$minutes$seconds$am_pm";
    }

    //  returns full English name for day of the week (UTC)
    public function getUTCDayFullName()
    {
      return gmdate('l', $this->time);
    }

    //  returns 3-letter abbreviation for day of the week (UTC)
    public function getUTCDayShortName()
    {
      return gmdate('D', $this->time);
    }

    //  returns number of days in month (UTC)
    public function getUTCDaysInMonth()
    {
      return gmdate('t', $this->time);
    }

    //  returns full English name of month (UTC)
    public function getUTCMonthFullName()
    {
      return gmdate('F', $this->time);
    }

    //  returns 3-letter abbreviation for month (UTC)
    public function getUTCMonthShortName()
    {
      return gmdate('M', $this->time);
    }

    //  returns ordinal form for day of the month (UTC)
    public function getUTCOrdinalDate()
    {
      return gmdate('jS', $this->time);
    }

    //  returns time zone name or abbreviation (UTC)
    public function getUTCTimeZoneName()
    {
      return 'UTC';
    }

    //  returns ISO week number (UTC)
    public function getUTCWeek()
    {
      return gmdate('W', $this->time);
    }

    //  returns TRUE/FALSE depending on whether or not day is a weekday (UTC)
    public function isUTCWeekDay()
    {
      $w = $this->getUTCDay();
      return ($w > 0 && $w < 6);
    }

    //  returns ISO representaiton of date (UTC)
    public function toUTCISOString()
    {
      return gmdate('c', $this->time);
    }
  }
?>