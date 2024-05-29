
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
<body class="gray-background">
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
       <a href="module1.html">
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
      <div class="text">
        <h3>
        <span>R</span>
        <span>e</span>
        <span>q</span>
        <span>u</span>
        <span>e</span>
        <span>s</span>
        <span>t</span>
        <span> </span>
        <span>R</span>
        <span>e</span>
        <span>p</span>
        <span>a</span>
        <span>i</span>
        <span>r</span>
        <span> </span>
        <span>&</span>
        <span> </span>
        <span>M</span>
        <span>a</span>
        <span>i</span>
        <span>n</span>
        <span>t</span>
        <span>e</span>
        <span>n</span>
        <span>a</span>
        <span>n</span>
        <span>c</span>
        <span>e</span>
        </h3>
         </div>
      <?php
        session_start();
        require 'Action/connection.php'; 
      ?>
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Clients History</h1>
            <div class="input-group">
                <input type="search" placeholder="Search Data...">
                <i class="fas fa-search"></i>
            </div>
            <div class="btn3">
              <a href="Adm1Form.php"><button>Request</button></a>
            </div>
            <div class="btn4">
              <button id="viewAllBtn">View All</button>
            </div>
        </section>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Requestor's Name <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Vehicle Type <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Request Date <span class="icon-arrow">&UpArrow;</span></th>
                        <th> Status <span class="icon-arrow">&UpArrow;</span></th>
                        <th>Plate No#<span class="icon-arrow">&UpArrow;</span></th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                <?php 
                
    $query = "SELECT * FROM info";
    $query_run = mysqli_query($_connections, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $client)
        {
?>
           <tr>
            <td><?= $client['Name']; ?></td>
            <td><?= $client['Vehicle']; ?></td>
            <td><?= $client['DATE']; ?></td>
            <td><?= $client['Status']; ?>
            
    <div class="optionContainer">
        <button class="optionButton">
        <i class="fa-solid fa-caret-down fa-lg"></i>
        </button>
        <div class="options">
            <form action="process.php" method="post">
                <input type="hidden" name="serial" value="<?= $client['Serial']; ?>">
                <button type="submit" name="status" value="Pending">Pending</button>
                <button type="submit" name="status"  value="Maintenance">Maintenance</button>
                <button type="submit" name="status"  value="Repaired">Repaired</button>
            </form>
        </div>
    </div>
</td>
            <td><?= $client['Plate']; ?></td>
            <td>
              <div class="celherson">
                <a href="view.php?id=<?= $client['Serial']; ?>" class="Fries"><button>View</button></a>
                <a href="Edit.php?id=<?= $client['Serial']; ?>"  class="siomai"><button><i class="fa-solid fa-pen-to-square"></i></button></a>
                <button type="submit"   onclick="showNotification()" class="hotdog" ><i class="fa-solid fa-trash" style="color: #fff;"></i></button>
              </div>
              </td>
        </tr>
<?php
        }
    }
    else
    {
        echo "<tr><td colspan='8'>No Record Found</td></tr>";
    }
?>
              </tbody>
            </table>
            </section>
            </main>

            <div id="notification" class="notification">
  <p>To delete this Crush moko?</p>
  <div class="button-container">
    <form action="process.php" method="post">
    <button onclick="deleteItem()" name="delete_info" value="<?= $client['Serial']; ?>" class="delete-button">Delete/Oo</button>
    </form>
    <button onclick="cancelDelete()" class="cancel-button">Cancel/Hindi</button>
  </div>
</div>
  </section>
  <script>
 function selectOption(serial, status) {
        var form = document.getElementById("statusForm" + serial);
        var statusInput = form.querySelector('input[name="status"]');
        statusInput.value = status;
        form.submit();
    }

    //option 
   const optionContainers = document.querySelectorAll('.optionContainer');
    optionContainers.forEach(container => {
        const button = container.querySelector('.optionButton');
        const options = container.querySelector('.options');
        
        button.addEventListener('click', function() {
            options.classList.toggle('show');
        });
    });

    function selectOption(option) {
        const options = event.target.parentNode;
        options.classList.remove('show');
        alert('You selected Option ' + option);
    }

    function showNotification() {
        // Function to show notification
    }

    //notification for deletion
function showNotification() {
  document.getElementById("notification").style.display = "block";
}

function deleteItem() {
  // Put your delete logic here
  alert("Item deleted!");
  hideNotification();
}

function cancelDelete() {
  hideNotification();
}

