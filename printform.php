<!DOCTYPE html>
<html>
<head>
  <title>Print form </title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="./style.css">
  
</head>
<body >
<section class="sheet">
    <div class="container ">
        <div class="header">
          <div>Diary NO : </div>
          <div>Date : </div>
        </div>
        <div class="content">
          <div class="title" style="font-family: 'Times New Roman', Times, serif;">
            <p>East Coast Railways</p>
            <p>Application For Emergency Quota</p>
            <p>(Recommended by Railway Officials)</p>
        </div>
          <div>
            <div class="to-label">To</div>
          </div>
        </div>
        <div class="table-container">
          <div class="row">
            <div class="col">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" style="width: 70px;height: 15px;text-align: center;">SL NO</th>
                    <th scope="col" style="text-align: center;">PARTICULARS OF PASSENGERS</th>
                  </tr>
                </thead>
                <?php
                 //  error_reporting(E_ERROR | E_PARSE);
      include "./dbconnect.php";
      
    
      if(isset($_GET['tkn'])){
        $token = $_GET['tkn'];
      }
      $sql="SELECT * from passenger WHERE token='$token' ";
      $result=$conn-> query($sql);
      
      if ($result-> num_rows ){
        while ($row=$result-> fetch_assoc()) {
                ?>
                <tbody>
                    <tr>
                        <td class="sl-no">1</td>
                        <td colspan="1">
                          <div class="row">
                            <div class="col-7">PNR NO</div>
                            <div class="col"><?=$row["pnr_no"]?></div>
                          </div>
                        </td>
                      </tr>
                  <tr>
                    <td class="sl-no">2</td>
                    <td colspan="2">
                      <div class="row">
                        <div class="col-7">TRAIN NO/ NAME</div>
                        <div class="col"><?=$row["train_no"];?> - <?=$row["train_name"]?></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="sl-no">3</td>
                    <td colspan="3">
                      <div class="row">
                        <div class="col-7">DATE OF JOURNEY</div>
                        <div class="col"><?php
                              $datw=strtotime($row["date"]);
                              echo date("d-m-Y", $datw);
                        ?></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="sl-no">4</td>
                    <td colspan="4">
                      <div class="row">
                        <div class="col-7">FROM - TO</div>
                        <div class="col"><?=$row["from_place"]?> - <?=$row["to_place"]?></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="sl-no">5</td>
                    <td colspan="5">
                      <div class="row">
                        <div class="col-7">CLASS & NO OF BERTH/ SEAT</div>
                        <div class="col"><?=$row["class"]?> , <?=$row["berth_no"]?><?php if($row["berth_no"]==1){echo " BERTH";}else{echo " BERTHS";} ?></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="sl-no">6</td>
                    <td colspan="6">
                      <div class="row">
                        <div class="col-7" style="height: 80px;">NAME OF PASSENGER(S)</div>
                        <div class="col"><?=$row["passenger_name"]?></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="sl-no">7</td>
                    <td colspan="2">
                      <div class="row">
                        <div class="col-7">SOCIAL/OFFICIAL STATUS OF THE PASSENGERS</div>
                        <div class="col"><?=$row["social_status"]?></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="sl-no">8</td>
                    <td colspan="8">
                      <div class="row">
                        <div class="col-7" style="height: 100px; font-size:18px;">ADDRESS OF PASSENGER</div>
                        <div class="col" style="height: 100px; font-size:20px;"><?=$row["address"]?></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="sl-no">9</td>
                    <td colspan="9">
                      <div class="row">
                        <div class="col-7">PHONE NO/CELL NO </div>
                        <div class="col"><?=$row["passenger_mob"]?></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="sl-no">10</td>
                    <td colspan="10">
                      <div class="row">
                        <div class="col-7" style="height: 60px;">SPECIAL REASON / PURPOSE OF JOURNEY</div>
                        <div class="col"><?=$row["reason"]?></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="sl-no">11</td>
                    <td colspan="11">
                      <div class="row">
                        <div class="col-7" style="height: 80px; padding-right: 15%; ">REQUEST RECEIVED FROM(NAME, DESIGNATION, PHONE NO) RELATION WITH PASSENGER,IF ANY</div>
                        <div class="col"><?=nl2br($row["officer_name"]."\n".$row["officer_desgn"]."\n".$row["officer_phone"]."\n".$row["relation"]);?></div>
                      </div>
                    </td>
                  </tr>
                   
                </tbody>
                
              </table>
            </div>
          </div>
          <div class="info">
            <p style="margin: 0;">
                I, certify  that  I  am  fully  aware  of  the  entitlement  regarding  allotment  of  accommodation  through  Emergency  Quota  and I  certify the  eligibility and  attest the  identity of the  passengers for  allotment of  accommodation  from  Emergency  Quota. I hereby, undertake  full responsibility  of passengers  credentials for whom  I am  recommending for  allotment of  Berth(s).
            </p>
          </div>
        </div>
      </div>
    
      <div class="container">
        <div class="table-container">
          <div class="row">
            <div class="col">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" style="width: 70px;height: 15px;text-align: center;font-size: 20px;">SL NO</th>
                    <th scope="col" style="text-align: LEFT;font-size: 20px; padding-left: 5px;">PARTICULARS OF RECOMENDING RAILWAY OFFICIAL</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="sl-no">1</td>
                        <td colspan="1">
                          <div class="row">
                            <div class="col-3" >NAME</div>
                            <div class="col"><?=$row["officer_name"]?></div>
                          </div>
                        </td>
                      </tr>
                  <tr>
                    <td class="sl-no">2</td>
                    <td colspan="2">
                      <div class="row">
                        <div class="col-3" >DESIGNATION</div>
                        <div class="col"><?=$row["officer_desgn"]?></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="sl-no">3</td>
                    <td colspan="3">
                      <div class="row">
                        <div class="col-3" >OFFICE</div>
                        <div class="col"><?=$row["office"]?></div>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="sl-no">4</td>
                    <td colspan="4">
                      <div class="row">
                        <div class="col-3" >PHONE NO</div>
                        <div class="col"><?=$row["officer_phone"]?></div>
                      </div>
                    </td>
                  </tr>
               
                  
                </tbody>
        <?php } }?>
              </table>
            </div>
          </div>
          <div class="blank">
          <p class="sign">
            Signature with Stamp
          </p>
          </div>
        </div>
      </div>
</section>



  <!-- Include Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script>
    // Print the page as PDF
    function printAsPDF() {
      window.print();
    }
  </script>
  <!-- Add a button to trigger printing as PDF -->
  <div style="display:flex; flex-direction:row;">
  <a href="./index.php" style="margin-left: 35%;"> <button  class="print-button text-center btn btn-success">🏠Home</button></a>
  <button  onclick="printAsPDF()" class="print-button text-center btn btn-success">Print as PDF</button>
  </div>
</body>
</html> 