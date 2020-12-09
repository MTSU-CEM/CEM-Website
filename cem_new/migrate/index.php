<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Center for Educational Media | Home</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    
<div class="container-fluid">
 <div id="div1"> <?php include "php/navbar.php"; ?> </div>
 <div class="page-content">
   <br/>
    <div class="row content">
        
        <div class="container">
        <div><h2 style="font-family: Georgia"> Home </h2> <br></div>
        </div>
        
        <div class = "co1-sm-1 col-md-1 sidenav">
        </div>
         
        <div class="col-sm-3 col-md-3 sidebar" style="text-align: center; font-size: 15px; background-color:white;">
            <div class="well">
            <fieldset>
                <ul class="nav nav-sidebar">
                <li><br></li>
                <li style="color:black;" class="active"><b>Center for Educational Media</b></li>
                <li> Laura Clark, Director <br>
                Jenny Marsh, CEM Coordinator <br>
                Steven James, Mgr Computer Facilities <br><br></li>
                
                <li style="color:black;"><b>PK-12 Professional Development Center</b></li>
                <li>Laura Clark, Director <br>
                Jenny Marsh, CEM Coordinator<br><br></li>
                
                <li style="color:black;"><b>Audio/Visual Services</b></li>
                <li>Jeff Nokes, Director <br>
                Janet Dutton, Technical Clerk <br>
                Jimmy Preston, Media Engineer <br>
                Charles Scudder, Electronic Shop Supervisor <br>
                Ronald “Tiny” Gilley, A/V Tech <br><br></li>

                <li style="color:black;"><b>TV/Video Production</b></li>
                <li>Mitch Pryor, Director <br>
                Jon Jackson, Technical Coordinator <br><br></li>

                <li style="color:black;"><b>ERC@MT</b></li>
                <li>Ty Whitaker, Sr. Manager <br>
                Melbra Simmons, Media Office Coordinator <br><br></li> 
                
                <li style="color:black;"><a href="contact.php"><b>Click for more Contact Information</b></a></li>
                <li><br><br><br><br></li>
            </ul>
          </fieldset> 
          </div>
        </div>
        <div class = "col-sm-4 text-left">
            <p class="information">
                The Center for Educational Media serves MTSU and the College of Education through outreach to the education community with Professional Development and partnerships. Through HD Video Production, our educational services begin with the local community and extend globally via distribution through satellite, cable and the web.
            </p>
            <!-------------------------------------------------------- Slideshow container ---------------------------------------------------------------->
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- The dots/circles -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="2" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="3" class="active"></li>
            </ol>
                
                
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
                <img src="assets/home/1.png" style="width:100%;">
                <div class="text">Our new Professional Development Center hosting events for MTSU's College of Education</div>
              </div>

              <div class="item">
                <img src="assets/home/2.png" style="width:100%;">
                <div class="text">Videos produced for the classroom</div>
              </div>

              <div class="item">
                <img src="assets/home/3.png" style="width:100%;">
                <div class="text">Audio/Visual Services (Video Production division) help provide videos bringing content areas to life</div>
              </div>
              <div class="item">
                <img src="assets/home/4.png" style="width:100%;">
                <div class="text">Sharing Professional Development topics and pedagogy for new and established teachers throughout Tennessee</div>
              </div>
            </div>
              
            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
            <br>

            <fieldset>
                <legend> Newsletter and Upcoming Events </legend>
                <ul class="nav nav-sidebar">
                    <li> <p>On <b>July 14, 2020</b>, CEM will host the third annual ELL Collaborative Summer Academy, presented this summer virtually.</p></li>
                    <li> <p>CEM 2020 <a href="https://issuu.com/mtsucenterforedmedia/docs/newsletter_20spring_202020.docx">Newsletter </a></p></li>
                    <li> <p>CEM was featured in a recent edition of the College of Education's<a href="https://issuu.com/mtsumag/docs/aspiremagazine2017/4"> Aspire Magazine </a></p></li>
                </ul>
            </fieldset>
         </div>
        
         <div class="col-sm-3 col-md-3 text-left" style="text-align: center;">
            <div class="well">
            <fieldset>
                <legend>Quick Link</legend>
                    <ul class="nav nav-sidebar">   
                        <li class="active"><a href="http://cem.mtsu.edu/k-12/webcasts/archive"><b>K-12 Professional Development Videos</b></a></li>
                        <li><a href="http://cem.mtsu.edu/video-production-services"><b>Video Production (AV Services)</b></a></li>
                        <li><a href="http://cem.mtsu.edu/audiovisual-services-engineering-and-check-out-services-audiovisual-equipment"><b>Engineering and Equipment Services(AV Services)</b></a></li>
                        <li><a href="https://www.youtube.com/playlist?list=PLsJ4ZEMqDTNkyzrMbHDs8zdcYahdSda1I"><b>Out of the Blue TV show</b></a></li>
                    </ul>
                </fieldset>
             </div>
                 <div class="well">
                <fieldset>
                     <legend>Highlighted Videos</legend>
                        <ul class="nav nav-sidebar">   
                        <li class="active"><a href="#">Scaffolding and "Juicy" Sentences</a></li>
                        <li><a href="http://cem.mtsu.edu/video/k-12/scaffolding-and-juicy-sentences">Navigating Mindsets Around ELs</a></li>
                        <li><a href="http://cem.mtsu.edu/video/k-12/navigating-mindsets-around-els">The Purpose of Education: A Socratic Seminar</a></li>
                        <li><a href="http://cem.mtsu.edu/video/k-12/differentiated-instruction-inquiry-lesson">Differentiated Instruction: An Inquiry Lesson</a></li>
                        <li><a href="http://cem.mtsu.edu/video/k-12/stages-language-acquisition-jigsaw">Stages of Language Acquisition: A Jigsaw</a></li>
                        <li><a href="http://cem.mtsu.edu/video/k-12/fostering-collaboration-esl-teachers-and-general-education-teachers-co-teaching">Fostering Collaboration for ESL Teachers and General Education Teachers: Co-Teaching Strategies to Support English Learners</a></li>
                    </ul>
            </fieldset>
          </div>
        </div>   
    </div>
  </div>
</div>

<?php include "php/footer.php"; ?>   
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
