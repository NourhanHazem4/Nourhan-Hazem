<?php
session_start();
include_once "cost_of_games.php";
if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST && isset($_POST["name"]) && isset($_POST["num_of_members"]) )
{ 
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["num_of_members"] = $_POST["num_of_members"];
}else{
    header('Location: join_us.php');die;    
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>club</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <form  class="mx-auto mt-5" action="result.php" method="POST">
    <h1 >Add Games to each member</h1>

    <?php 
    for ($i=0 ; $i < $_SESSION["num_of_members"] ;$i++)
     { ?>
        <h4 >Member Number(<?=$i+1?>) </h4>
        <input class="form-control" name="names[]" type="text" required />

        <?php foreach ($games as $key => $value) {
           echo "<div class='form-check'>
           <input type='checkbox' value='{$key}'  class='form-check-input' name='member{$i}[]'>
           <label class='form-check-label'>{$key} {$value} EL</label>
           </div>
           ";
        }
         } ?>
        <button type="submit" class="btn btn-primary btn-lg btn-block">Result</button>
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