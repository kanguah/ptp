<?php
 session_start();
 
 $server="localhost";
 $user="root";
 $pass=$verify=$Payto=$Payby="";
 
 $conn=mysql_connect($server,$user,$pass);
 
 if(!$conn){
 die("not successful".mysql_error());
 }
 mysql_select_db("members");
 $uname=$_SESSION["name"];
 $sql="SELECT Verification, Payup, AfterPledge, Final_date, Received, IsConfirmed, Given,Junior,Senior,Peer, Received, Credit, Principal, Interest, Payto, Payby, IsPaired, Rank, Different FROM su WHERE Username='$uname' LIMIT 1";
 $db_conn=mysql_query($sql,$conn);
 while($row = mysql_fetch_array($db_conn, MYSQL_ASSOC)){
 $verify=$row['Verification'];
 $IsConfirmed=$row['IsConfirmed'];
 $Credit=$row['Credit'];
 $AfterPledge=$row['AfterPledge'];
 $Principal=$row['Principal'];
 $Rank=$row['Rank'];
 $Different=$row['Different'];
 $IsPaired=$row['IsPaired'];
 $Given=$row['Given'];
 $Junior=$row['Junior'];
 $Peer=$row['Peer'];
 $Senior=$row['Senior'];
 $Payby=$row['Payby'];
 $payup=$row['Payup'];
 $Payto=$row['Payto'];
 $interest=$row['Interest'];
 $Received=$row['Received'];
 $finaldate=$row['Final_date'];
/*
 if($IsPaired){
 	
 		if(strcmp($row['Payto'],"NULL")==0)
 		{
 			$Payby=$row['Payby'];
 			$Payto="none";
 			}
 		if($row['Payby']=="NULL"){
 			$Payto=$row['Payto'];
 			$Payby="none";
 		}
 		
 		
 	}
 	*/
 }

 mysql_free_result($db_conn);
 if($Payby=='none'){
 	$IsReceived=FALSE;
 if($Junior!='none' or $Senior!='none' or $Peer!='none'){
 if($Junior!='none')
 {
 	$Payby=$Junior;
 	$Junior='none';
 	echo "In that shit".$Payby;
 }else if($Senior!='none')
 {
 	$Payby=$Senior;
 	$Senior='none';
 }else if($Peer!='none'){
 	$Payby=$Peer;
 	$Peer='none';
 }
 else{
 	$IsReceived=TRUE;
 }
 	if($Payby!='none'){
 		
 		$sql="UPDATE su SET Payby='$Payby',Junior='$Junior', Senior='$Senior', Peer='$Peer', IsReceived='$IsReceived' WHERE Username='$uname'";
 		$db_conn=mysql_query($sql,$conn);
 		
 	}
 }
 }
 mysql_close($conn);
 
 ?>
 
 
  
