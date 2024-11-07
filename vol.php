<?php
session_start();
require('conn.php');

// Perform some server-side processing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ensure 'title' parameter is set in POST data
    if (isset($_POST['title'])) {
        $title = $_POST['title'];
        
        // Insert into 'vol' table using prepared statement
        $sql = "INSERT INTO vol (vol, vol_name,s_date) VALUES (?, ?,curdate())";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("is", $vol, $title);
            
            // Get the last 'vol' value from the database and increment it
            $sql_last_vol = "SELECT vol FROM vol ORDER BY vol DESC LIMIT 1";
            $result_last_vol = $conn->query($sql_last_vol);
            if ($result_last_vol && $result_last_vol->num_rows > 0) {
                $row = $result_last_vol->fetch_assoc();
                $voll=$row['vol'] ;
                $vol = $row['vol'] + 1;
                $voldatesql="update vol set e_date=curdate() where vol=".$voll;
                $result_voldatesql=$conn->query($voldatesql);
            } else {
                $vol = 1; // If no rows found, start from 1
            }

            $stmt->execute();
            
            // Redirect to 'index.php'
		
echo '<script>
    alert("New volume created successfully");
    window.location.href = "index.php";
</script>';
exit;

 // Stop further execution
        } else {
            // Handle prepared statement error
            echo "Error: " . $conn->error;
        }
    } else {
        // Handle missing 'title' parameter
        echo "Error: 'title' parameter is missing.";
    }
}
?>
