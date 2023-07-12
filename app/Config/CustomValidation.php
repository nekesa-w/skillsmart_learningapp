
<?php

namespace Config;

use CodeIgniter\I18n\Time;

class CustomValidation
{

    public function validate_age(string $str)
    {
        $dobpost = Time::parse($str);
        $age = $dobpost->getAge();
        if ($age > 13) {
            return true;
        } else {
            return false;
        }
    }
}