<!doctype html>
<html lang="en">
	<head>
        <title>RankingBoss-Make yourself the Boss</title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        <!-- Main CSS --> 
        <link rel="stylesheet" href="css/style.css">
        <!-- Font Awesome -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <style type="text/css">
    .row img{
    width:50px;
    }
    
    td{
    padding:10px;
    border:1px dotted black;
    }
    
    table{
    font-size:15px;
    margin-bottom:30px;
    margin-top:30px;
    width:100%;
    
    }
    canvas{
    width:90%;
    margin:0 auto;
    }
    
    button{
    
    border: none;
    color: white;
    padding: 7px 15px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 4px;
    cursor: pointer;
    box-shadow:2px 2px 2px grey;
    }
    
    
    #paid{
    background-color:#9999cc;
    float:left;
    }
    #rcv{
    background-color:#cccc99;
    float:right;
    }
    #game{
    background-color:aqua;
    padding:10px;
    }
    iframe{
    margin:0px auto;
    }
    </style>
    <script>
    
    var bool="<?php echo $IsConfirmed; ?>";
    var verify="<?php echo $verify; ?>";
   
    alert(bool);
    if(bool==0){
    for(i=0;i<1000;i++){
    alert(verify);
    var v=prompt("Enter verification code below to continue");
    if(verify==v){
   	
    	break;
    }
    else if(v==null){
    
    window.location.href="logout.php";
    break;
    }
   }
}
    
    </script>
    </head>
  
    <body>
        <!-- Main navigation -->
        <div id="sidebar" style="background-image: url('side_menu.jpg');">
                      
            <div class="navbar-expand-md navbar-dark"> 
            
                <header class="d-none d-md-block">
                    <h1><span>Ranking</span>Boss</h1>
                </header>
                
                
                <!-- Mobile menu toggle and header -->
                <div class="mobile-header-controls">
                    <a class="navbar-brand d-md-none d-lg-none d-xl-none" href="#"><span>Ranking</span>Boss</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#SidebarContent" aria-controls="SidebarContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
         
                <div id="SidebarContent" class="collapse flex-column navbar-collapse">
 
                        
                    
                    <!-- Main navigation items -->
                    <nav class="navbar navbar-dark">
                        <div id="mainNavbar">
                            <ul class="flex-column mr-auto">
                                <li class="nav-item">
                                <a class="nav-link active" href="#">Dashboard <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                <a class="nav-link" href="trans.php">Transactions</a>
                                </li>
                                
                                <li class="nav-item">
                                <a class="nav-link" href="give.php">Donate</a>
                                </li>
                            
                                
                                <li class="nav-item">
                                <a class="nav-link" href="index_forum.php">Forum</a>
                                </li>               
                                
                                <li class="nav-item">
                                <a class="nav-link" href="user_contact.html">Contact</a>
                                </li>

								<li class="nav-item">
								<a class="nav-link" href="logout.php">Logout</a>
								</li>
                            </ul>
                        </div>   
                    </nav>
                
              
          
                    <!-- Social icons -->
                    <p class="sidebar-social-icons social-icons">
                        <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
                        <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
                        </p>
                
                </div>
            </div> 
        </div>
        
        <div id="content">
            <div id="content-wrapper">

                <!-- Jumbtron / Slider -->
                <div class="jumbotron-wrap">
                    <div class="container-fluid">
                        <div id="mainCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="jumbotron" style="background-image: url('head_back.jpg'); background-repeat: no-repeat;background-size: cover; color: #fff;">
                                        <h1 class="text-center" style="opacity: .8;"> The Principle Is Easy</h1>
                                        <p class="lead text-center">You wanna <span style="font-weight: bold;font-style: italic; color: #e11; opacity: .9; font-size: 20px;" >BE RICH</span> ? Then be <span style="font-weight: bold;font-style: italic;font-family: 'Gothic','Arial'; color: #e11; opacity: .9;" >A GIVER</span></p>
                                        <p class="lead text-center">
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content area -->
                <main class="container-fluid" style="background-image:url('https://im-01.gifer.com/3BBK.gif');"
                >
                 <strong><p id="demo" style="float:right;"></p></strong>
                    <div class="row" >

                        <!-- Main content -->
                        <div class="col-md-8">
          
                        <div>
                       
                        <div style="border-radius:2px; opacity:.5; padding:10px 15px; background-color:#FF9900; color:blue; font-size:15px; float:right; ">
                        <b><em>SEEDS:<?php echo $Credit; ?></em></b><br>
                        <b align="center"><em>Rank:<?php echo $Rank; ?></em></b>
                        </div>
                        <div>
                        <p style="font-size:11px; font-family:monospace; margin-bottom:100px;">
                        
                        <?php
                        
                        
                        if($IsConfirmed==0){
                        $server="localhost";
                        $user="root";
                        $pass="";
                        
                        $conn=mysql_connect($server,$user,$pass);
                        
                        if(!$conn){
                        die("not successful".mysql_error());
                        }
                        mysql_select_db("members");
                        $uname=$_SESSION["name"];
                        
                        echo $IsConfirmed;
                        $sql="UPDATE su SET IsConfirmed=TRUE WHERE Username='$uname'";
                        $db_conn=mysql_query($sql,$conn);
                        
                        
                        mysql_close($conn);
                        }
                        ?>
                         <?php
                         
                         echo "Welcome " . $_SESSION["name"] . ",<br />";
                          ?>
                         <p/>
                         
                         <p id="growth"></p>
 
                         </div>
                         </div>
                         <p style="font-size:18px; text-align:center; margin-top:20px;"><b>The Square of Wealth</b></p>
                         <hr style="width:270px">
                         <br>
                         <canvas id="myCanvas" width="200" height="200"
                         >
                         does not support canvas
                         </canvas>
                         
                         <div>
                         <br>
                         
                         <button id="paid" type="button">Paid</button>
                         <button class="opt" id="match" >Match</button>
                         <button class="opt" id="seed">Get Seeds</button>
                         <button id="rcv">Received</button>
                         
                         </div>
                         <br>
                         <hr>
                         <table>
                         
                        <tr>
                        <br>
                         <td><b>Key</b></td>
                         <td><b>Description</b></td>
                         <td><b>Value</b></td>
                        </tr>
                         
                         <tbody>
                         <tr>
                         <td bgcolor="#9999cc"> </td>
                         <td>You the user</td>
                         <td><?php echo "GHS".($Principal+$Received); ?></td>
                         </tr>
                         <tr>
                         <td bgcolor="#ffffcc"></td>
                         <td>The beneficiary</td>
                         <td><?php echo "GHS".$AfterPledge; ?></td>
                         </tr>
                         <tr>
                         <td bgcolor="#99cc99"></td>
                         <td>Your Interest</td>
                         <td><?php echo "GHS".intval($Different); ?></td>
                         </tr>
                         <tr>
                         <td bgcolor="#cccc99"></td>
                         <td>Your benefactor</td>
                         <td><?php echo "GHS".$interest; ?></td>
                         </tr>
                         </tbody>
                         </table>
                         
                        <div>
                        <h1 id="game" style="padding:20px; color:olive;">Kill your stress with the famous game 2048 below</h1>
                        <iframe src="/master" width="330" height="450" noresize="noresize" scrolling="no" frameborder="0">
                        
                        Sorry your browser does not support inline frames.
                        
                        </iframe>
                        
                        </div>
                        <br>
						</div>
						
                        <!-- Sidebar -->
                        <aside class="col-md-4">

                            <div class="sidebar-box sidebar-box-bg" style="font-family: monospace;">
                                <h4>About us</h4>
                                <p><b style="font-size: 20px; color: #a00; font-weight: bolder;">RankingBoss</b> is a non-governmental organisation that seeks to close the gap
                                 between the rich and poor and help people to become more financially sound even in these harsh economic times.</p>
                                 <p>The name "<b style="font-size: 20px; font-style: italic; color: #a00; font-weight: bolder;">RankingBoss</b>" was to highlight on the algorithms at work such that those with lesser principals come together to provide income for those with higher principals although in the end both parties benefit which is similar to what happens in real life. Hence <em style="background-color: rgba(240,240,0,.4); color: #00b; padding: 4px; font-family: 'helvetica'; font-weight: bold;">BECOME A BOSS BY CHOOSING YOUR RANK!!</em>.</p>    
                            </div>
                        </aside> 


                    </div> 
                </main>

        

                <!-- Footer -->
                <div class="container-fluid footer-container">
                    <footer class="footer">
                        <div class="footer-lists">
                            <div class="row" style="color:blue;">
                            <div class="col-sm">
                            <ul>
                            <li><img src="user1.png"></li>
                            <li>Name: User_1</li>
                            <li>Initial: GHS100</li>
                            <li>Final: GHS180</li>
                            <li>ROI: 80%;
                            <li>Rank: 5</li>
                            <li><br></li>
                            
                            </ul>
                            </div>
                            <div class="col-sm">
                            <ul>
                            <li><img src="user2.jpeg"></li>
                            <li>Name: User_2</li>
                            <li>Initial: GHS400</li>
                            <li>Final: GHS630</li>
                            <li>ROI: 57.5%;</li>
                            <li>Rank: 2</li>
                            <li><br></li>
                            
                            
                            </ul>
                            </div>   
                            <div class="col-sm">
                            <ul>
                            <li><img src="user3.png"></li>
                            <li>Name: User_3</li>
                            <li>Initial: GHS500</li>
                            <li>Final: GHS810</li>
                            <li>ROI: 62%;
                            <li>Rank: 1</li>
                            <li><br></li>
                            
                            
                            </ul>
                            </div>
                                 </div>
                        </div>

                        <div class="footer-bottom">
                                <p class="text-center">&copy RankingBoss 2018</p>
                                <p class="text-center"><a href="#">Back to top</a></p>
                        </div>
                    </footer>
                </div> 
            </div>
        </div>
