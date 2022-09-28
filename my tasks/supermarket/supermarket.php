<?php 
$delivery=[
"cairo"=>0,
"giza"=>30,
"alex"=>50,
"other"=>100
];
 
?>
<!doctype html>
<html lang="en">

<head>
    <title>SuperMarket</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <form style="width: 500px;" class="mx-auto mt-5" method="POST">
        <h1>Super Market</h1>
        <!------------------------------ first part ------------------------->
        <div class="form-group">
            <label for="name">Your Name</label>
            <input id="name" class="form-control" name="username"  type="text" value="<?=$_POST["username"]?? "" ?>" />    
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">City</label>
            <select name="city"  class="form-control" id="exampleFormControlSelect2">
            <option value="cairo" <?=isset($_POST["city"]) && $_POST["city"]=="cairo"? "selected":"" ?> >cairo</option>
            <option value="giza" <?=isset($_POST["city"]) && $_POST["city"]=="giza"? "selected":"" ?> >Giza</option>
            <option value="alex" <?=isset($_POST["city"]) && $_POST["city"]=="alex"? "selected":"" ?> >Alex</option>
            <option value="other" <?=isset($_POST["city"]) && $_POST["city"]=="other"? "selected":"" ?> >Ohter</option>
            </select>
        </div>
        <div class="form-group">
            <label for="products">Number of products</label>
            <input id="products" class="form-control"  name="num" value="<?=$_POST["num"]?? "" ?>" type="number" required />
        </div>
        <button type="submit" name="add" class="btn btn-primary">Enter products</button>

        <!------------------------------ Second part ------------------------->

        <?php if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST && isset($_POST["add"]) ){ ?>

            <table >
                <thead>
                    <tr>
                        <th >Product </th>
                        <th >Price</th>
                        <th >quantitytity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $num=$_POST["num"];
                    for($i=0;$i<$num;$i++)
                     { ?>
                        <tr>
                            <td>
                            <input class="form-control" name=<?="product_name".$i?> 
                            value="<?=$_POST["product_name".$i]?? ""?>"  type="text" />
                            </td>
                            <td>
                            <input class="form-control" name=<?="price".$i?>
                             value="<?=$_POST["price".$i]?? ""?>"  type="number" />
                            </td>
                            <td>
                            <input class="form-control" name=<?="quantity".$i?>
                             value="<?=$_POST["quantity".$i]?? ""?>" name=<?="quantity".$i?> type="number" />
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <button type="submit" name="checkout" class="btn btn-primary ">Get checkout</button>
        <?php } ?>

        <!------------------------------ Third part ------------------------->
        <?php if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST && isset($_POST["checkout"]) ){
            $total=0;
            ?>

        <table >
            <thead>
                <tr>
                    <th >Product Name</th>
                    <th >Price</th>
                    <th >quantity</th>
                    <th >Sub Total</th>
                </tr>
            </thead>
            <tbody>
                <?php

                 for($i=0;$i<$_POST["num"];$i++) {
                    
                $quantity=$_POST["quantity".$i];
                $price=$_POST["price".$i];
                     $total+= $_POST["price".$i] * $_POST["quantity".$i];
                    ?>
                    <tr>
                        <td> <?=$_POST["product_name".$i]?? ""?> </td>
                        <td> <?=$_POST["price".$i]?? ""?> </td>
                        <td> <?=$_POST["quantity".$i]?? ""?> </td>
                        <td> <?= $quantity * $price ?? ""?> </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td > Client  </td>
                    <td> <?=$_POST["username"]?? ""?>  </td>
                </tr>
                <tr>
                    <td > City </td>
                    <td> <?=$_POST["city"]?? ""?>  </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td > Total </td>
                    <td> <?=$total?>  </td>
                </tr>
                <?php
                $discount=0;
                if($total>4500){
                    $discount=$total*.2;
                }elseif($total>3000){
                    $discount=$total*.15;
                }
                elseif($total>1000){
                    $discount=$total*.1;
                }
                ?>
                <tr>
                    <td > Discount </td>
                    <td> <?=$discount?>  </td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td > Total after Discount </td>
                    <td> <?=$total-$discount?>  </td>
                </tr>

                <tr>
                    <td > Delivery </td>
                    <td> here : <?=$delivery[$_POST["city"]]?>  </td>
                    <td></td>
                    <td></td>
                </tr>

                <tr >
                    <td> Nex Total </td>
                    <td> <?=$total-$discount+$delivery[$_POST["city"]] ?>  </td>
                </tr>

            </tbody>
        </table>
        <?php } ?>
    </form>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>