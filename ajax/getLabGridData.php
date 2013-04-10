<?php
$HOMElocation = "Home";
// $HOMElocation = "iPage";

include ('../classes/class.Log.php');
include ('../classes/class.ErrorLog.php');
include ('../classes/class.AccessLog.php');

include ('../classes/class.DBinit.php');
include ('../classes/class.haDBinit.php');

//
// Build grid parameters passed in url
//
$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction
if(!$sidx) 
	$sidx = 1;

//
// init db object
//
$hadb = new haDBinit();

//
// get record count
//
$sql = "SELECT COUNT(*) AS count from hatesttbl";
if (!$sql_result = mysql_query($sql, $hadb->DBconn))
{
   $log = new ErrorLog();
   $sqlerr = mysql_error();
   $log->writeLog("SQL error: $sqlerr - Error doing select for count");
   $log->writeLog("SQL: $sql"); 
   die("db error getting count");
}

$row = mysql_fetch_array($sql_result,MYSQL_ASSOC);
$count = $row['count'];
if( $count > 0 ) 
{
	$total_pages = ceil($count/$limit);
} 
else 
{
	$total_pages = 0;
}

if ($page > $total_pages) 
	$page=$total_pages;

$start = $limit*$page - $limit; // do not put $limit*($page - 1)
$sql = "SELECT ID AS id, TestName,Orders,OrderDate,Results,ResultDate,Reports,ReportDate FROM hatesttbl ORDER BY $sidx $sord LIMIT $start, $limit";
if (!$sql_result = mysql_query($sql, $hadb->DBconn))
{
   $log = new ErrorLog();
   $sqlerr = mysql_error();
   $log->writeLog("SQL error: $sqlerr - Error doing select for data");
   $log->writeLog("SQL: $sql"); 
   die("db error getting data - $sqlerr:$sql");
}

$responce->page = $page;
$responce->total = $total_pages;
$responce->records = $count;
$i=0;
while($row = mysql_fetch_array($sql_result,MYSQL_ASSOC)) 
{
	// $responce->rows[$i]=$row;
    $responce->rows[$i]['id']=$row[id];
         $responce->rows[$i]['cell']=array($row[id],$row[TestName],$row[Orders],$row[OrderDate],$row[Results],$row[ResultDate],$row[Reports],$row[ReportDate]);
     $i++;
}        
echo json_encode($responce);  //
//break;
?>