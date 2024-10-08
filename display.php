<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>show_data</title>
</head>

<body>


  <div class="container">
    <button class="btn btn-primary my-5"><a href="index.php" class="text-light">Add User</a></button>
    <div class="row">
      <div class="col-md-12 m-auto pt-5">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">First</th>
              <th scope="col">Last</th>
              <th scope="col">email</th>
              <th scope="col">password</th>
              <th scope="col">gender</th>
              <th scope="col">Language</th>
              <th scope="col">images</th>
              <th scope="col">Action</th>
            </tr>
            <?php
            include 'connection.php';
            //fetch data into database
            $sql = "select * from stud_data";
            $result = mysqli_query($conn, $sql);
            if ($result) {
              while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $name = $row['firstname'];
                $lastname = $row['lastname'];
                $email = $row['email'];
                $password = $row['password'];
                $gender = $row['gender'];
                $language = $row['languages'];
                // $img = $row['image'];



                echo '
      <tr>
   
              <th scope="row">' . $id . '</th>
              <td>' . $name . '</td>
              <td>' . $lastname . '</td>
              <td>' . $email . '</td>
              <td>' . $password . '</td>
              <td>' . $gender . '</td>
              <td>' . $language . '</td>
              <td><img src="image/' . $row['image'] . '"alt="image" height="20px" width="50"</td>
              <td>
              <button class="btn btn-primary"><a href="update.php?updateid=' . $id . '" class="text-light">update</a></button>
                <button class="btn btn-danger"><a href="delete.php?deleteid=' . $id . '" class="text-light" >delete</a></button>
              </td>
            </tr>';
              }
            }
            ?>
          </thead>
          <tbody>


          </tbody>
        </table>
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