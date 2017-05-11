<?php
include_once('model/Bootstrap.php');


$selection_query = "SELECT * FROM courses";
$result = $con->query($selection_query);


?>
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
            <li class=""><a href="timetable" class="space">Timetable</a></li>
            <li class=""><a href="viewcourses" class="space">View Courses</a></li>
            <li class="active"><a href="addcourse" class="space">Add course</span></a></li>
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
            <h1>View Course Details </h1>
            <p>view additional course information here.</p>
          </div>
          <div class="row">

            <div class="form-group">
                <label>Course Information</label>


            </div><!--/.form-group-->
            




          
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Course Title</th>
                <th>Course Code</th>
                <th>Instructor</th>
                <th>Units</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              
            <?php

                  while($ans = $result->fetch(PDO::FETCH_OBJ))
                  {
                    echo ' <tr>
                          <td>'.$ans->title.'</td>
                          <td>'.$ans->course_code.'</td>
                          <td>'.$ans->lecturer.'</td>
                          <td>'.$ans->units.'</td>
                          <td><a href="" id="'.$ans->id.'" class="btn btn-danger del">Delete</a></td>
                          </tr>';
                  }

            ?>

            </tbody>
          </table>
        
          <div class="alert alert-info" id="outputError">
            <strong>Title!</strong> Alert body ...
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
        
      </footer>

    </div><!--/.container-->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="dist/js/bootstrap.min.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>

    <script src="dist/js/offcanvas.js"></script>

    <script type="text/javascript">
      $('document').ready(function(event){
        $('#outputError').hide();
          // alert("this is the new page");
         $('.del').click(function(evt){
          evt.preventDefault();
          $('#outputError').hide();
          // console.log("that is delete button");
          var id = $(this).attr('id');
          $.post('action.php', 
            {
              task : 'delete', 
              id : id,
            }, function(result){
              var r = JSON.parse(result);
              $('#outputError').html("<strong>" + r.message + "</strong>");
              $('#outputError').show();
          })

         })
      })
    </script>
  </body>
</html>
