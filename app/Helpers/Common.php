<?php

  function timezoneSelect( $oldTimezone = NULL )
  {
    $timezone = array(
  		"Eastern" => "America/New_York"
  		,"Central" => "America/Chicago"
  		,"Mountain" => "America/Denver"
  		,"Mountain no DST" => "America/Phoenix"
  		,"Pacific" => "America/Los_Angeles"
  		,"Alaska" => "America/Anchorage"
  		,"Hawaii" => "America/Adak"
  		,"Hawaii no DST" => "Pacific/Honolulu"
  		);

$html = <<<HTML
    <select name="timezone" class="form-control">
HTML;

    foreach($timezone as $k => $v){
      $selected = ($v == @$oldTimezone) ? " SELECTED" : NULL;
$html .= <<<HTML
      <option value="{$v}"{$selected}>{$k}</option>
HTML;
    }

$html .= <<<HTML
    </select>
HTML;
    return $html;
  }


  function siteErrors( $errors )
  {
      if(empty($errors))
        return;

$html = <<<HTML
      <div id="siteErrors"><table align="center">
HTML;

      foreach($errors as $k => $v){
$html .= <<<HTML
      			<tr><td>{$v}</td></tr>
HTML;
      }

$html .= <<<HTML
        </table></div>
HTML;

      return $html;
  }
