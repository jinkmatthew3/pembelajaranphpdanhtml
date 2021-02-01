<!DOCTYPE html>
<html>
<head>
    <?=
        $js;
        $css;
    ?>
    <title>Week 11</title>
</head>
<h1><b>Add Product</b> Northwind Traders</h1>

<form action="<?= site_url();?>/insert/insert_action" method="POST">
    Product Name<input type="text" name="pName"><br>
    Supplier <select name="pSupplier">
        <option value="1">Volvo</option>
        <option value="2">Saab</option>
        <option value="3">Mercedes</option>
        <option value="4">Audi</option>
    </select><br>
    Category<input type="text" name="pCategory"><br>
    Quantity Per Unit<input type="text" name="pQtyPerUnit"><br>
    Price<input type="text" name="pPrice"><br>
    <input type="submit" value="submit">
    <a href="<?=site_url();?>/home"><button>Cancel</button></a>
</form>