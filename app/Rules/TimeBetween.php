<?php

namespace App\Rules;

use Closure;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;

class TimeBetween implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $pickupDate = Carbon::parse($value);
        $pickupTime = Carbon::createFromTime($pickupDate->hour, $pickupDate->minute, $pickupDate->second);
        // when the restaurant is open
        $earliestTime = Carbon::createFromTimeString('10:00:00');
        $lastTime = Carbon::createFromTimeString('22:00:00');
        if(!($pickupTime->between($earliestTime, $lastTime))){
            $fail('Please choose the time between 10:00-22:00.');
        }
        // else{
          
        //         $fail('Please choose the time between 10:00-22:00.');
           
        // }
    }
   
}
