<?php
$stmt_category = $conn->prepare("SELECT * FROM category WHERE parent = 7 ");
$stmt_category->execute();
$data_category = $stmt_category->fetchAll(PDO::FETCH_ASSOC);
?>
<?php foreach ($data_category as $category) { ?>
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center"><?php echo $category["name"]?></h2>
        <?php
        $stmt_category_product = $conn->prepare("SELECT * FROM product WHERE category_id = :category_id ORDER BY id DESC LIMIT 4");
        $stmt_category_product->bindParam(":category_id",$category["id"],PDO::PARAM_INT);
        $stmt_category_product->execute();
        $data_category_product = $stmt_category_product->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <?php foreach ($data_category_product as $product){?>
            <div class="col-sm-3">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img style="height:100%" src="public/upload/<?php echo $product["image"]?>"alt="<?php echo $product["name"]?>" />
                            <p><?php echo $product["name"]?></p>
                            <a href="index.php?p=detail&id=<?php echo $product["id"]?>">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php }?>
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
