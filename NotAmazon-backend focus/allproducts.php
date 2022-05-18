<?php
session_start();
$cartArray = "";
$cart_count = "";
//CONNECT
$con = mysqli_connect("localhost","root","","haine");
	if (mysqli_connect_error()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}
//ARRANGE CART
$status="";
if (isset($_POST['code']) && $_POST['code']!=""){
        $code = $_POST['code'];
        $result = mysqli_query($con,"SELECT * FROM `tabhaine` WHERE `code`='$code'");
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $code = $row['code'];
        $price = $row['price'];
        $image = $row['image'];
        
        $cartArray = array(
            $code=>array(
            'name'=>$name,
            'code'=>$code,
            'price'=>$price,
            'quantity'=>1,
            'image'=>$image)
        );
}
//CHECK IF PRODUCT HAS BEEN ADDED TO SHOPPING CART
if(empty($_SESSION["shopping_cart"])) {
	$_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
	$array_keys = array_keys($_SESSION["shopping_cart"]);
	if(in_array($code,$array_keys)) {
		$status = "<div class='box' style='color:red;'>
		Product is already added to your cart!</div>";	
	} else {
	$_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
	$status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
    if(!empty($_SESSION["shopping_cart"])) {
        $cart_count = count(array_keys($_SESSION["shopping_cart"]));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name ="viewport" content ="width=device-width , initial-scale = 1.0">
    <title>All Products - NotAmazon</title>
    <link rel ="stylesheet" href = "style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <img src = "images/logo.png" width = 125px
            </div>
        </div>
        <nav>
            <ul id="MenuItems">
                <li><a href = "index.php">Home</a></li>
                <li><a href = "products.html">Products</a></li>
                <li><a href = "">About</a></li>
                <li><a href = "cart.php">Cart[<span><?php echo $cart_count; ?></span>]</a></li>
                <li><a href = "login.php">Account</a></li>
            </ul>
        </nav>
        <img src ="images/cart.png" width= 30px  height = 30px>
        <img src ="images/menu.png" class ="menu-icon" onclick="menutoggle()">
    </div>
        </div>
    </div>
    <div class="small-container">

<div class="row row-2">
    <h2>All Products</h2>
    <select>
        <option hidden>Default Sorting</option>
        <option>Sort by price</option>
        <option>Sort by rating</option>
        <option>Sort by sales</option>
        <option>Sort by popularity</option>
    </select>
</div>

<div class="row">
    <div class="col-4">
    <?php
    $result = mysqli_query($con,"SELECT * FROM `tabhaine` where code = 'RedPumaShirt' ");
    $row = mysqli_fetch_assoc($result);
    echo "
    <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img height = 315px width = 300px src='".$row['image']."'' /></div>
			  <p><div class='name'>".$row['name']."</div></p>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form> ";
    ?>
    </div>
    <div class="col-4">
    <?php
    $result = mysqli_query($con,"SELECT * FROM `tabhaine` where code = 'HRXGreenShoes' ");
    $row = mysqli_fetch_assoc($result);
    echo "
    <form method='post' action=''>
			  <input type='hidden' name='code' value='HRXGreenShoes' />
			  <div class='image'><img height = 315px width = 300px src='".$row['image']."'' /></div>
			  <p><div class='name'>".$row['name']."</div></p>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form> ";
    
    ?>
    <?php
    
    ?>
    
    </div>
    <div class="col-4">
    <?php
    $result = mysqli_query($con,"SELECT * FROM `tabhaine` where code = 'GraySweatpants' ");
    $row = mysqli_fetch_assoc($result);
    echo "
    <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img height = 315px width = 300px src='".$row['image']."'' /></div>
			  <p><div class='name'>".$row['name']."</div></p>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form> ";
    ?>
    </div>
    <div class="col-4">
    <?php
    $result = mysqli_query($con,"SELECT * FROM `tabhaine` where code = 'BlackPumaShirt' ");
    $row = mysqli_fetch_assoc($result);
    echo "
    <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img height = 315px width = 300px src='".$row['image']."'' /></div>
			  <p><div class='name'>".$row['name']."</div></p>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form> ";
    ?>
    </div>


</div>
<div class="row">
    <div class="col-4">
    <?php
    $result = mysqli_query($con,"SELECT * FROM `tabhaine` where code = 'GreySportsShoes' ");
    $row = mysqli_fetch_assoc($result);
    echo "
    <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img height = 315px width = 300px src='".$row['image']."'' /></div>
			  <p><div class='name'>".$row['name']."</div></p>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form> ";
    ?>
    </div>
    <div class="col-4">
    <?php
    $result = mysqli_query($con,"SELECT * FROM `tabhaine` where code = 'ArmyPumaShirt' ");
    $row = mysqli_fetch_assoc($result);
    echo "
    <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img height = 315px width = 300px src='".$row['image']."'' /></div>
			  <p><div class='name'>".$row['name']."</div></p>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form> ";
    ?>
    </div>
    <div class="col-4">
    <?php
    $result = mysqli_query($con,"SELECT * FROM `tabhaine` where code = 'HRXSocks' ");
    $row = mysqli_fetch_assoc($result);
    echo "
    <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img height = 315px width = 300px src='".$row['image']."'' /></div>
			  <p><div class='name'>".$row['name']."</div></p>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form> ";
    ?>
    </div>
    <div class="col-4">
    <?php
    $result = mysqli_query($con,"SELECT * FROM `tabhaine` where code = 'FossilBlackWatch' ");
    $row = mysqli_fetch_assoc($result);
    echo "
    <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img height = 315px width = 300px src='".$row['image']."'' /></div>
			  <p><div class='name'>".$row['name']."</div></p>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form> ";
    ?>
    </div>


</div>
<div class="row">
    <div class="col-4">
    <?php
    $result = mysqli_query($con,"SELECT * FROM `tabhaine` where code = 'RoadsterLeatherWatch' ");
    $row = mysqli_fetch_assoc($result);
    echo "
    <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img height = 315px width = 300px src='".$row['image']."'' /></div>
			  <p><div class='name'>".$row['name']."</div></p>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form> ";
    ?>
    </div>
    <div class="col-4">
    <?php
    $result = mysqli_query($con,"SELECT * FROM `tabhaine` where code = 'HRXVolcanoRunShoes' ");
    $row = mysqli_fetch_assoc($result);
    echo "
    <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img height = 315px width = 300px src='".$row['image']."'' /></div>
			  <p><div class='name'>".$row['name']."</div></p>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form> ";
    ?>
    </div>
    <div class="col-4">
    <?php
    $result = mysqli_query($con,"SELECT * FROM `tabhaine` where code = 'WhiteSneakers' ");
    $row = mysqli_fetch_assoc($result);
    echo "
    <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img height = 315px width = 300px src='".$row['image']."'' /></div>
			  <p><div class='name'>".$row['name']."</div></p>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form> ";
    ?>
    </div>
    <div class="col-4">
    <?php
    $result = mysqli_query($con,"SELECT * FROM `tabhaine` where code = 'BlackNikeSweatpants' ");
    $row = mysqli_fetch_assoc($result);
    echo "
    <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img height = 315px width = 300px src='".$row['image']."'' /></div>
			  <p><div class='name'>".$row['name']."</div></p>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form> ";
    ?>
    </div>
    <div class="col-4">
    <?php
    $result = mysqli_query($con,"SELECT * FROM `tabhaine` where code = 'FossilBlackWatch' ");
    $row = mysqli_fetch_assoc($result);
    echo "
    <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img height = 315px width = 300px src='".$row['image']."'' /></div>
			  <p><div class='name'>".$row['name']."</div></p>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form> ";
    ?>
    </div>
    <div class="col-4">
    <?php
    $result = mysqli_query($con,"SELECT * FROM `tabhaine` where code = 'HRXGreenShoes' ");
    $row = mysqli_fetch_assoc($result);
    echo "
    <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img height = 315px width = 300px src='".$row['image']."'' /></div>
			  <p><div class='name'>".$row['name']."</div></p>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form> ";
    ?>
    </div>
    <div class="col-4">
    <?php
    $result = mysqli_query($con,"SELECT * FROM `tabhaine` where code = 'GraySweatpants' ");
    $row = mysqli_fetch_assoc($result);
    echo "
    <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img height = 315px width = 300px src='".$row['image']."'' /></div>
			  <p><div class='name'>".$row['name']."</div></p>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form> ";
    ?>
    </div>
    <div class="col-4">
        <?php
    $result = mysqli_query($con,"SELECT * FROM `tabhaine` where code = 'RedPumaShirt' ");
    $row = mysqli_fetch_assoc($result);
    echo "
    <form method='post' action=''>
			  <input type='hidden' name='code' value=".$row['code']." />
			  <div class='image'><img height = 315px width = 300px src='".$row['image']."'' /></div>
			  <p><div class='name'>".$row['name']."</div></p>
		   	  <div class='price'>$".$row['price']."</div>
			  <button type='submit' class='buy'>Buy Now</button>
			  </form> ";
    ?>
<?php
//Close connection
mysqli_close($con);
?>
    </div>
</div>

<div class="page-button">
    <span>1</span>
    <span>2</span>
    <span>3</span>
    <span>4</span>
    <span>&#8594</span>
</div>

</div>

<!--footer-->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col-1">
                <h3>Download our App!</h3>
                <p>We're on Iphone and Android ready for you!</p>
                <div class="app-logo">
                    <a href = "https://play.google.com/"><img src = "images/play-store.png"></a>  <a href = "https://www.apple.com/app-store/"><img src = "images/app-store.png"></a>
                   
                </div>

            </div>
            <div class="footer-col-2">
                <img src="images/logo-white.png">
                <p>We're on Iphone and Android ready for you!</p>

            </div>
            <div class="footer-col-3">
                <h3>Useful links</h3>
                <ul>
                    <a href = "https://www.lipsum.com/"><li>Coupouns</li></a>
                    <a href = "https://www.lipsum.com/"><li>Blog Post</li></a>
                    <a href = "https://www.lipsum.com/"><li>Return policy</li></a>
                    <a href = "https://www.lipsum.com/"><li>Join us!</li></a>
                </ul>

            </div>
            <div class="footer-col-4">
                <h3>Follow us!</h3>
                <ul>
                    <a href = "https://www.facebook.com/"><li>Facebook</li></a>
                    <a href = "https://www.instagram.com/"><li>Instagram</li></a>
                    <a href = "https://www.twitter.com/"><li>Twitter</li></a>
                    <a href = "https://www.youtube.com/"><li>Youtube</li></a>
                </ul>

            </div>
            
        </div>
        <hr>

        
    </div>
</div>
<?php
mysqli_close($con);
?>
<!---Menu toggle-->
<script>
    var MenuItems = document.getElementById("MenuItems");

    MenuItems.style.maxHeight="0px";
    function menutoggle(){
        if(MenuItems.style.maxHeight == "0px")
        {
            MenuItems.style.maxHeight = "200px";
        }
        else
        {
            MenuItems.style.maxHeight = "0px";
        }
    }
</script>
</body>
</html>