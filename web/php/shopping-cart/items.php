<?php
$items = array(
     array(
        "Snickers"
       ,"snickers.jpg"
       ,0.98
    )
    ,array(
        "Milkyway"
       ,"milkyway.jpg"
       ,0.98
    )
    ,array(
        "3Musketeers"
       ,"3musketeers.jpg"
       ,0.98
    )
    ,array(
        "Skittles"
       ,"skittles.jpg"
       ,0.98
    )
    ,array(
        "M&M"
       ,"mm.jpg"
       ,0.98
    )
    ,array(
        "Reeses Pieces"
       ,"reesespieces.jpg"
       ,0.98
    )
    ,array(
        "100 Grand"
       ,"100grand.jpg"
       ,0.98
    )
    ,array(
        "Starburst"
       ,"starburst.png"
       ,0.98
    )
    ,array(
        "Jolly Ranchers"
       ,"jollyrancher.jpg"
       ,0.98
    )
    ,array(
        "Mike N Ike"
       ,"mikeandike.jpg"
       ,0.98
    )
);
$Name_Index = 0;
$Picture_Index = 1;
$Price_Index = 2;
$root = $_SERVER['DOCUMENT_ROOT'];
?>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Picture</th>
            <th>Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Add</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $temp_index = 0;

        foreach ($items as $item)
        {
            echo '
            <tr>
                <td>
                    <img class="product" src="'.$root.'/content/images/'.$item[$Picture_Index].'" alt="'.$item[$Name_Index].'">
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>';
            /*echo "<tr>
                <td>
                    <img class="product" src="$_SERVER['DOCUMENT_ROOT']/content/images/$item[$Picture_Index]" alt="$item[$Name_Index]">
                </td>
                <td>$item[$Name_Index]</td>
                <td>$item[$Price_Index]</td>
                <td><input> </input></td>
                <td><button onclick=""> </button></td>
            </tr>";*/
            $temp_index++;
        }
        ?>

        </tbody>
    </table>
</div>