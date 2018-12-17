<?php

# Does not check database yet.
# 2nd bit is minimum string length true/false. 
# 3rd bit is encoding utf-8 true/false.
// More to be added, database unique check needs a user class defaulted before it can implement such a check.
class AuthChecker{ 

    public $state = 0;

    public function check_string(string $string,array $rules)
    {
        if($rules['min-length'])
        {
            if(strlen($string) < $rules['min-length'])
            {   
                printf("Invalid string length.\n @".__METHOD__);   
            }
            else
            {
                $this->state = $this->state^2;
            }
        }
        if($rules['utf8'] == True)
        {
           if(mb_detect_encoding($string,'UTF-8',True) != False )
           {
                $this->state = $this->state^4;
           }
        }

        //*******************************************************************************

        if($this->state&2 && $this->state&4 )
        {
            return True;
        }
        else
        {
            return False;
        }
    }
}
