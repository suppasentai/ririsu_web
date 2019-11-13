<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class ReleaseStatus extends Enum
{
    const Pending =   0;
    const Active =   1;
    const Released = 2;
}
