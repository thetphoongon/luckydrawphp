<?php
include "inc/header.php";
include "inc/functions.php";

if(isset($_POST['delete'])){
    if(delete_customer(filter_input(INPUT_POST, 'delete', FILTER_SANITIZE_NUMBER_INT))){
        echo "<script type='text/javascript'> window.location = 'customer_list.php'; </script>";
        exit;
    }else{
        echo "<script type='text/javascript'> window.location = 'customer_list.php'; </script>";
        exit;
    }
}

?>
<section class="main_section">
    <div class="container hero-section">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php
                    if(isset($error_message)){
                        echo "<p class='alert alert-danger mt-3'>$error_message</p>";
                    }
                ?>
                <h3 class="add-project mt-custom">Customer List</h3>
                <a href="customer.php" class="action_link">
                    <div class="action_icon">
                    <img src="img/users-256.png" alt="project list icon" class="img-fluid img-margin">
                       Add Customer
                    </div>
                </a>
                <div class="table-responsive">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">ph_no</th>
                        <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach (get_customer_list() as $item) {
                            echo "<tr>";
                            echo "<td>". $item['id']. "</td>"; 
                            echo "<td>". $item['name']. "</td>"; 
                            echo "<td>". $item['email']. "</td>";
                            echo "<td>". $item['ph_no']. "</td>";
                            
                            echo "<td><a class='btn btn-primary btn-sm' href='customer.php?id=" . $item['id'] . "'>Edit</a>";
                            echo "<form method='post' action='customer_list.php' class='d-inline float-right' onsubmit=\"return confirm('Are you sure you want to delete this project?');\">";
                            echo "<input type='hidden' value='".$item['id'] ."' name='delete'>";
                            echo "<input type='submit' class='btn btn-danger btn-sm' value='Delete'>";
                            echo "</form>";
                            echo "</td>";
                            
                            echo "</tr>";
                        }
                    ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</section>
    
<?php
include "inc/footer.php";
?>