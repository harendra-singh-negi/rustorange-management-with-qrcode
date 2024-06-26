<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Insights\V1;

use Twilio\Options;
use Twilio\Values;

abstract class AnnotationOptions {
    /**
     * @param string $answeredBy The answered_by
     * @param string $connectivityIssue The connectivity_issue
     * @param string $qualityIssues The quality_issues
     * @param bool $spam The spam
     * @param int $callScore The call_score
     * @param string $comment The comment
     * @param string $incident The incident
     * @return UpdateAnnotationOptions Options builder
     */
    public static function update(string $answeredBy = Values::NONE, string $connectivityIssue = Values::NONE, string $qualityIssues = Values::NONE, bool $spam = Values::NONE, int $callScore = Values::NONE, string $comment = Values::NONE, string $incident = Values::NONE): UpdateAnnotationOptions {
        return new UpdateAnnotationOptions($answeredBy, $connectivityIssue, $qualityIssues, $spam, $callScore, $comment, $incident);
    }
}

class UpdateAnnotationOptions extends Options {
    /**
     * @param string $answeredBy The answered_by
     * @param string $connectivityIssue The connectivity_issue
     * @param string $qualityIssues The quality_issues
     * @param bool $spam The spam
     * @param int $callScore The call_score
     * @param string $comment The comment
     * @param string $incident The incident
     */
    public function __construct(string $answeredBy = Values::NONE, string $connectivityIssue = Values::NONE, string $qualityIssues = Values::NONE, bool $spam = Values::NONE, int $callScore = Values::NONE, string $comment = Values::NONE, string $incident = Values::NONE) {
        $this->options['answeredBy'] = $answeredBy;
        $this->options['connectivityIssue'] = $connectivityIssue;
        $this->options['qualityIssues'] = $qualityIssues;
        $this->options['spam'] = $spam;
        $this->options['callScore'] = $callScore;
        $this->options['comment'] = $comment;
        $this->options['incident'] = $incident;
    }

    /**
     * The answered_by
     *
     * @param string $answeredBy The answered_by
     * @return $this Fluent Builder
     */
    public function setAnsweredBy(string $answeredBy): self {
        $this->options['answeredBy'] = $answeredBy;
        return $this;
    }

    /**
     * The connectivity_issue
     *
     * @param string $connectivityIssue The connectivity_issue
     * @return $this Fluent Builder
     */
    public function setConnectivityIssue(string $connectivityIssue): self {
        $this->options['connectivityIssue'] = $connectivityIssue;
        return $this;
    }

    /**
     * The quality_issues
     *
     * @param string $qualityIssues The quality_issues
     * @return $this Fluent Builder
     */
    public function setQualityIssues(string $qualityIssues): self {
        $this->options['qualityIssues'] = $qualityIssues;
        return $this;
    }

    /**
     * The spam
     *
     * @param bool $spam The spam
     * @return $this Fluent Builder
     */
    public function setSpam(bool $spam): self {
        $this->options['spam'] = $spam;
        return $this;
    }

    /**
     * The call_score
     *
     * @param int $callScore The call_score
     * @return $this Fluent Builder
     */
    public function setCallScore(int $callScore): self {
        $this->options['callScore'] = $callScore;
        return $this;
    }

    /**
     * The comment
     *
     * @param string $comment The comment
     * @return $this Fluent Builder
     */
    public function setComment(string $comment): self {
        $this->options['comment'] = $comment;
        return $this;
    }

    /**
     * The incident
     *
     * @param string $incident The incident
     * @return $this Fluent Builder
     */
    public function setIncident(string $incident): self {
        $this->options['incident'] = $incident;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Insights.V1.UpdateAnnotationOptions ' . $options . ']';
    }
}