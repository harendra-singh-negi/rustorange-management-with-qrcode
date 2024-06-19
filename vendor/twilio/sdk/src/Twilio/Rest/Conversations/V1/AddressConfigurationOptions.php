<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Conversations\V1;

use Twilio\Options;
use Twilio\Values;

abstract class AddressConfigurationOptions {
    /**
     * @param string $friendlyName The human-readable name of this configuration.
     * @param bool $autoCreationEnabled Enable/Disable auto-creating conversations
     *                                  for messages to this address
     * @param string $autoCreationType Type of Auto Creation.
     * @param string $autoCreationConversationServiceSid Conversation Service for
     *                                                   the auto-created
     *                                                   conversation.
     * @param string $autoCreationWebhookUrl For type `webhook`, the url for the
     *                                       webhook request.
     * @param string $autoCreationWebhookMethod For type `webhook`, the HTTP method
     *                                          to be used when sending a webhook
     *                                          request.
     * @param string[] $autoCreationWebhookFilters The list of events, firing
     *                                             webhook event for this
     *                                             Conversation.
     * @param string $autoCreationStudioFlowSid For type `studio`, the studio flow
     *                                          SID where the webhook should be
     *                                          sent to.
     * @param int $autoCreationStudioRetryCount For type `studio`, number of times
     *                                          to retry the webhook request
     * @return CreateAddressConfigurationOptions Options builder
     */
    public static function create(string $friendlyName = Values::NONE, bool $autoCreationEnabled = Values::NONE, string $autoCreationType = Values::NONE, string $autoCreationConversationServiceSid = Values::NONE, string $autoCreationWebhookUrl = Values::NONE, string $autoCreationWebhookMethod = Values::NONE, array $autoCreationWebhookFilters = Values::ARRAY_NONE, string $autoCreationStudioFlowSid = Values::NONE, int $autoCreationStudioRetryCount = Values::NONE): CreateAddressConfigurationOptions {
        return new CreateAddressConfigurationOptions($friendlyName, $autoCreationEnabled, $autoCreationType, $autoCreationConversationServiceSid, $autoCreationWebhookUrl, $autoCreationWebhookMethod, $autoCreationWebhookFilters, $autoCreationStudioFlowSid, $autoCreationStudioRetryCount);
    }

    /**
     * @param string $friendlyName The human-readable name of this configuration.
     * @param bool $autoCreationEnabled Enable/Disable auto-creating conversations
     *                                  for messages to this address
     * @param string $autoCreationType Type of Auto Creation.
     * @param string $autoCreationConversationServiceSid Conversation Service for
     *                                                   the auto-created
     *                                                   conversation.
     * @param string $autoCreationWebhookUrl For type `webhook`, the url for the
     *                                       webhook request.
     * @param string $autoCreationWebhookMethod For type `webhook`, the HTTP method
     *                                          to be used when sending a webhook
     *                                          request.
     * @param string[] $autoCreationWebhookFilters The list of events, firing
     *                                             webhook event for this
     *                                             Conversation.
     * @param string $autoCreationStudioFlowSid For type `studio`, the studio flow
     *                                          SID where the webhook should be
     *                                          sent to.
     * @param int $autoCreationStudioRetryCount For type `studio`, number of times
     *                                          to retry the webhook request
     * @return UpdateAddressConfigurationOptions Options builder
     */
    public static function update(string $friendlyName = Values::NONE, bool $autoCreationEnabled = Values::NONE, string $autoCreationType = Values::NONE, string $autoCreationConversationServiceSid = Values::NONE, string $autoCreationWebhookUrl = Values::NONE, string $autoCreationWebhookMethod = Values::NONE, array $autoCreationWebhookFilters = Values::ARRAY_NONE, string $autoCreationStudioFlowSid = Values::NONE, int $autoCreationStudioRetryCount = Values::NONE): UpdateAddressConfigurationOptions {
        return new UpdateAddressConfigurationOptions($friendlyName, $autoCreationEnabled, $autoCreationType, $autoCreationConversationServiceSid, $autoCreationWebhookUrl, $autoCreationWebhookMethod, $autoCreationWebhookFilters, $autoCreationStudioFlowSid, $autoCreationStudioRetryCount);
    }
}

