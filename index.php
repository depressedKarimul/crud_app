<?php
// Include the database connection file
include('dbcon.php');

// Include the header file
include('header.php');
?>

<!-- Add Bootstrap CSS to the head section -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<div class="box1">
  <h2>All STUDENTS</h2>
  <!-- Modal Trigger Button -->
  <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">ADD STUDENTS</button>
</div>

<table class="table table-hover table-bordered table-striped">
  <thead>
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Age</th>
      <th>Update</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Query to fetch all students from the database
    $query = "SELECT * FROM students";
    $result = mysqli_query($connection, $query);

    if (!$result) {
      die("Query failed: " . mysqli_error($connection));
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
    ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['first_name']; ?></td>
          <td><?php echo $row['last_name']; ?></td>
          <td><?php echo $row['age']; ?></td>
          <td><a href="update_page1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
          <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
        </tr>
    <?php
      }
    }
    ?>
  </tbody>
</table>

<?php
if(isset($_GET['message'])){
  echo "<h6>". $_GET['message']."</h6>";
}
?>

<?php
if(isset($_GET['insert_msg'])){
  echo "<h6>". $_GET['insert_msg']."</h6>";
}
?>

<?php
if(isset($_GET['delete_msg'])){
  echo "<h6>". $_GET['delete_msg']."</h6>";
}
?>

<?php
if(isset($_GET['update_msg'])){
  echo "<h6>". $_GET['update_msg']."</h6>";
}
?>




<!-- Modal -->
  <!-- Add your form or content here -->
  <form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD STUDENTS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       
          <div class="from-group">
            <label for="f_name">First Name</label>
            <input type="text" name="f_name" class="form-control">
          </div>

          <div class="from-group">
            <label for="l_name">Last Name</label>
            <input type="text" name="l_name" class="form-control">
          </div>

          <div class="from-group">
            <label for="Age">Age</label>
            <input type="text" name="age" class="form-control">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>

<!-- Include Required Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

<?php
include('footer.php');
?>
