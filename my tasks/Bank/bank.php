
<!doctype html>
<html lang="en">

<head>
    <title>Bank</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <form  class="mx-auto mt-5" method="POST">
        <h1 class="text-center mb-5">Bank</h1>
        <div class="form-group">
            <label for="name">Your Name</label>
            <input id="name" class="form-control" name="username"  type="text"  value="<?=$_POST["username"]?? "" ?>" required/>    
        </div>
        <div class="form-group">
             <label for="name">Loan quantity</label>
            <input id="name" class="form-control" name="loan"  type="number"  value="<?=$_POST["loan"]?? "" ?>" required/>
        </div>
        <div class="form-group">
            <label for="products">Number of years</label>
            <input id="products" class="form-control"  name="years" value="<?=$_POST["years"]?? "" ?>" type="number" required />
        </div>
        <button type="submit" name="add" class="btn btn-primary" style="width: 100%;">submit</button>
    </form>
    <?php if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST && isset($_POST["add"]) &&
     isset($_POST["loan"]) && isset($_POST["years"]) && isset($_POST["username"])){ 
        $total=0;
        if($_POST["years"]<=3){
            $total=$_POST["loan"] *.1 *$_POST["years"] + $_POST["loan"] ;
        }else{
            $total=$_POST["loan"] *.15 *$_POST["years"] + $_POST["loan"] ;
        }
        $permonth=$total/(12*$_POST["years"]);
        ?>
        <table class="table table-striped">
                <tbody>
                     <tr>
                        <th> Client Name </th>  
                        <th> <?=$_POST["username"]?> </th>        
                    </tr>
                    <tr>
                        <th> Total  installment </th>  
                        <th> <?=$total?> </th>        
                    </tr>
                    <tr>
                        <th> Monthly installment </th>  
                        <th> <?=$permonth?> </th>        
                    </tr>
                </tbody>
            </table>

    <?php }?>
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