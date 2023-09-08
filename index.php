<?php
    require_once('./dbconnect.php');
    require_once('./nav.php');
    if(isset($_POST['submit'])){
        $pnrno=$_POST['pnrno'];
        $trnno=$_POST['trnno'];
        $trnname=$_POST['trnname'];
        $doj=$_POST['doj'];
        $bstn=$_POST['bstn'];
        $dstn=$_POST['dstn'];
        $cls=$_POST['cls'];
        $seat=$_POST['seat'];

        $pass="";
        for($i=1;$i<=$seat;$i++){
            $pass.=$_POST['psng'.$i]." (Age: ".$_POST['age'.$i].")";
            if(($i<$seat) ){
                $pass.=", ";
            }
        }

        $psng_mob=$_POST['psng_mob'];
        $psng_sts=$_POST['psng_sts'];
        $psng_rsn=$_POST['psng_rsn'];
        $psng_add=$_POST['psng_add'];

        $off_name=$_POST['off_name'];
        $off_dsg=$_POST['off_dsg'];
        $off_phn=$_POST['off_phn'];
        $off_off=$_POST['off_off'];
        $off_rel=$_POST['off_rel'];
        $token = bin2hex(random_bytes(15));

        $sql="INSERT INTO passenger SET
                pnr_no='$pnrno',
                train_no='$trnno',
                train_name='$trnname',
                date='$doj',
                from_place='$bstn',
                to_place='$dstn',
                class='$cls',
                berth_no='$seat',
                passenger_name='$pass',
                passenger_mob='$psng_mob',
                social_status='$psng_sts',
                reason='$psng_rsn',
                address='$psng_add',
                officer_name='$off_name',
                officer_desgn='$off_dsg',
                officer_phone='$off_phn',
                office='$off_off',
                relation='$off_rel',
                token='$token'
                ";
        $res=mysqli_query($conn,$sql);
        if($res==true){
            header('location:printform.php?tkn='.$token);

        }
        else{
            echo '<script>alert("form not submitted")</script>';
        }
    }
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="fstyle.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Form</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#bselect').change(function () {
                var num = $(this).val();

                $.ajax({
                    url: 'frmhndl.php',
                    type: 'POST',
                    data: { berthNum: num },
                    success: function (response) {
                        $('#passengerid').html(response);
                    }
                });
            });
        });
    </script>
</head>

<body>
    <div class="navbar">
        
    </div>
    <div class="container">

        <header>Application For Emergency Quota</header>

        <form action="" method="POST">
            <div class="form first">
                <div class="details personal">
                    <span class="title">1.Train Info</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>PNR No<span style="color: red;">*</span></label>
                            <input type="number" length="5" placeholder="Enter Your PNR No" name="pnrno" required>
                        </div>
                        <div class="input-field">
                            <label>Train No<span style="color: red;">*</span></label>
                            <input type="number" placeholder="Enter Your Train No" name="trnno" required>
                        </div>
                        <div class="input-field">
                            <label>Train Name<span style="color: red;">*</span></label>
                            <input type="text" placeholder="Enter Your Train Name" name="trnname" required>
                        </div>
                        <div class="input-field">
                            <label>Date of Journey<span style="color: red;">*</span></label>
                            <input type="date" placeholder="Enter Journey Date" name="doj" required>
                        </div>
                        <div class="input-field">
                            <label>From<span style="color: red;">*</span></label>
                            <input type="text" placeholder="Enter Boarding Station" name="bstn" required>
                        </div>
                        <div class="input-field">
                            <label>To<span style="color: red;">*</span></label>
                            <input type="text" placeholder="Enter Destination Station" name="dstn" required>
                        </div>
                        <div class="input-field">
                            <label>Class<span style="color: red;">*</span></label>
                            <select name="cls" required>
                                <option disabled selected>Select Class</option>
                                <option value="EA">EA-Anubhuti Class</option>
                                <option value="1A">1A-AC First Class</option>
                                <option value="EV">EV-Vistadome AC</option>
                                <option value="EC">EC-Exec. Chair Car</option>
                                <option value="2A">2A-AC 2 Tier</option>
                                <option value="FC">FC-First Class</option>
                                <option value="3A">3A-AC 3 Tier</option>
                                <option value="3E">3E-AC 3 Economy</option>
                                <option value="VC">VC-Vistadome Chair Car</option>
                                <option value="CC">CC-AC Chair car</option>
                                <option value="SL">SL-Sleeper</option>
                                <option value="VS">VS-Vistadome Non AC</option>
                                <option value="2S">2S-Second Sitting</option>
                            </select>
                        </div>
                        <div  class="new-mrgn input-field" >
                            <label>No. of Berth/ Seats<span style="color: red;">*</span></label>
                            <select name="seat" id="bselect" required>
                                <option disabled value="0" selected>Select Berth</option>
                                <option value="01">1 BERTH</option>
                                <option value="02">2 BERTHS</option>
                                <option value="03">3 BERTHS</option>
                                <option value="04">4 BERTHS</option>
                                <option value="05">5 BERTHS</option>
                                <option value="06">6 BERTHS</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="details personal">
                    <span class="title">2.Passenger Info</span>

                    <div class="fields" id="passengerid">
                    </div>
                </div>
                


                    <div class="details ID">
                        <span class="title">3.Additional Info</span>

                        <div class="fields">
                            <div class="input-field">
                                <label>Mobile Number<span style="color: red;">*</span></label>
                                <input type="number" name="psng_mob"
                                 maxlength="10" placeholder="Enter Your Mobile Number" required>
                            </div>
                            <div class="input-field">
                                <label>Social/ Official Status</label>
                                <input name="psng_sts" type="text" placeholder="Enter Your Status" >
                            </div>
                            <div class="input-field">
                                <label>Special Reason for Journey<span style="color: red;">*</span></label>
                                <input name="psng_rsn" type="text" placeholder="Enter Reason Of Journey" required>
                            </div>
                            <div class="input-field">
                                <label>Full Address<span style="color: red;">*</span></label>
                                <textarea name="psng_add" placeholder="Enter Your Adress With Pincode" ></textarea  required>
                            </div>
                        </div>
                    </div>


                    <div class="details family">
                        <span class="title">4.Officer Info</span>

                        <div class="fields">
                            <div class="input-field">
                                <label>Officer Name<span style="color: red;">*</span></label>
                                <input name="off_name" type="text" placeholder="Enter Officer Name" required>
                            </div>
                            <div class="input-field">
                                <label>Designation<span style="color: red;">*</span></label>
                                <input name="off_dsg" type="text" placeholder="Enter Officer Designation" required>
                            </div>
                            <div class="input-field">
                                <label>Phone<span style="color: red;">*</span></label>
                                <input name="off_phn" type="number" placeholder="Enter Officer Phone No." required>
                            </div>
                            <div class="input-field">
                                <label>Office Name</label>
                                <input name="off_off" type="text" placeholder="Enter Ofiice Name" required>
                            </div>
                            <div   class="new-mrgn input-field" >
                                <label>Relation With Officer</label>
                                <input name="off_rel" type="text" placeholder="Enter Relationship(Optional)" >
                            </div>
                        </div>
                    </div>

                        <button class="sumbit" type="submit" name="submit">
                            <span class="btnText">Submit</span>
                            <i class="uil uil-navigator"></i>
                        </button>
            </div>
        </form>
    </div>

    <script src="script.js"></script>
</body>

</html>

