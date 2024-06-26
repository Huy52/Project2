<!DOCTYPE HTML>
<html>
  <head>
    <title>GIÁM SÁT VÀ ĐIỀU KHIỂN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="icon" href="/test/bk.png">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<script> src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha384-xxxxx" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
      html {font-family: Arial; display: inline-block; text-align: center;}
      p {font-size: 1.2rem;}
      h4 {font-size: 0.8rem;}
      body {margin: 0;}
      .topnav {overflow: hidden; background-color: #0c6980; color: white; font-size: 1rem;}
      .content {padding: 5px; }
      .card {background-color: white; box-shadow: 0px 0px 10px 1px rgba(140,140,140,.5); border: 1px solid #0c6980; border-radius: 15px;}
      .card.header {background-color: #0c6980; color: white; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 12px; border-top-left-radius: 12px;}
      .cards {
  display: grid;
  grid-template-columns: repeat(4, 1fr); /* Sử dụng 4 cột với chiều rộng bằng nhau */
  grid-gap: 10px; /* Khoảng cách giữa các ô */
}
       card2 {background-color: white; box-shadow: 0px 0px 10px 1px rgba(140,140,140,.5); border: 1px solid #0c6980; border-radius: 15px;}
      .card2.header {background-color: #0c6980; color: white; border-bottom-right-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 12px; border-top-left-radius: 12px;}
      .card2s {max-width: 700px; margin: 0 auto; display: grid; grid-gap: 2rem; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));}
	  
      .reading {font-size: 1.3rem;}
      .packet {color: #bebebe;}
      .VibColor {color: #fd7e14;}
      .gasColor {color: #1b78e2;}
	  .tempColor {color: #1b78e2;}
      .statusreadColor {color: #702963; font-size:12px;}
      .LEDColor {color: #183153;}
	  
   body {
  background-image: url("/test/background1.png");
  background-repeat: repeat;
}
	
      /* ----------------------------------- Toggle Switch */
      .switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 24px;
      }

      .switch input {display:none;}

      .sliderTS {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #D3D3D3;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 34px;
      }

      .sliderTS:before {
        position: absolute;
        content: "";
        height: 16px;
        width: 16px;
        left: 4px;
        bottom: 4px;
        background-color: #f7f7f7;
        -webkit-transition: .4s;
        transition: .4s;
        border-radius: 50%;
      }

      input:checked + .sliderTS {
        background-color: #00878F;
      }

      input:focus + .sliderTS {
        box-shadow: 0 0 1px #2196F3;
      }

      input:checked + .sliderTS:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
      }

      .sliderTS:after {
        content:'OFF';
        color: white;
        display: block;
        position: absolute;
        transform: translate(-50%,-50%);
        top: 50%;
        left: 70%;
        font-size: 10px;
        font-family: Verdana, sans-serif;
      }

      input:checked + .sliderTS:after {  
        left: 25%;
        content:'ON';
      }

      input:disabled + .sliderTS {  
        opacity: 0.3;
        cursor: not-allowed;
        pointer-events: none;
      }
#chatContainer {
  width: 300px;
  height: 200px;
  border: 1px solid #ccc;
  overflow-y: auto;
  padding: 10px;
}

.message {
  background-color: #f1f0f0;
  padding: 5px;
  margin-bottom: 5px;
}
.styled-table {
        border-collapse: collapse;
        margin-left: auto; 
        margin-right: auto;
        font-size: 0.9em;
        font-family: sans-serif;
        min-width: 400px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        border-radius: 0.5em;
        overflow: hidden;
        width: 90%;
      }

      .styled-table thead tr {
        background-color: #0c6980;
        color: #ffffff;
        text-align: left;
      }

      .styled-table th {
        padding: 12px 15px;
        text-align: left;
      }

      .styled-table td {
        padding: 12px 15px;
        text-align: left;
      }

      .styled-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
      }

      .styled-table tbody tr.active-row {
        font-weight: bold;
        color: #009879;
      }

      .bdr {
        border-right: 1px solid #e3e3e3;
        border-left: 1px solid #e3e3e3;
      }
      
      td:hover {background-color: rgba(12, 105, 128, 0.21);}
      tr:hover {background-color: rgba(12, 105, 128, 0.15);}
      .styled-table tbody tr:nth-of-type(even):hover {background-color: rgba(12, 105, 128, 0.15);}
      /* ----------------------------------- */
      
      /* ----------------------------------- BUTTON STYLE */
      .btn-group .button {
        background-color: #0c6980; /* Green */
        border: 1px solid #e3e3e3;
        color: white;
        padding: 5px 8px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        float: center;
      }

      .btn-group .button:not(:last-child) {
        border-right: none; /* Prevent double borders */
      }

      .btn-group .button:hover {
        background-color: #094c5d;
      }

      .btn-group .button:active {
        background-color: #0c6980;
        transform: translateY(1px);
      }

      .btn-group .button:disabled,
      .button.disabled{
        color:#fff;
        background-color: #a0a0a0; 
        cursor: not-allowed;
        pointer-events:none;
      }	
      /* ----------------------------------- */
    </style>
  </head>
  
  <body>
  
    <div class="topnav">
	 
      <h3>QUẢN LÍ DỮ LIỆU VÀ ĐIỀU KHIỂN</h3>
    </div>
    
    <br>
    
    <!-- __ DISPLAYS MONITORING AND CONTROLLING ____________________________________________________________________________________________ -->
    <div class="content">
      <div class="cards">
        
        <!-- == MONITORING ======================================================================================== -->
        <div class="card">
          <div class="card header">
            <h3 style="font-size: 1rem;">NODE 2</h3>
          </div>
          
          <!-- Displays the humidity and temperature values received from ESP32. *** -->
          <h4 class="gasColor"><i class="fa-solid fa-house-chimney-crack fa-shake" style="color: #ca2d1c;"></i> Rung chấn<span id="ESP32_01_warning"></span></h4>
          <p class="gasColor"><span class="reading"><span id="ESP32_01_Vib"></span> (g)</span></p>
          <h4 class="gasColor"><i class="fa-solid fa-biohazard" style="color: #11d442;"></i> Nồng độ khí gas</h4>
          <p class="gasColor"><span class="reading"><span id="ESP32_01_Gas"></span> (ppm)</span></p>
		  
          <!-- *********************************************************************** -->
          
         
        </div>
        <!-- ======================================================================================================= -->
         <div class="card">
          <div class="card header">
            <h3 style="font-size: 1rem;">NODE 1</h3>
          </div>
          
          <!-- Displays the humidity and temperature values received from ESP32. *** -->
          
		  <h4 class="gasColor"><i class="fa-solid fa-temperature-low" style="color: #ca2d1c;"></i> Nhiệt độ</h4>
          <p class="tempColor"><span class="reading"><span id="ESP32_01_Temp"></span> &deg;C</span></p>
		  <h4 class="gasColor"><i class="fa-solid fa-droplet" style="color: #4b84e7;"></i> Độ ẩm</h4>
          <p class="gasColor"><span class="reading"><span id="ESP32_01_Humi"></span> &percnt;</span></p>
          <!-- *********************************************************************** -->
          
         
        </div>
        <!-- == CONTROLLING ======================================================================================== -->
        <div class="card">
          <div class="card header">
            <h3 style="font-size: 1rem;">WARNING</h3>
          </div>
          
          <!-- Buttons for controlling the LEDs on Slave 2. ************************** -->
          <h4 class="gasColor"><i class="fa-solid fa-volume-high fa-shake fa-xl" style="color: #ca2d1c;"></i> NODE1</h4>
          <label class="switch">
            <input type="checkbox" id="ESP32_01_TogLED" onclick="GetTogBtnLEDState('ESP32_01_TogLED')">
            <div class="sliderTS"></div>
          </label>
          <h4 class="gasColor"><i class="fa-solid fa-volume-high fa-shake fa-xl" style="color: #ca2d1c;"></i> NODE2</h4>
          <label class="switch">
            <input type="checkbox" id="ESP32_01_Sound" onclick="GetTogBtnLEDState('ESP32_01_Sound')">
            <div class="sliderTS"></div>
          </label>
          <!-- *********************************************************************** -->
        </div>  
        <!-- ======================================================================================================= -->
      <!--  <div class="card">
          <div class="card header">
            <h3 style="font-size: 1rem;">WARNING</h3>
          </div>
          
          <!-- Displays the humidity and temperature values received from ESP32. *** -->
         
		  
          <!-- *********************************************************************** -->
          
         
        </div>
      </div>
    </div>
    
    
	<br>
	

<style>
  .chart-container {
    display: flex;
    justify-content: space-between;
    width: 600px;
    height: 300px;
  }
  .chart-container canvas {
    width: 200px;
    height: 70%;
  }
</style>
<style>
  .card {
    padding: 2px; 
  }
</style>
<div class="content">
<div class="cards">
      <div class="card">
          <div class="card header">
            <h3 style="font-size: 1rem;">NODE 1</h3>
          </div>     
 <div class="chart-container">
    <canvas id="myChart"></canvas>
	<br>
  </div>
 
 <script>
   $(document).ready(function() {
  var ctx = document.getElementById('myChart').getContext('2d');
  var chart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [],
      datasets: [{
        label: 'Rung chấn',
        data: [],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            maxTicksLimit: 10
          }
        }
      },
      elements: {
        line: {
          tension: 0.4 // Điều chỉnh giá trị này để làm cong đường thẳng
        }
      }
    }
  });

  function updateChart() {
    $.ajax({
      url: 'data.php',
      method: 'GET',
      dataType: 'json',
      success: function(data) {
        chart.data.labels = ['1','', '','','','','','','','10','','','','','','','','','','20','','','','','','','','','','30'];
        chart.data.datasets[0].data = data;
        chart.update();
      }
    });
  }

 
  setInterval(updateChart, 900);
});
</script>
</div>

</div>  
</div>
<br>
<br>
    
    <div class="content">
      <div class="card2s">
        <div class="card2 header" style="border-radius: 15px;">
            <h3 style="font-size: 0.7rem;">Lần cuối nhận dữ liệu : [ <span id="ESP32_01_LTRD"></span> ]</h3>
            <button onclick="window.open('recordtable.php', '_blank');">Mở bảng lịch sử dữ liệu</button>
            <h3 style="font-size: 0.7rem;"></h3>
        </div>
      </div>
    </div>
    <!-- ___________________________________________________________________________________________________________________________________ -->
  
      
    
    <script>
      
      
      
      Get_Data("esp32_01");
      
      setInterval(myTimer, 800);
      
      //------------------------------------------------------------
      function myTimer() {
        Get_Data("esp32_01");
      }
      //------------------------------------------------------------
      
      //------------------------------------------------------------
      function Get_Data(id) {
		  
				if (window.XMLHttpRequest) {
          
          xmlhttp = new XMLHttpRequest();
		  
        } else {
          
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
		
        xmlhttp.onreadystatechange = function() {
			
          if (this.readyState == 4 && this.status == 200) {
            const myObj = JSON.parse(this.responseText);
			
            if (myObj.id == "esp32_01") {
              document.getElementById("ESP32_01_Vib").innerHTML = myObj.Vib;
			  var vib = parseFloat(myObj.Vib);
			  if ( vib < 0.003 ) 	document.getElementById("ESP32_01_warning").innerHTML = " (Level 1)"; 
			  if ( vib >= 0.003 && vib < 0.0276  ) document.getElementById("ESP32_01_warning").innerHTML = " (Level 2)";
			  if ( vib >= 0.0276 && vib < 0.115  ) document.getElementById("ESP32_01_warning").innerHTML = " (Level 3)";
			  if ( vib >= 0.115 && vib < 0.215  ) document.getElementById("ESP32_01_warning").innerHTML = " (Level 4)";
			  if ( vib >= 0.215  ) document.getElementById("ESP32_01_warning").innerHTML = " (Level 5)";
              document.getElementById("ESP32_01_Gas").innerHTML = myObj.gas;
			  document.getElementById("ESP32_01_Temp").innerHTML = myObj.temp;
			  document.getElementById("ESP32_01_Humi").innerHTML = myObj.humi;
			 
              document.getElementById("ESP32_01_LTRD").innerHTML = "Time : " + myObj.ls_time + " | Date : " + myObj.ls_date ;
			  
              if (myObj.LED == "ON") {
                document.getElementById("ESP32_01_TogLED").checked = true;
              } else if (myObj.LED == "OFF") {
                document.getElementById("ESP32_01_TogLED").checked = false;
              }
			  
              if (myObj.sound == "ON") {
                document.getElementById("ESP32_01_Sound").checked = true;
              } else if (myObj.sound == "OFF") {
                document.getElementById("ESP32_01_Sound").checked = false;
              }
            }
          }
        };
		
        xmlhttp.open("POST","getdata.php",true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id="+id);
		
			}
      //------------------------------------------------------------
      
      //------------------------------------------------------------
      function GetTogBtnLEDState(togbtnid) {
        if (togbtnid == "ESP32_01_TogLED") {
          var togbtnchecked = document.getElementById(togbtnid).checked;
          var togbtncheckedsend = "";
          if (togbtnchecked == true) togbtncheckedsend = "ON";
          if (togbtnchecked == false) togbtncheckedsend = "OFF";
          Update_LEDs("esp32_01","LED",togbtncheckedsend);
        }
        if (togbtnid == "ESP32_01_Sound") {
          var togbtnchecked = document.getElementById(togbtnid).checked;
          var togbtncheckedsend = "";
          if (togbtnchecked == true) togbtncheckedsend = "ON";
          if (togbtnchecked == false) togbtncheckedsend = "OFF";
          Update_LEDs("esp32_01","sound",togbtncheckedsend);
        }
      }
      //------------------------------------------------------------
      
      //------------------------------------------------------------
      function Update_LEDs(id,lednum,ledstate) {
				if (window.XMLHttpRequest) {
          // code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp = new XMLHttpRequest();
        } else {
          // code for IE6, IE5
          xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            //document.getElementById("demo").innerHTML = this.responseText;
          }
        }
        xmlhttp.open("POST","Control.php",true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("id="+id+"&lednum="+lednum+"&ledstate="+ledstate);
			}
			
    </script>
  </body>
</html>