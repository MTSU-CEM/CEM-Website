<?php
if(!isset($_SESSION))
{
    session_start();

}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
<!--        <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0"/>-->
<!--        <meta name="viewport" content="width=device-width, initial-scale=0.41, maximum-scale=1" />-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/script.js"> </script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <?php include "php/upload-supplementary-material.php";
              include "php/add-video.php";

        ?>
    </head>
    <body>

    <div class="container">
        <form id="myForm" action = "php/add-video.php" method = "post" onSubmit="return validateForm()">
            <div class="col-sm-12">
            <div class="well">
            <div class = "for-padding"><h2>Create K-12 Webcast</h2></div>
                <!-- First  Panel -->
                <div class="panel">
                    <div class="well">
                        <div class="form-group row" >
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label" >Thumbnail Link<span class="c">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name ="thumbnail-url" id="thumbnail-url" aria-describedby="basic-addon3" placeholder="Enter Video Thumbnail link" required>
                            </div>

                            <div class="col-sm-3">
                                <a href="get_thumbnail.php" class="btn btn-primary" type="button">Get Thumbnail</a> &nbsp
                                <button id= "btnclr" class="btn btn-default" type="button">Clear</button>
                                <span class="error" ></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="VideoLink" class="col-sm-2 col-form-label">Video Link <span class="c">*</span> </label>
                            <div class="col-sm-7">
                                <textarea type="text" class="form-control" name="video-url" id="video-url" aria-describedby="basic-addon3" placeholder="Enter src from video embed link" required></textarea>
                            </div>
                            <div class="col-sm-3">
                                <button id = "btnclrvlink" class="btn btn-default" type="button">Clear</button>
                                <span class="error" ></span>
                            </div>
                        </div>
                        <fieldset>
                            <div class = "form-in-well">
                                <legend class="displayTitle"></legend>
                                <div class="form-group row">
                                    <label for="pd_topic" class="col-sm-4 col-form-label">Professional Development Topic</label>
                                    <div class="col-sm-5">
                                        <?php
                                        require "php/db_connect.php";
                                        require "php/vars.php";

                                        $query1 = $conn->prepare("SELECT topic FROM pd_topics");
                                        $query1->setFetchMode(PDO::FETCH_ASSOC);
                                        $query1->execute();
                                        $num_open = $query1->rowCount();?>
                                        <select name = "pd_topic" id = "pd_topic" class="form-control">
                                            <?php
                                            if ($num_open > 0) {
                                                while($row=$query1->fetch()) {
                                                    $topic[] = $row['topic'];
                                                }
                                            }

                                            // Iterating through the $presname array
                                            foreach($topic as $item){
                                                ?>
                                                <option value="<?php echo $item; ?>"><?php echo $item; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <span class="error"></span>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <!-- Second  Panel for presenter -->
                <div class="panel">
                    <fieldset>
                        <div class="well">
                            <legend class="displayTitle">Presenter Display Order</legend>
                            <div class="form-group row">
                                <p id="info" for="colFormLabelSm" class="col-sm-11 col-form-label">Click on Add Presenter every time you select Name.  </p>
                                <p id="info" for="colFormLabelSm" class="col-sm-11 col-form-label">Hold down the control key on Windows or command key on Mac to select multiple Names.  </p>
                            </div>
                            <div class="form-group row">
                                <label for="colFormLabelSm" class="col-sm-1 col-form-label">Name </label>
                                <div class="col-sm-6">
                                        <?php
                                            require "php/db_connect.php";
                                            require "php/vars.php";

                                            $query = $conn->prepare("SELECT presenter_name FROM tbl_k12_presenter");
                                            $query->setFetchMode(PDO::FETCH_ASSOC);
                                            $query->execute();
                                            $num_open = $query->rowCount();?>
                                            <select  name = "drpdownpres" id = "drpdownpres" class="form-control" multiple size = "<?php echo $num_open; ?> ">
                                            <?php
                                            if ($num_open > 0) {
                                                while($row=$query->fetch()) {
                                                    $presname[] = $row['presenter_name'];
                                                }
                                            }
                                        // Iterating through the $presname array
                                        foreach($presname as $item){
                                            ?>
                                            <option value="<?php echo $item; ?>"><?php echo $item; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <button id ="btnaddpres" class="btn btn-default" type="button">Add Presenter</button>
                                </div>
                                <div class="col-sm-2">
                                    <button id = "btnclrpres" class="btn btn-default" type="button">Clear</button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="txtPresenter" class="col-sm-3 col-form-label">Presenter Selected</label>
                                <div class="col-sm-9">
                                    <input name = "txtPresenter" id ="txtPresenter" type= "text" aria-describedby="basic-addon3" class="col-sm-9 form-label" readonly>
                                </div>
                            </div>
                        </div>
                     </fieldset>
                    <div class="well">
                        <p id = "info"> Title should not be more than 50 characters</p>
                        <div class="form-group row">
                            <label for="colFormLabelSm" class="col-sm-2 col-form-label" >Title <span class="c">*</span>  </label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" name = "Title" id="Title" aria-describedby="basic-addon3" placeholder="Enter Title" maxlength="50" required></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="videoseries" class="col-sm-2 col-form-label" required>Video series<span class="c">*</span> </label>
                            <div class="col-sm-10">
                                <?php
                                require "php/db_connect.php";
                                require "php/vars.php";

                                $query2 = $conn->prepare("SELECT videoseries_name FROM video_series");
                                $query2->setFetchMode(PDO::FETCH_ASSOC);
                                $query2->execute();
                                $num_open = $query2->rowCount();?>
                                <select name = "videoseries" id = "videoseries" class="form-control">
                                    <?php
                                    if ($num_open > 0) {
                                        while($row=$query2->fetch()) {
                                            $videoseries_name[] = $row['videoseries_name'];
                                        }
                                    }

                                    // Iterating through the $videoseries_name array
                                    foreach($videoseries_name as $item){
                                        ?>
                                        <option value="<?php echo strtolower($item); ?>"><?php echo $item; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="prodID" class="col-sm-2 col-form-label"> Production ID  </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name ="prodID" id="prodID" aria-describedby="basic-addon3" placeholder="Enter Production ID"></input>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Third  Panel -->
                <div class="panel">
                    <div class="well">
                        <div class="for-padding">
                            <div class="form-group row">
                               <label> Air Date </label>
                                <div class="form-group">
                                    <p id = "info"> Incase of missing date current timestamp will be selected as start date </p>
                                </div>
                               <label class="checkbox-inline"><input name = "showenddate" id="showenddate" onchange="valueChanged()" type="checkbox" value="">Show End Date</label>
                                <div class="form-group">
                                    <br>
                                    <label for="dates" class="col-sm-1 col-form-label"> Date  </label>
                                        <input type="date" class="col-sm-4 col-form-label" name= "start-date" id="start-date"></input>
                                    <label for="times" class="col-sm-1 col-form-label"> Time  </label>
                                        <input type="time" class="col-sm-4 col-form-label" id="start-time" name="start-time"></input>
                                </div>

                                <div id = "enddate" class="form-group" hidden>
                                    <br>
                                    <label> to:  </label><br><br>
                                    <label for="dates" class="col-sm-1 col-form-label"> Date  </label>
                                    <input type="date" class="col-sm-4 col-form-label" name= "end-date"id="end-dates"></input>
                                    <label for="times" class="col-sm-1 col-form-label"> Time  </label>
                                    <input type="time" class="col-sm-4 col-form-label" name="end-time" id="end-time"></input>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Panel for Description (Fourth Panel)-->
                <div class="panel">
                    <div class="well">
                        <div class="form-group row">
                            <label for="Description-txt" class="col-sm-3 col-form-label">Description<span class="c">*</span>&nbsp;&nbsp;(Edit Summary)</label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" name="Description-txt" id="Description-txt" aria-describedby="basic-addon3" placeholder="" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Text Format (Fifth Panel) -->
                <div class="panel">
                    <div class="well">
                        <label for="txt-format" class="col-sm-2 col-form-label">Text Format</label>
                        <select class="form-control" id="txt-format" name="txt-format">
                            <option>Filtered HTML</option>
                            <option>Wysiwyg</option>
                            <option>Full HTML</option>
                            <option>Plain Text</option>
                        </select>
                    </div>
                    <div class="for-padding">
                        <label for="prog-type" class="col-sm-3 col-form-label" id="lblprog" required>Program type<span class="c">*</span></label>
                        <select class="form-control" id="prog-type" name="prog-type">
                            <option>Professional Development</option>
                            <option>Student enrichment</option>
                        </select><br>
                    </div>
                    <div class="for-padding">
                        <label for="credt
                        Amt" class="col-sm-5 col-form-label">Recommended in-service credit amount <span class="c">*</span></label>
                        <input type="text" class="form-control" id="credtAmt" name = "credtAmt">
                    </div>

                </div>
            <!-- Supplementary Material (Sixth Panel) -->
                <div class="panel">
                    <div class="well">
                        <div class="for-padding">
                            <div class="form-group row">
                                    <label> Supplementary Material</label>
                                    <label>(HANDOUT)</label>
                                    <p id = "info">Supplementary downloadable material for the program.</p><br>
                                    <label class="lblbackground">&nbsp;Add a new file</label><br>
                                <div class="col-sm-8">
                                    <span class="file-span">
                                        <label for="fileSelect" class="btn-group btn-group-toggle">
                                            <input id="fileSelect" id  = "fileSelect" name = "fileSelect" type="file"  multiple>
                                        </label>
                                    </span>
                                </div>
                                <div class="col-sm-2" style=" max-width: 100%">
                                    <button id ="add_webres" class = "btn btn-default" type="button" >Add</button>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-10" style=" max-width: 100%">
                                    <label id = "supp_mat" hidden></label>
                                </div>
                            </div>
                        </div>
                    </div>
<!--       Web Resource Inside Sixth panel different well -->

                    <div class="well">
                        <div class="for-padding">
                            <div id ="web_res" class="form-group row">
                                <label> Web resource</label><br>
                                <p id="info">The link title is limited to 128 characters maximum.</p><br>
                                <div class="col-sm-5">
                                    <label for="title-web" class="col-sm-2 col-form-label">Title</label>
                                    <input type="text" class="form-control col-sm-3" id="title-web" name="title-web"maxlength="128">
                                </div>
                                <div class="col-sm-6">
                                    <label for="url-web" class="col-sm-2 col-form-label">URL</label>
                                    <input type="text" class="form-control col-sm-4" id="url-web" name = "url-web">
                                </div>
                                <div class="col-sm-12">
                                    <br>
                                    <label id="lbldisplay" class="col-sm-8 col-form-label" style="word-wrap: break-word"></label>
                                    <input name = "lbltit-web" id="lbltit-web" class="col-sm-1 col-form-label" hidden></input>
                                    <input name = "lblurl-web" id="lblurl-web" class="col-sm-1 col-form-label" hidden></input>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-default" id="addanotheritem" >Add another item</button>
                    <button type="button" class="btn btn-default" id="clrweb" > Clear Links </button>
                </div>
            <!--   Professional Development Information for browsing(Seventh Panel) -->
<!--                Currently we have hardcoded these values but these values should be dynamically added through forms and table...
                    Refer PD_topics and Presenter for reference-->

                <div class="panel">
                    <div class="well" >
                        <div class = "for-padding">
                            <div id ="extra-info" class="form-group row">
                                <label for="audience" class="col-sm-4 col-form-label">Audience</label>
                                <select id="audience" name="audience" class="form-control">
                                    <option value="" selected="selected">- Others -</option>
                                    <option>Educational Community</option>
                                    <option>K-12 Administrators</option>
                                    <option>K-12 Classroom teachers</option>
                                    <option>K-12 Guidance and School Counselors</option>
                                    <option>K-12 Librarians</option>
                                    <option>K-12 Parents</option>
                                    <option>K-12 School Social Workers</option>
                                    <option>K-12 Special Education Teachers</option>
                                    <option>K-12 Students</option>
                                    <option>University Faculty</option>
                                    <option>University Students</option>
                                </select> <br>

                                <label for="grade" class="col-sm-4 col-form-label">Grade</label>
                                <select id="grade" name="grade" class="form-control">
                                    <option value="" selected="selected">- Others -</option>
                                    <option>Preschool</option>
                                    <option>K</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <option>9</option>
                                    <option>10</option>
                                    <option>11</option>
                                    <option>12</option>
                                    <option>College Undergraduate</option>
                                    <option>College Graduate</option>
                                </select> <br>

                                <label for="prog_sponser" class="col-sm-4 col-form-label">Program Sponsors</label>
                                <select id="prog_sponser" name="prog_sponser" class="form-control">
                                    <option value="" selected="selected">- Others -</option>
                                    <option>American Democracy Project</option>
                                    <option>Literacy Studies Ph.D. Program (MTSU)</option>
                                    <option>Professional Educators of Tennessee</option>
                                    <option>Annenberg Media</option>
                                    <option>Center for Educational Media (MTSU)</option>
                                    <option>College of Education (MTSU)</option>
                                    <option>Colonial Williamsburg</option value="130">
                                    <option>Country Music Hall of Fame and Museum</option>
                                    <option>The Center for Accelerated Language Acquisition</option>
                                    <option>Middle Tennessee State University</option>
                                    <option>Rutherford County Schools</option>
                                    <option>Tennessee Center for the Study and Treatment of Dyslexia</option>
                                    <option>Tennessee Department of Children&#039;s Services</option>
                                    <option>Tennessee Center for Child Welfare / Tennessee Department of Children&#039;s Services</option>
                                    <option>Tennessee Department of Education</option>
                                    <option>Tennessee Department of Education (ELC)</option>
                                    <option>Confucius Institute</option>
                                </select> <br>

                                <label for="tn_k12" class="col-sm-4 col-form-label">TN K-12 Academic Standards</label>
                                <select id="tn_k12" name="tn_k12" class="form-control">
                                    <option value="" selected="selected">- Others -</option>
                                    <option>Foundational Literacy FL.F.5 (K - 5)</option>
                                    <option>Foundational Literacy FL.VA.7 (K - 5)</option>
                                    <option>Foundational Literacy.3.FL.SC.6</option>
                                    <option>Language Vocabulary Acquisition and Use L.VAU.4 (6 - 12)</option>
                                    <option>Language Vocabulary Acquisition and Use L.VAU.4 (b)</option>
                                    <option>Language Vocabulary Acquisition and Use L.VAU.4 (d)</option>
                                    <option>Language Vocabulary Acquisition and Use L.VAU.6 (6 - 12)</option>
                                    <option>Language: Conventions of Standard English L.CSE.2 (Grade 9 - 10)</option>
                                    <option>Language: Knowledge of Language – Standard 3, L.KL.3 (Grade 6 - 12)</option>
                                    <option>Language: Knowledge of Language – Standard 3, L.KL.3 (Grade 9 - 10)</option>
                                    <option>Reading 8.RI.KID.1 (Grade 8)</option>
                                    <option>Reading 8.RI.KID.2</option>
                                    <option>Reading 8.RI.KID.2</option>
                                    <option>Reading 8.RL.KID. (Grade 8)</option>
                                    <option>Reading 8.RL.KID.2 (Grade 8)</option>
                                    <option>Reading 8.RL.RRTC.10 (Grade 8)</option>
                                    <option>Reading: Craft and Structure – Standard 4, RL.CS.4 (Grade 9 - 10)</option>
                                    <option>Social Studies 5.40 (Grade 5)</option>
                                    <option>Social Studies 8.42 (6 - 8)</option>
                                    <option>Social Studies Practices SSP.02 (K - 12)</option>
                                    <option>Social Studies Practices SSP.03 (3 - 5)</option>
                                    <option>Social Studies Practices SSP.03 (6 - 8)</option>
                                    <option>Social Studies Practices SSP.03 (9 - 12)</option>
                                    <option>Social Studies Practices SSP.03 (K - 2)</option>
                                    <option>Social Studies Practices SSP.05 (K - 12)</option>
                                    <option>Social Studies Practices SSP.06 (K - 12)</option>
                                    <option>Speaking and Listening 8.SL.CC.1 (Grade 8)</option>
                                    <option>Standards Update (pending)</option>
                                    <option>Tennessee Educator Acceleration Model (TEAM)</option>
                                    <option>United States History and Geography US.84 (Grades 9 -12)</option>
                                    <option>WIDA</option>
                                    <option>WIDA Standard 1</option>
                                    <option>WIDA Standard 2</option>
                                    <option>WIDA Standard 3</option>
                                    <option>WIDA Standard 4</option>
                                    <option>WIDA Standard 5</option>
                                    <option>Writing 11-12 W.TTP.3 (Grades 11 - 12)</option>
                                    <option>Writing 8.W.T TP.3</option>
                                    <option>Writing 9-10.W.RBPK.7 (Grades 9 - 10)</option>
                                    <option>Writing 9-10.W.TTP.1 (Grades 9 - 10)</option>
                                </select><br>


                                <label for="pract_rub" class="col-sm-4 col-form-label">Practitioner&#039;s Rubric (TEAM/TILS)</label>
                                <select id="pract_rub" name="pract_rub" class="form-control">
                                    <option value="" selected="selected">- Others -</option>
                                    <option>Tennessee Instructional Leadership Standards (TILS)</option>
                                    <option>Standard A: Instructional Leadership for Continuous Improvement (TILS)</option>
                                    <option>Standard B: Culture for Teaching and Learning (TILS)</option>
                                    <option>Standard C: Professional Learning and Growth (TILS)</option>
                                    <option>Standard D: Resource Management (TILS)</option>
                                    <option>Tennessee Educator Acceleration Model (TEAM-TN)</option>
                                    <option>Instructional Plans (TEAM-TN)</option>
                                    <option>Student Work (TEAM-TN)</option>
                                    <option>Assessment (TEAM-TN)</option>
                                    <option>Expectations (TEAM-TN)</option>
                                    <option>Managing Student Behavior (TEAM-TN)</option>
                                    <option>Environment (TEAM-TN)</option>
                                    <option>Respectful Culture (TEAM-TN)</option>
                                    <option>Standards and Objectives (TEAM-TN)</option>
                                    <option>Motivating Students (TEAM-TN)</option>
                                    <option>Presenting Instructional Content (TEAM-TN)</option>
                                    <option>Lesson Structure and Pacing (TEAM-TN)</option>
                                    <option>Activities and Materials (TEAM-TN)</option>
                                    <option>Questioning (TEAM-TN)</option>
                                    <option>Academic Feedback (TEAM-TN)</option>
                                    <option>Grouping Students (TEAM-TN)</option>
                                    <option>Teacher Content Knowledge (TEAM-TN)</option>
                                    <option>Teacher Knowledge of Students (TEAM-TN)</option>
                                    <option>Thinking (TEAM-TN)</option>
                                    <option>Problem-Solving (TEAM-TN)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="for-padding">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button id = "add-video" name = "add-video" type="submit" class="btn btn-primary btn-block" >Submit</button>
                        </div>
                    </div>
                </div>

                </div>
            </div>
            </div>
            <!-- Closing first vertical half of the page-->
            <!-- Starting other vertical half-->
<!--            <div class="col-sm-3">-->
<!--            <div class="well"></div>-->
        </div>
        </form>

<!--    <div class="container">-->
<!--        <div class="col-sm-9">-->
<!--            <div class = "well">-->
<!--                <div class="for-padding">-->
<!--                    <div class="form-group row">-->
<!--                        <div class="control-group" id="fields">-->
<!--                            <label class="control-label" for="field1">Nice Multiple Form Fields</label>-->
<!--                            <div class="controls">-->
<!--                                <form role="form" autocomplete="off">-->
<!--                                    <div class="entry input-group col-xs-10">-->
<!--                                        <input class="form-control" id = "fields[]" name="fields[]" type="text" placeholder="Add Title" />-->
<!--                                        <span class="input-group-btn"><button class="btn btn-success btn-add" type="button"><span class="glyphicon glyphicon-plus"></span></button></span>-->
<!--                                        <input class="form-control" id = "fields1[]" name="fields1[]" type="text" placeholder="Add URL" />-->
<!---->
<!--                                    </div>-->
<!--                                </form>-->
<!--                                <br>-->
<!--                                <small>Press <span class="glyphicon glyphicon-plus gs"></span> to add another form field :)</small>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

<!--    <form action = "php/add-video.php" method = "post">-->
<!--        <div class="container">-->
<!--            <div class="col-sm-9">-->
<!--                <div class = "well">-->
<!--                    <div class="for-padding">-->
<!--                        <div class="form-group row">-->
<!--                            <div class="col-sm-12">-->
<!--                                <button id = "add-video" name = "add-video" type="submit" class="btn btn-primary btn-block" >Submit</button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </form>-->

    </body>


<!--    Form ending-->
<!--    PHP and Javascript-->
        <script>
            <?php if(isset($_SESSION['tab']) && $_SESSION['tab'] == '#about')
                    { echo 'document.getElementById("btn1").click();'; }
                else if(isset($_SESSION['tab']) && $_SESSION['tab'] == '#presenter')
                    {echo 'document.getElementById("btn2").click();';}
                else if(isset($_SESSION['tab']) && $_SESSION['tab'] == '#clients')
                    { echo 'document.getElementById("btn3").click();'; }
                else
                    { echo 'document.getElementById("btn4").click();'; }
             ?>

            function openTab(evt, tabName)
                {
                    var i, tabcontent, tablinks;
                    tabcontent = document.getElementsByClassName("tabcontent");
                    for (i = 0; i < tabcontent.length; i++) {
                        tabcontent[i].style.display = "none";
                    }
                    tablinks = document.getElementsByClassName("tablinks");
                    for (i = 0; i < tablinks.length; i++) {
                        tablinks[i].className = tablinks[i].className.replace(" active", "");
                    }
                    document.getElementById(tabName).style.display = "block";
                    evt.currentTarget.className += " active";
                }
        </script>

        <?php //include "php/footer.php"; ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</html>
