<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "fashion";

// Create connection
$conn = mysqli_connect($host, $user, $password, $database);
mysqli_set_charset($conn, 'UTF8');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .khungngoai {
            display: flex;
            overflow: hidden; /* Hide overflowing content */
            width: 600px; /* Set container width */
        }

        .khungngoai img {
            flex-shrink: 0; /* Prevent images from shrinking */
            width: 100%; /* Ensure each image takes the full width */
            height: auto; /* Maintain aspect ratio */
        }
    </style>
</head>

<body>
    <div class="khung_ngoai">
        <div>
            <?php
            $sql = "SELECT image FROM slides WHERE status-1";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <img width="200px" height="200px" src="<?php echo $row['image']; ?>" alt=""> <?php  } ?>
        </div>
    </div>
</body>

</html>