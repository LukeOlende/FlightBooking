<?php include_once 'helpers/helper.php'; ?>
<?php subview('header.php'); 
require 'helpers/init_conn_db.php';                      
?> 	
<style>
    body{
        font-family: 'Montserrat', sans-serif;
        background-image: url('images/bg.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: 100% 100%;
        background-position: center;
    }
    h2{
        color: #424242;
        font-size: 35px !important;
        margin-top: 20px;
    }
    table{
        background-color: white;
    }
    th{
        font-size: 20px;
    }
    td{
        margin-top: 10px !important;
        font-size: 16px;
        font-weight: bold;
        color: #424242;
    }
</style>
    <!-- Main Section -->
    <main>
    <?php if(isset($_POST['search_btn'])) { 
          $dep_date = $_POST['dep_date'];                        
          $ret_date = $_POST['ret_date'];  
          $dep_city = $_POST['dep_city'];  
          $arr_city = $_POST['arr_city'];     
          $type = $_POST['type'];
          $f_class = $_POST['f_class'];
          $passengers = $_POST['passengers'];
          if($dep_city === $arr_city){
            header('Location: index.php?error=sameval');
            exit();    
          }
          if($dep_city === '0') {
            header('Location: index.php?error=seldep');
            exit(); 
          }
          if($arr_city === '0') {
            header('Location: index.php?error=selarr');
            exit();              
          }
        ?>
        <div class="container mt-5">
            <h2 class="text-center text-light">FLIGHTS FROM: <br>
            <span>
                <?php echo $dep_city; ?> to <?php echo $arr_city; ?>
            </span>    
            </h2>
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th scope="col">Airline</th>
                        <th scope="col">Depature</th>
                        <th scope="col">Arrival</th>
                        <th scope="col">Status</th>
                        <th scope="col">Fare</th>
                        <th scope="col">Buy</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = 'SELECT * FROM flight WHERE source=? AND destination =? AND 
                        DATE(departure)=? ORDER BY price';
                    $stmt = mysqli_stmt_init($conn);
                    mysqli_stmt_prepare($stmt,$sql);                
                    mysqli_stmt_bind_param($stmt,'sss',$dep_city,$arr_city,$dep_date);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    while ($row = mysqli_fetch_assoc($result)) {
                    $price = (int)$row['price']*(int)$passengers;
                    if($type === 'round') {
                        $price = $price*2;
                    }
                    if($f_class == 'B') {
                        $price += 0.5*$price;
                    }
                    if($row['status'] === '') {
                        $status = "Not yet Departed";
                        $alert = 'alert-primary';
                    } else if($row['status'] === 'dep') {
                        $status = "Departed";
                        $alert = 'alert-info';
                    } else if($row['status'] === 'issue') {
                        $status = "Delayed";
                        $alert = 'alert-danger';
                    } else if($row['status'] === 'arr') {
                        $status = "Arrived";
                        $alert = 'alert-success';
                    }                   
                    echo "
                    <tr class='text-center'>                  
                        <td>".$row['airline']."</td>
                        <td>".$row['departure']."</td>
                        <td>".$row['arrival']."</td>
                        <td>
                        <div>
                            <div class='alert ".$alert." text-center mb-0 pt-1 pb-1' 
                                role='alert'>
                                ".$status."
                            </div>
                        </div>  
                        </td>                   
                        <td>$ ".$price."</td>
                        ";
                    if(isset($_SESSION['userId']) && $row['status'] === '') {   
                        echo " <td>
                        <form action='pass-form.php' method='post'>
                        <input name='flight_id' type='hidden' value=".$row['flight_id'].">
                        <input name='type' type='hidden' value=".$type.">
                        <input name='passengers' type='hidden' value=".$passengers.">
                        <input name='price' type='hidden' value=".$price.">
                        <input name='ret_date' type='hidden' value=".$ret_date.">
                        <input name='class' type='hidden' value=".$f_class.">
                        <button name='book-btn' type='submit' 
                        class='btn btn-success mt-0'>
                        <div style=''>
                        <i class='fa fa-lg fa-check'></i>  
                        </div>
                        </button>
                        </form>
                        </td>                                                       
                        "; 
                    } elseif (isset($_SESSION['userId']) && $row['status'] === 'dep') {
                        echo "<td>Not Available</td>";
                    } else {
                        echo "<td>Login to continue</td>";
                    }
                    echo '</tr> ';                 
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php } ?>
    </main>

    <footer class="mt-5">
        <?php //subview('footer.php'); ?>
    </footer>