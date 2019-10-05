<?php
$items = array(
     array(
        "Snickers"
       ,"snickers.png"
       ,0.98
    )
    ,array(
        "Milkyway"
       ,"milkyway.png"
       ,0.98
    )
    ,array(
        "3Musketeers"
       ,"3musketeers.png"
       ,0.98
    )
    ,array(
        "Skittles"
       ,"skittles.png"
       ,0.98
    )
    ,array(
        "M&M"
       ,"mm.png"
       ,0.98
    )
    ,array(
        "Reeses Pieces"
       ,"reesespieces.png"
       ,0.98
    )
    ,array(
        "100 Grand"
       ,"100grand.png"
       ,0.98
    )
    ,array(
        "Starburst"
       ,"starburst.png"
       ,0.98
    )
    ,array(
        "Jolly Ranchers"
       ,"jollyrancher.png"
       ,0.98
    )
    ,array(
        "Mike N Ike"
       ,"mikeandike.png"
       ,0.98
    )
);
$Name_Index = 0;
$Picture_Index = 1;
$Price_Index = 2;
//$root = $_SERVER['DOCUMENT_ROOT'];
$root = "../../../content/images/";
$width = 100;
?>

<div class="table-responsive">
    <table class="table table-striped table-hover table-items">
        <thead>
        <tr>
            <th width="20%">Picture</th>
            <th width="20%">Name</th>
            <th width="10%">Price</th>
            <th width="10%">Qty</th>
            <th width="40%">Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $temp_index = 0;

        foreach ($items as $item)
        {
            echo '
            <tr>
                <td width="20%">
                    <img class="product" src="'.$root.$item[$Picture_Index].'" alt="'.$item[$Name_Index].'" width="'.$width.'">
                </td>
                <td width="20%">'.$item[$Name_Index].'</td>
                <td width="10%" id="item-'.$temp_index.'-price">'.$item[$Price_Index].'</td>
                <td width="10%">
                    <input id="item-'.$temp_index.'-qty" class="form-control" type="number" value="0"/>
                </td>
                <td width="40%">
                    <div class="btn-group">
                        <button type="button" class="btn btn-success" id="item'.$temp_index.'-add" onclick="">Add</button>
                        
                        <button type="button" class="btn btn-danger disabled" id="item'.$temp_index.'-remove" onclick="">Remove</button>
                    </div>
                </td>
            </tr>';

            $temp_index++;
        }
        ?>

        </tbody>
    </table>
</div>