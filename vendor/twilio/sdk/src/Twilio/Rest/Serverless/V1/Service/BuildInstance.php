<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Serverless\V1\Service;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Rest\Serverless\V1\Service\Build\BuildStatusList;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 *
 * @property string $sid
 * @property string $accountSid
 * @property string $serviceSid
 * @property string $status
 * @property array[] $assetVersions
 * @property array[] $functionVersions
 * @property array[] $dependencies
 * @property string $runtime
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $url
 * @property array $links
 */
class BuildInstance extends InstanceResource {
    protected $_buildStatus;

    /**
     * Initialize the BuildInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $serviceSid The SID of the Service that the Build resource is
     *                           associated with
     * @param string $sid The SID of the Build resource to fetch
     */
    public function __construct(Version $version, array $payload, string $serviceSid, string $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'sid' => Values::array_get($payload, 'sid'),
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'serviceSid' => Values::array_get($payload, 'service_sid'),
            'status' => Values::array_get($payload, 'status'),
            'assetVersions' => Values::array_get($payload, 'asset_versions'),
            'functionVersions' => Values::array_get($payload, 'function_versions'),
            'dependencies' => Values::array_get($payload, 'dependencies'),
            'runtime' => Values::array_get($payload, 'runtime'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'url' => Values::array_get($payload, 'url'),
            'links' => Values::array_get($payload, 'links'),
        ];

        $this->solution = ['serviceSid' => $serviceSid, 'sid' => $sid ?: $this->properties['sid'], ];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return BuildContext Context for this BuildInstance
     */
    protected function proxy(): BuildContext {
        if (!$this->context) {
            $this->context = new BuildContext(
                $this->version,
                $this->solution['serviceSid'],
                $this->solution['sid']
            );
        }

        return $this->context;
    }

    /**
     * Fetch the BuildInstance
     *
     * @return BuildInstance Fetched BuildInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): BuildInstance {
        return $this->proxy()->fetch();
    }

    /**
     * Delete the BuildInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool {
        return $this->proxy()->delete();
    }

    /**
     * Access the buildStatus
     */
    protected function getBuildStatus(): BuildStatusList {
        return $this->proxy()->buildStatus;
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
        return '[Twilio.Serverless.V1.BuildInstance ' . \implode(' ', $context) . ']';
    }
}