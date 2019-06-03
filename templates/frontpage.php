<?php include 'inc/header.php'; ?>

        <h3><?php echo $title; ?></h3>

        <h5>We only displayed the last month the account was visited and the month view count. Detailed data can be found by clicking on the View More button.</h5>

    
      <div class="row marketing">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead> 
                        <tr>
                            <th>name</th>
                            <th>Current Year and month</th>
                            <th>views</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($reports as $report) : ?>
                        <tr>
                            <td><?php echo $report->profile_name; ?></td>
                            <td><?php echo date("Y/m"); ?></td>
                            <td><?php if (!empty($report->viewsc)) {echo $report->viewsc;} else { echo 'No data available';} ?></td>
                        <td><a href="report.php?id=<?php echo $report->id ?>" class="btn btn-default <?php if (!empty($report->viewsc)) {echo 'btn-success';} else { echo 'btn-danger disabled';} ?>">View More</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div>

        </div>
            
         </div>


    

   

<?php include 'inc/footer.php'; ?>