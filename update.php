<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Add Course</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dist/css/offcanvas.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>
    <script src="dist/js/jquery-1.9.1.min.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="dist/css/font-awesome.css">
    <style>
    .space{
      letter-spacing:3px;
    }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand space" href="#" style="color:#fff;letter-spacing:5px;">Course</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="welcome" class="space">Timetable</a></li>
            <li class=""><a href="about" class="space">View Courses</a></li>
            <li class="active"><a href="contact" class="space">Add course</span></a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->


    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>Add Courses</h1>
            <p>Make additional course information here.</p>
          </div>
          <div class="row">



            <div class="form-group">
                <label>Course Information</label>

            </div><!--/.form-group-->

          <div class="form-group">
            <label>Title</label>
            <input class="form-control" id="title" >
          </div><!--/.form-group-->

          <div class="form-group">
            <label>Course Code </label>
            <input type="text" class="form-control" id="courseCode"/>
          </div>

          <div class="form-group">
            <label>Lecturer</label>
            <input class="form-control" id="lecturer" />
          </div><!--/.form-group -->
          <label>Time </label>
          <div class="form-group">
            <label>From</label>
            <input type="text" class="form-control" id="fromTime"/>
          </div>

          <div class="form-group">
            <label>To </label>
            <input type="text" class="form-control" id="toTime"/>
          </div>

          <div class="form-group">
            <label>Day</label>
            <!-- <input type="text" class="form-control" id="weekday"> -->
            <select class="form-control" id="weekday">
              <option value="0">Select Day</option>
              <option value="Monday">Monday</option>
              <option value="Tuesday">Tuesday</option>
              <option value="Wednesday">Wednesday</option>
              <option value="Thursday">Thursday</option>
              <option value="Friday">Friday</option>
            </select>
          </div>

          <div class="form-group">
            <button id="addBtn" type="submit" class="btn btn-primary">Add Course</button>
          </div><!--/.form-group-->

          <div class="alert alert-danger" id="outputError">
            <strong id="errText">Title!</strong>
          </div>


          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <!-- <div class="list-group">
            <a href="#" class="list-group-item active">News</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
          </div> -->
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>

    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="dist/js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>

    <script src="dist/js/offcanvas.js"></script>
    <script type="text/JavaScript">
      $('document').ready(function(e){
        $('#outputError').hide();
        console.log("the page is loaded");
        var title = $('#title');
        var courseCode  = $('#courseCode');
        var lecturer = $('#lecturer');
        var fromTime = $('#fromTime');
        var toTime = $('#toTime');
        var weekday = $('#weekday');
        var addBtn = $('#addBtn');


        addBtn.click(function(e){
          $('#outputError').hide();
          if(title.val() == '' || courseCode.val()=='' ||lecturer.val()=='' || fromTime.val()=='' ||toTime.val()=='' ||weekday.val()=='0'){
            // console.log("ther was an error");
            $('#outputError').html("<strong>Sorry all fields must be filled </strong>");
            $('#outputError').show();
          }
          else
          {
             // console.log("No empty fields ");
             // //do an Ajax post request to the server page;
            $.post('action.php', {
              task : 'addcourse', 
              title : title.val(),
              lecturer: lecturer.val(),
              courseCode : courseCode.val(),
              fromTime : fromTime.val(),
              toTime : toTime.val(),
              weekday : weekday.val(),

            }, function(result){
              console.log("this is the result" + result);
            })
             
          }
        })
      })
    </script>
  </body>
</html>
