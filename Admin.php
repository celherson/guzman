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
     <li>
     <div id="toggle">
		<i class="indicator"></i>
	</div>
	<audio id="music" src="HELLMERRY x AL JAMES - TEQUILA ROSE ( Official Music Video ).mp3"></audio>
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
      <div class="text">
        <h3>
        <span>D</span>
        <span>A</span>
        <span>S</span>
        <span>H</span>
        <span>B</span>
        <span>O</span>
        <span>A</span>
        <span>R</span>
        <span>D</span>
        </h3>
      </div>
      <?php 
include("Action/connection.php");

if (isset($_connections)) {
  // Fetch total number of clients
  $query_total_clients = "SELECT COUNT(Serial) AS total_clients FROM info";
  $result_total_clients = mysqli_query($_connections, $query_total_clients);
  $row_total_clients = mysqli_fetch_assoc($result_total_clients);
  $total_clients = $row_total_clients['total_clients'];

  // Fetch number of maintenance
  $query_maintenance = "SELECT COUNT(Serial) AS total_maintenance FROM info WHERE Status = 'Maintenance'";
  $result_maintenance = mysqli_query($_connections, $query_maintenance);
  $row_maintenance = mysqli_fetch_assoc($result_maintenance);
  $total_maintenance = $row_maintenance['total_maintenance'];

  // Fetch number of repaired
  $query_repaired = "SELECT COUNT(Serial) AS total_repaired FROM info WHERE Status = 'Repaired'";
  $result_repaired = mysqli_query($_connections, $query_repaired);
  $row_repaired = mysqli_fetch_assoc($result_repaired);
  $total_repaired = $row_repaired['total_repaired'];

  // Fetch number of pending
  $query_pending = "SELECT COUNT(Serial) AS total_pending FROM info WHERE Status = 'Pending'";
  $result_pending = mysqli_query($_connections, $query_pending);
  $row_pending = mysqli_fetch_assoc($result_pending);
  $total_pending = $row_pending['total_pending'];
} else {
  // Default values if the connection is not established
  $total_clients = 0;
  $total_maintenance = 0;
  $total_repaired = 0;
  $total_pending = 0;
}
?>

 


     <div class="container">
      <div class="service-wrapper">
        <div class="service">
          <h1>Our Service</h1>
          <p>2206 Transportation Network Services</p>
          <div class="cards">
            <div class="card">
           <a href="AdM1.php">
            <i class="fa-solid fa-user">
            </i>
            <h2>
            Total: <?php echo $total_clients; ?>
              </h2>
           </a>
            </div>
            <div class="card">
            <i class="fa-solid fa-spinner"></i>
            <h2>Pending <?php echo $total_pending; ?></h2>
          </div>
            <div class="card">
            <i class="fa-solid fa-screwdriver-wrench"></i>          
            <h2>Maintenance : <?php echo $total_maintenance; ?></h2>
            </div>
            <div class="card">
            <i class="fa-solid fa-circle-check"></i>
            <h2>Repaired : <?php echo $total_repaired; ?></h2>
            </div>
            <div class="card">
            <i class="fa-solid fa-lock"></i>
            <h2>Module 5</h2>
            </div>
          </div>
        </div>
      </div>
     </div>
    
     <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Customer's Orders</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <img src="images/search.png" alt="">
            </div>
            
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th>Requestor's Name <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Vehicle Type <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Request Date <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Plate No <span class="icon-arrow">&UpArrow;</span></th>
                    </tr>
                </thead>
                <tbody>
                  
                <?php
// Include your database connection logic
include('Action/connection.php');

// Fetch data from the database with only 'repaired' status
$query = "SELECT * FROM info WHERE Status = 'Repaired'"; // Modify this query according to your database structure
$result = mysqli_query($_connections, $query);

// Check if there are any rows returned
if(mysqli_num_rows($result) > 0) {
    // Loop through each row and display data in table format
    while($row = mysqli_fetch_assoc($result))
    {
        echo "<tr>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Vehicle'] . "</td>";
        echo "<td>" . $row['DATE'] . "</td>";
        echo "<td class='status repaired'><i class='fa-solid fa-circle-check'></i> " . $row['Status'] . "</td>";
        echo "<td><strong>" . $row['Plate'] . "</strong></td>";
        echo "</tr>";
    }
} else {
    // No rows found
    echo "<tr><td colspan='5'>No data available</td></tr>";
}
?>
 
                </tbody>
            </table>
        </section>
    </main>
  </section>
  <script>
