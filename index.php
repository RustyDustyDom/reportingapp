<?php include_once 'config/init.php';?>

<?php
$report = new Reports;

$template = new Template('templates/frontpage.php');

$template->title = "Yearly report";
$template->reports = $report->getMonthly();

echo $template;