<?php
    /*****************
     * 
     * get orders from shopify api
     */
    function getOrdersFromShopify() {
        //
        // api call to shopify
        //
        //
       
        
        $ch = curl_init('https://699677318796ade674ab9e01a84fd616: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@yael-story.myshopify.com/admin/api/2019-04/orders.json');     
            
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $data = curl_exec($ch);
            
            curl_close($ch);

            $dec= json_decode($data);

            return $dec;

    }

    $orders_array = getOrdersFromShopify();
    console.log($orders_array);

?>

<link rel="stylesheet" href="../CSS/main.css" type="text/css">
<h1>I'm the Orders Page</h1>

<?php
if (! empty($orders_array->orders)) {?>

<table class="styled-table">
<thead>
    <tr>
        <th>Order Number</th><th> Name</th><th>Last Name</th><th>Email</th>
    </tr>
    <?php
    foreach($orders_array->orders as $value){
        ?>
    <tr>
        <td><a href='../order/index.php?order_id='.print_r($value->id).'><?php print_r($value->id); ?></a></td>
        <td><?php print_r($value->id); ?></td>
        <td><?php print_r($value->customer->first_name); ?></td>
        <td><?php print_r($value->customer->last_name); ?></td>
        <td><?php print_r($value->contact_email); ?></td>
    </tr>
    <?php } ?>
</thead>
</table>
<?php
}
 ?>