let sidebar = document.querySelector(".sidebar");
let closeBtn = document.querySelector("#btn");
let searchBtn = document.querySelector(".fa-search");
let bodyElement = document.querySelector("body"); // Renamed to bodyElement to avoid conflict

closeBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  bodyElement.classList.toggle("gray-background");
  menuBtnChange();
});

searchBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("open");
  bodyElement.classList.toggle("gray-background");
  menuBtnChange();
});

function menuBtnChange() {
  if(sidebar.classList.contains("open")){
    closeBtn.classList.replace("fa-bars", "fa-arrow-right");
  } else {
    closeBtn.classList.replace("fa-arrow-right", "fa-bars");
  }
}

const audioBody = document.querySelector('audio'); // Renamed to audioBody to avoid conflict
const toggle = document.getElementById('toggle');
const music = document.getElementById('music');
let isMusicPlaying = false;

toggle.onclick = function(){
  toggle.classList.toggle('active');
  audioBody.classList.toggle('active'); // Changed body to audioBody
  if (isMusicPlaying) {
    music.pause();
    isMusicPlaying = false;
  } else {
    music.play();
    isMusicPlaying = true;
  }
}

const search = document.querySelector('.input-group input'),
    table_rows = document.querySelectorAll('tbody tr'),
    table_headings = document.querySelectorAll('thead th');

// 1. Searching for specific data of HTML table
search.addEventListener('input', searchTable);

function searchTable() {
    table_rows.forEach((row, i) => {
        let table_data = row.textContent.toLowerCase(),
            search_data = search.value.toLowerCase();

        row.classList.toggle('hide', table_data.indexOf(search_data) < 0);
        row.style.setProperty('--delay', i / 25 + 's');
    })

    document.querySelectorAll('tbody tr:not(.hide)').forEach((visible_row, i) => {
        visible_row.style.backgroundColor = (i % 2 == 0) ? 'transparent' : '#0000000b';
    });
}

// 2. Sorting | Ordering data of HTML table

table_headings.forEach((head, i) => {
    let sort_asc = true;
    head.onclick = () => {
        table_headings.forEach(head => head.classList.remove('active'));
        head.classList.add('active');

        document.querySelectorAll('td').forEach(td => td.classList.remove('active'));
        table_rows.forEach(row => {
            row.querySelectorAll('td')[i].classList.add('active');
        })

        head.classList.toggle('asc', sort_asc);
        sort_asc = head.classList.contains('asc') ? false : true;

        sortTable(i, sort_asc);
    }
})


function sortTable(column, sort_asc) {
    [...table_rows].sort((a, b) => {
        let first_row = a.querySelectorAll('td')[column].textContent.toLowerCase(),
            second_row = b.querySelectorAll('td')[column].textContent.toLowerCase();

        return sort_asc ? (first_row < second_row ? 1 : -1) : (first_row < second_row ? -1 : 1);
    })
        .map(sorted_row => document.querySelector('tbody').appendChild(sorted_row));
}

  </script>
