<?php
namespace App\Traits;

trait HelperTrait
{
    protected function generateRandomPassword()
    {
        $i = 0 ;
        $password = '';
        while ($i < 9 )
        {
            $password .= random_int(0,9);
            $i++;
        }
        return $password;
    }
}
