<!-- We are using homepage_edit table for storing panel information Like Newsletter, Quicklink
and Contacts. The name_for_link column is used to store link name and contact name with position both-->
<script>
    function submitForm(action)
    {
        document.getElementById('columnarForm').action = action;
        document.getElementById('columnarForm').submit();
    }
</script>

<?php
require "db_connect.php";
require "vars.php";
$url = $site_root. "/modify_homepage.php";
if(isset($_GET['panel_name'])) {

    if ($_GET['panel_name'] == "ANewsletter") {
        echo "<form action='$url'>
                <div class='well'>
                    <h3>Add Upcoming Event/Newsletter</h3><br>
                    <label> Description about Newsletter or Upcoming Event Detail</label>
                    <input id = \"link_desc\" name = \"link_desc\" type='text' class = form-control><br>
                    <label> Title for Newsletter Link</label>
                    <input id = \"name_for_link\" name= \"name_for_link\" type='text' class = form-control><br>
                    <label> Add Newsletter Path (link)</label>
                    <input id = \"links\" name = \"links\" type='text' class = form-control><br>
                    <label> Display Link on homepage </label>
                    <select id = \"showrow\" name = \"showrow\" class = \"form-control\">
                    <option value='Y'>Yes</option>
                    <option value='N'>No</option>
                    </select><br>
                    <button class = 'btn btn-primary btn-block' id= 'add-newsletter' name = 'add-newsletter' type='submit' value = 'submit'>Submit</button>
                </div>
             </form>";
    }
    elseif ($_GET['panel_name'] == "AContact") {

        echo "<form action='$url'>
                <div class='well'>
                <h3>Add New Contact</h3><br>
                    <label> Add Department Name<span class ='c'>*</span></label>
                    <input id = \"panel_title\" name= \"panel_title\" type='text' class = form-control required><br>
                    <label> Add Contact Name and Position<span class ='c'>*</span></label>
                    <input id = \"name_for_link\" name= \"name_for_link\" type='text' class = form-control required><br>
                    <label> Display Link on homepage</label>
                    <select id = \"showrow\" name = \"showrow\" class = \"form-control\" selected='Y'>
                    <option value='Y'>Yes</option>
                    <option value='N'>No</option>
                    </select><br>
                    <button class = 'btn btn-primary btn-block' name='add-contact' id = 'add-contact' type='submit' value='submit'>Submit</button>
                </div> 
              </form>";

    }
    elseif ($_GET['panel_name'] == "AQuicklink") {
        echo "<form action='$url'>
                <div class='well'>
                <h3>Add Quicklink</h3><br>
                    <label> Add Title for Link <span class ='c'>*</span></label>
                    <input id = \"name_for_link\" name= \"name_for_link\" type='text' class = form-control required><br>
                    <label> Add Link <span class ='c'>*</span></label>
                    <input id = \"links\" name = \"links\" type='text' class = form-control required><br>
                    <label> Description about Link</label>
                    <input id = \"link_desc\" name = \"link_desc\" type='text' class = form-control><br>
                    <label> Display Link on homepage<span class ='c'>*</span></label>
                    <select id = \"showrow\" name = \"showrow\" class = \"form-control\">
                    <option value='Y'>Yes</option>
                    <option value='N'>No</option>
                    </select><br>
                    <button class = 'btn btn-primary btn-block'  type='submit' id = 'add-quicklink' name='add-quicklink' value = 'submit'>Submit</button>
                </div> 
              </form>";
    }
    elseif ($_GET['panel_name'] == "ASlideshow"){
        echo "<form action='$url'>
                <div class='well'>
                <h3>Add Photos to Slideshow</h3><br>
                   
                    <label> Add Photo Name <span class ='c'>*</span> <small>&nbsp(Eg: photo.png/ jpg/ jpeg) </small></label> 
                    <input id = \"links\" name = \"links\" type='text' class = form-control required><br>
                    <label> Description about Photo</label>
                    <input id = \"link_desc\" name = \"link_desc\" type='text' class = form-control><br>
                    <label> Display Photo on homepage<span class ='c'>*</span></label>
                    <select id = \"showrow\" name = \"showrow\" class = \"form-control\">
                    <option value='Y'>Yes</option>
                    <option value='N'>No</option>
                    </select><br>
                    <button class = 'btn btn-primary btn-block'  type='submit' id = 'add-slideshow' name='add-slideshow' value = 'submit'>Submit</button>
                </div> 
              </form>";

    }
    elseif ($_GET['panel_name'] == "ESlideshow") {
        echo "<form>
                <div class='well'>
                <h3>Edit Photos on Slideshow</h3><br>
                <div class='table-responsive'>";
        $query = $conn->prepare("SELECT * FROM homepage_edit where panel_name = 'Slideshow'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $num_open = $query->rowCount();
        if ($num_open > 0) {
            echo "<table class='table'><thead><th>Image</th><th>Show Row</th></thead>";
            echo "<tbody>";
            while ($row = $query->fetch()) {
                $panel_title = $row['panel_title'];
                $show_row = $row['show_row'];
                $links = $row['links'];
                $name_for_link = $row['name_for_link'];
                $id = $row['item_id'];
                $link_desc = $row['link_desc'];
                echo "<tr>";
                echo "<td>" . $links . "</td>";
                echo "<td>" . $show_row . "</td>";
                echo "<td>";
                $url_edit = $site_root . "/modify_homepage.php?ID=" . $id;
                echo "<a href='" . $url_edit . "'>Edit/Delete</a>";
                echo "</td></tr>";
            }
            echo "</tbody></table>";
            $query = null;
        }
        echo "</div></div> 
              </form>";
    }
    elseif ($_GET['panel_name'] == "EAbout") {
        echo "<form>
                <div class='well'>
                <h3>Edit Contact</h3><br>
                <div class='table-responsive'>";

        $query = $conn->prepare("SELECT * FROM homepage_edit where panel_name = 'About'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $num_open = $query->rowCount();
        if ($num_open > 0) {
            echo "<table class='table table-sm'><thead><th>Title</th><th>About</th></thead>";
            echo "<tbody>";
            while ($row = $query->fetch()) {
                $panel_name = $row['panel_name'];
                $panel_title = $row['panel_title'];
                $show_row = $row['show_row'];
                $links = $row['links'];
                $name_for_link = $row['name_for_link'];
                $id = $row['item_id'];
                $item_desc = $row['link_desc'];
                echo "<tr>";
                echo "<td>" . $panel_name . "</td>";
                echo "<td>" . $item_desc . "</td>";

                echo "<td>";
                #echo "<button id ='edit' name= 'edit' type="submit" class ='btn btn-primary btn-block' onclick=\"submitForm('modify_homepage.php?ID=3')\">Edit</button>";
                $url_edit = $site_root . "/modify_homepage.php?ID=" . $id;
                echo "<a href='" . $url_edit . "'>Edit/Delete</a>";
                echo "</td></tr>";
            }
            echo "</tbody></table>";
            $query = null;
        }
        echo "</div></div> 
              </form>";
    }
    elseif ($_GET['panel_name'] == "EContact") {
        echo "<form>
                <div class='well'>
                <h3>Edit Contact</h3><br>
                <div class='table-responsive'>";

        $query = $conn->prepare("SELECT * FROM homepage_edit where panel_name = 'Contact'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $num_open = $query->rowCount();
        if ($num_open > 0) {
            echo "<table class='table table-sm'><thead><th>Department</th><th>Contact</th><th>Show Row</th></thead>";
            echo "<tbody>";
            while ($row = $query->fetch()) {
                $panel_title = $row['panel_title'];
                $show_row = $row['show_row'];
                $links = $row['links'];
                $name_for_link = $row['name_for_link'];
                $id = $row['item_id'];
                echo "<tr>";
                echo "<td>" . $panel_title . "</td>";
                echo "<td>" . $name_for_link . "</td>";
                echo "<td>" . $show_row . "</td>";
                echo "<td>";
                $url_edit = $site_root . "/modify_homepage.php?ID=" . $id;
                echo "<a href='" . $url_edit . "'>Edit/Delete</a>";
                echo "</td></tr>";
            }
            echo "</tbody></table>";
            $query = null;
        }
        echo "</div></div> 
              </form>";
    }
    elseif ($_GET['panel_name'] == "EQuicklink") {
        echo "<form>
                <div class='well'>
                <h3>Edit Quicklink</h3><br>
                <div class='table-responsive'>";
        $query = $conn->prepare("SELECT * FROM homepage_edit where panel_name = 'Quicklink'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $num_open = $query->rowCount();
        if ($num_open > 0) {
            echo "<table class='table'><thead><th>Title</th><th>Show Row</th></thead>";
            echo "<tbody>";
            while ($row = $query->fetch()) {
                $panel_title = $row['panel_title'];
                $show_row = $row['show_row'];
                $links = $row['links'];
                $name_for_link = $row['name_for_link'];
                $id = $row['item_id'];
                $link_desc = $row['link_desc'];
                echo "<tr>";
                echo "<td>" . $name_for_link . "</td>";
                echo "<td>" . $show_row . "</td>";
                echo "<td>";
                $url_edit = $site_root . "/modify_homepage.php?ID=" . $id;
                echo "<a href='" . $url_edit . "'>Edit/Delete</a>";
                echo "</td></tr>";
            }
            echo "</tbody></table>";
            $query = null;
        }
        echo "</div></div> 
              </form>";

    }
    elseif ($_GET['panel_name'] == "ENewsletter") {
        echo "<form>
                <div class='well'>
                <h3>Edit Quicklink</h3><br>
                <div class='table-responsive'>";

        $query = $conn->prepare("SELECT * FROM homepage_edit where panel_name = 'Newsletter'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $num_open = $query->rowCount();
        if ($num_open > 0) {
            echo "<table class='table'><thead><th>Title</th><th>Show Row</th></thead>";
            echo "<tbody>";
            while ($row = $query->fetch()) {
                $panel_title = $row['panel_title'];
                $show_row = $row['show_row'];
                $links = $row['links'];
                $name_for_link = $row['name_for_link'];
                $id = $row['item_id'];
                $link_desc = $row['link_desc'];
                echo "<tr>";
                echo "<td>" . $name_for_link . "</td>";
                echo "<td>" . $show_row . "</td>";
                echo "<td>";
                $url_edit = $site_root . "/modify_homepage.php?ID=" . $id;
                echo "<a href='" . $url_edit . "'>Edit/Delete</a>";
                echo "</td></tr>";
            }
            echo "</tbody></table>";
            $query = null;
        }
        echo "</div></div> 
              </form>";
    } else {
    }

}