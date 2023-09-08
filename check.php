<?php
    require_once('./dbconnect.php');
    require_once('./nav.php');
    if(isset($_POST['submit'])){
        $pnrno=$_POST['pnrno'];
        $doj=$_POST['doj'];
    
        $sql="SELECT * from passenger WHERE pnr_no='$pnrno' AND date='$doj'";
        
       
       
        $result=$conn-> query($sql);
      
      if ($result-> num_rows ){
        while ($row=$result-> fetch_assoc()) {

                $token=$row["token"];
                header('location:printform.php?tkn='.$token);  
              }
        }
        else{
            echo '<script>alert("Can not Found Details")</script>';
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="fstyle.css">
</head>
<body>
    
        <div class="container" style="width:800px;height:400px;">
            <header>Reprint your Application form</header>
    
            <form action="" method="POST" style="height:auto;" >
                <div class="form first" style="position:relative;">
                    <div class="details personal">
                        <span class="title">Check Info</span>
                        <div class="fields"  style="padding-left:25%;">
                            <div class="input-field" style="min-width:360px;">
                                <label>PNR No<span style="color: red;">*</span></label>
                                <input type="number" length="5" placeholder="Enter Your PNR No" name="pnrno" required>
                            </div>  
                        </div>
                        <div class="fields" style="padding-left:25%;">
                        <div class="input-field" style="min-width:360px;">
                                <label>Date of Journey<span style="color: red;">*</span></label>
                                <input type="date" placeholder="Enter Journey Date" name="doj" required>
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