<!--section-start::COMMENT_CAPTCHA-->    <tr>
      <td>
        <img src="{..captcha_url..}" alt="CAPTCHA">
      </td>
      <td>
        <input class="small input input_highlight" name="spam" size="30" maxlength="10">
        <span class="small">Bitte die Rechenaufgabe l&ouml;sen!</span>
        <a class="small" href="#captcha_note">(Hinweis)</a>
      </td>
    </tr><!--section-end::COMMENT_CAPTCHA-->

<!--section-start::COMMENT_CAPTCHA_TEXT-->    <tr>
      <td></td>
      <td>
        <p class="small" id="captcha_note">
          <b>Hinweis:</b> Die Rechenaufgabe verhindert, dass Spam-Bots auf dieser Seite Werbung als Kommentar einstellen k&ouml;nnen. Um die Abfrage zu umgehen, kannst du dich <a href="?go=register">registrieren</a>.
        </p>
      </td>
    </tr>
<!--section-end::COMMENT_CAPTCHA_TEXT-->

<!--section-start::COMMENT_FORM_NAME--><input class="small input input_highlight" id="comment_name" name="name" size="30" maxlength="100">
<span class="small">Jetzt</span>
<a class="small" href="?go=login">anmelden?</a><!--section-end::COMMENT_FORM_NAME-->

<!--section-start::COMMENT_FORM--><p>
  <b>{..feedback_title..}</b>
</p>

<form action="" method="post" onSubmit="return checkCommentForm()">
  <input type="hidden" name="go" value="feedback">
  <input type="hidden" name="add_note" value="1">
  <input type="hidden" name="content_id" value="{..content_id..}">
  <input type="hidden" name="content_type" value="{..content_type..}">

  <table style="margin-left:-2px; width:100%;" cellpadding="2" cellspacing="0">
    <tr>
      <td>
        <b>Name: </b>
      </td>
      <td>
        {..name_input..}
      </td>
    </tr>
    <tr>
      <td>
        <b>Titel:</b>
      </td>
      <td>
        <input class="small input input_highlight" id="comment_title" name="title" size="30" maxlength="100">
      </td>
    </tr>
    <tr>
      <td valign="top">
        <b>Text:</b>
        <p class="small">
          Html&nbsp;ist&nbsp;<b>{..html..}</b>.<br>
          <a href="?go=fscode">FScode</a>&nbsp;ist&nbsp;<b>{..fs_code..}.</b>
        </p>
      </td>
      <td>
        {..textarea..}
      </td>
    </tr>
    {..captcha..}
    <tr>
      <td></td>
      <td>
        <input class="pointer" type="submit" value="Abschicken">
      </td>
    </tr>
    {..captcha_text..}
  </table>
</form>
<!--section-end::COMMENT_FORM-->

<!--section-start::COMMENT_BODY-->{..comments..}
{..comment_form..}
<!--section-end::COMMENT_BODY-->
