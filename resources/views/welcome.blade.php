<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nông sản sạch</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ asset('frontend/css/home.css') }}">
</head>

<body>
    <!-- header section starts  -->
    <header>
        <div class="header-1">
            <a href="index.html" class="logo"></i>Nông trại organic</a>
            <form action="" class="search-box-container">
                <input type="search" id="search-box" placeholder="search here...">
                <label for="search-box" class="fas fa-search"></label>
            </form>
        </div>
        <div class="header-2">
            <div id="menu-bar" class="fas fa-bars"></div>
            <nav class="navbar">
                <a href="index.html">Trang chủ</a>
                <a href="#category">Sản phẩm</a>
                <a href="">Liên hệ</a>
                <a href="">Giới thiệu</a>
            </nav>
            <div class="icons">
                <a href="cart.html" class="fas fa-shopping-cart"></a>
                <a href="#" class="fas fa-user-circle"></a>
            </div>
        </div>
    </header>
    <!-- header section ends -->
    <!-- home section starts  -->
    <section class="home" id="home">
        <div class="image">
            <img src="https://www.ligadom.com/wp-content/uploads/2016/03/White_Background_01.jpg" alt="image">
        </div>
        <div class="content">
            <span>Sản phẩm tươi và sạch</span>
            <h3>Tốt cho sức khỏe của bạn</h3>
            <a href="#category" class="TimHieu">Tìm hiểu</a>
        </div>
    </section>
    <!-- home section ends -->
    <!-- category section starts  -->
    <section class="category" id="category">
        <h1 class="heading">Những sản phẩm trong <span>danh mục</span></h1>
        <div class="box-container">
            <div class="box">
                <h3>Rau củ</h3>
                <img src="images/category-1.png" alt="image">
                <a href="#" class="add-cart">Mua ngay</a>
            </div>
            <div class="box">
                <h3>Sữa</h3>
                <img src="images/category-2.png" alt="image">
                <a href="#" class="add-cart">Mua ngay</a>
            </div>
            <div class="box">
                <h3>Thịt</h3>
                <img src="images/category-3.png" alt="image">
                <a href="#" class="add-cart">Mua ngay</a>
            </div>
            <div class="box">
                <h3>Trái cây</h3>

                <img src="images/category-4.png" alt="image">
                <a href="#" class="add-cart">Mua ngay</a>
            </div>
        </div>
    </section>
    <!-- category section ends -->
    <!-- product section starts  -->
    <section class="list-product" id="list-product">
        <h1 class="heading">Sản phẩm <span>mới</span></h1>
        <div class="box-container">
            <div class="box" href="productDetail.html">
                <span class="discount">-33%</span>
                <img src="images/product-1.png" alt="image">
                <h3>Chuối organic</h3>
                <div class="price"> 79.000VNĐ <span> 99.000VNĐ</span> </div>
                <div class="quantity">
                    <span>Số lượng : </span>
                    <input type="number" min="1" max="1000" value="1">
                    <span> /kg </span>
                </div>
                <a href="#" class="add-cart">Thêm vào giỏ</a>
            </div>
            <div class="box">
                <span class="discount">-33%</span>
                <img src="images/product-2.png" alt="image">
                <h3>Cà chua organic</h3>
                <div class="price"> 49.000VNĐ <span> 70.000VNĐ</span> </div>
                <div class="quantity">
                    <span>Số lượng : </span>
                    <input type="number" min="1" max="1000" value="1">
                    <span> /kg </span>
                </div>
                <a href="#" class="add-cart">Thêm vào giỏ</a>
            </div>
            <div class="box">
                <span class="discount">-33%</span>
                <img src="images/product-3.png" alt="image">
                <h3>Cam</h3>
                <div class="price"> 50.000VNĐ <span> 69.000VNĐ</span> </div>
                <div class="quantity">
                    <span>quantity : </span>
                    <input type="number" min="1" max="1000" value="1">
                    <span> /kg </span>
                </div>
                <a href="#" class="add-cart">Thêm vào giỏ</a>
            </div>
            <div class="box">
                <span class="discount">-33%</span>
                <img src="images/product-4.png" alt="image">
                <h3>Sữa</h3>
                <div class="price"> 129.000VNĐ <span> 160.000VNĐ</span> </div>
                <div class="quantity">
                    <span>Số lượng : </span>
                    <input type="number" min="1" max="1000" value="1">
                    <span> /kg </span>
                </div>
                <a href="#" class="add-cart">Thêm vào giỏ</a>
            </div>
            <div class="box">
                <span class="discount">-33%</span>
                <img src="images/product-5.png" alt="image">
                <h3>Nho đen</h3>
                <div class="price"> 79.000VNĐ <span> 99.000VNĐ</span> </div>
                <div class="quantity">
                    <span>Số lượng : </span>
                    <input type="number" min="1" max="1000" value="1">
                    <span> /kg </span>
                </div>
                <a href="#" class="add-cart">Thêm vào giỏ</a>
            </div>
            <div class="box">
                <span class="discount">-33%</span>
                <img src="images/product-6.png" alt="image">
                <h3>Hạt óc chó</h3>
                <div class="price"> 49.000VNĐ <span> 70.000VNĐ</span> </div>
                <div class="quantity">
                    <span>Số lượng : </span>
                    <input type="number" min="1" max="1000" value="1">
                    <span> /kg </span>
                </div>
                <a href="#" class="add-cart">Thêm vào giỏ</a>
            </div>
            <div class="box">
                <span class="discount">-33%</span>
                <img src="images/product-7.png" alt="image">
                <h3>Táo</h3>
                <div class="price"> 50.000VNĐ <span> 69.000VNĐ</span> </div>
                <div class="quantity">
                    <span>quantity : </span>
                    <input type="number" min="1" max="1000" value="1">
                    <span> /kg </span>
                </div>
                <a href="#" class="add-cart">Thêm vào giỏ</a>
            </div>
            <div class="box">
                <span class="discount">-33%</span>
                <img src="images/product-8.png" alt="image">
                <h3>Đậu khuôn</h3>
                <div class="price"> 129.000VNĐ <span> 160.000VNĐ</span> </div>
                <div class="quantity">
                    <span>Số lượng : </span>
                    <input type="number" min="1" max="1000" value="1">
                    <span> /kg </span>
                </div>
                <a href="#" class="add-cart">Thêm vào giỏ</a>
            </div>
        </div>
    </section>
    <!-- product section ends -->
    <!-- footer section starts  -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <a href="#" class="logo"></i>Nông trại organic</a>
                <p> Địa chỉ: 326 Hà Huy Tập, Thanh Khuê, Đà Nẵng </p>
                <p> Điện thoại: 0878.63.66.69</p>
                <p> E-mail: shopnongsansach@gmail.com</p>
                <p> Website: shopnongsansach.com</p>
                <div class="share">
                    <a href="https://facebook.com/login" class="btn fab fa-facebook-f"></a>
                    <a href="https://instagram.com" class="btn fab fa-twitter"></a>
                    <a href="https://instagram.com" class="btn fab fa-instagram"></a>
                    <a href="#" class="btn fab fa-linkedin"></a>
                </div>
            </div>
            <div class="box">
                <h3>Cam kết</h3>
                <p> - Giá ưu đãi nhất. </p>
                <p> - Sản phẩm chất lượng.</p>
                <p> - Truy xuất nguồn gốc rõ ràng.</p>
            </div>
            <div class="box">
                <h3>CHÍNH SÁCH & BẢO MẬT</h3>
                <div class="links">
                    <a href="#">Chính sách thanh toán</a>
                    <a href="#">Chính sách vận chuyển</a>
                </div>
            </div>
        </div>
        <h1 class="credit"> Copyright © 2022 Nông Sản Sạch</h1>
    </section>
    <!-- footer section ends -->
    <!-- custom js file link  -->
    <script src="js/script.js"></script>
</body>

</html>
