<?php

namespace Goldfinch\Date\Extensions;

use Carbon\Carbon;
use SilverStripe\ORM\DataExtension;

class DBCarbonExtension extends DataExtension
{
    private ?Carbon $carbon;

    public function diffForHumans()
    {
        $this->initCarbon();

        return $this->Carbon()->diffForHumans();
    }

    /**
     * For backend call only (not for use in templates)
     */
    private function Carbon()
    {
        return $this->owner->carbon;
    }

    private function initCarbon()
    {
        $this->owner->carbon = Carbon::parse($this->owner->RAW());
    }
}
