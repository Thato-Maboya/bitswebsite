<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="./index.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

<?php
 $no_fitlers = true; 
?>
    <!---navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Job Portal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <!-- <li class="nav-item active">
            Job Portal
        </li> -->
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
    </nav>
    <!--end navbar-->


    <!--columns-->
    <div class="container">
        <div class="row">
            <div class="col-sm row1">
                <div id="leftSec">
                    <h5 class="h5_left">Sort by:</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Date (ASC)</li>
                        <li class="list-group-item">Date (DESC)</li>
                    </ul>

                    <br/>
                    <br/>
                    <h5 class="h5_left">Job Type:</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" onclick="filter('all')">All</li>
                        <li class="list-group-item" onclick="filter('Student')">Students</li>
                        <li class="list-group-item" onclick="filter('Quality-Assurance')">Quality-Assurance</li>
                        <li class="list-group-item" onclick="filter('Database Designer')">Database Designer</li>
                        <!-- <li class="list-group-item" onclick="filter('Part-time')">Part-time</li> -->
                        <li class="list-group-item" onclick="filter('Python Developer')">Python Developer</li>
                        <!-- <li class="list-group-item" onclick="filter('Permanent')">Permanent</li> -->
                    </ul>
					
					 <h5 class="h5_left">Areas of Expertise:</h5>
					 <div class="areas_of_axpertise_filter">
										<div class="checkbox">
										  <label><input style="margin-right: 8px" type="checkbox" value="">Data Capturer</label>
										</div>
										<div class="checkbox">
										  <label><input style="margin-right: 8px" type="checkbox" value="">Researcher</label>
										</div>
										<div class="checkbox">
										  <label><input style="margin-right: 8px" type="checkbox" value="">Clinician</label>
										</div> 
										
										<div class="checkbox">
										  <label><input style="margin-right: 8px" type="checkbox" value="">Data Analyst</label>
										</div>
										<div class="checkbox">
										  <label><input style="margin-right: 8px" type="checkbox" value="">Database manager</label>
										</div>
										<div class="checkbox">
										  <label><input style="margin-right: 8px" type="checkbox" value="">Administrator</label>
										</div> 
										
										<div class="checkbox">
										  <label><input style="margin-right: 8px" type="checkbox" value="">Undergrad Student</label>
										</div>
										<div class="checkbox">
										  <label><input style="margin-right: 8px" type="checkbox" value="">Postgrad Student</label>
										</div>
										<div class="checkbox">
										  <label><input style="margin-right: 8px" type="checkbox" value="" >Quality Assurance</label>
										</div> 
										<div class="checkbox"> 
										<label><input style="margin-right: 8px" type="checkbox" value="">Database Design</label>
										</div> 
										<div class="checkbox">
										  <label><input style="margin-right: 8px" type="checkbox" value="">Clinical Trial</label>
										</div>
										<div class="checkbox">
										  <label><input style="margin-right: 8px" type="checkbox" value="">Research Co-ordinator</label>
										</div>
										<div class="checkbox">
										  <label><input style="margin-right: 8px"type="checkbox" value="">Programmer/Developer</label>
										</div> 
									
						<h1 class="btn btn-primary">Apply Filters</h1>
				</div>
                </div>
            </div>
            <div class="col-sm-7 row2">
            
            <?php

                $_filter;
                if(isset($_GET["filter"])){
                  $_filter = '[previous_current_position] = "'.$_GET["filter"].'"';
                  // echo $_filter;
                }
                else{
                  $_filter = '';
                }
                $data = array(
                    'token' => '60A3D69D389B0F9BAD605C48AA200417',
                    'content' => 'record',
                    'format' => 'json',
                    'type' => 'flat',
                    'csvDelimiter' => '',
                    'rawOrLabel' => 'raw',
                    'rawOrLabelHeaders' => 'raw',
                    'exportCheckboxLabel' => 'false',
                    'exportSurveyFields' => 'false',
                    'exportDataAccessGroups' => 'false',
                    'returnFormat' => 'json',
                    'filterLogic' => $_filter,
                );
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://redcap.core.wits.ac.za/redcap/api/');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_VERBOSE, 0);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                curl_setopt($ch, CURLOPT_AUTOREFERER, true);
                curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data, '', '&'));
                $output = curl_exec($ch);
                // print $output;
                $red_cap_job_list = json_decode($output, true);

                $red_cap_job_list = array_reverse(json_decode($output, true));


                printJobSeekers($red_cap_job_list);
				
				
                curl_close($ch);
              
            ?>

<?php

function printJobSeekers($listofJobSeeker){
  for ($x = 0; $x <= count($listofJobSeeker)-1; $x++) {

      $post_str = '
      <br/>
      <div class="card">
              <h5 class="card-header">'.$listofJobSeeker[$x]["previous_current_position"].'</h5>
              <div class="card-body">
              <h5 class="card-title">'.$listofJobSeeker[$x]["initials_published_on_webs"].'</h5>
              <p class="card-text">'.$listofJobSeeker[$x]["brief_summary"].'</p>
              <a href="mailto:'.$listofJobSeeker[$x]["email"].'" class="btn btn-primary">contact</a>
              </div>
              <div class="card-footer text-muted">
              '.$listofJobSeeker[$x]["last_name"].',
              '.$listofJobSeeker[$x]["date"].'
              </div>
      </div>
      ';
      echo $post_str;
      // print json_encode($listofJobSeeker[$x]["email"]);
  }
}


?>


            </div>
            <div class="col-sm row3">
            <!-- One of three columns -->
            </div>
        </div>
    </div>
    <!--columns-->









<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script>
  function filter(filter){
    if(filter != "all"){
      document.location = "./redcap_jobs.php?filter="+filter+"";
    }else{
      document.location = "./redcap_jobs.php";
    }
  }
</script>
</body>
</html>
