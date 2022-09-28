<?php
session_start();
$phone = $_SESSION['phone'];
if($_SERVER["REQUEST_METHOD"]=="POST" && $_POST){
    $message="";
    $totalDegree=0;
   $cleanInput=$_POST['clean']; $totalDegree += $cleanInput;
   $priceInput=$_POST['price']; $totalDegree += $priceInput;
   $nurseInput=$_POST['nurse']; $totalDegree += $nurseInput;
   $doctorInput=$_POST['doctor']; $totalDegree += $doctorInput;
   $quiteInput=$_POST['quite']; $totalDegree += $quiteInput;
   $_SESSION['totalDegree']=$totalDegree;
//    echo $totalDegree;
if($totalDegree>=25){
    $message .= "شكرا جزيلا لك" ;
    $_SESSION['msg']=$message;
}else{
    $message .= "سوف نعيد الاتصال بك لاحقا على هذا الهاتف $phone";
    $_SESSION['msg']=$message;
}
header("location:result.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-20" dir="rtl">
        <h2 class="text-danger row mt-20">يسعدنا تقييمك</h2>
        <p>هذا التقرير نعمل به على زيادة تحسين جودة العمل</p>
        <form action="" method="post">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">السؤال</th>
                    <th scope="col">سئ</th>
                    <th scope="col">جيد</th>
                    <th scope="col">جيد جدا</th>
                    <th scope="col">ممتاز</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">هل انت راضي عن مستوى النظافة</th>
                    <td><input class="form-check-input" type="radio" name="clean" id="cleanBad" value="0"></td>
                    <td><input class="form-check-input" type="radio" name="clean" id="cleanGood" value="3"></td>
                    <td><input class="form-check-input" type="radio" name="clean" id="cleanVGood" value="5"></td>
                    <td><input class="form-check-input" type="radio" name="clean" id="cleanExcellent" value="10"></td>
                </tr>
                <tr>
                    <th scope="row">هل انت راضي عن اسعار الخدمات</th>
                    <td><input class="form-check-input" type="radio" name="price" id="priceBad" value="0"></td>
                    <td><input class="form-check-input" type="radio" name="price" id="priceGood" value="3"></td>
                    <td><input class="form-check-input" type="radio" name="price" id="priceVGood" value="5"></td>
                    <td><input class="form-check-input" type="radio" name="price" id="priceExcellent" value="10"></td>
                </tr>
                <tr>
                    <th scope="row">هل انت راضي عن خدمة التمريض</th>
                    <td><input class="form-check-input" type="radio" name="nurse" id="nurseBad" value="0"></td>
                    <td><input class="form-check-input" type="radio" name="nurse" id="nurseGood" value="3"></td>
                    <td><input class="form-check-input" type="radio" name="nurse" id="nurseVGood" value="5"></td>
                    <td><input class="form-check-input" type="radio" name="nurse" id="nurseExcellent" value="10"></td>
                </tr>
                <tr>
                    <th scope="row">هل انت راضي عن مستوى الدكاترة</th>
                    <td><input class="form-check-input" type="radio" name="doctor" id="doctorBad" value="0"></td>
                    <td><input class="form-check-input" type="radio" name="doctor" id="doctorGood" value="3"></td>
                    <td><input class="form-check-input" type="radio" name="doctor" id="doctorVGood" value="5"></td>
                    <td><input class="form-check-input" type="radio" name="doctor" id="doctorExcellent" value="10"></td>
                </tr>
                <tr>
                    <th scope="row">هل انت راضي عن الهدوء بالمستشفي</th>
                    <td><input class="form-check-input" type="radio" name="quite" id="quiteBad" value="0"></td>
                    <td><input class="form-check-input" type="radio" name="quite" id="quiteGood" value="3"></td>
                    <td><input class="form-check-input" type="radio" name="quite" id="quiteVGood" value="5"></td>
                    <td><input class="form-check-input" type="radio" name="quite" id="quiteExcellent" value="10"></td>
                </tr>
            </tbody>
        </table>
        <div class="form-group" >
                    <button class="btn btn-outline-dark" style="width:100%;">
                        تأكيد                   
                    </button>
                </div>
        </form>
    </div>
</body>

</html>