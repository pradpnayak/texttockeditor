<?php

require_once 'texttockeditor.civix.php';
// phpcs:disable
use CRM_Texttockeditor_ExtensionUtil as E;
// phpcs:enable

/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function texttockeditor_civicrm_config(&$config) {
  _texttockeditor_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function texttockeditor_civicrm_install() {
  _texttockeditor_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function texttockeditor_civicrm_enable() {
  _texttockeditor_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_buildForm().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_buildForm
 *
 */
function texttockeditor_civicrm_buildForm($formName, $form) {
  $elementArray = [
    'CRM_Event_Form_ManageEvent_Registration' => ['confirm_email_text'],
    'CRM_Contribute_Form_ContributionPage_ThankYou' => ['receipt_text'],
    'CRM_Event_Form_ManageEvent_EventInfo' => ['summary', 'event_full_text'],
    'CRM_Member_Form_Membership' => ['receipt_text'],
    'CRM_Event_Form_Participant' => ['receipt_text'],
    'CRM_Campaign_Form_Campaign' => ['description'],
  ];

  if (!empty($elementArray[$formName])) {
    foreach ($elementArray[$formName] as $elementName) {
      if (!$form->elementExists($elementName)) {
        continue;
      }

      $element = & $form->getElement($elementName);
      $element->_attributes['class'] = 'collapsed crm-form-wysiwyg';
      $element->_attributes['data-preset'] = 'civievent';
    }
  }

}
