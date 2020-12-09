<?php
echo<<<HTML
<form name="create_event" id="create_event" action="$site_root/php/create_event.php" method="post">
    <label for="event_name" class="control-label">Event Name</label>
    <input class="form-control" name="event_name" placeholder="October 4th 2019 Collaborative" value="October 4th 2019 Collaborative"></br>
    <label for="event_date" class="control-label">Event Date</label>
    <input class="form-control" name="event_date" placeholder="10/04/2019" value="10/04/2019"></br>
    <label for="event_fee" class="control-label">Event Fee</label>
    <input class="form-control" name="event_fee" placeholder="0" value="0"></br>
    <label for="max_attendees" class="control-label">Max Attendees</label>
    <input class="form-control" name="max_attendees" placeholder="150" value="150"></br>
    <label for="cut_off_datetime" class="control-label">Cut off Date/Time</label>
    <input class="form-control" name="cut_off_datetime" placeholder="10/03/2019 12:00:00" value="10/03/2019 12:00:00"></br>
    <label for="mod_email" class="control-label">Moderator Email</label>
    <input class="form-control" name="mod_email" placeholder="Jenny.Marsh@mtsu.edu" value="Jenny.Marsh@mtsu.edu"></br>
    <label for="mod_name" class="control-label">Moderator Name</label>
    <input class="form-control" name="mod_name" placeholder="Jenny Marsh" value="Jenny Marsh"></br>
    <label for="cc_email" class="control-label">CC Email</label>
    <input class="form-control" name="cc_email" placeholder="centerforedmedia@gmail.com" value="centerforedmedia@gmail.com"></br>
    <label for="open_registration" class="control-label">Open Registration</label>
    <select class= "form-control" name="open_registration" style="display:inline-block; width: 100px;">
      <option value="Y">Yes</option>
      <option value="N">No</option>
    </select></br><br><br>
    <input type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Create&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="btn btn-primary center-block"></br></br>
</form></br>
HTML;
?>