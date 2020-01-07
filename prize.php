<?php 
include "inc/header.php";
include "inc/functions.php";
?>
<?php
$prize_type='';
if(isset($_GET['id'])){
   list($id, $prize_type) = get_customer(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
}
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id= filter_input(INPUT_POST,'id' , FILTER_SANITIZE_NUMBER_INT);
    $prize_type = trim(filter_input(INPUT_POST,'prize' , FILTER_SANITIZE_STRING));

    if(add_prize($prize_type, $id)){
        echo "<script type='text/javascript'> window.location = 'prize_list.php'; </script>";
        echo "success";
        exit;
    }else{
        $error_message = 'Could not add project';
        exit;
    }
}

?>

<div class="container hero-section">
    <?php
        if(!empty($id))
        {
            echo '<h2 style="text-align: center;">Edit Prize</h2>';
        }else{
            echo '<h2 style="text-align: center;" class="custom-page">Add Prize</h2>';
        }
        
    ?>
    <form action="prize.php" method="POST">
    <div class="form-group">
        <label for="prize">Prize Type</label>
        <input type="text" class="form-control" id="prize" name="prize" value="<?php echo htmlspecialchars($prize_type); ?>" required>
    </div>
    <?php
        if(!empty($id)){
            echo '<input type="hidden" name="id" value="' . $id . '" />';
        }
        if(!empty($id)){
            echo '<button type="submit" class="btn btn-primary">Update</button>';
        }else{
            echo '<button type="submit" class="btn btn-primary button-margin">Add</button>';
        }
    ?>
    </form>
</div>
<?php include "inc/footer.php"; ?>