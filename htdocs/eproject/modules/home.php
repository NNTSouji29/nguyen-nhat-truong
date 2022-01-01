<section id="slider">
    <!--slider-->
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#slider-carousel" data-slide-to="1"></li>
                        <li data-target="#slider-carousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6">
                                <h1><span>Iphone</span>-Blog</h1>
                                <h2>NT Iphone</h2>
                                <p>nothing says #NT-Fast service like the way the ex-lover turned back! </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="public/upload/Fip7+.jfif" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>iphone</span>-Blog</h1>
                                <h2>NT iphone</h2>
                                <p>nothing says #NT-Fast service like the way the ex-lover turned back! </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="public/upload/Fip7.jfif" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-sm-6">
                                <h1><span>iphone</span>-Blog</h1>
                                <h2>NT iphone</h2>
                                <p>nothing says #NT-Fast service like the way the ex-lover turned back! </p>
                                <button type="button" class="btn btn-default get">Get it now</button>
                            </div>
                            <div class="col-sm-6">
                                <img src="public/upload/ip7+X.jfif" class="girl img-responsive" alt="" />
                            </div>
                        </div>
                    </div>
                    <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                    </a>
                    <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/slider-->
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian">
                        <!--category-productsr-->
                        <?php
                        $stmt_category = $conn->prepare("SELECT * FROM category WHERE parent = 0");
                        $stmt_category->execute();
                        $data_stmt_category = $stmt_category->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($data_stmt_category as $item) {
                            ?>
                            <ul><a href="index.php?p=<?php echo $item["name"]?>" class="active"><h4 style="color:black"><?php echo $item["name"]?></h4></a></ul>
                        <?php } ?>
                    </div>
                    <div class="price-range">
                        <!--price-range-->
                        <h2>Price Range</h2>
                        <div class="well text-center">
                            <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2" ><br />
                            <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
                        </div>
                    </div>
                    <!--/price-range-->
                </div>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="blog-post-area">
                    <h1 class="title text-center">NT iphone</h1>


                    <?php
                    $stmt_post = $conn->prepare("SELECT * FROM post ORDER BY id DESC");
                    $stmt_post->execute();
                    $data_stmt_post = $stmt_post->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($data_stmt_post as $post)
                    {?>
                        <div class="single-blog-post">
                            <h2><?=$post["title"]?></h2>
                            <div class="post-meta">
                            <span>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            </span>
                            </div>
                            <a href="">
                                <img style="width:auto" src="public/upload/<?= $post["image"]?>" alt="">
                            </a>
                            <p><?=substr($post["content"],0,50)."..."?></p>
                            <a  class="btn btn-primary" href="index.php?p=post&id=<?php echo $post["id"]?>">Read More</a>
                        </div>
                    <?php }?>


                    <div class="pagination-area">
                        <ul class="pagination">
                            <li><a href="" class="active">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                            <li><a href=""><i class="fa fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                </div>
                <!--features_items-->
                <div class="category-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#nail" data-toggle="tab">iphone7</a></li>
                            <li><a href="#blazers" data-toggle="tab">iphone7plus</a></li>
                            <li><a href="#sunglass" data-toggle="tab">iphone8</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="nail" >
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="public/upload/ip7D.jpg" alt="" />
                                            <h2>$150</h2>
                                            <p>iphone</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="public/upload/ip7+D.png" alt="" />
                                            <h2>$250</h2>
                                            <p>iphone</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="public/upload/ip7V.jpg" alt="" />
                                            <h2>$150</h2>
                                            <p>iphone</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="public/upload/ip7+H.jpg" alt="" />
                                            <h2>$200</h2>
                                            <p>iphone</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="blazers" >
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="public/upload/ip7+H.jpg" alt="" />
                                            <h2>$150</h2>
                                            <p>iphone</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="public/upload/ip7+D.png" alt="" />
                                            <h2>$270</h2>
                                            <p>iphone</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="public/upload/ip7.jfif" alt="" />
                                            <h2>$150</h2>
                                            <p>iphone</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="public/upload/ip7+D.jfif" alt="" />
                                            <h2>$250</h2>
                                            <p>iphone</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="sunglass" >
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="public/upload/ip7.jfif" alt="" />
                                            <h2>$100</h2>
                                            <p>iphone</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="public/upload/ip7D.jpg" alt="" />
                                            <h2>$150</h2>
                                            <p>iphone</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="public/upload/ip7V.jpg" alt="" />
                                            <h2>$150</h2>
                                            <p>iphone</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="public/upload/ip7T.jfif" alt="" />
                                            <h2>$150</h2>
                                            <p>iphone</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/category-tab-->
            </div>
        </div>
    </div>
</section>