function hideNotification() {
  document.getElementById("notification").style.display = "none";
}

 //navigation   
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
  background-color: gray;
  min-height: 100vh;
  top: 0;
  left: 78px;
  width: calc(100% - 78px);
  transition: all 0.5s ease;
  z-index: 2;
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
        color: whitesmoke;
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
                animation: anim 14s linear infinite;
              
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
     :nth-child(10){
       animation-delay:4.50s;
     }
     :nth-child(11){
       animation-delay:5s;
     }
     :nth-child(12){
       animation-delay:5.50s;
     }
     :nth-child(13){
       animation-delay:6s;
     }
     :nth-child(14){
       animation-delay:6.50s;
     }
     :nth-child(15){
       animation-delay:7s;
     }
     :nth-child(16){
       animation-delay:7.50s;
     }
     :nth-child(17){
       animation-delay:8s;
     }
     :nth-child(18){
       animation-delay:8.50s;
     }
     :nth-child(19){
       animation-delay:9s;
     }
     :nth-child(20){
       animation-delay:9.50s;
     }
     :nth-child(21){
       animation-delay:10s;
     }
     :nth-child(22){
       animation-delay:10.50s;
     }
     :nth-child(23){
       animation-delay:11s;
     }
     :nth-child(24){
       animation-delay:11.50s;
     }
     :nth-child(25){
       animation-delay:12s;
     }
     :nth-child(26){
       animation-delay:12.50s;
     }
     :nth-child(27){
       animation-delay:13s;
     }
     :nth-child(28){
       animation-delay:13.50s;
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
0 0 10px #00b3ff,
0 0 10px #00b3ff,
0 0 10px #00b3ff,
0 0 10px #00b3ff,
0 0 10px #00b3ff,
0 0 10px #00b3ff,
0 0 10px #00b3ff,
0 0 10px #00b3ff,
0 0 10px #00b3ff,
0 0 10px #00b3ff,
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
                5%,95%
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
@media print {
 .table, .table__body {
  overflow: visible;
  height: auto !important;
  width: auto !important;
 }
}

@page {
    size: landscape;
    margin: 0; 
}

main.table {
    width: 82vw;
    height: 90vh;
    background-color: lightslategrey;
    grid-template-columns: repeat(auto-fit,minmax(270px,1fr));
    backdrop-filter: blur(7px);
    box-shadow: 0 .4rem .8rem #0005;
    border-radius: .8rem;
    position: absolute;
    overflow: auto;
    left: 5%;
}

.table__header {
    width: 100%;
    height: 10%;
    background-color: #fff4;
    padding: .8rem 1rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.table__header h1{
  color:  #0e3742;
    animation: animate 5s linear infinite;
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
    background-color: #fffb;

    margin: .8rem auto;
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

td img {
    width: 36px;
    height: 36px;
    margin-right: .5rem;
    border-radius: 50%;

    vertical-align: middle;
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

.export__file {
    position: relative;
}

.export__file .export__file-btn {
    display: inline-block;
    width: 2rem;
    height: 2rem;
    background: #fff6 url(images/export.png) center / 80% no-repeat;
    border-radius: 50%;
    transition: .2s ease-in-out;
}

.export__file .export__file-btn:hover { 
    background-color: #fff;
    transform: scale(1.15);
    cursor: pointer;
}

.export__file input {
    display: none;
}

.export__file .export__file-options {
    position: absolute;
    right: 0;
    
    width: 12rem;
    border-radius: .5rem;
    overflow: hidden;
    text-align: center;

    opacity: 0;
    transform: scale(.8);
    transform-origin: top right;
    
    box-shadow: 0 .2rem .5rem #0004;
    
    transition: .2s;
}

.export__file input:checked + .export__file-options {
    opacity: 1;
    transform: scale(1);
    z-index: 100;
}

.export__file .export__file-options label{
    display: block;
    width: 100%;
    padding: .6rem 0;
    background-color: #f2f2f2;
    
    display: flex;
    justify-content: space-around;
    align-items: center;

    transition: .2s ease-in-out;
}

.export__file .export__file-options label:first-of-type{
    padding: 1rem 0;
    background-color: #86e49d !important;
}

.export__file .export__file-options label:hover{
    transform: scale(1.05);
    background-color: #fff;
    cursor: pointer;
}

.export__file .export__file-options img{
    width: 2rem;
    height: auto;
}
.btn3 button{
  width: 70px;
  height: 30px;
  font-size: 17px;
  background-color: violet;
  color: white;
  border-radius: 15px;
  position: absolute;
  left: 15%;
  top: 2.5%;
  border: 2px solid black;
}
.btn4 button{
  width: 70px;
  height: 30px;
  font-size: 17px;
  background-color: yellowgreen;
  color: white;
  border-radius: 15px;
  border: 2px solid black;
}
.notification {
        display: none;
        background-color: #f2f2f2;
        color: #333;
        text-align: center;
        border-radius: 5px;
        padding: 20px;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 1;
    }

    .button-container {
        text-align: center;
        margin-top: 20px;
    }

    .delete-button {
        background-color: #f44336;
        border: none;
        color: white;
        padding: 10px 24px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 8px;
    }

    .cancel-button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 24px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 8px;
    }
    .optionContainer {
        position: absolute;
        display: inline-block;
    }

    .optionButton {
        color: white;
        padding: 5px;
        border: none;
        cursor: pointer;
      

    }

    .options {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .options button {
        width: 100%;
        text-align: left;
        padding: 12px 16px;
        display: block;
        border: none;
       
        cursor: pointer;
    }

    .options button:hover {
        background-color: #f1f1f1;
    }
    .show {
        display: block;
    }
   
   .optionButton i{
    color: black;
   }
   .optionButton button{
    border: none;
    font-size: 5px;
   }
    .celherson .hotdog{
      background-color: crimson;
      width: 20px;
      font-size: 15px;
    }
    .celherson .siomai button{
      background-color: greenyellow;
      width: 20px;
      font-size: 15px;
    }
    .celherson .Fries button{
      background-color: aquamarine;
      width: 35px;
      font-size: 15px;
    }
    .celherson button {
      margin-left: 5px;
    }
</style>
</html>