</body>
<style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
body {
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
.home-section .box-content{
  font-family: sans-serif;
  margin: 0;
  outline: none;
  box-sizing: border-box;
  text-decoration: none;
  text-transform: capitalize;
  transition: 2s linear;
  padding: 15px 9%;
  padding-bottom:100px; 
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
h3 span{
                display:table-cell;
                margin: 0;
                padding: 0;
                animation: anim 4.25s linear infinite;
              
            }
            :nth-child(1){
       animation-delay:0s;
     }
          :nth-child(2){
       animation-delay:0.50s;
     }
     :nth-child(3){
       animation-delay:1s;
     }
     :nth-child(4){
       animation-delay:1.50s;
     }
     :nth-child(5){
       animation-delay:2s;
     }
     :nth-child(6){
       animation-delay:2.50s;
     }
     :nth-child(7){
       animation-delay:3s;
     }
     :nth-child(8){
       animation-delay:3.50s;
     }
     :nth-child(9){
       animation-delay:4s;
     }
   
            @keyframes anim{
                0%,100%
                {
                    color: white;
                    filter: blur(2px);
                    text-shadow:0 0 10px #00b3ff,
0 0 10px #00b3ff,
0 0 10px #00b3ff,
0 0 10px #00b3ff,
0 0 10px #00b3ff,
0 0 10px #00b3ff,
0 0 10px #00b3ff,
0 0 10px #00b3ff,
0 0 10px #00b3ff,
0 0 10px #00b3ff;
                    
                }
                2%,99%
                {
                    color: #111;
                    filter: blur(0px);
                    text-shadow:none;
                }
            }
@media (max-width: 420px) {
  .sidebar li .tooltip{
    display: none;
  }
}

    .message-box {
    border: 2px solid #000;
    padding: 20px;
    width: 300px;
    margin: 0 auto;
    text-align: center;
    background-color: #f0f0f0;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
    border-radius: 15px;
}
.home-section .container{
  position: absolute;
  top: -6%;
  width: 100%;

}
.container .service-wrapper{
  padding: 5% 8%;
}
.service{
  display: flex;
  flex-direction: column;
  align-items: center;
}

.service p{
  color: white;width: 60%;
  text-align: center;
}
.service .cards{
  display: grid;
  grid-template-columns: repeat(3,1fr);
  gap: 20px;
}
.cards .card{
   height: 100px;
   width: 370px;
   background-color: rgba(0, 0, 0, 0.4);
   padding: 3% 8%;
   border-radius: 10px;
   transition: 0.6s;
}
.card i{
  color: aquamarine;
  margin-top: 40px;
  margin-bottom: 15px;
  font-size: 2.5rem;
  position: relative;
  top: -30%;
}
.card h2{
  color: white;
  font-size: 20px;
  font-weight: 500;
  top:-90%;
  left: 20%;
  position: relative;
}
.card p{
  text-align: left;
  width: 100%;
  margin: 20px 0;
}
.card:hover{
  background: linear-gradient(90deg, crimson, aqua);
  transform: translateY(-8px);
}
.card:hover i{
  color: white;
}
.card a{
  text-decoration: none;
}
.celherson{
  display: flex;
		justify-content: center;
		align-items: center;
		min-height: 100vh;
		background: #2b2b2b;
		transition: 0.5s;
}

.sidebar #toggle {

    display: block;
    width: 60px; /* Same width as the sidebar */
    height: 30px; /* Same height as the sidebar */
    cursor: pointer;
    border-radius: 160px;
    background: #222;
    transition: 0.5s;
    box-shadow: inset 0 8px 60px rgba(0, 0, 0, 0.1),
                inset 0 8px 8px rgba(0, 0, 0, 0.1),
                inset 0 -4px -4px rgba(0, 0, 0, 0.1);
}

#toggle.active {
    background: white;
    box-shadow: inset 0 2px 60px rgba(0, 0, 0, 0.1),
                inset 0 2px 8px rgba(0, 0, 0, 0.1),
                inset 0 -4px 60px rgba(0, 0, 0, 0.05);
}

#toggle .indicator {
    position: absolute;
    top: 0;
    left: 0;
    width: 20px;
    height: 30px; 
    background: linear-gradient(to bottom, wheat, white);
    border-radius: 50%;
    transform: scale(0.9);
    box-shadow: inset 0 8px 40px rgba(0, 0, 0, 0.2),
                inset 0 4px 4px rgba(255, 255, 255, 0.2),
                inset 0 -4px -4px rgba(255, 255, 255, 0.2);
    transition: 0.5s;
}

#toggle.active .indicator {
    left: 12px; /* Half of the width of the sidebar */
    background: linear-gradient(to bottom, #444, #222);
    box-shadow: inset 0 8px 40px rgba(0, 0, 0, 0.2),
                inset 0 4px 4px rgba(255, 255, 255, 1),
                inset 0 -4px -4px rgba(255, 255, 255, 1);
}



