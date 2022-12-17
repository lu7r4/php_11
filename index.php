<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title>Таблицы PHP</title>
</head>

<!--преобразование к строковому типу-->

<?php
    function _toString($value){
        switch(gettype($value)){
            case 'boolean':
                return $value ? 'true' : 'false';
            case 'string';
                return '"'.$value.'"';
            case 'NULL':
                return 'null';
            default:
                return $value;
        }
    }

?>

<!--вывод значений в таблицы сравнений с помощью php-вычислений -->

<?php function computation($type){
        $values = [true, false, 1, 0, -1, "1", null, "php"];
        echo '<table>';
        echo '<tr> <th></th> <th>true</th> <th>false</th> <th>1</th> <th>0</th> <th>-1</th> <th>"1"</th> <th>null</th> <th>"php"</th> </tr>';
        foreach($values as $y){
            $row = "<tr><th>"._toString($y)."</th>";
            if($type === '==')
                forEach($values as $x) $row .= "<td>"._toString($x==$y)."</td>";
            else
                forEach($values as $x) $row .= "<td>"._toString($x===$y)."</td>";
            $row .= "</tr>";
            echo $row;
        }
        echo '</table>';
    }
?>

<body>
    <div class="table_truth">
        <h2>Таблица истинности PHP</h2>
        <table>
            <tr><th>A</th> <th>B</th> <th>!A</th> <th>A||B</th> <th>A&&B</th> <th>A xor B</th></tr>
            <?php           
                for($a=0; $a<2; $a++){
                    for($b=0; $b<2; $b++){
                        $row = "<tr><td>".$a."</td><td>".$b."</td>"; 
                        $row .= "<td>".(!$a ? 1 : 0)."</td>"; 
                        $row .= "<td>".($a || $b ? 1 : 0)."</td>";
                        $row .= "<td>".($a && $b ? 1 : 0)."</td>";
                        $row .= "<td>".(($a xor $b) ? 1 : 0)."</td></tr>";
                        echo $row;
                    }
                }
            ?>
        </table>
    </div>
    <div class="soft_computation">
        <div>
            <h2>Гибкое сравнение в PHP</h2>
            <?php computation('==') ?>
        </div>
        <div class="hurd_computation">
            <h2>Жесткое сравнение в PHP</h2>
            <?php computation('===') ?>
        </div>
    </div>
    <div class="conclusion">
        <p>
            Жесткое и гибкое сравнение в PHP имеют разное предназначение. 
            Оператор равенства (==) сравнивает значения двух операндов, 
            когда оператор идентичности (===) сравнивает и значение, и тип операндов. 
        </p>     
    </div>   
</body>

</html>