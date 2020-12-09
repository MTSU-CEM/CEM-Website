function validateForm()
{
  alert ("hello");
  var form_valid = valid_form();
  if (form_valid) {
    return true;
  }
  else {
    document.getElementById("errors").innerHTML = "</br>Please correct errors and resubmit form.</br>";
    setTimeout(function(){ clear_alerts(); }, 5000);
    return false;
  }
}

function valueChanged()
{
  if($('#showenddate').is(":checked"))
    $("#enddate").show();
  else
    $("#enddate").hide();
}


function verify_delete ()
{
    confirm("are you sure?");
}



function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}


// Jquery
$(document).ready(function(){
  $("#btnclr").click(function(){
    $("#thumbnail-url").val("");
  });
});

$(document).ready(function(){
  $("#btnclrvlink").click(function(){
    $("#video-url").val("");
  });
});

$(document).ready(function(){
  $("#btnclrpres").click(function(){
    $("#txtPresenter").val("");
  });
});

$(document).ready(function(){
  $("#clrweb").click(function(){
    $("#lbltit-web").html("");
    $("#lblurl-web").html("");
    $("#title-web").val("");
    $("#url-web").val("");
    $("#lbldisplay").html("")
  });
});

$(document).ready(function() {
  $("#btnaddpres").click(function(){
    var pres = [];
    $.each($("#drpdownpres option:selected"), function(){
      pres.push($(this).val());
    });
    var presenters =  pres.join(", ");
    $("#txtPresenter").val(presenters);
  });
});

$(document).ready(function() {
  $("#addanotheritem").click(function(){
    var fileNametitle = $("#lbltit-web").html();
    var fileNameurl = $("#lblurl-web").val();
    var display = $("#lbldisplay").html();
    var title = $("#title-web").val();
    var url = $("#url-web").val();
    if ( $("#title-web").val()){
      if (display == '') {
        var lbldisplay = title + " - " + url;
      }
      else{
        var lbldisplay = title + " - " + url + "<br>" + display;
      }
      if (title == '') {
        var lbltitle = title;
      }
      else{
        var lbltitle = title + "," + fileNametitle ;
      }
      if (url == '') {
        var lblurl = url;
      }
      else{
        var lblurl = url + "," + fileNameurl;
      }
      $("#lbldisplay").html(lbldisplay)
      $("#lbltit-web").val(lbltitle);
      $("#lblurl-web").val(lblurl);
      $("#title-web").val("");
      $("#url-web").val("");
    }
  });
});

$(document).ready(function(){
  $("#fileSelect").change(function(e){
    var fileName = e.target.files[0].name;
    var lbldata = fileName + "<br/>" +$("#supp_mat").html();
    $("#supp_mat").html(lbldata);
  });
});

$(document).ready(function(){
  $("#add-video").click(function(){
    var label = $("#fields[]").val();
  });
});

$(document).ready(function(){
  $("#panel_name").on('change', function(){
  var pageURL = $(location).attr("href");
  });
});


























// $(function()
// {
//   $(document).on('click', '.btn-add', function(e)
//   {
//     e.preventDefault();
//
//     var controlForm = $('.controls form:first'),
//         currentEntry = $(this).parents('.entry:first'),
//         newEntry = $(currentEntry.clone()).appendTo(controlForm);
//
//     newEntry.find('input').val('');
//     controlForm.find('.entry:not(:last) .btn-add')
//         .removeClass('btn-add').addClass('btn-remove')
//         .removeClass('btn-success').addClass('btn-danger')
//         .html('<span class="glyphicon glyphicon-minus"></span>');
//   }).on('click', '.btn-remove', function(e)
//   {
//     $(this).parents('.entry:first').remove();
//
//     e.preventDefault();
//     return false;
//   });
// });

