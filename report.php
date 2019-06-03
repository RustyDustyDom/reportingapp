<?php include_once 'config/init.php'; ?>

<?php
$report = new Reports;

$template = new Template ('templates/report-single.php');

$profile_id = isset($_GET['id']) ? $_GET['id'] : null;

$template->views = $report->getPersonRecord($profile_id);
$template->records = $report->getPersonMonthly($profile_id);
$template->viewcount = $report->viewSum($profile_id);

echo $template;