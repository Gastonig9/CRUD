<?php include("db.php"); ?>
<?php include("includes/header.php"); ?>
<?php include("includes/footer.php"); ?>


<div class="container p-4">
  <div class="row">
    <div class="col-md-4">

      <?php
      if(isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_color'];?> alert-dismissible fade show animate__animated  animate__fadeIn" role="alert">
         <?= $_SESSION['message']  ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      <?php session_unset(); } ?>
        <div class="card card-body">
            <form action="save_task.php" method= "POST">
                <div class="form-group">
                    <input type="text" name="title" class="form-control" placeholder="Ingrese tarea" autofocus>
                </div>
                <div class="form-group">
                <textarea name="description" rows="2" class="form-control" placeholder="Ingrese descripcion"></textarea>
                </div>
                <br>
                <input type="submit" class="btn btn-success btn-block bg-primary" name="save_task" value="Save">
            </form>
        </div>
    </div>

    <div class="col-md-8">
      <table class= "table table-bordered">
        <thead>
          <tr>
            <th>Task</th>
            <th>Task Description</th>
            <th>Creation Date</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $consulta = "SELECT * FROM task";
            $resultTask= mysqli_query($conexion, $consulta);

            while($row= mysqli_fetch_array($resultTask)) { ?>
              
              <tr>
                <td><?php echo $row['title'] ?></td>
                <td><?php echo $row['description']?></td>
                <td><?php echo $row['create_at']?></td>
                <td>
                  <a class="text-decoration-none badge bg-warning text-wrap" href="edit.php?id=<?php echo $row['id'] ?>">Edit</a>
                  <a class="text-decoration-none badge bg-danger text-wrap" href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
                </td>
              </tr>

              <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

