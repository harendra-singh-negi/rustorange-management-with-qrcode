<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Supersim\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
class FleetContext extends InstanceContext {
    /**
     * Initialize the FleetContext
     *
     * @param Version $version Version that contains the resource
     * @param string $sid The SID that identifies the resource to fetch
     */
    public function __construct(Version $version, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['sid' => $sid, ];

        $this->uri = '/Fleets/' . \rawurlencode($sid) . '';
    }

    /**
     * Fetch the FleetInstance
     *
     * @return FleetInstance Fetched FleetInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): FleetInstance {
        $payload = $this->version->fetch('GET', $this->uri);

        return new FleetInstance($this->version, $payload, $this->solution['sid']);
    }

    /**
     * Update the FleetInstance
     *
     * @param array|Options $options Optional Arguments
     * @return FleetInstance Updated FleetInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): FleetInstance {
        $options = new Values($options);

        $data = Values::of([
            'UniqueName' => $options['uniqueName'],
            'NetworkAccessProfile' => $options['networkAccessProfile'],
            'IpCommandsUrl' => $options['ipCommandsUrl'],
            'IpCommandsMethod' => $options['ipCommandsMethod'],
            'SmsCommandsUrl' => $options['smsCommandsUrl'],
            'SmsCommandsMethod' => $options['smsCommandsMethod'],
        ]);

        $payload = $this->version->update('POST', $this->uri, [], $data);

        return new FleetInstance($this->version, $payload, $this->solution['sid']);
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
        return '[Twilio.Supersim.V1.FleetContext ' . \implode(' ', $context) . ']';
    }
}