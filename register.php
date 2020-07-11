<?php

require_once "config.php";

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


$username = $password = $confirm_password = $name = $phone = $address = "";
$username_err = $password_err = $confirm_password_err = $name_err = $phone_err = $address_err = "";


if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    if(empty(trim($_POST["username"]))){
        $username_err = "Bạn chưa nhập tài khoản";
    } else{
        
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = $mysqli->prepare($sql)){
            
            $stmt->bind_param("s", $param_username);

            
            $param_username = trim($_POST["username"]);

            
            if($stmt->execute()){
                
                $stmt->store_result();

                if($stmt->num_rows == 1){
                    $username_err = "Tên tài khoản này không còn khả dụng";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Đã có lỗi xảy ra, vui lòng thử lại sau.";
            }

            
            $stmt->close();
        }
    }

    
    if(empty(trim($_POST["password"]))){
        $password_err = "Bạn chưa nhập mật khẩu!";
    } elseif(strlen(trim($_POST["password"])) < 5){
        $password_err = "Mật khẩu bạn nhập quá ngắn!";
    } else{
        $password = trim($_POST["password"]);
    }

    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Bạn chưa xác nhận mật khẩu!";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Mật khẩu xác nhận không khớp!";
        }
    }
    
    if(empty(trim($_POST["name"]))){
      $name_err = "Bạn chưa nhập họ và tên!";
    } elseif(strlen(trim($_POST["name"])) > 25){
      $name_err = "Tên bạn vừa nhập quá dài!";
    } else{
      $name = trim($_POST["name"]);
    }

    if(empty(trim($_POST["phone"]))){
      $phone_err = "Bạn chưa nhập số điện thoại!";
    } elseif(strlen(trim($_POST["phone"])) > 11){
      $phone_err = "Số điện thoại không đúng!";
    } elseif(strlen(trim($_POST["phone"])) < 10){
      $phone_err = "Số điện thoại không đúng!";
    } else{
      $phone = trim($_POST["phone"]);
    }
    
    if(empty(trim($_POST["address"]))){
      $address_err = "Bạn chưa nhập địa chỉ!";
    } elseif(strlen(trim($_POST["address"])) > 1000){
      $address_err = "Địa chỉ bạn nhập quá dài!";
    } else{
      $address = trim($_POST["address"]);
    }

    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($name_err) && empty($phone_err) && empty($address_err)){

        
        $sql = "INSERT INTO users (username, password, name, phone, address) VALUES (?, ?, ?, ?, ?)";

        if($stmt = $mysqli->prepare($sql)){
            
            $stmt->bind_param("sssss", $param_username, $param_password, $param_name, $param_phone, $param_address);

            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            $param_name = $name;
            $param_phone = $phone;
            $param_address = $address;

            
            if($stmt->execute()){
                
                header("location: login.php");
            } else{
                echo "Đã có lỗi xảy ra, vui lòng thử lại sau.";
            }

            
            $stmt->close();
        }
    }

    
    $mysqli->close();
}
?>

