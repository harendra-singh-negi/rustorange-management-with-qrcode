<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Verify;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\Rest\Verify\V2\FormList;
use Twilio\Rest\Verify\V2\ServiceList;
use Twilio\Rest\Verify\V2\TemplateList;
use Twilio\Rest\Verify\V2\VerificationAttemptList;
use Twilio\Rest\Verify\V2\VerificationAttemptsSummaryList;
use Twilio\Version;

/**
 * @property FormList $forms
 * @property ServiceList $services
 * @property VerificationAttemptList $verificationAttempts
 * @property VerificationAttemptsSummaryList $verificationAttemptsSummary
 * @property TemplateList $templates
 * @method \Twilio\Rest\Verify\V2\FormContext forms(string $formType)
 * @method \Twilio\Rest\Verify\V2\ServiceContext services(string $sid)
 * @method \Twilio\Rest\Verify\V2\VerificationAttemptContext verificationAttempts(string $sid)
 */
class V2 extends Version {
    protected $_forms;
    protected $_services;
    protected $_verificationAttempts;
    protected $_verificationAttemptsSummary;
    protected $_templates;

    /**
     * Construct the V2 version of Verify
     *
     * @param Domain $domain Domain that contains the version
     */
    public function __construct(Domain $domain) {
        parent::__construct($domain);
        $this->version = 'v2';
    }

    protected function getForms(): FormList {
        if (!$this->_forms) {
            $this->_forms = new FormList($this);
        }
        return $this->_forms;
    }

    protected function getServices(): ServiceList {
        if (!$this->_services) {
            $this->_services = new ServiceList($this);
        }
        return $this->_services;
    }

    protected function getVerificationAttempts(): VerificationAttemptList {
        if (!$this->_verificationAttempts) {
            $this->_verificationAttempts = new VerificationAttemptList($this);
        }
        return $this->_verificationAttempts;
    }

    protected function getVerificationAttemptsSummary(): VerificationAttemptsSummaryList {
        if (!$this->_verificationAttemptsSummary) {
            $this->_verificationAttemptsSummary = new VerificationAttemptsSummaryList($this);
        }
        return $this->_verificationAttemptsSummary;
    }

    protected function getTemplates(): TemplateList {
        if (!$this->_templates) {
            $this->_templates = new TemplateList($this);
        }
        return $this->_templates;
    }

    /**
     * Magic getter to lazy load root resources
     *
     * @param string $name Resource to return
     * @return \Twilio\ListResource The requested resource
     * @throws TwilioException For unknown resource
     */
    public function __get(string $name) {
        $method = 'get' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return $this->$method();
        }

        throw new TwilioException('Unknown resource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments): InstanceContext {
        $property = $this->$name;
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.Verify.V2]';
    }
}