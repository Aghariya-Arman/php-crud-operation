<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>update-operation</title>
</head>

<body>
  <?php
  include('connection.php');
  //getting value from update side
  $id = $_GET['updateid'];

  //show data in textbox
  $sql = "select * from stud_data where id=$id";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $name = $row['firstname'];
  $lastname = $row['lastname'];
  $email = $row['email'];
  $password = $row['password'];
  $gender = $row['gender'];
  $language = $row['languages'];
  $language1 = explode(",", $language);
  $image = $row['image'];
  // print_r($image);
  // exit;



  //update data code 

  if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $gender = $_POST['radio'];
    // checkbox
    $lang = $_POST['language'];
    $lang1 = implode(",", $lang);

    //image
    $filename = $_FILES['uploadimg']['name'];
    $tempname = $_FILES['uploadimg']['tmp_name'];
    $folder = "image/" . $filename;
    move_uploaded_file($tempname, $folder);

    // $oldimage = $_POST['old_img'];

    // if ($newimage == null) {
    //   $newimage = $_FILES['uploadimg']['name'];
    // } else {
    //   $newimage = $oldimage;
    // }

    $sql = "update stud_data set id=$id,firstname='$name',lastname='$last',email='$email',password='$password',gender='$gender',languages='$lang1',image='$filename' where id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      echo '<script>alert("update succesfully")</script>';
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
            <input type="text" class="form-control" name="name" placeholder="enter name" value="<?php echo $name ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">last Name</label>
            <input type="text" class="form-control" name="last" placeholder="enter last name" value="<?php echo $lastname ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?php echo $email ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="pass" placeholder="enter password" value="<?php echo $password ?>">
          </div>

          <div>
            <!-- pass value and checked condition -->

            <label> Gender:- &nbsp; &nbsp; &nbsp;</label>
            <input type="radio" name="radio" id="option2" value="male" <?php echo $gender == 'male' ? 'checked="checked"' : ''; ?>>
            <label> Male</label>
            <input type="radio" name="radio" id="option2" value="female" <?php echo $gender == 'female' ? 'checked="checked"' : ''; ?>>
            <label> FeMale</label>
          </div>


          <!-- checkbox -->
          <label>Languages know -:</label><br>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="check1" name="language[]" value="Hindi" <?php if (in_array("Hindi", $language1)) echo "checked"; ?>>
            <label class="form-check-label" for="check1">HINDI</label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="check1" name="language[]" value="English" <?php if (in_array("English", $language1)) echo "checked"; ?>>
            <label class="form-check-label" for="check1"> ENGLISH</label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="check1" name="language[]" value="Gujrati" <?php if (in_array("Gujrati", $language1)) echo "checked"; ?>>
            <label class="form-check-label" for="check1">GUJRATI</label>
          </div>

          <!-- IMAGE DISPLAY -->
          <div class="div">
            <label>Choose your file:-&nbsp;</label>
            <input type="file" name="uploadimg">
            <input type="hidden" name="old_img" value="<?php $row['image']; ?>">

          </div>


          <br>
          <div>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
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