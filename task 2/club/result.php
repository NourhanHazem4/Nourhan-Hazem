<?php
session_start();
include_once "cost_of_games.php";
if(!($_SERVER["REQUEST_METHOD"]=="POST" && $_POST)){
    header('Location: games.php');die;
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>your checkout</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<div class="container mx-auto mt-5">
    <h1 >Result</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Grand Family Name</th>
                    <th scope="col"><?=$_SESSION['name']?></th>
                </tr>
            </thead>
            <tbody>
            <?php
            $total_subscription=0; 
            for ($i=0 ; $i <$_SESSION["num_of_members"] ;$i++) {
                $games_of_member=0;
                ?>
                <tr>
                    <td>  <?=$_POST["names"][$i] ?>  </td>


                    <?php                                            
                        $cost_of_each_game=[
                            "Football"=>0,
                            "Swimming"=>0,
                            "Volleyball"=>0,
                            "Other"=>0
                        ];
                     foreach ($_POST["member".$i] as $game) {
                        $games_of_member += $games[$game];  
                        $cost_of_each_game[$game] += $games[$game];  
                        echo "<td>{$game}</td>";
                    } ?>
                    <td> <?= $games_of_member ?>  </td>
                </tr>
            <?php $total_subscription+= $games_of_member; } ?>

            <tr>
                <th scope="row">total Price</th>
                <td><?=$total_subscription?> </td>
            </tr>

            </tbody>
        </table>

        <h1>Sports</h1>
        <table class="table table-striped">
            <tbody>
            <?php foreach ($games as $sport => $price) {?>
                <tr>
                    <th scope="row"><?=$sport?></th>
                    <td> <?= $price ?>  </td>
                </tr>
            <?php } ?>

            <tr>
                <th scope="row">Club subscribtion for all members</th>
                <td><?=$_SESSION["num_of_members"] *2500 + 10000?> </td>
            </tr>

            <tr>
                <th scope="row">Final Price Price</th>
                <td><?=$_SESSION["num_of_members"] *2500 + 10000 + $total_subscription?> </td>
            </tr>

            </tbody>
        </table>
        
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