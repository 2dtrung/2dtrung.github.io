<?php
  session_start();

  $status="";
  if (isset($_POST['action']) && $_POST['action']=="remove"){
  if(!empty($_SESSION["shopping_cart"])) {
	foreach($_SESSION["shopping_cart"] as $key => $value) {
		if($_POST["code"] == $key){
		unset($_SESSION["shopping_cart"][$key]);
		$status = "<div class='box' style='color:red;'>
		1 Sản phẩm vừa được xóa khỏi giỏ hàng!</div>";
		}
		if(empty($_SESSION["shopping_cart"]))
		unset($_SESSION["shopping_cart"]);
			}
		}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}

}

  function isAdmin() {
    if ( isset( $_SESSION['username'] ) && $_SESSION['username'] && '1' == $_SESSION['user_level']) {
        return true;
    } else {
        return false;
    }
  }
  function isNotLoggedIn() {
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
      return true;
    } else {
      return false;
    }
  }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!--bootsstrap cdn-->
    <link rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css"
    integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA"
    crossorigin="anonymous">
    <!--font awsome cdn-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous">
    <script type="text/javascript">
      function toBottom() {
        window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' })
      }
    </script>
    <link rel="stylesheet" href="css/style.css">
    <title>Introduction</title>
</head>
<body>
<!--top bar (pt=padding top ,pb=padding bottom) -->
    <div class="container-fluid bg-dark header-top d-md-block">
        <div class="container">
            <div class="row text-light pt-2 pb-2">
                <div class="col-md-5">
                    <i class="far fa-envelope" aria-hidden="true"></i>
                    tiuh@tiuh.corp
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-2"><i class="fa fa-user" aria-hidden="true"> </i> <a class="dropdown-toggle" style="color: white; text-decoration: none;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Tài khoản
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#"  <?php if (isNotLoggedIn()){ echo 'style="display:none;"'; } ?> >Chào, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></a>
                  <a class="dropdown-item" href="./admin/dashboard.php" <?php if (!isAdmin()) { echo 'style="display:none;"'; } ?> >Dashboard</a>
                  <a class="dropdown-item" href="login.php" <?php if (!isNotLoggedIn()){ echo 'style="display:none;"'; } ?> >Đăng nhập</a>
                  <a class="dropdown-item" href="register.php" <?php if (!isNotLoggedIn()){ echo 'style="display:none;"'; } ?> >Đăng kí</a>
                  <a class="dropdown-item" href="logout.php" <?php if (isNotLoggedIn()){ echo 'style="display:none;"'; } ?> >Đăng xuất</a>
                </div></div>
                <div class="col-md-2"><i class="fa fa-cart-plus" aria-hidden="true"> </i> <a style="color: white; text-decoration: none;" href="cart.php"> Giỏ hàng </a></div>
            </div>
        </div>
    </div>


<!--nav bar-->
<div class="container-fluid bg-black">

    <nav class="container navbar navbar-expand-lg navbar-dark bg-black">
            <a class="navbar-brand" href="index.php"><h1>Tiuh</h1></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="intro.php">Giới thiệu</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Sản Phẩm
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="shoes.php">Giày</a>
                    <a class="dropdown-item" href="accessories.php">Phụ Kiện</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="sale.php">Giảm giá</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="javascript:toBottom()">Liên hệ</a>
                </li>
              </ul>
              <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
                <input class="form-control mr-sm-2" id="link_id" name="search" type="text" placeholder="Search" aria-label="Search">
                <input class="btn btn-outline-success my-2 my-sm-0" type="submit" value="Search" onclick="javascript:goTo()">
              </form>
            </div>
          </nav>
