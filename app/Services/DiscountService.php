<?php
 
namespace App\Services;

class DiscountService
{
    public function calculateDiscount($Cart_data=null, $fruits_data=null, $coupon_data=null) 
    {
        $discount_amount = 0;
    
        if ($coupon_data->coupon_type == 'repeated') { 
             
            $total_item_Price = $fruits_data->price_per_kg * $Cart_data->quantity;
            $coupon_discount_value = $coupon_data->value;
           
            // Calculate the multiplier to determine the increase in discount percentage
            $multiplier = floor($Cart_data->quantity / $coupon_data->quantity);
            // Increase the discount percentage based on the multiplier
            $coupon_data->value *= $multiplier;
    
            if ($coupon_data) {
                switch ($coupon_data->discount_type) {
                    case 'Flat':
                        $discount_amount = $coupon_data->value;
                        break;
                    case 'Percentage':
                        $discount_amount = ($total_item_Price * $coupon_data->value) / 100;
                        break;
                    case 'Upto_Percentage':
                        $discount_amount = ($total_item_Price * $coupon_data->value) / 100;
                        break;
                    case 'Upto_flat':
                        $discount_amount = min($total_item_Price, $coupon_data->value);
                        break;
                    default:
                        // This case handles scenarios where the discount_type is not recognized.
                        break;
                }
            }
            // Subtract discount from total price
            $total_item_Price -= $discount_amount;
        }
    
        // Return the discount amount
        return $discount_amount;   
    }
}
 