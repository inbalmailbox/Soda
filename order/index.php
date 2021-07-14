<?php

    /*****************
     * 
     * get an order from shopify api by its ID
     */

    function getOrderFromShopifybyId($order_id) {
        //                                                                
        // api call to shopify
        $ch = curl_init('https://699677318796ade674ab9e01a84fd616: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@yael-story.myshopify.com/admin/api/2021-07/orders/'.$order_id.'.json');
 
      
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       $data = curl_exec($ch);
        
       curl_close($ch);

      $dec= json_decode($data);

       return $dec;
    
    }
 
    $order_id = $_GET['order_id'];;
   // $order = getOrdersFromShopify($id);

   $result = getOrderFromShopifybyId($order_id);
  
?>
<link rel="stylesheet" href="../CSS/main.css" type="text/css">
<h1>I'm the Order Page for Order #<?= $order_id; ?></h1>

<?php // if ($order) { 

if (! empty($result->order)) {?>

    <table class="styled-table">
    <tbody>

        <tr>
         <td><?php print_r($result->order->id); ?></td>
         <td><?php print_r($result->order->name); ?></td>
         <td><?php print_r($result->order->title); ?></td>
         <td><?php print_r($result->order->total_line_items_price); ?></td>
        
        </tr>
        </tbody>
</table>
 <?php
}
 ?>
