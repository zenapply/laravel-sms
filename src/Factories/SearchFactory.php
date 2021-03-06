<?php

namespace LeadThread\Sms\Factories;

use Exception;
use LeadThread\Sms\Search\Plivo;
use LeadThread\Sms\Search\Twilio;
use LeadThread\Sms\Search\Bandwidth;

class SearchFactory
{

    /**
     * Creates a driver instance
     * @param  string $driver The driver name to create a search instance for
     * @return \LeadThread\Sms\Search\Search
     */
    public function get($driver, $options)
    {
        return $this->{$driver}($options);
    }

    /**
     * Plivo
     * @param  array $options An array of search values for finding a phone number
     * @return \LeadThread\Sms\Search\Plivo
     */
    protected function plivo(array $options)
    {
        return new Plivo($options);
    }

    /**
     * Twilio
     * @param  array $options An array of search values for finding a phone number
     * @return \LeadThread\Sms\Search\Twilio
     */
    protected function twilio(array $options)
    {
        return new Twilio($options);
    }

    /**
     * Bandwidth
     * @param  array $options An array of search values for finding a phone number
     * @return \LeadThread\Sms\Search\Bandwidth
     */
    protected function bandwidth(array $options)
    {
        return new Bandwidth($options);
    }
}
