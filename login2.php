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
			height: 350px;
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
	   .enter table input[type=text]{
			width: 200px;
			height:20px;
		}
		.enter table input[type=password]{
			width: 200px;
			height:20px;
		}
		
		.enter table input[type=submit]{
		height:30px;
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
<form method="POST">
		<table style="color: black; font-size: 30px;">
			<tr>
				<td>Username:</td>
				<td><input type="text" name="username"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="password"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="login" value="Login"></td>
			</tr>
		</table>
	</form>
</div>
	<?php 
$connect = mysqli_connect('3.132.234.157','quang','123@123a','toy');
if(!$connect){
echo"K???t n???i th???t b???i";
}
   // N???u click v??o n??t login th?? m???i th???c hi???n 
if (isset($_POST['login'])) {
    $username= $_POST['username'];
    $password= $_POST['password'];
    // Truy v???n t??? b???ng user c???t username = gi?? tr??? username nh???p t??? form v?? c???t password = gi?? tr??? password nh???p t??? form
    $sql = "SELECT * FROM name WHERE username ='$username' AND password = '$password'";
    // Th???c thi truy v???n
    $result = mysqli_query($connect, $sql);
    // Tr??? v??? k???t qu??? , ch??nh l?? c??c d??ng ???????c truy v???n
    $row = mysqli_num_rows($result);
    $row_user=mysqli_fetch_array($result);
    // N???u $row > 0 --> c?? tr??n 1 d??ng trong CSDL tr??ng v???i d??? li???u nh???p v??o form -> ????ng nh???p th??nh c??ng 
    if($row>0){
       // ????ng nh???p thanhf c??ng r???i m???i l??u t??n ????ng nh???p l???i v??o bi???n to??n c???c $_session
       $_SESSION['username']=$username;
       echo "<script> alert('Login successfully')</script>";
       echo "<script>window.open('index.php','_seft')</script>";
    }
    else{
        echo"<script>alert('username or password wrong')</script> ";
    }
}
?>
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