class CreateAddressConfigurationOptions extends Options {
    /**
     * @param string $friendlyName The human-readable name of this configuration.
     * @param bool $autoCreationEnabled Enable/Disable auto-creating conversations
     *                                  for messages to this address
     * @param string $autoCreationType Type of Auto Creation.
     * @param string $autoCreationConversationServiceSid Conversation Service for
     *                                                   the auto-created
     *                                                   conversation.
     * @param string $autoCreationWebhookUrl For type `webhook`, the url for the
     *                                       webhook request.
     * @param string $autoCreationWebhookMethod For type `webhook`, the HTTP method
     *                                          to be used when sending a webhook
     *                                          request.
     * @param string[] $autoCreationWebhookFilters The list of events, firing
     *                                             webhook event for this
     *                                             Conversation.
     * @param string $autoCreationStudioFlowSid For type `studio`, the studio flow
     *                                          SID where the webhook should be
     *                                          sent to.
     * @param int $autoCreationStudioRetryCount For type `studio`, number of times
     *                                          to retry the webhook request
     */
    public function __construct(string $friendlyName = Values::NONE, bool $autoCreationEnabled = Values::NONE, string $autoCreationType = Values::NONE, string $autoCreationConversationServiceSid = Values::NONE, string $autoCreationWebhookUrl = Values::NONE, string $autoCreationWebhookMethod = Values::NONE, array $autoCreationWebhookFilters = Values::ARRAY_NONE, string $autoCreationStudioFlowSid = Values::NONE, int $autoCreationStudioRetryCount = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['autoCreationEnabled'] = $autoCreationEnabled;
        $this->options['autoCreationType'] = $autoCreationType;
        $this->options['autoCreationConversationServiceSid'] = $autoCreationConversationServiceSid;
        $this->options['autoCreationWebhookUrl'] = $autoCreationWebhookUrl;
        $this->options['autoCreationWebhookMethod'] = $autoCreationWebhookMethod;
        $this->options['autoCreationWebhookFilters'] = $autoCreationWebhookFilters;
        $this->options['autoCreationStudioFlowSid'] = $autoCreationStudioFlowSid;
        $this->options['autoCreationStudioRetryCount'] = $autoCreationStudioRetryCount;
    }

    /**
     * The human-readable name of this configuration, limited to 256 characters. Optional.
     *
     * @param string $friendlyName The human-readable name of this configuration.
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName): self {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Enable/Disable auto-creating conversations for messages to this address
     *
     * @param bool $autoCreationEnabled Enable/Disable auto-creating conversations
     *                                  for messages to this address
     * @return $this Fluent Builder
     */
    public function setAutoCreationEnabled(bool $autoCreationEnabled): self {
        $this->options['autoCreationEnabled'] = $autoCreationEnabled;
        return $this;
    }

    /**
     * Type of Auto Creation. Value can be one of `webhook`, `studio` or `default`.
     *
     * @param string $autoCreationType Type of Auto Creation.
     * @return $this Fluent Builder
     */
    public function setAutoCreationType(string $autoCreationType): self {
        $this->options['autoCreationType'] = $autoCreationType;
        return $this;
    }

    /**
     * Conversation Service for the auto-created conversation. If not set, the conversation is created in the default service.
     *
     * @param string $autoCreationConversationServiceSid Conversation Service for
     *                                                   the auto-created
     *                                                   conversation.
     * @return $this Fluent Builder
     */
    public function setAutoCreationConversationServiceSid(string $autoCreationConversationServiceSid): self {
        $this->options['autoCreationConversationServiceSid'] = $autoCreationConversationServiceSid;
        return $this;
    }

    /**
     * For type `webhook`, the url for the webhook request.
     *
     * @param string $autoCreationWebhookUrl For type `webhook`, the url for the
     *                                       webhook request.
     * @return $this Fluent Builder
     */
    public function setAutoCreationWebhookUrl(string $autoCreationWebhookUrl): self {
        $this->options['autoCreationWebhookUrl'] = $autoCreationWebhookUrl;
        return $this;
    }

