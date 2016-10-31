<?php

// Environment conditionals.
function is_development() { return strpos($_SERVER['HTTP_HOST'], DEVELOPMENT_HOST) !== false ? true : false; }
function is_staging()     { return strpos($_SERVER['HTTP_HOST'], STAGING_HOST)     !== false ? true : false; }
function is_production()  { return strpos($_SERVER['HTTP_HOST'], PRODUCTION_HOST)  !== false ? true : false; }

// Debug messages.
function debug_return($message, $prefix = 'DEBUG:') {
  return '
    <div style="font-family: Helvetica Neue; font-size: 16px; margin: 1em 0; padding: .5em .6em; background: lightyellow; border: 2px solid orange; border-radius: 5px">
      <strong style="color: darkorange;">' . $prefix . '</strong>&nbsp;
      ' . $message . '
    </div>
  ';
}

function debug($message, $prefix = 'DEBUG:') {
  echo debug_return($message, $prefix);
}

// Warn the user.
function warn($message, $prefix = 'WARNING:') {
  return debug($message, $prefix);
}

?>
