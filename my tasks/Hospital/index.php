<?php
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST){
    $errors=[];
    if(empty($_POST['phone'])){
        $errors['phone']="من فضلك ادخل الهاتف";
    }
    if(empty($errors)){
        $_SESSION['phone']=$_POST['phone'];
        header("location:review.php");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="container" alt="rtl">
    <div class="row">
        <div class="col-12 text-center text-dark display-3 mt-5">
            <h1>
                سجل معنا 
            </h1>
        </div>
        <div class="col-4 offset-4 my-5">
            <form action="" method="post">
                <div class="form-group">
                    <label for="phone" alt="rtl">رقم الهاتف</label>
                    <input type="number" name="phone" value="" id="phone" class="form-control">
                    <small id="helpId" class="" ><?= $errors["phone"] ?? "" ?></small>
                </div>
                <div class="form-group">
                    <button class="btn btn-outline-dark">
                        انضم الينا
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>
</body>
</html>