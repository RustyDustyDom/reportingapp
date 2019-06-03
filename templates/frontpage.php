<?php include 'inc/header.php'; ?>

        <h3><?php echo $title; ?></h3>

    
      <div class="row marketing">
            <div class="col-md-10">
                <table class="table table-striped">
                    <thead> 
                        <tr>
                            <th>name</th>
                            <th>date</th>
                            <th>views</th>
                            <th>action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($reports as $report) : ?>
                        <tr>
                            <td><?php echo $report->profile_name; ?></td>
                            <td><?php if (!empty($report->date)) {echo $report->date;} else { echo 'No data available';} ?></td>
                            <td><?php if (!empty($report->views)) {echo $report->views;} else { echo 'No data available';} ?></td>
                        <td><a href="report.php?id=<?php echo $report->profile_id ?>" class="btn btn-default">View</a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div>

        </div>
            
         </div>


    

   

<?php include 'inc/footer.php'; ?>