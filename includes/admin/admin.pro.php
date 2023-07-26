<?php
require '../../helpers/init_conn_db.php';
session_start();
if(isset($_SESSION['adminId'])) {
    if(isset($_POST['dep-btn'])) {
        $flight_id = $_POST['flight_id'];
        $sql = "UPDATE flight SET status='dep' WHERE flight_id=?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,'i',$flight_id);         
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header('Location: ../../admin/index.php');
        exit();
    } elseif (isset($_POST['issue-btn'])) {
        $flight_id = $_POST['flight_id'];
        $issue = $_POST['issue'];
        $delay_time = gmdate('h:i:s',(int)$issue*60);
        $sql = 'SELECT * FROM flight WHERE flight_id=?';
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt,$sql);              
        mysqli_stmt_bind_param($stmt,'i',$flight_id);         
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){
            $date_time_dep = $row['departure'];
            $date_dep = substr($date_time_dep,0,10);
            $time_dep = substr($date_time_dep,10,6) ;    
            $date_time_arr = $row['arrival'];
            $date_arr = substr($date_time_arr,0,10);
            $time_arr = substr($date_time_arr,10,6) ; 
            $time_dep = new DateTime($date_time_dep);
            $time_dep->add(new DateInterval('PT' . $issue . 'M'));            
            $stamp_dep = $time_dep->format('Y-m-d H:i:s');         
            $time_arr = new DateTime($date_time_arr);
            $time_arr->add(new DateInterval('PT' . $issue . 'M'));            
            $stamp_arr = $time_arr->format('Y-m-d H:i:s'); 
            $sql = "UPDATE flight SET status='issue',issue=?,departure=?,arrival=?
                WHERE flight_id=?";
            $stmt = mysqli_stmt_init($conn);
            mysqli_stmt_prepare($stmt,$sql);
            mysqli_stmt_bind_param($stmt,'sssi',$issue,$stamp_dep,$stamp_arr,$flight_id);         
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($conn);;
            header('Location: ../../admin/index.php');
            exit();
        }
    } elseif (isset($_POST['issue-solved-btn'])) {
        $flight_id = $_POST['flight_id'];
        $sql = "UPDATE flight SET status='',issue='solved' WHERE flight_id=?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,'i',$flight_id);         
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header('Location: ../../admin/index.php');
        exit();
    } elseif (isset($_POST['arr-btn'])) {
        $flight_id = $_POST['flight_id'];
        $issue = $_POST['issue'];
        $sql = "UPDATE flight SET status='arr'WHERE flight_id=?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,'i',$flight_id);         
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        header('Location: ../../admin/index.php');
        exit();
    } else {
        header('Location: ../../admin/index.php');
        exit();
    }
} else {
    header('Location: ../../admin/index.php');
    exit();
}
?>