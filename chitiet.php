
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" >
</head>
<style>
    .ctsp{
        display: flex;

    }
</style>
<body>
    <?php require_once 'database.php';
     error_reporting(2);
    //  if (isset($_GET['id'])) {
    //     $id = $_GET['id'];
    //   $sql = "SELECT *FROM product WHERE id = $id";
    //   $result = mysqli_query($conn,$sql);
    //   if(!$result) {
    //     echo $sql;
    //     die('error');
    //   }
    //   else{
    //     while($row=mysqli_fetch_assoc($result)){
    //         if($row['image']==null || $row['image']=='') {
    //             $thum_Image="";}
    //             else {
    //                 $thum_Image=$row['image'];
    //             }
    //         }
    //     }
    // }
              $id = $_GET['id'];
          
          $sql = "SELECT * FROM products WHERE id = $id";
          $result = mysqli_query($conn, $sql);
          
          if (!$result) {
              echo "Error: " . mysqli_error($conn);
    }

     $row = mysqli_fetch_assoc($result); 
   ?>    
    <!-- <h1>Chi tiết sản phẩm: <?php echo $row['name']; ?></h1>
    <div class="ctsp">
    <div>
        <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" width="300">
    </div>
    <p>Mô tả: <?php echo $row['description']; ?></p>
    <p>Giá: <?php echo $row['price']; ?> đ</p>

    <a href="index.php">Quay lại</a>
    </div>   --> <h1 style="color:blueviolet;margin-top:30px; margin-left: 300px;" >Chi tiết sản phẩm: <?php echo $row['name']; ?></h1>
    <div class="container mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-3">
                            <div class="text-center p-4"> <img id="main-image" src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" width="250" /> </div>
                            <div class="thumbnail text-center"> <img onclick="change_image(this)" src="https://i.imgur.com/Rx7uKd0.jpg" width="70"> <img onclick="change_image(this)" src="https://i.imgur.com/Dhebu4F.jpg" width="70"> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span> </div> <i class="fa fa-shopping-cart text-muted"></i>
                            </div>
                            <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Orianz</span>
                                <h5 class="text-uppercase"> <?php echo $row['name'];?></h5>
                                <div class="price d-flex flex-row align-items-center"> <span class="act-price">$20</span>
                                    <div class="ml-2"> <small class="dis-price">$59</small> <span>40% OFF</span> </div>
                                </div>
                            </div>
                            <p class="about">Shop from a wide range of t-shirt from orianz. Pefect for your everyday use, you could pair it with a stylish pair of jeans or trousers complete the look.</p>
                            <div class="sizes mt-5">
                                <h6 class="text-uppercase">Size</h6> <label class="radio"> <input type="radio" name="size" value="S" checked> <span>S</span> </label> <label class="radio"> <input type="radio" name="size" value="M"> <span>M</span> </label> <label class="radio"> <input type="radio" name="size" value="L"> <span>L</span> </label> <label class="radio"> <input type="radio" name="size" value="XL"> <span>XL</span> </label> <label class="radio"> <input type="radio" name="size" value="XXL"> <span>XXL</span> </label>
                            </div>
                            <div class="cart mt-4 align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button> <i class="fa fa-heart text-muted"></i> <i class="fa fa-share-alt text-muted"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>