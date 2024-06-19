<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Serverless\V1\Service\Environment;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property string $sid
 * @property string $accountSid
 * @property string $serviceSid
 * @property string $environmentSid
 * @property string $buildSid
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 */
class DeploymentInstance extends InstanceResource {
    /**
     * Initialize the DeploymentInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The SID of the Service that the Deployment
     *                           resource is associated with
     * @param string $environmentSid The SID of the Environment for the Deployment
     * @param string $sid The SID that identifies the Deployment resource to fetch
     */
    public function __construct(Version $version, array $payload, string $serviceSid, string $environmentSid, string $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'sid' => Values::array_get($payload, 'sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'serviceSid' => Values::array_get($payload, 'service_sid'),
            'environmentSid' => Values::array_get($payload, 'environment_sid'),
            'buildSid' => Values::array_get($payload, 'build_sid'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'url' => Values::array_get($payload, 'url'),
        ];

        $this->solution = [
            'serviceSid' => $serviceSid,
            'environmentSid' => $environmentSid,
            'sid' => $sid ?: $this->properties['sid'],
        ];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return DeploymentContext Context for this DeploymentInstance
     */
    protected function proxy(): DeploymentContext {
        if (!$this->context) {
            $this->context = new DeploymentContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['environmentSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch the DeploymentInstance
     *
     * @return DeploymentInstance Fetched DeploymentInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): DeploymentInstance {
        return $this->proxy()->fetch();
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get(string $name) {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
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
        return '[Twilio.Serverless.V1.DeploymentInstance ' . \implode(' ', $context) . ']';
    }
}