    /**
     * For type `webhook`, the HTTP method to be used when sending a webhook request.
     *
     * @param string $autoCreationWebhookMethod For type `webhook`, the HTTP method
     *                                          to be used when sending a webhook
     *                                          request.
     * @return $this Fluent Builder
     */
    public function setAutoCreationWebhookMethod(string $autoCreationWebhookMethod): self {
        $this->options['autoCreationWebhookMethod'] = $autoCreationWebhookMethod;
        return $this;
    }

    /**
     * The list of events, firing webhook event for this Conversation. Values can be any of the following: `onMessageAdded`, `onMessageUpdated`, `onMessageRemoved`, `onConversationUpdated`, `onConversationStateUpdated`, `onConversationRemoved`, `onParticipantAdded`, `onParticipantUpdated`, `onParticipantRemoved`, `onDeliveryUpdated`
     *
     * @param string[] $autoCreationWebhookFilters The list of events, firing
     *                                             webhook event for this
     *                                             Conversation.
     * @return $this Fluent Builder
     */
    public function setAutoCreationWebhookFilters(array $autoCreationWebhookFilters): self {
        $this->options['autoCreationWebhookFilters'] = $autoCreationWebhookFilters;
        return $this;
    }

    /**
     * For type `studio`, the studio flow SID where the webhook should be sent to.
     *
     * @param string $autoCreationStudioFlowSid For type `studio`, the studio flow
     *                                          SID where the webhook should be
     *                                          sent to.
     * @return $this Fluent Builder
     */
    public function setAutoCreationStudioFlowSid(string $autoCreationStudioFlowSid): self {
        $this->options['autoCreationStudioFlowSid'] = $autoCreationStudioFlowSid;
        return $this;
    }

    /**
     * For type `studio`, number of times to retry the webhook request
     *
     * @param int $autoCreationStudioRetryCount For type `studio`, number of times
     *                                          to retry the webhook request
     * @return $this Fluent Builder
     */
    public function setAutoCreationStudioRetryCount(int $autoCreationStudioRetryCount): self {
        $this->options['autoCreationStudioRetryCount'] = $autoCreationStudioRetryCount;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Conversations.V1.CreateAddressConfigurationOptions ' . $options . ']';
    }
}

class UpdateAddressConfigurationOptions extends Options {
    /**
     * @param string $friendlyName The human-readable name of this configuration.
     * @param bool $autoCreationEnabled Enable/Disable auto-creating conversations
     *                                  for messages to this address
     * @param string $autoCreationType Type of Auto Creation.
     * @param string $autoCreationConversationServiceSid Conversation Service for
     *                                                   the auto-created
     *                                                   conversation.
     * @param string $autoCreationWebhookUrl For type `webhook`, the url for the
     *                                       webhook request.
     * @param string $autoCreationWebhookMethod For type `webhook`, the HTTP method
     *                                          to be used when sending a webhook
     *                                          request.
     * @param string[] $autoCreationWebhookFilters The list of events, firing
     *                                             webhook event for this
     *                                             Conversation.
     * @param string $autoCreationStudioFlowSid For type `studio`, the studio flow
     *                                          SID where the webhook should be
     *                                          sent to.
     * @param int $autoCreationStudioRetryCount For type `studio`, number of times
     *                                          to retry the webhook request
     */
    public function __construct(string $friendlyName = Values::NONE, bool $autoCreationEnabled = Values::NONE, string $autoCreationType = Values::NONE, string $autoCreationConversationServiceSid = Values::NONE, string $autoCreationWebhookUrl = Values::NONE, string $autoCreationWebhookMethod = Values::NONE, array $autoCreationWebhookFilters = Values::ARRAY_NONE, string $autoCreationStudioFlowSid = Values::NONE, int $autoCreationStudioRetryCount = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
        $this->options['autoCreationEnabled'] = $autoCreationEnabled;
        $this->options['autoCreationType'] = $autoCreationType;
        $this->options['autoCreationConversationServiceSid'] = $autoCreationConversationServiceSid;
        $this->options['autoCreationWebhookUrl'] = $autoCreationWebhookUrl;
        $this->options['autoCreationWebhookMethod'] = $autoCreationWebhookMethod;
        $this->options['autoCreationWebhookFilters'] = $autoCreationWebhookFilters;
        $this->options['autoCreationStudioFlowSid'] = $autoCreationStudioFlowSid;
        $this->options['autoCreationStudioRetryCount'] = $autoCreationStudioRetryCount;
    }

