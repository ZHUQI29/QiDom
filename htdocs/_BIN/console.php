<?php
  error_reporting(-1); // activate ALL errors
  ini_set('display_errors', 'On'); // display ALL errors

  function console_log($output, $with_script_tags = true) {
      $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
  ');';
      if ($with_script_tags) {
          $js_code = '<script>' . $js_code . '</script>';
      }
      echo $js_code;
  }
?>
<style media="screen">
  .banner { display: none } body { background: lightgrey;}
</style>
