<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $berthNum = $_POST['berthNum'];

  $html = '';

  for ($i = 1; $i <= $berthNum; $i++) {
    $html .= '<div class="fields">
                <div class="input-field">
                    <label>Passenger'.$i.' Name<span style="color: red;">*</span></label>
                    <input style="width:270px" name="psng'.$i.'" type="text" placeholder="Enter Passenger'.$i.' Name" required>
                </div>
                <div class="input-field" style="margin-left:20px;">
                    <label>Passenger'.$i.' Age<span style="color: red;">*</span></label>
                    <input style="width:270px" name="age'.$i.'" type="text" placeholder="Enter Passenger'.$i.' Age" required>
                </div>
                
              </div>';
  }
  echo $html;
}
