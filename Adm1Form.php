<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> TNVS SIDEBAR MENU </title>
    <link rel="stylesheet" href="fontawsome/css/all.min.css">
    <link rel="stylesheet" href="fontawsome/css/fontawesome.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <img src="BSIT 2206.png" alt="">
        <div class="logo_name">2206 TNVS</div>
        <i class='fas fa-bars' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <li>
        <i class='fas fa-search' ></i>
        <input type="text" placeholder="Search...">
            <span class="tooltip">Search</span>
      </li>
      <li>
        <a href="Admin.php">
          <i class='fas fa-qrcode'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="AdM1.php">
         <i class='fas fa-user' ></i>
         <span class="links_name">Module1</span>
       </a>
       <span class="tooltip">Module1</span>
     </li>
     <li>
       <a href="#">
         <i class='fa-brands fa-rocketchat' ></i>
         <span class="links_name">Module2</span>
       </a>
       <span class="tooltip">Module2</span>
     </li>
     <li>
       <a href="#">
         <i class='fas fa-book' ></i>
         <span class="links_name">Module3</span>
       </a>
       <span class="tooltip">Module3</span>
     </li>
     <li>
       <a href="#">
         <i class='fas fa-folder' ></i>
         <span class="links_name">Module4</span>
       </a>
       <span class="tooltip">Module4</span>
     </li>
     <li>
       <a href="#">
         <i class='fas fa-cart-shopping' ></i>
         <span class="links_name">Module5</span>
       </a>
       <span class="tooltip">Module5</span>
     </li>
     <li class="profile">
         <div class="profile-details">
           <img src="profile.jpg" alt="profileImg">
           <div class="name_job">
             <div class="name">Celherson</div>
             <div class="email">pritonghotdog@gmail.com</div>
           </div>
         </div>
         <i class='fas fa-right-from-bracket' id="log_out" ></i>
     </li>
    </ul>
  </div>
  <section class="home-section">
 
      <div class="text">Dashboard</div>
     <div class="fill">
        <form action="process_form.php" method="post">
            <h2>Register</h2>
            <div class="content">
                <div class="fillup-box">
                    <label for="name">Fullname</label>
                    <input type="text" placeholder="fullname" name="name">
                </div>
                <div class="fillup-box">
                    <label for="Vehicle">VehicleType</label>
                    <input type="text" placeholder="Vehicle Type" name="Vehicle">
                </div>
                <div class="fillup-box">
                    <label for="date">Date</label>
                    <input type="date"  name="date">
                </div>
                <div class="fillup-box">
                    <label for="plate">PlateNo#</label>
                    <input type="text" placeholder="Plate Number" name="plate">
                </div>
                <div class="btn2">
                    <input type="submit" placeholder="submit">
                </div>
            </div>
        </form>
     </div>
  </section>
  <script>
 let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".fa-search");
let body = document.querySelector("body"); 

closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  body.classList.toggle("gray-background"); 
  menuBtnChange();
});

searchBtn.addEventListener("click", ()=>{ 
  sidebar.classList.toggle("open");
  body.classList.toggle("gray-background"); 
  menuBtnChange(); 
});

function menuBtnChange() {
 if(sidebar.classList.contains("open")){
   closeBtn.classList.replace("fa-bars", "fa-arrow-right");
 } else {
   closeBtn.classList.replace("fa-arrow-right", "fa-bars"); 
 }
}

  </script>
  <?php
include('Action/connection.php'); // Assuming 'connections.php' contains your database connection logic

// Check if all required variables are set
if(isset($name) && isset($address) && isset($email)) {
    // Sanitize input to prevent SQL injection
    $name = mysqli_real_escape_string($connections, $name);
    $address = mysqli_real_escape_string($connections, $address);
    $email = mysqli_real_escape_string($connections, $email);
    
    // Execute the SQL query to insert data into the database
    $query = mysqli_query($connections, "INSERT INTO info (Name, Vehicle, Date, Status, Plate No#) VALUES ('$name', '$address', '$email')");
    
    // Check if the query was successful
    if($query) {
        echo "Data inserted successfully!";
    } else {
        echo "Error: " . mysqli_error($connections);
    }
} else {
    echo "One or more required fields are missing.";
}
?>

