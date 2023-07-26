<?php include_once 'header.php'; ?>
<?php include_once 'footer.php';
require '../helpers/init_conn_db.php';?>

<?php 

if(isset($_POST['del-flight']) and isset($_SESSION['adminId'])) {
    $flight_id = $_POST['flight_id'];
    $sql = 'DELETE FROM flight WHERE flight_id=?';
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header('Location: ../index.php?error=sqlerror');
        exit();
    } else {
        mysqli_stmt_bind_param($stmt,'i',$flight_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        echo("<script>location.href = 'all-flights.php';</script>");
        exit();
    }
}
?>

<style>
    body{
        background-color: #efefef;
    }
    table{
        background-color: whitesmoke;
    }
    h2{
        margin: 20px 0px;
        font-size: 40px !important;
    }
    a:hover{
        text-decoration: none;
    }
    th{
        font-size: 20px;
    }
    td{
        margin-top: 12px;
        font-size: 18px;
        font-weight: bold;
    }
</style>

<main>
    <?php if(isset($_SESSION['adminId'])) { ?>
        <div class="container-md mt-2">
            <h2 class="text-center text-secondary">FLIGHT LIST</h2>
            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ARRIVAL</th>
                        <th scope="col">DEPARTURE</th>
                        <th scope="col">SOURCE</th>
                        <th scope="col">DESTINATION</th>
                        <th scope="col">AIRLINE</th>
                        <th scope="col">SEATS</th>
                        <th scope="col">PRICE</th>
                        <th scope="col">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sql = 'SELECT * FROM flight ORDER BY flight_id DESC';
                    $stmt = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($stmt,$sql);                
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                        <tr class='text-center'>                  
                            <td scope='row'>
                            <a href='pass-list.php?flight_id=".$row['flight_id']."'>
                            ".$row['flight_id']." </a> </td>
                            <td>".$row['arrival']."</td>
                            <td>".$row['departure']."</td>
                            <td>".$row['source']."</td>
                            <td>".$row['destination']."</td>
                            <td>".$row['airline']."</td>
                            <td>".$row['seats']."</td>
                            <td>$ ".$row['price']."</td>
                            <td>
                                <form action='all-flights.php' method='post'>
                                    <input name='flight_id' type='hidden' value=".$row['flight_id'].">
                                    <button  class='btn' type='submit' name='del-flight'>
                                        <i class='text-danger fa fa-trash'></i>
                                    </button>
                                </form>
                            </td>                  
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php } ?>
</main>