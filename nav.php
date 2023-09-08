<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Quota Ticketing System</title>

    <style>
        *,*:before,*:after {
	box-sizing: border-box;
}

:after {
	content: "";
}

section {
  position: relative;
  left: 50px;
}

h1 { 
  margin:80px 0 10px 0;
  font-size: 52px;
  font-family: 'Montserrat', sans-serif;
  text-transform: uppercase;
 
}

h2 {
  font-size: 24px;
}

body {
  color: white;
 
	font-family: 'Montserrat', sans-serif;
	font-size: 14px;
  line-height:1.4;
  border: radius 5px; ;
  font-smooth: anti-aliases;
}

nav {
  float: left;
	position: relative;
	top: 0;
  left: 0;
	background: transparent;
}

nav ul {
	text-align: center;
}

nav ul li {
	position: relative;
  width: 100px;
  cursor: pointer;
	background: #00296b ;
	text-transform: uppercase;
	transition:all .4s ease-out;
}

.text{
    text-decoration: none;
    color: white;
    /* width:fit-content; */
    padding-top: 50px;
    
}








nav ul li > div {
	display: inline-block;
	padding: 25px 0;
	background: transparent;
}

nav ul li div { position: relative; }




/*/// Reprint Application ////*/

.head {
	width: 32px;
	height: 35px;
}

    </style>
</head>
<body>
    <nav>
        <ul>
          <li>
            <div >
                <a href="index.php" style="text-decoration: none;"> <img src="application.svg"  class="head" > <span class="text">Application Form</span></a>
            
            </div>
          </li>
          <li>
            <div class="about-icon">
               <a href="check.php"  style="text-decoration: none;"> <img src="printer.svg" class="head" alt=""> <span class="text">Application Reprint</span></a>
              
            </div>
          </li>
        </ul>
      </nav>
</body>
</html>