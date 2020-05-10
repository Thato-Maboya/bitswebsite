<?php
$data = array(
    'token' => '60A3D69D389B0F9BAD605C48AA200417',
    'content' => 'record',
    'format' => 'json',
    'type' => 'flat',
    'csvDelimiter' => '',
    'fields' => array('previous_current_position'),
    'rawOrLabel' => 'raw',
    'rawOrLabelHeaders' => 'raw',
    'exportCheckboxLabel' => 'false',
    'exportSurveyFields' => 'false',
    'exportDataAccessGroups' => 'false',
    'returnFormat' => 'json',
    'filterLogic' => ''
);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://redcap.core.wits.ac.za/redcap/api/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_AUTOREFERER, true);
curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));
$output = curl_exec($ch);
print $output;
curl_close($ch);