</body>
<style>
  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins" , sans-serif;
  }
  body.gray-background {
    background-color: gray;
  }
  
  .sidebar{
    position: fixed;
    left: 0;
    top: 0;
    height: 100%;
    width: 78px;
    background: #11101D;
    padding: 6px 14px;
    z-index: 99;
    transition: all 0.5s ease;
  }
  .sidebar.open{
    width: 250px;
  }
  .sidebar .logo-details{
    height: 60px;
    display: flex;
    align-items: center;
    position: relative;
  }
  .sidebar .logo-details img{
    width: 30px;
    height: 30px;
    border-radius: 50px;
    transition: all 0.5s ease;
  }
  .sidebar .logo-details .logo_name{
    color: #fff;
    font-size: 20px;
    font-weight: 600;
    opacity: 0;
    transition: all 0.5s ease;
  }
  .sidebar.open .logo-details .img,
  .sidebar.open .logo-details .logo_name{
    opacity: 1;
  }
  .sidebar .logo-details #btn{
    position: absolute;
    top: 50%;
    right: 0;
    transform: translateY(-50%);
    font-size: 22px;
    transition: all 0.4s ease;
    font-size: 23px;
    text-align: center;
    cursor: pointer;
    transition: all 0.5s ease;
  }
  .sidebar.open .logo-details #btn{
    text-align: right;
  }
  .sidebar i{
    color: #fff;
    height: 60px;
    min-width: 50px;
    font-size: 28px;
    text-align: center;
    line-height: 60px;
  }
  .sidebar .nav-list{
    margin-top: 20px;
    height: 100%;
  }
  .sidebar li{
    position: relative;
    margin: 8px 0;
    list-style: none;
  }
  .sidebar li .tooltip{
    position: absolute;
    top: -20px;
    left: calc(100% + 15px);
    z-index: 3;
    background: white;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 15px;
    font-weight: 400;
    opacity: 0;
    white-space: nowrap;
    pointer-events: none;
    transition: 0s;
  }
  .sidebar li:hover .tooltip{
    opacity: 1;
    pointer-events: auto;
    transition: all 0.4s ease;
    top: 50%;
    transform: translateY(-50%);
  }
  .sidebar.open li .tooltip{
    display: none;
  }
  .sidebar input{
    font-size: 15px;
    color: #FFF;
    font-weight: 400;
    outline: none;
    height: 50px;
    width: 100%;
    width: 50px;
    border: none;
    border-radius: 12px;
    transition: all 0.5s ease;
    background: #1d1b31;
  }
  .sidebar.open input{
    padding: 0 20px 0 50px;
    width: 100%;
  }
  .sidebar .fa-search{
    position: absolute;
    top: 50%;
    left: 0;
    transform: translateY(-50%);
    font-size: 22px;
    background: #1d1b31;
    color: #FFF;
  }
  .sidebar.open .fa-search:hover{
    background: #1d1b31;
    color: #FFF;
  }
  .sidebar .fa-search:hover{
    background: #FFF;
    color: #11101d;
  }
  .sidebar li a{
    display: flex;
    height: 100%;
    width: 100%;
    border-radius: 12px;
    align-items: center;
    text-decoration: none;
    transition: all 0.4s ease;
    background: #11101D;
  }
  .sidebar li a:hover{
    background: #FFF;
  }
  .sidebar li a .links_name{
    color: #fff;
    font-size: 15px;
    font-weight: 400;
    white-space: nowrap;
    opacity: 0;
    pointer-events: none;
    transition: 0.4s;
  }
  .sidebar.open li a .links_name{
    opacity: 1;
    pointer-events: auto;
  }
  .sidebar li a:hover .links_name,
  .sidebar li a:hover i{
    transition: all 0.5s ease;
    color: #11101D;
  }
  .sidebar li i{
    height: 50px;
    line-height: 50px;
    font-size: 18px;
    border-radius: 12px;
  }
  .sidebar li.profile{
    position: fixed;
    height: 60px;
    width: 78px;
    left: 0;
    bottom: -8px;
    padding: 10px 14px;
    background:  #11101D;
    transition: all 0.5s ease;
    overflow: hidden;
  }
  .sidebar.open li.profile{
    width: 250px;
  }
  .sidebar li .profile-details{
    display: flex;
    align-items: center;
    flex-wrap: nowrap;
  }
  .sidebar li img{
    height: 45px;
    width: 45px;
    object-fit: cover;
    border-radius: 6px;
    margin-right: 10px;
  }
  .sidebar li.profile .name,
  .sidebar li.profile .email{
    font-size: 15px;
    font-weight: 400;
    color: #fff;
    white-space: nowrap;
  }
  .sidebar li.profile .email{
    font-size: 12px;
  }
  .sidebar .profile #log_out{
    position: absolute;
    top: 50%;
    right: 0;
    transform: translateY(-50%);
    background: #1d1b31;
    width: 100%;
    height: 60px;
    line-height: 60px;
    border-radius: 0px;
    transition: all 0.5s ease;
  }
  .sidebar.open .profile #log_out{
    width: 50px;
    background: none;
  }
