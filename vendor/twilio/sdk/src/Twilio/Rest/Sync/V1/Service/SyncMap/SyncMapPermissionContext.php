<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Sync\V1\Service\SyncMap;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Serialize;
use Twilio\Values;
use Twilio\Version;

class SyncMapPermissionContext extends InstanceContext {
    /**
     * Initialize the SyncMapPermissionContext
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The SID of the Sync Service with the Sync Map
     *                           Permission resource to fetch
     * @param string $mapSid The SID of the Sync Map with the Sync Map Permission
     *                       resource to fetch
     * @param string $identity The application-defined string that uniquely
     *                         identifies the User's Sync Map Permission resource
     *                         to fetch
     */
    public function __construct(Version $version, $serviceSid, $mapSid, $identity) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['serviceSid' => $serviceSid, 'mapSid' => $mapSid, 'identity' => $identity, ];

        $this->uri = '/Services/' . \rawurlencode($serviceSid) . '/Maps/' . \rawurlencode($mapSid) . '/Permissions/' . \rawurlencode($identity) . '';
    }

    /**
     * Fetch the SyncMapPermissionInstance
     *
     * @return SyncMapPermissionInstance Fetched SyncMapPermissionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): SyncMapPermissionInstance {
        $payload = $this->version->fetch('GET', $this->uri);

        return new SyncMapPermissionInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['mapSid'],
            $this->solution['identity']
        );
    }

    /**
     * Delete the SyncMapPermissionInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool {
        return $this->version->delete('DELETE', $this->uri);
    }

    /**
     * Update the SyncMapPermissionInstance
     *
     * @param bool $read Read access
     * @param bool $write Write access
     * @param bool $manage Manage access
     * @return SyncMapPermissionInstance Updated SyncMapPermissionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(bool $read, bool $write, bool $manage): SyncMapPermissionInstance {
        $data = Values::of([
            'Read' => Serialize::booleanToString($read),
            'Write' => Serialize::booleanToString($write),
            'Manage' => Serialize::booleanToString($manage),
        ]);

        $payload = $this->version->update('POST', $this->uri, [], $data);

        return new SyncMapPermissionInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['mapSid'],
            $this->solution['identity']
        );
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
        return '[Twilio.Sync.V1.SyncMapPermissionContext ' . \implode(' ', $context) . ']';
    }
}