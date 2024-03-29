<?php
  session_start();

  include 'config.php';

  include 'function.php';

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
    <title>Accessories</title>
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
      <h3>PHỤ KIỆN</h3>
    </div>
      <div class="row">
      <div class="underline"></div>
    </div>
  </div>



  <div class="container mt-5">
    <div class="row">

    <?php
        $result = mysqli_query($con,"SELECT * FROM `products` WHERE `category` = 'accessories'");
        while($row = mysqli_fetch_assoc($result)){
            echo
              "
                <div class='col-md-3'>

                  <form method='post' action=''>
                    <input type='hidden' name='code' value=".$row['code']." />
                    <div class='card'>
                      <img src='".$row['image']."' alt='card-1' class='card-img-top'>
                      <div class='card-body'>
                        <h5>".$row['name']."</h5>
                        <h6>$".$row['price']."</h6>
                        <button type='submit' class='btn btn-danger buy'><i class='fa fa-cart-plus' aria-hidden='true'></i> Thêm vào giỏ</button>
                      </div>
                    </div>
                  </form>

                </div>

              ";
        }
      ?>

      <div class="col-md-3">
        <div class="card">
          <img src="img/img-41.jpg" alt="card-1" class="card-img-top">
          <div class="card-body">
            <h5>Ống đồng, Vớ</h5>
            <h6>$76.00</h6>
            <button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ</button>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <img src="img/img-42.jpg" alt="card-1" class="card-img-top">
          <div class="card-body">
            <h5>Bao tay</h5>
            <h6>$75.00</h6>
            <button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ</button>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <img src="img/img-43.jpg" alt="card-1" class="card-img-top">
          <div class="card-body">
            <h5>Găng tay</h5>
            <h6>$52.00</h6>
            <button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ</button>
          </div>
        </div>
      </div>



      <div class="col-md-3">
        <div class="card">
          <img src="img/img-44.jpg" alt="card-1" class="card-img-top">
          <div class="card-body">
            <h5>Ống đồng</h5>
            <h6>$66.00</h6>
            <button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ</button>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <img src="img/img-15.jpg" alt="card-1" class="card-img-top">
          <div class="card-body">
            <h5>Ống đồng, Vớ</h5>
            <h6>$76.00</h6>
            <button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ</button>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <img src="img/img-16.jpg" alt="card-1" class="card-img-top">
          <div class="card-body">
            <h5>Ống đồng</h5>
            <h6>$75.00</h6>
            <button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ</button>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <img src="img/img-17.jpg" alt="card-1" class="card-img-top">
          <div class="card-body">
            <h5>Bó cổ tay</h5>
            <h6>$52.00</h6>
            <button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ</button>
          </div>
        </div>
      </div>



      <div class="col-md-3">
        <div class="card">
          <img src="img/img-45.jpg" alt="card-1" class="card-img-top">
          <div class="card-body">
            <h5>Bao tay</h5>
            <h6>$66.00</h6>
            <button class="btn btn-danger"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


  <div class="container-fluid pt-5 pb-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="row">
            <h4>QUAN TÂM</h4>
          </div>
          <div class="row">
            <div class="underline-green"></div>
          </div>
          <div class="media mt-5">
            <img src="img/img-12.jpg" class="img-fluid mr-3" alt="media1">
            <div class="media-body mt-2">
              <h5>Mercurial S8</h5>
              <h6>$47.00</h6>
              <button class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ</button>
            </div>
          </div>

          <div class="media mt-5">
            <img src="img/img-13.jpg" class="img-fluid mr-3" alt="media1">
            <div class="media-body mt-2">
              <h5>Phantom Elite</h5>
              <h6>$56.00</h6>
              <button class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ</button>
            </div>
          </div>


          <div class="media mt-5">
            <img src="img/img-14.jpg" class="img-fluid mr-3" alt="media1">
            <div class="media-body mt-2">
              <h5>Hypervenom</h5>
              <h6>$67.00</h6>
              <button class="btn btn-success"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ</button>
            </div>
          </div>
        </div>




        <div class="col-md-4">
          <div class="row">
            <h4>PHỤ KIỆN</h4>
          </div>
          <div class="row">
            <div class="underline-blue"></div>
          </div>
          <div class="media mt-5">
            <img src="img/img-15.jpg" class="img-fluid mr-3" alt="media1">
            <div class="media-body mt-2">
              <h5>Vớ & Ống đồng</h5>
              <h6>$23.00</h6>
              <button class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ</button>
            </div>
          </div>

          <div class="media mt-5">
            <img src="img/img-16.jpg" class="img-fluid mr-3" alt="media1">
            <div class="media-body mt-2">
              <h5>Ống đồng</h5>
              <h6>$36.00</h6>
              <button class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ</button>
            </div>
          </div>

          <div class="media mt-5">
            <img src="img/img-17.jpg" class="img-fluid mr-3" alt="media1">
            <div class="media-body mt-2">
              <h5>Bó tay</h5>
              <h6>$37.00</h6>
              <button class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ</button>
            </div>
          </div>
        </div>



        <div class="col-md-4">
          <div class="row">
            <h4>GIẢM GIÁ</h4>
          </div>
          <div class="row">
            <div class="underline-black"></div>
          </div>
          <div class="media mt-5">
            <img src="img/img-18.jpg" class="img-fluid mr-3" alt="media1">
            <div class="media-body mt-2">
              <h5>Hypervenom Black</h5>
              <h6>$33.00 <span style="text-decoration: line-through">$67.00</span></h6>
              <button class="btn btn-dark"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ</button>
            </div>
          </div>

          <div class="media mt-5">
            <img src="img/img-19.jpg" class="img-fluid mr-3" alt="media1">
            <div class="media-body mt-2">
              <h5>Mercurial S2</h5>
              <h6>$44.00 <span style="text-decoration: line-through">$56.00</span></h6>
              <button class="btn btn-dark"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ</button>
            </div>
          </div>

          <div class="media mt-5">
            <img src="img/img-20.jpg" class="img-fluid mr-3" alt="media1">
            <div class="media-body mt-2">
              <h5>Mercurial S6</h5>
              <h6>$34.00 <span style="text-decoration: line-through">$99.00</span></h6>
              <button class="btn btn-dark"><i class="fa fa-cart-plus" aria-hidden="true"></i> Thêm vào giỏ</button>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>



  <div class="container-fluid bg-light-gray pt-5 pb-5">

  <div class="container mt-0">
    <div class="row">
      <h4>ÁO ĐẤU</h4>
    </div>
    <div class="row">
      <div class="underline"></div>
    </div>
  </div>

  <div class="container mt-5">
    <div class="row">
    <?php
        $result = mysqli_query($con,"SELECT * FROM `products` WHERE `category` = 'shirt'");
        while($row = mysqli_fetch_assoc($result)){
            echo
              "
                <div class='col-md-3'>
                  <form method='post' action=''>
                    <input type='hidden' name='code' value=".$row['code']." />
                    <div class='card'>
                      <img src='".$row['image']."' alt='card-1' class='card-img-top'>
                      <div class='card-body'>
                        <h5>".$row['name']."</h5>
                        <h6>$".$row['price']."</h6>
                        <button type='submit' class='btn btn-danger buy'><i class='fa fa-cart-plus' aria-hidden='true'></i> Thêm vào giỏ</button>
                      </div>
                    </div>
                  </form>
                </div>
              ";
        }
      ?>
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






    <?php mysqli_close($con); ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/js/bootstrap.min.js" integrity="sha384-7aThvCh9TypR7fIc2HV4O/nFMVCBwyIUKL8XCtKE+8xgCgl/PQGuFsvShjr74PBp" crossorigin="anonymous"></script>
</body>
</html>
