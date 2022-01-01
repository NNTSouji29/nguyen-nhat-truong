<?php
$id = $_GET['id'];
$stmt_product = $conn->prepare("SELECT * FROM product WHERE id = $id ");
$stmt_product->execute();
$data_product = $stmt_product->fetchAll(PDO::FETCH_ASSOC);


?>
<?php foreach ($data_product as $product) { ?>
    <div class="features_items">
        <!--features_items-->
        <?php
        $stmt_category_product = $conn->prepare("SELECT * FROM product WHERE id = :category_id");
        $stmt_category_product->bindParam(":category_id",$category["id"],PDO::PARAM_INT);
        $stmt_category_product->execute();
        $data_category_product = $stmt_category_product->fetchAll(PDO::FETCH_ASSOC);
        ?>
    </div>

<?php }?>
<body>
<div class="col-sm-9 padding-right">
    <div class="product-details">
        <!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="public/upload/<?= $product["image"]?>" alt="" />
                <h3>ZOOM</h3>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="product-information">
                <!--/product-information-->
                <img src="public/images//product-details/new.jpg" class="newarrival" alt="" />
                <h1><?= $product["name"] ?></h1>
                <img src="public/images//product-details/rating.png" alt="" />

                <input  name="product_id" data-id="<?php echo $product["id"]; ?>" type="hidden" >
                <span>
                <span><?php echo number_format($product["price"],0,"",".")?></span>
                <label>Total cart:</label>
                 <input min="0" name="total_cart" value="1"  type="number" >
<!--                <input type="text" value="3" />-->
                <button type="button" class="btn btn-fefault cart"  id="addcart" >
                <i class="fa fa-shopping-cart"></i>
                  Cart
                </button>
                </span>
                <p><b>Availability: </b><?= $status=($product["status"]==1?"in stock":"Out of stock" )?></p>
                <p><b>Intro: </b><?= $product["intro"] ?></p>
                <p><b>Brand:</b> 2-HT</p>
                <a href=""><img src="public/images//product-details/share.png" class="share img-responsive"  alt="" /></a>
            </div>
            <!--/product-information-->
        </div>
    </div>
    <!--/product-details-->
    <div class="category-tab shop-details-tab">
        <!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li><a href="#details" data-toggle="tab">Hot products</a></li>
                <li class="active"><a href="#reviews" data-toggle="tab">Details</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="details" >
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="public/upload/ip7+.jfif" alt="" />
                                <h2>$250</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" ></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="public/upload/ip7+D.png" alt="" />
                                <h2>$300</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="public/upload/ip7+X.jfif" alt="" />
                                <h2>$300</h2>
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
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
                                <p>Easy Polo Black Edition</p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade active in" id="reviews" >
                <div class="col-sm-12">
                    <p><?= $product["content"] ?></p>
                    <p><b>Write Your Review</b></p>
                    <form action="#">
                        <span>
                        <input type="text" placeholder="Your Name"/>
                        <input type="email" placeholder="Email Address"/>
                        </span>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

</body>