    /**
     * The human-readable name of this configuration, limited to 256 characters. Optional.
     *
     * @param string $friendlyName The human-readable name of this configuration.
     * @return $this Fluent Builder
     */
    public function setFriendlyName(string $friendlyName): self {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Enable/Disable auto-creating conversations for messages to this address
     *
     * @param bool $autoCreationEnabled Enable/Disable auto-creating conversations
     *                                  for messages to this address
     * @return $this Fluent Builder
     */
    public function setAutoCreationEnabled(bool $autoCreationEnabled): self {
        $this->options['autoCreationEnabled'] = $autoCreationEnabled;
        return $this;
    }

    /**
     * Type of Auto Creation. Value can be one of `webhook`, `studio` or `default`.
     *
     * @param string $autoCreationType Type of Auto Creation.
     * @return $this Fluent Builder
     */
    public function setAutoCreationType(string $autoCreationType): self {
        $this->options['autoCreationType'] = $autoCreationType;
        return $this;
    }

    /**
     * Conversation Service for the auto-created conversation. If not set, the conversation is created in the default service.
     *
     * @param string $autoCreationConversationServiceSid Conversation Service for
     *                                                   the auto-created
     *                                                   conversation.
     * @return $this Fluent Builder
     */
    public function setAutoCreationConversationServiceSid(string $autoCreationConversationServiceSid): self {
        $this->options['autoCreationConversationServiceSid'] = $autoCreationConversationServiceSid;
        return $this;
    }

    /**
     * For type `webhook`, the url for the webhook request.
     *
     * @param string $autoCreationWebhookUrl For type `webhook`, the url for the
     *                                       webhook request.
     * @return $this Fluent Builder
     */
    public function setAutoCreationWebhookUrl(string $autoCreationWebhookUrl): self {
        $this->options['autoCreationWebhookUrl'] = $autoCreationWebhookUrl;
        return $this;
    }

    /**
     * For type `webhook`, the HTTP method to be used when sending a webhook request.
     *
     * @param string $autoCreationWebhookMethod For type `webhook`, the HTTP method
     *                                          to be used when sending a webhook
     *                                          request.
     * @return $this Fluent Builder
     */
    public function setAutoCreationWebhookMethod(string $autoCreationWebhookMethod): self {
        $this->options['autoCreationWebhookMethod'] = $autoCreationWebhookMethod;
        return $this;
    }

    /**
     * The list of events, firing webhook event for this Conversation. Values can be any of the following: `onMessageAdded`, `onMessageUpdated`, `onMessageRemoved`, `onConversationUpdated`, `onConversationStateUpdated`, `onConversationRemoved`, `onParticipantAdded`, `onParticipantUpdated`, `onParticipantRemoved`, `onDeliveryUpdated`
     *
     * @param string[] $autoCreationWebhookFilters The list of events, firing
     *                                             webhook event for this
     *                                             Conversation.
     * @return $this Fluent Builder
     */
    public function setAutoCreationWebhookFilters(array $autoCreationWebhookFilters): self {
        $this->options['autoCreationWebhookFilters'] = $autoCreationWebhookFilters;
        return $this;
    }

    /**
     * For type `studio`, the studio flow SID where the webhook should be sent to.
     *
     * @param string $autoCreationStudioFlowSid For type `studio`, the studio flow
     *                                          SID where the webhook should be
     *                                          sent to.
     * @return $this Fluent Builder
     */
    public function setAutoCreationStudioFlowSid(string $autoCreationStudioFlowSid): self {
        $this->options['autoCreationStudioFlowSid'] = $autoCreationStudioFlowSid;
        return $this;
    }

    /**
     * For type `studio`, number of times to retry the webhook request
     *
     * @param int $autoCreationStudioRetryCount For type `studio`, number of times
     *                                          to retry the webhook request
     * @return $this Fluent Builder
     */
    public function setAutoCreationStudioRetryCount(int $autoCreationStudioRetryCount): self {
        $this->options['autoCreationStudioRetryCount'] = $autoCreationStudioRetryCount;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Conversations.V1.UpdateAddressConfigurationOptions ' . $options . ']';
    }
}