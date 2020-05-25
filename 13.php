<?php
session_start();
require_once('OOP/Model/ProductModel.php');

$productModel = new ProductModel();
$productCollection = $productModel->getCollection();

$addedProducts = [];
if(isset($_SESSION['products'])) {
    $totals = [];
    $addedProducts = $_SESSION['products'];
    foreach($addedProducts as $addedProduct) {
        $totals[$addedProduct['product_id']] = $addedProduct['qty']*$addedProduct['price'];
    }
}
?>
<style>
    #cart,
    #add-item {
        margin-bottom: 20px;
    }
    table thead th {
        width: 100px;
    }
    table tbody {
        text-align: center;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<table id="cart">
    <thead>
        <th>ID</th>
        <th>Product name</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php if(!empty($addedProducts)):?>
            <?php foreach($addedProducts as $addedProduct):?>
                <tr>
                    <td><?= $addedProduct['product_id']?></td>
                    <td><?= $addedProduct['name']?></td>
                    <td><input id="qty-<?= $addedProduct['product_id']?>" type="text" value="<?= $addedProduct['qty']?>"/></td>
                    <td id="price-<?= $addedProduct['product_id']?>"><?= $addedProduct['price']?></td>
                    <td class="actions">
                        <button class="add-to-cart" data-id="<?= $addedProduct['product_id']?>">Add to cart</button>
                        <button class="remove-from-cart" data-id="<?= $addedProduct['product_id']?>">Remove</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<select id="select-item">
    <?php foreach($productCollection as $product):?>
        <option value="<?= $product['product_id']?>"><?= $product['name'];?></option>
    <?php endforeach; ?>
</select>
<button id="add-item">Add Product</button>

<h3>Cart Total</h3>
<div id="total">
    <label>Total: </label>
    <b><span class="value">0</span></b> $
</div>

<div id="tax">
    <label>Tax: </label>
    <b><span class="value">0</span></b> $
</div>

<div id="total-tax">
    <label>Total included Tax: </label>
    <b><span class="value">0</span></b> $
</div>

<script>
    var tax = 0.1;
    var total = <?= json_encode($totals)?>;
    bindAddTocartClick();
    bindRemoveFromcartClick();
    calculateTotal(total);

    $('#add-item').click(function () {
        $.ajax({
            type: 'POST',
            url: '13_ajax_get.php',
            data: { id: $('#select-item').val() },
            dataType: 'json',
            success: function (data) {
                if(!total.hasOwnProperty(data.product_id)){
                    total[data.product_id] = 0;
                    createProductHtml(data);
                }
            }
        });

    });

    function createProductHtml(data) {
        var itemHtml = '';

        itemHtml += '<tr>';

        itemHtml += '<td>'+data.product_id+'</td>';
        itemHtml += '<td>'+data.name+'</td>';
        itemHtml += '<td><input id="qty-'+data.product_id+'" type="text"/></td>';
        itemHtml += '<td id="price-'+data.product_id+'">'+data.price+'</td>';
        itemHtml += '<td class="actions">';
        itemHtml += '<button class="add-to-cart" data-id="'+data.product_id+'">Add to cart</button>';
        itemHtml += '<button class="remove-from-cart" data-id="'+data.product_id+'">Remove</button>';
        itemHtml += '</td>';

        itemHtml += '</tr>';

        $('#cart tbody').append(itemHtml);

        bindAddTocartClick();
        bindRemoveFromcartClick();
    }

    function bindAddTocartClick(){
        $('.add-to-cart').click(function (event) {
            event.preventDefault();

            var id = $(this).attr('data-id');

            var qty = $('#qty-'+id).val();
            var price = $('#price-'+id).text();
            price = parseFloat(price);

            total[id] = qty*price;
            
            if(qty > 0) {
                calculateTotal(total);
                addProductToSession(id, qty);
            }
        });
    }

    function addProductToSession(productId, qty){
        $.ajax({
            type: 'POST',
            url: '13_ajax_session.php',
            data: { id: productId, qty: qty, action: 'add' },
            dataType: 'json',
            success: function (data) {
                
            }
        });
    }

    function bindRemoveFromcartClick(data){
        $('.remove-from-cart').click(function (event) {
            event.preventDefault();

            var id = $(this).attr('data-id');

            delete total[id];
            calculateTotal(total);

            $(this).parents('tr').remove();

            removeProductFromSession(id);
        });
    }

    function removeProductFromSession(productId){
        $.ajax({
            type: 'POST',
            url: '13_ajax_session.php',
            data: { id: productId, action: 'remove' },
            dataType: 'json',
            success: function (data) {
                
            }
        });
    }
    
    function calculateTotal(total) {
        console.log(total);
        var sum = 0;

        for (var index in total){
            sum += parseFloat(total[index]);
        }

        var sumTax = sum * tax;
        var totalInclTax = sum + sumTax;

        $('#total .value').html(sum);
        $('#tax .value').html(sumTax);
        $('#total-tax .value').html(totalInclTax);

    }
</script>
