<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\TrustedComms;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
class BrandsInformationContext extends InstanceContext {
    /**
     * Initialize the BrandsInformationContext
     *
     * @param Version $version Version that contains the resource
     */
    public function __construct(Version $version) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [];

        $this->uri = '/BrandsInformation';
    }

    /**
     * Fetch the BrandsInformationInstance
     *
     * @param array|Options $options Optional Arguments
     * @return BrandsInformationInstance Fetched BrandsInformationInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(array $options = []): BrandsInformationInstance {
        $options = new Values($options);

        $headers = Values::of(['If-None-Match' => $options['ifNoneMatch'], ]);

        $payload = $this->version->fetch('GET', $this->uri, [], [], $headers);

        return new BrandsInformationInstance($this->version, $payload);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Preview.TrustedComms.BrandsInformationContext ' . \implode(' ', $context) . ']';
    }
}