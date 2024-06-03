<?php

namespace App\Enums;



enum GeneralStatus: string
{

    case PRESENT = 'present';
    case ABSENT = 'absent';
    case ONGOING = 'on going';
}
