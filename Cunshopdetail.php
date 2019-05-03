<!DOCTYPE html>
<html>
<head>
	<title>Home page</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="header">
			<div class="nava">
			<ul>
				<li><a href="https://designweb.herokuapp.com/Cunshop.php">Trang chủ</a></li>
				<li><a href="">Kiểm tra đơn hàng</a></li>
				<li><a href="">Đăng nhập</a></li>
				<li><a href="https://designweb.herokuapp.com/Dangkykh.php">đăng ký</a></li>
				<li><a href="https://designweb.herokuapp.com/admin.php">Admin</a></li>
			</ul>
			</div>
		 	<div class="banner">
		 		<div class="Home">
					<a href="https://designweb.herokuapp.com/Cunshop.php">Cun Shop</a>
				</div>
				<div class="Search">
					<div class="Search1">
						<form class="example" action="Search.php" method="get">
		  				<input type="text" placeholder="Search.." name="search">
		  				<button type="submit"><i class="fa fa-search"></i></button>
						</form>
					</div>
				</div>
		 	</div>
	</div>
	<div class="main">
		<div class="navb">
			<ul>
				<?php
		          include 'ConnectorSQL.php';
		            $querycategory = "SELECT categoryid, categoryname FROM category";
		            $total = pg_query($connection,$querycategory);
		            if (pg_num_rows($total) > 0) {
		            // output data of each row
		            while($rowcategory = pg_fetch_assoc($total)) {
		              $categoryid = $rowcategory['categoryid'];
		              $categoryname = $rowcategory['categoryname'];
		          ?>
		         <li><a href="Cunshopdetail.php?categoryid= <?= $categoryid; ?> "><?= $categoryname; ?></a></li>
		       <?php }} ?>
			</ul>
		</div>
		<div>
			<?php
		          include 'ConnectorSQL.php';
		            $querycategory = "SELECT * FROM category WHERE categoryid = $_GET['categoryid']";
		            $total = pg_query($connection,$querycategory);
		            if (pg_num_rows($total) > 0) {
		            // output data of each row
		            while($rowcategory = pg_fetch_assoc($total)) {
		              $categoryid = $rowcategory['categoryid'];
		              $categoryname = $rowcategory['categoryname'];
		          ?>
					<b style="font-size: 30px;"><a style="text-decoration: none; color: black;"  href="Cunshopdetail.php?categoryid=<?= $categoryid; ?>"><?=$r['categoryname']?></a></b>

				<?php 
					}}
				?>
		</div>


		<div >
			<br>
		<?php

		     include 'ConnectorSQL.php';

		    $queryfirst = "SELECT

		   product.productid as 'productid',
		   product.productname as 'productname',
		   product.unitprice as 'unitprice',
		   product.images as 'images',
		   product.stock as 'stock',
		   product.manufacturer as 'manufacturer',
		   product.categoryid as 'categoryid',
		   category.categoryid

		    FROM product, category";
		    $resultfirst = pg_query($connection,$queryfirst);
		    if (pg_num_rows($resultfirst) > 0) {
		      // output data of each row
		      while($rowfirst = pg_fetch_assoc($resultfirst)) {

		            $productid_best = $rowfirst['productid'];
		            $productname_best = $rowfirst['productname'];
		            $unitprice_best = $rowfirst['unitprice'];
		            $images_best = $rowfirst['images'];
		            $manufacturer_best = $rowfirst['manufacturer'];
		            $stocksold = $rowfirst['stock'];

		            ?>

				<div class="item">
					<a href="Thongtinsanpham.php?productid=<?= $productid_best;  ?>"><div class="iimage"><img src="<?= $images_best; ?>" alt="">
					</div></a>
					<div class="Thongtin">	Tên Sản Phẩm: <?= $productname_best; ?> <br> <br>
											Nhà sản Xuất: <?= $manufacturer_best; ?>  <br> <br>
											Giá Sản Phẩm: <?=$unitprice_best; ?>vnđ <br> <br>
											Số lượng sản phẩm:<?= $stocksold; ?>
					</div>
				</div>
				<?php
			}}
			?>
		</div>
	</div>		
	<div class="footer">
		<table  cellspacing="0" cellpadding="10" width= 100% align="center" >
			<tr >
			<th style="font-size: 17px; color:#FFFFFF"  >CUNSOP_KÊNH MUA SẮM & DỊCH VỤ TRỰC TUYẾN HÀNG ĐẦU VIỆT NAM!</th>
			<th  rowspan="2" style=" color:#FFFFFF" > CÔNG TY TNHH Duy Thắng <br>
 													Giấy CNĐKDN: 289037490 – Ngày cấp: 06/5/2005, được sửa đổi lần thứ 17 ngày 24/7/2017. <br>
 													Cơ quan cấp: Phòng Đăng ký kinh doanh – Sở kế hoạch và Đầu tư hà Nội. <br>
 													Địa chỉ đăng ký kinh doanh: Tầng 71, Tòa Nhà Keangnam, E6, Phạm Hùng, Phường Mễ Trì, Quận Nam Từ Liêm, Hà Nội, Việt Nam <br>  <br><br><br>     @Cunshop 2018
 			</th>
			</tr>
			<tr >
				<td ><div align="center" style="padding-top:0%, width= 20px; color:#FFFFFF" >	
				</style>Mua hàng trực tuyến (mua hàng online) mang lại sự tiện lợi, lựa chọn đa dạng hơn và các dịch vụ tốt hơn cho người tiêu dùng, thế nhưng người tiêu dùng Việt Nam vẫn chưa tận hưởng được những tiện ích đó. Chính vì vậy Cunshop Việt Nam được triển khai với mong muốn trở thành trung tâm mua sắm trực tuyến số 1 tại Việt Nam, nơi bạn có thể chọn lựa mọi thứ để chăm sóc thú cưng của mình, từ thức ăn cho chó, thức ăn cho mèo, chuồng chó, chuồng cho mèo, và các cả quàn áo cho chúng, các dịch vụ chăm sóc dành riêng cho thú cưng... Chúng tôi có tất cả!</div></td>	
			</tr>
		</table>
	</div>
</body>
</html>

