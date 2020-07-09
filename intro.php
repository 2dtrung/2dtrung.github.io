<?php
  session_start();

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
      function goTo(){
        var a = document.getElementById('link_id').value;
        if(a=='shoes' || a=='nike' || a=='giày' || a=='giày đá bóng')
          location.href = 'shoes.php';
        else if(a=='phụ kiện'||a=='accessories'||a=='vớ giày' || a=='găng tay')
          location.href = 'accessories.php';
        else if(a=='giày giảm giá'||a=='đồ giảm giá'| a=='sale')
          location.href = 'sale.php';

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
                  <a class="dropdown-item" href="dashboard.php" <?php if (!isAdmin()) { echo 'style="display:none;"'; } ?> >Dashboard</a>
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
      <h3>GIỚI THIỆU VỀ TIUH</h3>
    </div>
      <div class="row">
      <div class="underline"></div>
    </div>
  </div>
  <div class="container pt-5">
    <p><strong>Tiuh</strong> - là hệ thống chuyên cung cấp các sản phẩm Giày bóng đá Chính Hãng nguồn gốc xuất xứ rõ ràng và tem, tag đầy đủ.</p>
    <p>⚡ Là một trong những người đi tiên phong về Giày Bóng Đá ,Với kinh nghiệm hơn 7 năm hình thành và phát triển, chúng tôi luôn tự hào là một trong những nhà cung cấp Giày Bóng Đá Chính Hãng hàng đầu tại Việt Nam. Được rất nhiều khách hàng là các Tuyển thủ Quốc Gia, cầu thủ chuyên nghiệp ,các cầu thủ trẻ cũng như nhiều khách hàng bán chuyên, phong trào khắp cả nước tin tưởng và lựa chọn.</p>
    <p>👉 <span style="color: red;">Sản phẩm được cam kết Chính Hãng và bao Test - bao đổi trả trên toàn quốc.</span></p>
    <p>👉 <span style="color: green;">Luôn cập nhật Những mẫu mã mới nhất và những chính sách khuyến mãi – ưu đãi giảm giá hấp dẫn.</span></p>
    <p>👉 <span style="color: orange;">Chính sách bảo hành tuyệt đối với sản phẩm và đổi trả hàng trong vòng 7 ngày, thanh toán tiện lợi thông qua dịch vụ COD ( nhận hàng – thanh toán )</span></p>
    <p>👉 <span style="color: blue;">Đội ngũ tư vấn nhiệt tình,kỹ càng sẽ giúp khách hàng có thể lựa chọn cho mình một đôi giày phù hợp và hài lòng nhất.</span></p>
  </div>

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
