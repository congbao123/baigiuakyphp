    <meta charset="utf-8">
    <?php
        error_reporting(E_ALL ^ E_DEPRECATED);                                                         
        require_once 'database.php';
        error_reporting(2);

        // $target_file = "../" . basename($_FILES["FileImage"]["name"]);
        // $uploadOk = 1;

        if (isset($_POST['addProduct']))
        {
            $keywordPr = '';
            $descriptPr = '';
            $status = 0;

            $target_file = "../" . basename($_FILES["FileImage"]["name"]);
            $uploadOk = 1;

            $image = basename($_FILES["FileImage"]["name"]);
            if ($image == null || $image = '')
            {
                $image = $_POST['image'];
                $uploadOk = 0;
            } else
            {   
                $check = getimagesize($_FILES["FileImage"]["tmp_name"]);
                if ($check !== false)
                {
                    $image = basename($_FILES["FileImage"]["name"]);
                    $uploadOk = 1;
                } else {  
                    // Xử lý lỗi hình ảnh không hợp lệ
                    $image = '';
    ?>                               
                    <script type="text/javascript">
                        window.location = 'themsanpham.php?notimage=notimage';
                    </script>
    <?php
                    $uploadOk = 0;
                }
            }


            //Upload image
            if (file_exists($target_file)) {
                $uploadOk = 0;
            }

            if ($uploadOk == 0)
            {
            } else {
                if (move_uploaded_file($_FILES["FileImage"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["FileImage"]["name"]) . " has been uploaded.";
                } else {
                    echo "<script>alert('khong the di chuyen tep!');</script>";
                }
            }
            if (isset($_POST['txtName'])) {
                $namePr = $_POST['txtName'];
            }
            
            if (isset($_POST['category'])) {
                $categoryPr = $_POST['category'];
            }
            
            if (isset($_POST['txtPrice'])) {
                $pricePr = $_POST['txtPrice'];
            }

            if (isset($_POST['txtSalePrice'])) {
                $salePricePr = $_POST['txtSalePrice'];
            } 
        
            if (isset($_POST['txtNumber'])) {
                $quantityPr = $_POST['txtNumber'];
            }

            if (isset($_POST['txtKeyword'])) {
                $keywordPr = $_POST['txtKeyword'];
            } 

            if (isset($_POST['txtDescript'])) {
                $descriptPr = $_POST['txtDescript'];
            }

            if (isset($_POST['status'])) {
                $status = $_POST['status'];
            }

            // truy vấn
            $sql = "INSERT INTO products(name, category_id, image, description, price, saleprice, created, quantity,  keyword, status) 
                    VALUES('$namePr', '$categoryPr', '$image', '$descriptPr', '$pricePr', '$salePricePr', now(), '$quantityPr', '$keywordPr', '$status');";
                     $result = mysqli_query($conn,$sql);
                    if (!$result) {
                        die("Query failed: " . mysqli_error($conn));
                    } 
            if($result)
            {
                header("location:datatsp.php?addps=success");
                exit();
            }
            else {
                header("location:datatsp.php?addpf=fail");
                exit();
            }
        }
    ?>
<!-- basename(): Đây là một hàm PHP dùng để trích xuất phần tên tệp từ đường dẫn hoặc chuỗi. -->
 <!-- Trong trường hợp này, basename() được sử dụng để lấy phần tên tệp hình ảnh từ đường dẫn tệp tải lên.
 Ví dụ, nếu tệp hình ảnh có đường dẫn là "uploads/image.jpg", thì basename() sẽ trả về "image.jpg". -->