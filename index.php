<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>crud-operation</title>
</head>

<body>
  <?php
  include('connection.php');

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $gender = $_POST['radio'];
    //access checkbox
    $lang = $_POST['language'];
    $lang1 = implode(",", $lang);

    //access img
    $filename = $_FILES["uploadimg"]["name"];
    $tempname = $_FILES["uploadimg"]["tmp_name"];
    $folder = "image/" . $filename;
    move_uploaded_file($tempname, $folder);

    $sql = "insert into stud_data (firstname,lastname,email,password,gender,languages,image)values ('$name','$last','$email','$password','$gender','$lang1','$filename')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      header("location:display.php");
    } else {
      die(mysqli_error($conn));
    }
  }


  ?>


  <div class="container">
    <div class="row">

      <div class="col-md-6 m-auto pt-5">
        <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <h3>submit your data</h3>
            <label for="exampleInputPassword1">First Name</label>
            <input type="text" class="form-control" name="name" placeholder="enter name">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">last Name</label>
            <input type="text" class="form-control" name="last" placeholder="enter last name">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="pass" placeholder="enter password">
          </div>

          <div>
            <label> Gender:- &nbsp; &nbsp; &nbsp;</label>
            <input type="radio" name="radio" id="option2" value="male">
            <label> Male</label>
            <input type="radio" name="radio" id="option2" value="female">
            <label> FeMale</label>
          </div>
          <label>Languages know -:</label><br>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="check1" name="language[]" value="Hindi">
            <label class="form-check-label" for="check1">HINDI</label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="check1" name="language[]" value="English">
            <label class="form-check-label" for="check1"> ENGLISH</label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="check1" name="language[]" value="Gujrati">
            <label class="form-check-label" for="check1">GUJRATI</label>
          </div>
          <br>
          <div class="div">
            <label>Choose your file:-&nbsp;</label>
            <input type="file" name="uploadimg">
          </div>
          <div><br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>

  </div>








  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>