.service h1{
    font-size: 2.5em;
    letter-spacing: 15px;
    color:  #0e3742;
    text-transform: uppercase;
    text-align: center;
    outline: none;
    line-height: 0.70em;
    animation: animate 5s linear infinite;
    margin: 20px;
}


main.table {
    width: 82vw;
    height: 40vh;
    background-color: rgba(0, 0, 0, 0.3);
   bottom: 5%;
   left: 4%;
    backdrop-filter: blur(7px);
    box-shadow: 0 .4rem .8rem #0005;
    border-radius: .8rem;
    position: absolute;
    overflow: hidden;
}

.table__header {
    width: 100%;
    height: 25%;
    background-color: #fff4;
    padding: .8rem 1rem;

    display: flex;
    justify-content: space-between;
    align-items: center;
}

.table__header .input-group {
    width: 35%;
    height: 100%;
    background-color: #fff5;
    padding: 0 .8rem;
    border-radius: 2rem;

    display: flex;
    justify-content: center;
    align-items: center;

    transition: .2s;
}

.table__header .input-group:hover {
    width: 45%;
    background-color: #fff8;
    box-shadow: 0 .1rem .4rem #0002;
}

.table__header .input-group img {
    width: 1.2rem;
    height: 1.2rem;
}

.table__header .input-group input {
    width: 100%;
    padding: 0 .5rem 0 .3rem;
    background-color: transparent;
    border: none;
    outline: none;
}

.table__body {
    width: 95%;
    max-height: calc(89% - 1.6rem);
    background-color: rgba(255, 255, 255, 0.5);
    margin: .8rem auto;
    padding: 0;
    border-radius: .6rem;

    overflow: auto;
    overflow: overlay;
}


.table__body::-webkit-scrollbar{
    width: 0.5rem;
    height: 0.5rem;
}

.table__body::-webkit-scrollbar-thumb{
    border-radius: .5rem;
    background-color: #0004;
    visibility: hidden;
}

.table__body:hover::-webkit-scrollbar-thumb{ 
    visibility: visible;
}


table {
    width: 100%;
}


table, th, td {
    border-collapse: collapse;
    padding: 1rem;
    text-align: left;
}

thead th {
    position: sticky;
    top: 0;
    left: 0;
    background-color: #d5d1defe;
    cursor: pointer;
    text-transform: capitalize;
}

tbody tr:nth-child(even) {
    background-color: #0000000b;
}

tbody tr {
    --delay: .1s;
    transition: .5s ease-in-out var(--delay), background-color 0s;
}

tbody tr.hide {
    opacity: 0;
    transform: translateX(100%);
}

tbody tr:hover {
    background-color: #fff6 !important;
}

tbody tr td,
tbody tr td p,
tbody tr td img {
    transition: .2s ease-in-out;
}

tbody tr.hide td,
tbody tr.hide td p {
    padding: 0;
    font: 0 / 0 sans-serif;
    transition: .2s ease-in-out .5s;
}

tbody tr.hide td img {
    width: 0;
    height: 0;
    transition: .2s ease-in-out .5s;
}

.status {
    padding: .4rem 0;
    border-radius: 2rem;
    text-align: center;
}

.status.delivered {
    background-color: #86e49d;
    color: #006b21;
}

.status.cancelled {
    background-color: #d893a3;
    color: #b30021;
}

.status.pending {
    background-color: #ebc474;
}

.status.shipped {
    background-color: #6fcaea;
}


@media (max-width: 1000px) {
    td:not(:first-of-type) {
        min-width: 12.1rem;
    }
}

thead th span.icon-arrow {
    display: inline-block;
    width: 1.3rem;
    height: 1.3rem;
    border-radius: 50%;
    border: 1.4px solid transparent;
    
    text-align: center;
    font-size: 1rem;
    
    margin-left: .5rem;
    transition: .2s ease-in-out;
}

thead th:hover span.icon-arrow{
    border: 1.4px solid #6c00bd;
}

thead th:hover {
    color: #6c00bd;
}

thead th.active span.icon-arrow{
    background-color: #6c00bd;
    color: #fff;
}

thead th.asc span.icon-arrow{
    transform: rotate(180deg);
}

thead th.active,tbody td.active {
    color: #6c00bd;
}

</style>
</html>