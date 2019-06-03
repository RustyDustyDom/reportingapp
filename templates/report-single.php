<?php include 'inc/header.php' ?>
  <h2 class="page-header"><?php echo $views->profile_name; ?></h2>
    <hr>
  
    <table class="table table-stripped">
      <thead>
        <tr>
          <th>date</th>
          <th>views</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($records as $record) : ?>
                        <tr>
                            <td><?php echo $record->date; ?></td>
                            <td><?php echo $record->views; ?></td>
                        </tr>
                        <?php endforeach;?>
      </tbody>
    </table>
 
   

    <br>
    <br>
    <a href="index.php">Go Back</a>
    <br>
    <br>
  <?php include 'inc/footer.php' ?>