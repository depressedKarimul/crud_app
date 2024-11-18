<?php
include('dbcon.php')

?>


<?php


if (isset($_POST["add_students"])) {
  // Retrieve form inputs
  $fname = $_POST["f_name"];
  $lname = $_POST["l_name"];
  $age = $_POST["age"];

  // Validate form inputs
  if (empty($fname) || empty($lname) || empty($age)) {
    // Redirect to the form with an error message
    header('Location: index.php?message=' . urlencode('You Need To Fill In All Fields!'));
    exit();
  } else {
    // Prepare SQL query
    $query = "INSERT INTO students (first_name, last_name, age) VALUES ('$fname', '$lname', '$age')";
    
    // Execute query
    $result = mysqli_query($connection, $query);

    if (!$result) {
      // Handle query error
      die("Query failed: " . mysqli_error($connection));
    } else {
      // Redirect with success message
      header('Location: index.php?insert_msg=' . urlencode('Your data has been added successfully.'));
      exit();
    }
  }
}
?>
