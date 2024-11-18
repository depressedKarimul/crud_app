<?php
include('header.php');
?>

<?php
include('dbcon.php');
?>

<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $query = "SELECT * FROM students WHERE id = $id";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die("Query failed: " . mysqli_error($connection));
  } else {
    $row = mysqli_fetch_assoc($result);
  }
}
?>

<?php
if (isset($_POST['update_student'])) {
  if (isset($_GET['id_new'])) {
    $idnew = $_GET['id_new'];
  }
  $fname = $_POST['f_name'];
  $lname = $_POST['l_name'];
  $age = $_POST['age'];

  $query = "UPDATE students SET first_name = '$fname', last_name = '$lname', age = '$age' WHERE id = '$idnew'";
  $result = mysqli_query($connection, $query);

  if (!$result) {
    die("Query failed: " . mysqli_error($connection));
  } else {
    header('location: index.php?update_msg=you have successfully updated');
    exit();
  }
}
?>

<!-- Fixed 'action' attribute -->
<form action="update_page1.php?id_new=<?php echo $id; ?>" method="post">

  <div class="form-group">
    <label for="f_name">First Name</label>
    <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>">
  </div>

  <div class="form-group">
    <label for="l_name">Last Name</label>
    <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>">
  </div>

  <div class="form-group">
    <label for="age">Age</label>
    <input type="text" name="age" class="form-control" value="<?php echo $row['age']; ?>">
  </div>

  <input type="submit" class="btn btn-success" name="update_student" value="UPDATE">
</form>

<?php
include('footer.php');
?>
