<div class="w3-container w3-center w3-teal"><h3>Categories</h3></div>
<?php
// Check database connection
if (!$dbcon) {
    die("Database connection failed: " . mysqli_connect_error());
}

// SQL query to select categories
$sql = "SELECT * FROM category";

// Execute SQL query
$result = mysqli_query($dbcon, $sql);

// Check if query was successful
if (!$result) {
    // Display error message if query fails
    echo "<div class='w3-panel w3-pale-red'>Error: " . mysqli_error($dbcon) . "</div>";
} else {
    echo "<div class='w3-container w3-border'>";
    // Fetch and display category data
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $catname = $row['catname'];
        $description = $row['description'];
        ?>
        <div class="w3-panel w3-border">
            <a href="cat.php?id=<?php echo $id; ?>"><?php echo $catname; ?></a><br>
            <?php echo $description; ?>
        </div>
        <?php
    }
    echo "</div>";
}

// Close database connection
mysqli_close($dbcon);
?>
