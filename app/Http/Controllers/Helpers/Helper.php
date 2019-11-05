<?php

if (!function_exists("userStatus"))
{
    function userStatus($status)
    {
        if ($status == \App\User::DISACTIVE)
            return "موقوف"   ;
        if ($status == \App\User::ACTIVE)
            return "مفعل"    ;
        if ($status == \App\User::SUSPENDED)
            return "معلق";
    }
}
if (!function_exists("userRole"))
{
    function userRole($role)
    {
        if ($role == \App\User::ADMIN)
            return "مدير"   ;
        if ($role == \App\User::DELEGATE)
            return "مندوب"    ;
        if ($role == \App\User::CLIENT)
            return "عميل";
    }
}
if (!function_exists("orderStatus"))
{
    function orderStatus($status)
    {
        if ($status == \App\Order::NEW)
            return "جديد"   ;
        if ($status == \App\Order::DONE)
            return " تم التوصيل "    ;

    }
}
if (!function_exists("userOrders"))
{
    function userOrders($user)
    {
       if ($user->role == \App\User::ADMIN)
           return [];
       if ($user->role == \App\User::DELEGATE)
           return $user->delegateOrders;
       if ($user->role == \App\User::CLIENT)
           return $user->clientOrders;

    }
}
