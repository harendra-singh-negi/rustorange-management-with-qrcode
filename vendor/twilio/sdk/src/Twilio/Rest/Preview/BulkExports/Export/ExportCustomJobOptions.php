<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Preview\BulkExports\Export;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class ExportCustomJobOptions {
    /**
     * @param string $webhookUrl The optional webhook url called on completion of
     *                           the job. If this is supplied, `WebhookMethod` must
     *                           also be supplied.
     * @param string $webhookMethod This is the method used to call the webhook on
     *                              completion of the job. If this is supplied,
     *                              `WebhookUrl` must also be supplied.
     * @param string $email The optional email to send the completion notification
     *                      to
     * @return CreateExportCustomJobOptions Options builder
     */
    public static function create(string $webhookUrl = Values::NONE, string $webhookMethod = Values::NONE, string $email = Values::NONE): CreateExportCustomJobOptions {
        return new CreateExportCustomJobOptions($webhookUrl, $webhookMethod, $email);
    }
}

class CreateExportCustomJobOptions extends Options {
    /**
     * @param string $webhookUrl The optional webhook url called on completion of
     *                           the job. If this is supplied, `WebhookMethod` must
     *                           also be supplied.
     * @param string $webhookMethod This is the method used to call the webhook on
     *                              completion of the job. If this is supplied,
     *                              `WebhookUrl` must also be supplied.
     * @param string $email The optional email to send the completion notification
     *                      to
     */
    public function __construct(string $webhookUrl = Values::NONE, string $webhookMethod = Values::NONE, string $email = Values::NONE) {
        $this->options['webhookUrl'] = $webhookUrl;
        $this->options['webhookMethod'] = $webhookMethod;
        $this->options['email'] = $email;
    }

    /**
     * The optional webhook url called on completion of the job. If this is supplied, `WebhookMethod` must also be supplied.
     *
     * @param string $webhookUrl The optional webhook url called on completion of
     *                           the job. If this is supplied, `WebhookMethod` must
     *                           also be supplied.
     * @return $this Fluent Builder
     */
    public function setWebhookUrl(string $webhookUrl): self {
        $this->options['webhookUrl'] = $webhookUrl;
        return $this;
    }

    /**
     * This is the method used to call the webhook on completion of the job. If this is supplied, `WebhookUrl` must also be supplied.
     *
     * @param string $webhookMethod This is the method used to call the webhook on
     *                              completion of the job. If this is supplied,
     *                              `WebhookUrl` must also be supplied.
     * @return $this Fluent Builder
     */
    public function setWebhookMethod(string $webhookMethod): self {
        $this->options['webhookMethod'] = $webhookMethod;
        return $this;
    }

    /**
     * The optional email to send the completion notification to
     *
     * @param string $email The optional email to send the completion notification
     *                      to
     * @return $this Fluent Builder
     */
    public function setEmail(string $email): self {
        $this->options['email'] = $email;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Preview.BulkExports.CreateExportCustomJobOptions ' . $options . ']';
    }
}