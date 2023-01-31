<?php

// Подключаемся к базе данных
$servername = "profitoo.mysql.tools";
$database = "profitoo_monitoring";
$username = "profitoo_monitoring";
$password = "!my@L4R73x";
 // Создаем соединение
$conn = new mysqli($servername, $username, $password, $database);
// Проверяем соединение
if($conn->connect_error){
    die("Ошибка: " . $conn->connect_error);
}
$sql = "SELECT * FROM prices";


if($result = mysqli_query($conn, $sql)){
     
    $rowsCount = mysqli_num_rows($result); // количество полученных строк
    echo "<p>Активих товарів в моніторинзі конкурентів: $rowsCount</p>";
    echo "<table><tr><th>Назва</th><th>Артикул</th><th>Кількість</th><th>Ціна в базі</th><th>Ціна на сайті</th><th>Fest-club</th><th>inalliance.net</th><th>inalliance.net</th><th>fest-market.com.ua</th><th>bindas.com.ua</th><th>НОВА ЦІНА</th></tr>";
    foreach($result as $row){
        if($row["k1"]<$row["ps"]){$kr1 = "color:red;";}else{$kr1="";};
        if($row["k2"]<$row["ps"]){$kr2 = "color:red;";}else{$kr2="";};
        if($row["k3"]<$row["ps"]){$kr3 = "color:red;";}else{$kr3="";};
        if($row["k4"]<$row["ps"]){$kr4 = "color:red;";}else{$kr4="";};
        if($row["k5"]<$row["ps"]){$kr5 = "color:red;";}else{$kr5="";};




        echo "<tr>";
            echo "<td style='width:400px;'>" . $row["name"] . "</td>";
            echo "<td>" . $row["upc"] . "</td>";
            echo "<td>" . $row["quantity"] . "</td>";
            echo "<td>" . $row["pb"] . "</td>";
            echo "<td>" . $row["ps"] . "</td>";
            echo "<td style='". $kr1  ."'>" . $row["k1"] . "</td>";
            echo "<td style='". $kr2  ."'>" . $row["k2"] . "</td>";
            echo "<td style='". $kr3  ."'>" . $row["k3"] . "</td>";
            echo "<td style='". $kr4  ."'>" . $row["k4"] . "</td>";
            echo "<td style='". $kr5  ."'>" . $row["k5"] . "</td>";
            echo "<td><input type='text' name='nprice' placeholder='Вкажіть нову ціну'></td>";
            echo "<td><input type='button' id='submitDetails' class='submitDetails' name='submitDetails' value='Зберегти' /></td>";

            
        echo "</tr>";
    }
    echo "</table>";
    mysqli_free_result($result);
} else{
    echo "Помилка підключення: " . mysqli_error($conn);
}
mysqli_close($conn);