<!DOCTYPE html>
<html lang="en">
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
    function check(){
      var inVar = document.getElementById("username").value;
      var inPass = document.getElementById("password").value;
      var inRepass = document.getElementById("repassword").value;
      var inName = document.getElementById("name").value;
      var inPhone = document.getElementById("phone").value;
      var inAddress = document.getElementById("address").value;
      if(inVar == "" && inPass == ""){
        window.alert("Bạn chưa nhập tài khoản và mật khẩu!");
         
        return false;
      }
      if(inVar == ""){
        window.alert("Bạn chưa nhập tài khoản!");
         
        return false;
      }
      if(inPass == ""){
        window.alert("Bạn chưa nhập mật khẩu!");
         
        return false;
      }
      if(inRepass == ""){
        window.alert("Bạn chưa xác nhận mật khẩu!");
         
        return false;
      }
      if(inName == ""){
        window.alert("Bạn chưa nhập họ và tên!");
         
        return false;
      }
      if(inPhone == ""){
        window.alert("Bạn chưa nhập số điện thoại!");
         
        return false;
      }
      if(inAddress == ""){
        window.alert("Bạn chưa nhập địa chỉ!");
         
        return false;
      }
      if(inRepass != inPass){
        window.alert("Mật khẩu xác nhận không khớp!");
         
        return false;
      }
      if(inPass.length < 5){
        window.alert("Mật khẩu của bạn quá ngắn!");
         
        return false;
      }
      if(inName.length > 25){
        window.alert("Tên bạn vừa nhập quá dài!");
         
        return false;
      }
      if(inPhone.length > 11){
        window.alert("Số điện thoại không đúng!");
         
        return false;
      }
      if(inPhone.length < 10){
        window.alert("Số điện thoại không đúng!");
         
        return false;
      }
      if(inAddress.length > 1000){
        window.alert("Địa chỉ bạn nhập quá dài!");
         
        return false;
      }
      return true;
    }
  </script>
  <link rel="stylesheet" href="css/style.css">
  <title>Đăng kí</title>
</head>
<body>
<!--top bar (pt=padding top ,pb=padding bottom) -->
    <div class="container-fluid bg-dark header-top d-md-block d-none">
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
                <a class="dropdown-item" href="reset-password.php"  <?php if (isNotLoggedIn()){ echo 'style="display:none;"'; } ?> >Chào, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b></a>
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
              <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
              </form>
            </div>
          </nav>
</div>


  <div class="container-fluid bg-light-gray">

  <div class="container pt-5">

    <div class="row">
      <h3>ĐĂNG KÝ</h3>
    </div>
      <div class="row">
      <div class="underline"></div>
    </div>
  </div>
  <div class="container pt-5">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <label>Tài khoản</label>
            <input type="text" id="username" name="username" class="form-control" value="<?php echo $username; ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <label>Mật khẩu</label>
            <input type="password" id="password" name="password" class="form-control" value="<?php echo $password; ?>">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <label>Xác nhận Mật khẩu</label>
            <input type="password" id="repassword" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
            <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
            <label>Họ và Tên</label>
            <input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>">
            <span class="help-block"><?php echo $name_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
            <label>Số điện thoại</label>
            <input type="number" id="phone" name="phone" class="form-control" value="<?php echo $phone; ?>">
            <span class="help-block"><?php echo $phone_err; ?></span>
        </div>
        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
            <label>Địa chỉ</label>
            <input type="text" id="address" name="address" class="form-control" value="<?php echo $address; ?>">
            <span class="help-block"><?php echo $address_err; ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Đăng ký" onclick="javascript:check()">
            <input type="reset" class="btn btn-default" value="Làm mới">
        </div>
        <p>Nếu bạn đã có tài khoản? <a href="login.php">Đăng nhập ngay</a>.</p>
    </form>
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

          <a href="register.php" style="color: white; text-decoration: none;"><i class="fa fa-chevron-right" aria-hidden="true"></i> Đăng kí</a>
          <p></p>
          <a href="login.php" style="color: white; text-decoration: none;"><i class="fa fa-chevron-right" aria-hidden="true"></i> Đăng nhập</a>
          <p></p>
          <p><i class="fa fa-chevron-right" aria-hidden="true"></i> Bảo mật</p>
          <p><i class="fa fa-chevron-right" aria-hidden="true"></i> Bình luận</p>
          <a href="intro.php" style="color: white; text-decoration: none;"><i class="fa fa-chevron-right" aria-hidden="true"></i> Hướng dẫn</a>

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
          <button class="btn btn-outline-light">Nike</button> <button class="btn btn-outline-light">Giày đá banh</button> <button class="btn btn-outline-light">Phụ kiện</button> <button class="btn btn-outline-light">Sale</button> <button class="btn btn-outline-light">Adidas</button>
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
