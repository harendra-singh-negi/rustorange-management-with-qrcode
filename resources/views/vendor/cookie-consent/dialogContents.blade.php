<div class="js-cookie-consent cookie-consent">

    <div class="container">
      <div class="cookie-container">
        <span class="cookie-consent__message">
          {!! nl2br(replaceBaseUrl(convertUtf8($userBe->cookie_alert_text))) !!}
        </span>

        <button class="js-cookie-consent-agree cookie-consent__agree">
            {{ $userBe->cookie_alert_button_text }}
        </button>
      </div>
    </div>

</div>
