<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
<style type="text/css">
	   		.wrapper{
			width: 1000px;
			margin: auto;
		}
		.header{
			height: 55px;
			margin: auto;	
		}
		.menu{
			height: 30px;
			background-color:black;
		}
		.menu ul li{
			list-style: none;
			text-align: center;
			display: inline-table;
		}
		.menu ul li a{
			text-decoration:none;
			font-size: 16px;
			margin: 30px;
			padding: 5px;
			text-transform: uppercase;
			color: White;
		}
		.menu a:hover {
			text-decoration: underline;
		}
		.banner img{
			width: 1000px;
			height: 500px;
		} 
		.content{
			height: 800px;
		}
		.left{
			width: 20%;
			background-color: gray;
			float: left;
			height: 500px;
		}
		.left>p{
			background-color: white;
			font-size: 22px;
			font-family: arial;
			text-align: center;			
		}
		.category ul li{
			list-style: none;
		}
		.category ul li a{
			color: white;
			font-size: 20px;
			text-decoration: none;
			font-family: comic sans Ms;
		}
		.category a:hover{
			text-decoration: underline;
		}
		.brand ul li{
			list-style: none;
		}
		.brand ul li a{
			color: white;
			font-size: 20px;
			text-decoration: none;
			font-family: comic sans Ms;

		}
		.brand a:hover{
			text-decoration:underline;
		}
		.right{
			width: 100%;
			height: 500px;
			background-image: url(images/download.jpg);
			
		}
	   .enter{
	   	margin-left: 400px;
	   	padding-top: 160px;

	  }
	  .footer{
       	margin: auto;
       	padding-top: 40px;
       	box-sizing: border-box;
       	font-family:comic sans Ms ;
       	display: flex;
       	align-items: center;
       	background-color: black;
       	color: white;
       	width: 1000px;
       }
       .hh>p {
       	text-align: left;
       	font-size: 40px;
       	margin: 10px;
       	padding: 5px;
       }
       .link>h2{
       	text-align: center;
       }
       .link ul li{
       	list-style: none;
       }
       .link ul li a{
			color: blueviolet;
			text-decoration: none;
			text-align: left;
		}
       .link a:hover{
       	text-decoration: underline;
       }
       .address{
       	text-align: left;
       }
       .address>h2{
       	text-align: center;
       }
       .address ul li{
       list-style: none;
       }
       .address ul li a {
       	text-decoration: none;
       }
       .address ul li a:hover{
       	text-decoration: underline;
       }
	   		
	    
	</style>
</head>
<body  >
	<!--d??ng th??? div ????? ph??n chia b??? c???c -->
<div class="wrapper">
<div class="header">
 <div id="search">
	<from>
      <input type="text" name="" placeholder="search" >
      <input type="submit" name="search" value="search">
    </from>
 </div>
<div class="menu">
<ul>
<li><a href="http://localhost/asm2/index.php"> Home page </a></li>
<li><a href="http://localhost/asm2/introduction.php"> itroduction </a></li>
<li><a href="http://localhost/asm2/login2.php">Login</a></li>
<li><a href="http://localhost/asm2/dangnhap.php">Register</a></li>
<li><a href="http://localhost/asm2/add_product.php">Add Product</a></li>
</ul>
</div>
<div class="banner">        
    <img src="img/1.jpg" alt="Slideshow Image 1" />
 </div>
<div class="content">
<!-- N???u s??? d???ng layout 2 c???t th?? ph???n content ch??ng ta chia l??m 2-->
<div class="left">
<p> Product </p>
<div class="category"> 
<ul>
<li><a href=""> Lego </a> </li>
<li><a href=""> Dolls </a></li>
<li><a href=""> Puzzles</a></li>
</ul>
</div>
<p> Brand </p>
<div class="brand"> 
<ul>
<li><a href=""> Lego </a></li>
<li><a href=""> Bandai Namco </a></li>
<li><a href=""> Barbie </a></li>
<li><a href=""> King dom</a></li>
</ul>
</div>
</div>
<div class="right">
<div class="enter">
<form method="POST" enctype="multipart/form-data">
	<table>
		<tr> 
			<td> Product ID</td>
			<td><input type="text" name="product_id"> </td>
		</tr>
		<tr> 
			<td> Product Name</td>
			<td><input type="text" name="product_name"> </td>
		</tr>
		<tr> 
			<td> Product Price</td>
			<td><input type="text" name="product_price"> </td>
		</tr>
		<tr> 
			<td> Product Img</td>
			<td><input type="file" name="product_img"> </td>
		</tr>
		<tr> 
			<td> </td>
			<td><input type="submit" name="add_product" value="add"> </td>
		</tr>
	</table>
	
</form>

<?php 
$connect = mysqli_connect('3.132.234.157','quang','123@123a','toy');
				if(!$connect){
					echo "K???t n???i th???t b???i";
				}

				if(isset($_POST['add_product'])){
					$product_id = $_POST['product_id'];
					$product_name = $_POST['product_name'];
					$product_price = $_POST['product_price'];
					//L???y ???nh t??? th?? m???c b???t k??? c???a m??y t??nh
					$product_img = $_FILES['product_img']['name'];
					// di chuy???n ???nh t??? th?? m???c b???t k??? sang th?? m???c Images_name c???a htdoc
					$product_img_images = $_FILES['product_img']['img_name'];

					// ????a ???nh t??? th?? m???c images sang th?? m???c c???n l??u 
					move_uploaded_file($product_img_images, "Img/$product_img");

					//Th??m s???n ph???m v??o c?? s??? d??? li???u
					$sql = "INSERT INTO product VALUES('$product_id','$product_name','$product_price','$product_img')";
					$result = mysqli_query($connect,$sql);
					if($result){
						echo"<script>alert('Add new product successfully ') </script>";
						echo"<script> window.open('index.php','_self') </script>";
					}
					else{
						echo"<script>alert(' Add new product failed') </script>";
					}
				}
?>
</div>
</div>
<div class="footer">
 <div class="hh">
 <p> Thank you for comming to my store </p>
 </div >
 <div class="link ">
 <h2> Link</h2>
<ul>
<li><a href=""> Home page </a></li>
<li><a href="https://123website.com.vn/danh-muc-san-pham/mau-website-thong-tin/mau-website-gioi-thieu-san-pham/"> introduction</a></li>
<li><a href="http://localhost/PBIT17102%20WEBSITE/login2.php">Login</a></li>
<li><a href="http://localhost/PBIT17102%20WEBSITE/dangnhap.php">Register</a></li>
</ul>	
</div>
<div class="address ">
<h2>Address and hotline</h2>
<ul>
<li>???????ng Ho??ng Qu???c Vi???t, Th??nh Ph??? H?? N???i ,Vi???t Nam </li>
<li><a href="">+84 123 222 333</a></li>
<li><a href="">+84 333 555 111</a></li>
<li>Mail:<a href="">quang1234@gmail.com</a></li>
</ul>
</div>	
</div>
</div>
</div>
</div>
	
</body>
</html>