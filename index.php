<?php
include 'inc/header.php';
include 'inc/heroarea.php';
include 'inc/contact.php';
include 'inc/about.php';
?>
<?php
    // $sql = 'SELECT * FROM lucky_numbers WHERE customer_id in (SELECT customer_id FROM all_customer_count WHERE customer_count=(SELECT MAX(customer_count) FROM all_customer_count))';
    // $stmt = $conn->query($sql);
    // $max_customer_count = array();
    // while($rows = $stmt->fetchAll(PDO::FETCH_ASSOC)){
    //     $max_customer_count = $rows;
    // }
    // $max_random = $max_customer_count[array_rand($max_customer_count)];
    // echo "Max Count = " . ($max_random['lucky_number']);
    // echo "<br>";
    // $sql = 'SELECT * FROM lucky_numbers WHERE customer_id NOT IN (SELECT customer_id FROM lucky_numbers WHERE customer_id in (SELECT customer_id FROM all_customer_count WHERE customer_count=(SELECT MAX(customer_count) FROM all_customer_count)))';
    // $min_query = $conn->query($sql);
    // $min_customer_count = array();
    // while($rows = $min_query->fetchAll(PDO::FETCH_ASSOC)){
    //     $min_customer_count = $rows;
    // }
    // $min_random = $min_customer_count[array_rand($min_customer_count)];
    // echo "Min Count = " . ($min_random['lucky_number']);
?>
<?php
include 'inc/footer.php';
?>