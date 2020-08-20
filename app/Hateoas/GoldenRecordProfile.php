<?php

namespace App\Hateoas;

use App\Model\Profile;
use GDebrauwer\Hateoas\Traits\CreatesLinks;

class GoldenRecordProfile
{
    use CreatesLinks;

    /**
     * Get the HATEOAS link to view the profile.
     *
     * @param \App\Profile $profile
     *
     * @return null|\GDebrauwer\Hateoas\Link
     */
    public function self(Profile $profile)
    {
        return $this->link('api.customers.show', ['profile' => $profile]);
    }
}
