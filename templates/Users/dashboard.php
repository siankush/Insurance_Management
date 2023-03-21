<style>
* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}
.cursor {
    width: 20px;
    height: 20px;
    border: 1px solid white;
    border-radius: 50%; 
    background: #000038;
    position: absolute;
    transition-duration: 200ms;
    transition-timing-function: ease-out;
    animation: cursorAnim .5s infinite alternate;
    pointer-events: none;
    z-index: 58;
    opacity: .6;

}


.cursor::after {
    content: "";
    background: #000038;

    width: 20px;
    height: 20px;
    position: absolute;
    border: 8px solid #000038 ;
    border-radius: 50%;
    opacity: .5;
    top: -8px;
    left: -8px;
    animation: cursorAnim2 .5s infinite alternate;
}

@keyframes cursorAnim {
    from {
        transform: scale(1);
    }
    to {
        transform: scale(.7);
    }
}

@keyframes cursorAnim2 {
    from {
        transform: scale(1);
    }
    to {
        transform: scale(.4);
    }
}

@keyframes cursorAnim3 {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(3);
    }
    100% {
        transform: scale(1);
        opacity: 0;
    }
}

.expand {
    animation: cursorAnim3 .5s forwards;
    border: 1px solid red;
    
}

body {
	background: #ddd; height:100%;overflow-x: hidden;}	
.text{color:white;font-size:220px;text-align:center;}
.open{color:white;background:#000;padding:10px;border-radius:20px;}

/* Preloader */
.container-preloader {
	align-items:center; cursor:none; display:flex; height:100%;
  justify-content:center; position:fixed; left:0; top:0; width:100%; z-index:900;
}
.container-preloader .animation-preloader {
	position:absolute; z-index: 100;}
/* Spinner Loading */
.container-preloader .animation-preloader .spinner {
  animation: spinner 1s infinite linear;
	border-radius: 50%;  border: 10px solid rgba(0, 0, 0, 0.2);
  border-top-color: white; /* It is not in alphabetical order so that you do not overwrite it */
  height: 9em;  margin: 0 auto 3.5em auto; width: 9em;
}
/* Loading text */
.container-preloader .animation-preloader .txt-loading {
  font: bold 5em 'Montserrat', sans-serif;
	text-align: center;	user-select: none;
}
.container-preloader .animation-preloader .txt-loading .characters:before {
  animation: characters 4s infinite;  color: orange;
  content: attr(preloader-text);  left: 0;
  opacity: 0;  position: absolute;  top: 0;
  transform: rotateY(-90deg);
}
.container-preloader .animation-preloader .txt-loading .characters {
	color: white;	position: relative;
}
.container-preloader .animation-preloader .txt-loading .characters:nth-child(2):before {
  animation-delay: 0.2s;
}
.container-preloader .animation-preloader .txt-loading .characters:nth-child(3):before {
  animation-delay: 0.4s;
}
.container-preloader .animation-preloader .txt-loading .characters:nth-child(4):before {
  animation-delay: 0.6s;
}
.container-preloader .animation-preloader .txt-loading .characters:nth-child(5):before {
  animation-delay: 0.8s;
}
.container-preloader .animation-preloader .txt-loading .characters:nth-child(6):before {
  animation-delay: 1s;
}
.container-preloader .animation-preloader .txt-loading .characters:nth-child(7):before {
  animation-delay: 1.2s;
}
.container-preloader .loader-section {
  background-color: #000038;  height: 100%;
  position: fixed;  top: 0;  width: calc(50% + 1px);
}
.container-preloader .loader-section.section-left {
  left: 0;
}
.container-preloader .loader-section.section-right {
  right: 0;
}
/* Fade effect on loading animation */
.loaded .animation-preloader {
  opacity: 0;
  transition: 0.3s ease-out;
}
/* Curtain effect */
.loaded .loader-section.section-left {
  transform: translateX(-101%);
  transition: 0.7s 0.3s all cubic-bezier(0.1, 0.1, 0.1, 1.000);
}
.loaded .loader-section.section-right {
  transform: translateX(101%);
  transition: 0.7s 0.3s all cubic-bezier(0.1, 0.1, 0.1, 1.000);
}
/* Animation of the preloader */
@keyframes spinner {
to {
	transform: rotateZ(360deg);
}}
/* Animation of letters loading from the preloader */
@keyframes characters {
  0%,
  75%,
  100% {
 opacity: 0;
 transform: rotateY(-90deg);
  }
  25%,
  50% {
    opacity: 1;
    transform: rotateY(0deg);
  }}
/* Laptop size back (laptop, tablet, cell phone) */
@media screen and (max-width: 767px) {
	/* Preloader */
	/* Spinner Loading */	
	.container-preloader .animation-preloader .spinner {
	height: 8em;
	width: 8em;
	}
	/* Text Loading */
	.container-preloader .animation-preloader .txt-loading {
	  font: bold 3.5em 'Montserrat', sans-serif;
	}}
@media screen and (max-width: 500px) {
	/* Prelaoder */
	/* Spinner Loading */
	.container-preloader .animation-preloader .spinner {
	height: 7em;
	width: 7em;
	}
	/*Loading text */
	.container-preloader .animation-preloader .txt-loading {
	  font: bold 2em 'Montserrat', sans-serif;
	}}
.origin{text-decoration:none;
font-size:45px;}
</style>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<!-- Preloader -->
		<div id="preloader">
			<div id="container" class="container-preloader">
				<div class="animation-preloader">
					<div class="spinner"></div>
					<div class="txt-loading">
						<span preloader-text="S" class="characters">S</span>
						
						<span preloader-text="K" class="characters">K</span>
						
						<span preloader-text="Y" class="characters">Y</span>
						
						<span preloader-text="D" class="characters">D</span>
						
						<span preloader-text="A" class="characters">A</span>
						
						<span preloader-text="S" class="characters">S</span>
						
						<span preloader-text="H" class="characters">H</span>
					</div>
				</div>	
				<div class="loader-section section-left"></div>
				<div class="loader-section section-right"></div>
			</div>
		</div>	
  <div class="container-scroller">
  <body onload="timeCount();">

 <?php echo $this->element('sidebar') ?>
      <!-- partial -->
      <div class="cursor"></div>
    
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome <?= $user->first_name ?></h3>
                  
                  <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
                </div>
                <div class="col-12 col-xl-4">
                 <div class="justify-content-end d-flex">
                  <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                    <button class="btn btn-sm btn-light bg-white dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                     <i class="mdi mdi-calendar"></i> Today (1252 Jan 2021)
                     <!-- Check -->
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                      <a class="dropdown-item" href="#">January - march</a>
                      <a class="dropdown-item" href="#">March - June</a>
                      <a class="dropdown-item" href="#">June - August</a>
                      <a class="dropdown-item" href="#">August - November</a>
                    </div>
                  </div>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                <div id="demo" class="carousel slide" data-ride="carousel">

<!-- Indicators -->
<ul class="carousel-indicators">
  <li data-target="#demo" data-slide-to="0" class="active"></li>
  <li data-target="#demo" data-slide-to="1"></li>
  <li data-target="#demo" data-slide-to="2"></li>
</ul>

<!-- The slideshow -->
<div class="carousel-inner" >
  <div class="carousel-item active" data-interval="3000">
  <img src="<?= $baseurl ?>img/banner5.png" alt="people">
  </div>
  <div class="carousel-item" data-interval="3000">
  <img src="<?= $baseurl ?>img/banner6.png" alt="people">
  </div>
  <div class="carousel-item" data-interval="3000">
  <img src="<?= $baseurl ?>img/banner7.png" alt="people">
  </div>
</div>

<!-- Left and right controls -->
<a class="carousel-control-prev" href="#demo" data-slide="prev">
  <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#demo" data-slide="next">
  <span class="carousel-control-next-icon"></span>
</a>

</div>
                  <!-- <img src="<?= $baseurl ?>img/New Project.png" alt="people"> -->
                  
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal text-white"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2><br>
                      </div><br>
                      <br>
                      <div class="ml-2">
                       
                      </div>
                      
                    </div>
                    <h4 class="location font-weight-normal text-white"><div id="clock"></div></h4> 
  
  <h6 class="font-weight-normal text-white">India</h6>
                  </div>
                </div>
              </div>
            </div>
            <?php $totalPrice = 0;
foreach ($companyAssetss as $company) {

    $totalPrice += $company->insurance_policy->premium;

    // echo $company->insurance_policy->premium;
} 
// $totalPrice = $companyAssetss->sumOf('premium');
?>


                
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale bg1">
                    <div class="card-body">
                      <p class="mb-4">Total Policies</p>
                      <p class="fs-30 mb-2"><?php echo count($companyAssetss); ?></p>
                     
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total Premium Price</p>
                      <p class="fs-30 mb-2"><?php echo $totalPrice;; ?></p>
                      
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Number of Clients</p>
                      <p class="fs-30 mb-2"><?php echo count($contact); ?></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Number of Meetings</p>
                      <p class="fs-30 mb-2">7</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Order Details</p>
                  <div class="d-flex flex-wrap mb-5">
                    <div class="mr-5 mt-3">
                      <p class="text-muted">Order value</p>
                      <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
                    </div>
                    <div class="mr-5 mt-3">
                      <p class="text-muted">Orders</p>
                      <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
                    </div>
                    <div class="mr-5 mt-3">
                      <p class="text-muted">Users</p>
                      <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
                    </div>
                    <div class="mt-3">
                      <p class="text-muted">Downloads</p>
                      <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
                    </div> 
                  </div>
                  <canvas id="order-chart"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                 <div class="d-flex justify-content-between">
                  <p class="card-title">Sales Report</p>
                  <a href="#" class="text-info">View all</a>
                 </div>
                  <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                  <canvas id="sales-chart"></canvas>
                </div>
              </div>
            </div>
          </div>
          <a  class="whats-app" href="https://web.whatsapp.com/" target="_blank">
    <!-- <i class="fa fa-whatsapp my-float"></i> -->
    <i class="fa-brands fa-whatsapp my-float"></i></a>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Made By SkyDash <i class="ti-heart text-danger ml-1"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>

  <script>
$(document).ready(function() {
  setTimeout(function() {
    $('#container').addClass('loaded');
    // Once the container has finished, the scroll appears
    if ($('#container').hasClass('loaded')) {
      // It is so that once the container is gone, the entire preloader section is deleted
      $('#preloader').delay(900).queue(function() {
        $(this).remove();
      });}
  }, 900);});

  </script>
  <script>
              const cursor = document.querySelector('.cursor');

        document.addEventListener('mousemove', e => {
            cursor.setAttribute("style", "top: "+(e.pageY - 10)+"px; left: "+(e.pageX - 10)+"px;")
        })

        document.addEventListener('click', () => {
            cursor.classList.add("expand");

            setTimeout(() => {
                cursor.classList.remove("expand");
            }, 500)
        })
</script>
<script>

function timeCount() {
			var today = new Date();

			var day = today.getDate();
			var month = today.getMonth()+1;
			var year = today.getFullYear();

			var hour = today.getHours();
			if(hour<10)hour = "0"+hour;

			var minute = today.getMinutes();
			if(minute<10)minute = "0"+minute;

			var second = today.getSeconds();
			if(second<10)second = "0"+second;

			document.getElementById("clock").innerHTML = 
			day+"/"+month+"/"+year+"  "+hour+":"+minute+":"+second;

			setTimeout("timeCount()", 1000);
		}
</script>




  