<script type="text/javascript">
						var countDownDate;
						var payup="<?php echo $payup; ?>";
						if(payup!=null){
							countDownDate=new Date(payup).getTime();
						}
						else
							countDownDate = new Date("<?php echo $finaldate; ?>").getTime();
						alert(countDownDate);
						if(countDownDate){
						var x = setInterval(function() {
						
						
						var now = new Date().getTime();
						
						
						var distance = countDownDate - now;
						
						
						var days = Math.floor(distance / (1000 * 60 * 60 * 24));
						var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
						var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
						var seconds = Math.floor((distance % (1000 * 60)) / 1000);
						
						if(countDownDate==payup){
							document.getElementById("demo").innerHTML = "Pay up within: "+days + "d " + hours + "h "
							+ minutes + "m " + seconds + "s ";
						}
						else{
							document.getElementById("demo").innerHTML = "Receive Benefits in: "+days + "d " + hours + "h "
							+ minutes + "m " + seconds + "s ";
						}
						
						if (distance < 0) {
						clearInterval(x);
						document.getElementById("demo").innerHTML = "ENJOY THE BENEFITS, YOU ARE THE BOSS";
						}
						}
						, 1000);
						}
						
                         var canvas=document.getElementById("myCanvas");
                         var ctx=canvas.getContext("2d");
                         
                         var x=canvas.width;
                         var y=canvas.height;
                         
                         ctx.fillStyle="#9999cc";
                         ctx.beginPath();
                         ctx.arc(40,40,35,0,2*Math.PI);
                         ctx.fill();
                         
                         ctx.fillStyle="#ffffff";
                         ctx.font = "12px Arial";
                         ctx.fillText("You",25,45);
                         
                         ctx.moveTo(75,40);
                         ctx.lineTo(x-70,40);
                         ctx.stroke();
                         
                         ctx.fillStyle="#ffffcc";
                         ctx.beginPath();
                         ctx.arc(x-40,40,35,0,2*Math.PI);
                         ctx.fill();
                         
                         ctx.fillStyle="brown";
                         ctx.font = "12px Arial";
                         ctx.fillText('<?php echo "$Payto"; ?>',x-55,45);
                         
                         ctx.moveTo(x-40,75);
                         ctx.lineTo(x-40,y-70);
                         ctx.stroke();
                         
                         ctx.fillStyle="#cccc99";
                         ctx.beginPath();
                         ctx.arc(40,y-40,35,0,2*Math.PI);
                         ctx.fill();
                         
                         ctx.fillStyle="#ffffff";
                         ctx.font = "12px Arial";
                         ctx.fillText('<?php echo "$Payby"; ?>',15,y-35);
                         
                         ctx.moveTo(x-70,y-40);
                         ctx.lineTo(75,y-40);
                         ctx.stroke();
                         
                         ctx.fillStyle="#99cc99";
                         ctx.beginPath();
                         ctx.arc(x-40,y-40,35,0,2*Math.PI);
                         ctx.fill();
                         
                         ctx.fillStyle="yellow";
                         ctx.font = "12px Arial";
                         ctx.fillText("You",x-55,y-35);
                         
                         ctx.moveTo(40,75);
                         ctx.lineTo(40,y-75);
                         ctx.stroke();
                         
                   
                         
                         (function() {
                         var httpRequest;
                         document.getElementById("paid").addEventListener('click', makeRequest);
                         
                         function makeRequest() {
                         httpRequest = new XMLHttpRequest();
                         
                         if (!httpRequest) {
                         alert('Giving up :( Cannot create an XMLHTTP instance');
                         return false;
                         }
                         httpRequest.onreadystatechange = alertContents;
                         httpRequest.open("POST", "paid.php",true);
                         
                         httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                         httpRequest.send('payto=' + encodeURIComponent('<?php echo $Payto; ?>'));
                         
                        
                         }
                         
                         function alertContents() {
                         if (httpRequest.readyState === XMLHttpRequest.DONE) {
                         if (httpRequest.status === 200) {
                         alert(httpRequest.responseText);
                         var rcv=httpRequest.responseText;
                         if(rcv==0){
                         alert(0);
                         	var xmlhttp = new XMLHttpRequest();
                         	xmlhttp.onreadystatechange = function() {
                         	if (this.readyState == 4 && this.status == 200) {
                         	alert(xmlhttp.responseText);
                         	}
                         	};
                         	xmlhttp.open("POST", "afterpay.php", true);
                         	xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                         	xmlhttp.send('user=' + encodeURIComponent("<?php echo $_SESSION['name']; ?>"));
                         	
                         }
                         else{
                         	alert("The user has not confirmed");
                         }
                         } else {
                         alert('There was a problem with the request.');
                         }
                         }
                         }
                         })();
                         
                         (function() {
                         var httpRequest;
                         document.getElementById("rcv").addEventListener('click', makeRequest);
                         
                         function makeRequest() {
                         httpRequest = new XMLHttpRequest();
                         
                         if (!httpRequest) {
                         alert('Giving up :( Cannot create an XMLHTTP instance');
                         return false;
                         }
                         httpRequest.onreadystatechange = alertContents;
                         httpRequest.open("POST", "afterrcv.php",true);
                         
                         httpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                         httpRequest.send('payby=' + encodeURIComponent("<?php echo $Payby; ?>"));
                         
                         
                         }
                         
                         function alertContents() {
                         if (httpRequest.readyState === XMLHttpRequest.DONE) {
                         if (httpRequest.status === 200) {
                         alert(httpRequest.responseText);
           
                         }
                         else{
                         alert("The user has not confirmed");
                         }
                         } else {
                         alert('There was a problem with the request.');
                         }
                         }
                         }
                         )();
                         
                         (function () {
                         var hRequest;
                         document.getElementById("match").addEventListener('click', makeRequest);
                         
                         function makeRequest() {
                         hRequest = new XMLHttpRequest();
                         
                         if (!hRequest) {
                         alert('Giving up :( Cannot create an XMLHTTP instance');
                         return false;
                         }
                         hRequest.onreadystatechange = alertContents;
                         hRequest.open("GET", "match.php");
                         
                         hRequest.send();
                         }
                         
                         function alertContents() {
                         if (hRequest.readyState === XMLHttpRequest.DONE) {
                         if (hRequest.status === 200) {
                         alert(hRequest.responseText);
                         
                         }
  						}
                         else {
                         alert('There was a problem with the request.');
                         }
                       
                         }
                         })();
                         
                         (function () {
                         var hRequest;
                         document.getElementById("seed").addEventListener('click', makeRequest);
                         
                         function makeRequest() {
                         hRequest = new XMLHttpRequest();
                         
                         if (!hRequest) {
                         alert('Giving up :( Cannot create an XMLHTTP instance');
                         return false;
                         }
                         hRequest.onreadystatechange = alertContents;
                         hRequest.open("GET", "getseed.php");
                         
                         hRequest.send();
                         }
                         
                         function alertContents() {
                         if (hRequest.readyState === XMLHttpRequest.DONE) {
                         if (hRequest.status === 200) {
                         alert(hRequest.responseText);
                         
                         }
                         }
                         else {
                         alert('There was a problem with the request.');
                         }
                         
                         }
                         })();
    					 
    					 
    					 
                         </script>
        <!-- Bootcamp JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

    </body>
</html>