.home-section{
  position: relative;
  background: gray;
  min-height: 100vh;
  top: 0;
  left: 78px;
  width: calc(100% - 78px);
  transition: all 0.5s ease;
  z-index: 2;
}
.joyce{
    position: absolute;
    display: flex;
    left: 20%;
    top: 10%;
}
.joyce h2{
    position: relative;
    font-size: 2em;
    letter-spacing: 15px;
    color:  #0e3742;
    text-transform: uppercase;
    text-align: center;
    outline: none;
    line-height: 0.70em;
    animation: animate 5s linear infinite;
    -webkit-box-reflect: below 5px linear-gradient(transparent,#0008);
}
.dash{
  position: relative;
  margin-top: 30%;
}
.dash h2{
  font-size: 1.5em;
 
}
@keyframes animate {
    0%,18%,20%,50.1%,60.1%,65.1%,80%,90%,92%
    {
        color: #0e3742;
        box-shadow: none;
    }
    18.1%,20.1%,30%,50%,60.1%,65%,80.1%,90%,92.1%,100%
    {
        color: white;
        text-shadow: 0 0 10px #0e3742,
                    0 0 20px  #0e3742,
                    0 0 40px  #0e3742,
                    0 0 80px  #0e3742,
                    0 0 160px darkcyan;
    }
}
.sidebar.open ~ .home-section{
  left: 250px;
  width: calc(100% - 250px);
}
.home-section .text{
  display: inline-block;
  color: #11101d;
  font-size: 25px;
  font-weight: 500;
  margin: 18px
}
@media (max-width: 420px) {
  .sidebar li .tooltip{
    display: none;
  }
}
.fill{
       display: flex;
       justify-content: center;
       align-items: center;
       width: 850px;
       height: 70%;
       padding: 28px;
       margin: 0 28px;
       border-radius: 10px;
       background: linear-gradient(45deg,blueviolet,lightgreen);
       box-shadow: 0 15px 20px rgba(0, 0, 0, 0.6);
       position: absolute;
       left: 10%;
}
.fill h2{
    color: white;
    font-size: 50px;
    position: absolute;
    margin-bottom: 20px;
    top: 10%;
    right: 40%;
}
.fillup-box{
    font-size: 20px;
    margin-bottom: 10px;
}
.fillup-box input{
         font-size: 20px;
         border-radius: 10px;
         right: 70%;
}

.btn2 input{
    font-size: 25px;
    border-radius: 10px;
    bottom: 10%;
    right: 50%;
    position: absolute;
}
</style>
</html>