</div>


  <div class="container-fluid bg-light-gray">

  <div class="container pt-5">

    <div class="row">
      <h3>GIỎ HÀNG</h3>
    </div>
      <div class="row">
      <div class="underline"></div>
    </div>
  </div>
  <div class="container-fluid bg-light-gray">
  <div class="container pt-5">
  <div class="cart">
    <?php
    if(isset($_SESSION["shopping_cart"])){
        $total_price = 0;
    ?>
    <table class="table">
    <tbody>
    <tr>
    <td></td>
    <td>TÊN SẢN PHẨM</td>
    <td>SỐ LƯỢNG</td>
    <td>GIÁ 1 SẢN PHẨM</td>
    <td>TỔNG GIÁ</td>
    </tr>
    <?php
    foreach ($_SESSION["shopping_cart"] as $product){
    ?>
    <tr>
    <td>
    <img src='<?php echo $product["image"]; ?>' width="50" height="40" />
    </td>
    <td><?php echo $product["name"]; ?><br />
    <form method='post' action=''>
    <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
    <input type='hidden' name='action' value="remove" />
    <button type='submit' class='btn btn-danger remove'>Xóa sản phẩm</button>
    </form>
    </td>
    <td>
    <form method='post' action=''>
    <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
    <input type='hidden' name='action' value="change" />
    <select name='quantity' class='quantity' onChange="this.form.submit()">
    <option <?php if($product["quantity"]==1) echo "selected";?>
    value="1">1</option>
    <option <?php if($product["quantity"]==2) echo "selected";?>
    value="2">2</option>
    <option <?php if($product["quantity"]==3) echo "selected";?>
    value="3">3</option>
    <option <?php if($product["quantity"]==4) echo "selected";?>
    value="4">4</option>
    <option <?php if($product["quantity"]==5) echo "selected";?>
    value="5">5</option>
    </select>
    </form>
    </td>
    <td><?php echo "$".$product["price"]; ?></td>
    <td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
    </tr>
    <?php
    $total_price += ($product["price"]*$product["quantity"]);
    }
    ?>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td colspan="5" align="left">
    <strong>Tổng cộng: <?php echo "$".$total_price; ?></strong>
    </td>
    </tr>
    <tr>
      <td></td>
      <td></td>
      <td></td>
      <td align="right">
      <a type="button" class="btn btn-success" href="index.php">
          <span class="glyphicon glyphicon-shopping-cart"></span> Tiếp tục mua hàng
      </a></td>
      <td>
      <button type="button" class="btn btn-success">
          Thanh toán <span class="glyphicon glyphicon-play"></span>
      </button></td>
    </tr>
    </tbody>
    </table>
      <?php
    }else{
    echo "<h3>Giỏ hàng của bạn trống!</h3>";
    }
    ?>
    </div>
  </div>
  </div>

    <div style="clear:both;"></div>

    <div class="message_box" style="margin:10px 0px;">
    <?php echo $status; ?>
  </div>



  <div class="container mt-5">
    <div class="row">
      <h4>TIN TỨC NỔI BẬT</h4>
    </div>
    <div class="underline"></div>
  </div>

  <div class="container pb-5 blog">
   <div class="row">
     <div class="col-md-6">
       <div class="media mt-5">
            <img src="img/img-25.jpg" class="img-fluid mr-3" alt="media1">
            <div class="media-body mt-2">
              <h5>Joshua Kimmich. Cầu thủ tất cả trong một…</h5>
              <p>Lorem ipsum dolor sit amet.</p>
              <p><i class="fa fa-user" aria-hidden="true"></i> Trung. Date: 12-5-2020</p>
            </div>
          </div>
     </div>


     <div class="col-md-6">
       <div class="media mt-5">
            <img src="img/img-26.jpg" class="img-fluid mr-3" alt="media1">
            <div class="media-body mt-2">
              <h5>Tin chuyển nhượng 30/5…</h5>
              <p>Lorem ipsum dolor sit amet.</p>
              <p>Lorem ipsum dolor sit amet.</p>
              <p><i class="fa fa-user" aria-hidden="true"></i> Trung. Date: 30-5-2020</p>
            </div>
          </div>
     </div>
   </div>


    <div class="row">
     <div class="col-md-6">
       <div class="media mt-5">
            <img src="img/img-27.jpg" class="img-fluid mr-3" alt="media1">
            <div class="media-body mt-2">
              <h5>Đội tuyển Việt Nam trên hành trình…</h5>
              <p>Lorem ipsum dolor sit amet.</p>
              <p><i class="fa fa-user" aria-hidden="true"></i> Trung. Date: 2-6-2020</p>
            </div>
          </div>
     </div>


     <div class="col-md-6">
       <div class="media mt-5">
            <img src="img/img-28.jpg" class="img-fluid mr-3" alt="media1">
            <div class="media-body mt-2">
              <h5>Giấc mơ sân cỏ của các cậu bé…</h5>
              <p>Lorem ipsum dolor sit amet.</p>
              <p>Lorem ipsum dolor sit amet.</p>
              <p><i class="fa fa-user" aria-hidden="true"></i> Trung. Date: 4-6-2020</p>
            </div>
          </div>
     </div>
   </div>

  </div>



  <footer>
    <div class="container-fluid pt-5 pb-5 bg-dark text-light">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
          <div class="row">
            <h5>Thử nghiệm</h5>
          </div>
          <div class="row mb-4">
          <div class="underline bg-light" style="width: 50px;"></div>
          </div>

              <p><i class="fa fa-chevron-right" aria-hidden="true"></i> Đăng kí</p>
              <p><i class="fa fa-chevron-right" aria-hidden="true"></i> Đăng nhập</p>
              <p><i class="fa fa-chevron-right" aria-hidden="true"></i> Bảo mật</p>
              <p><i class="fa fa-chevron-right" aria-hidden="true"></i> Bình luận</p>
              <p><i class="fa fa-chevron-right" aria-hidden="true"></i> Hướng dẫn</p>

          </div>


          <div class="col-md-3">
            <div class="row">
            <h5>Bài đăng gần nhất</h5>
          </div>
          <div class="row mb-4">
          <div class="underline bg-light" style="width: 50px;"></div>
          </div>
          <div class="row">
            <div class="media">
              <img src="img/img-25.jpg" class="img-fluid" alt="media-image">
              <div class="media-body ml-2">
                <h6>Joshua Kimmich. Cầu thủ tất cả trong một!</h6>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="media">
              <img src="img/img-26.jpg" class="img-fluid" alt="media-image">
              <div class="media-body ml-2">
                <h6>Tin chuyển nhượng 30/5</h6>
              </div>
            </div>
          </div>
          </div>

          <div class="col-md-3 pl-4">
            <div class="row">
            <h5>Liên hệ</h5>
          </div>
          <div class="row mb-4">
          <div class="underline bg-light" style="width: 50px;"></div>
          </div>
          <div class="row">
            <address><span style="color:#777" class="fa fa-map-marker"></span> &nbsp;TIUH - Số xx, phường XX, Quận XX, TP.HCM</address>
					  <div class="phone-footer"><span style="color:#777" class="fa fa-phone"></span> &nbsp;Hotline: 1800.xxxx (miễn phí)</div>
					  <div class="phone-footer"><img src="//bizweb.dktcdn.net/100/108/842/themes/692783/assets/zalo.png?1591004780266" alt="zalo1"/> &nbsp;Zalo bán lẻ: xxxxxxxxxx</div>
					  <div class="phone-footer"><img src="//bizweb.dktcdn.net/100/108/842/themes/692783/assets/zalo.png?1591004780266" alt="zalo2"/> &nbsp;<a>Zalo bán sỉ: xxxxxxxxxx</a> </div>
          </div>
          </div>

          <div class="col-md-3">
            <div class="row">
            <h5>Tags</h5>
          </div>
          <div class="row mb-4">
          <div class="underline bg-light" style="width: 50px;"></div>
          </div>
          <a class="btn btn-outline-light" type="button" href="shoes.php">Nike</a> <a class="btn btn-outline-light" type="button" href="shoes.php">Giày đá banh</a> <a class="btn btn-outline-light" type="button" href="accessories.php">Phụ kiện</a> <a class="btn btn-outline-light" type="button" href="sale.php">Sale</a> <button class="btn btn-outline-light">Adidas</button>
          </div>
        </div>
      </div>
    </div>
  </footer>







    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
</body>
</html>
