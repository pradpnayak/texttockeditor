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
 * Implements hook_civicrm_xmlMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_xmlMenu
 */
function texttockeditor_civicrm_xmlMenu(&$files) {
  _texttockeditor_civix_civicrm_xmlMenu($files);
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
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function texttockeditor_civicrm_postInstall() {
  _texttockeditor_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function texttockeditor_civicrm_uninstall() {
  _texttockeditor_civix_civicrm_uninstall();
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
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function texttockeditor_civicrm_disable() {
  _texttockeditor_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function texttockeditor_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _texttockeditor_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_managed
 */
function texttockeditor_civicrm_managed(&$entities) {
  _texttockeditor_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_caseTypes
 */
function texttockeditor_civicrm_caseTypes(&$caseTypes) {
  _texttockeditor_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules
 */
function texttockeditor_civicrm_angularModules(&$angularModules) {
  _texttockeditor_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_alterSettingsFolders
 */
function texttockeditor_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _texttockeditor_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function texttockeditor_civicrm_entityTypes(&$entityTypes) {
  _texttockeditor_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_themes().
 */
function texttockeditor_civicrm_themes(&$themes) {
  _texttockeditor_civix_civicrm_themes($themes);
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
