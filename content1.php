
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                        <?php Department($conn); ?>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#" method="POST">
                                
                                <input type="text" name="txtSearch" placeholder="What do you need?">
                                <button type="submit" id="btnSearch" name ="btnSearch" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>0962010052</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="ATNtoy/MG_group_01-1.jpg">
                        <div class="hero__text">
                            <span>NEW ON</span>
                            <h2>ATN <br />TOY</h2> 
                            
                            <a href="?page=shop-grid" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="ATNtoy/61yJfjtiPoL._AC_SY355_.jpg">
                            <h5><a href="#">Electric Splatter Ball Blaster</a></h5>
                        </div>
                        <div class="categories__item set-bg" data-setbg="ATNtoy/luffy.jpg">
                            <h5><a href="#">PISTOL CROSSBOW</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="ATNtoy/Levi.jpg">
                            <h5><a href="#">Barrett 50 Cal</a></h5>
                        </div>
                    </div>
                    <div class="categories__item set-bg" data-setbg="ATNtoy/Mikey.jpg">
                            <h5><a href="#">Toy AK-47</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
    <?php 
                if(isset( $_POST['btnSearch']))
                {
                    $search = $_POST['txtSearch'];
                    $result = pg_query($conn,"SELECT product_id, product_name, price, pro_qty, pro_image, cat_name 
                    from product a, category b 
                    where a.catid = b.cat_id AND product_name like '%$search%' order by pro_image desc");
                    ?>
                    <section class="featured spad">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title">
                                        <h2>Search Results</h2>
                                    </div>
                                <div class="featured__controls">
                            </div>
                            <div class="row featured__filter">
                    <?php
                    while($row=pg_fetch_array($result, NULL, MYSQLI_ASSOC)) { 
                    ?>
                   
                                <div class="col-lg-3 col-md-4 col-sm-6 mix ">
                                    <div class="featured__item">
                                        <div class="featured__item__pic set-bg" data-setbg="img/<?php echo $row['pro_image'] ?>">
                                            <ul class="featured__item__pic__hover">
                                            
                                                <li><a href="#"><span class="fa fa-heart"></span></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="?page=shop-details&&id=<?php echo  $row['product_id'] ?>"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="featured__item__text">
                                            <h6><a href="?page=shop-details&&id=<?php echo  $row['product_id'] ?>"><?php echo $row["product_name"] ?></a></h6>
                                            <h5>$<?php echo $row["price"] ?></h5>
                                        </div>
                                    </div>
                                </div>
                    <?php
                    }
                    ?>
                            </div>
                        </div>
                    </section>
                    <?php
                }else
                {
                    include_once('Featured.php');
                }
                ?>

    <!-- Featured Section Begin -->

    <!-- Featured Section End -->

    


    



