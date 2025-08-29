<?php

// namespace App\Helper;
use App\Models\MenuItem;
use App\Models\MenuSection;
// class RestaurantHelper
// {

    if (!function_exists('getRestaurantName')) {
        function getRestaurantName()
        {
            return "My Restaurant 123";
        }
    }

    if (!function_exists('AllItems')) {
        function AllItems()
        {
            return MenuItem::get();
            // return "My Restaurant 123";
        }
    }
    if (!function_exists('GetCategoryName')) {
        function GetCategoryName($CategoryID)
        {
            $Category= MenuSection::find($CategoryID);
            if($Category){

                return $Category->name;
            }
            return '';
            // return "My Restaurant 123";
        }
    }

    if (!function_exists('AllCategory')) {
        function AllCategory()
        {
            return MenuSection::get();
            // return "My Restaurant 123";
        }
    }

// }
