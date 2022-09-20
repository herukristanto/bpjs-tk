<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * An utility function to convert date and time
 * Create by Candra Aknes Nugroho
 * @param string $date
 * @param string $to
 * @param null $from
 * @param null $diff
 * @return string
 * @throws Exception
 */

function convert_datetime($date = '', $to = 'system_date', $from = null, $diff = null)
{
  $format = [
    'user_date' => ['d-m-Y', '/^\d{2}\-\d{2}\-\d{4}$/'],
    'user_datetime_long' => ['d-m-Y H:i:s', '/^\d{2}\-\d{2}\-\d{4} \d{2}\:\d{2}\:\d{2}$/'],
    'user_datetime_partial' => ['d-m-Y H:i', '/^\d{2}\-\d{2}\-\d{4} \d{2}\:\d{2}$/'],
    'system_date' => ['Y-m-d', '/^\d{4}\-\d{2}\-\d{2}$/'],
    'system_date_sybase' => ['m/d/Y', '/^\d{2}\/\d{2}\/\d{4}$/'],
    'system_datetime' => ['Y-m-d H:i:s', '/^\d{4}\-\d{2}\-\d{2} \d{2}\:\d{2}\:\d{2}$/'],
    'system_datetime_sybase' => ['m/d/Y H:i:s', '/^\d{2}\/\d{2}\/\d{4} \d{2}\:\d{2}\:\d{2}((\:|\.)\d{0,3}\w{0,2})?$/'],
    'hour_minute_second' => ['H:i:s', '/^\d{2}\:\d{2}\:\d{2}((\:|\.)\d{0,3}\w{0,2})?$/'],
    'hour_minute' => ['H:i', '/^\d{2}\:\d{2}?$/'],
    //'system_datetime_sybase_long' => array('M j Y g:i:s:vA', '/^[A-Za-z]{3} \d{1,2} \d{4} \d{1,2}\:\d{1,2}\:\d{1,2}:\d{3}$/'),
  ];

  if (empty($date))
    return '';
  
  $from_format = '';
  
  if (empty($from)) {
    foreach ($format as $key => $row) {
      if (preg_match($row[1], $date)) {
        $from_format = $key;
      }
    }
  } else {
    $from_format = $from;
  }
  
  $to_format = $to;
  
  $originalDate = DateTime::createFromFormat($format[$from_format][0], $date);
  
  $newDate = $originalDate;
  
  if (isset($diff)) {
    if (preg_match('/^\-[A-Za-z0-9]*$/', $diff)) {
      $diff = substr($diff, 1);
      $newDate->sub(new DateInterval($diff));
    } else {
      $newDate->add(new DateInterval($diff));
    }
  }
  
  $retval = $newDate->format($format[$to_format][0]);
  
  return $retval;
}