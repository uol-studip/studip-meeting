<?php
/** @var MeetingPlugin $plugin */
/** @var ElanEv\Model\CourseConfig $courseConfig */
/** @var bool $configured */
/** @var bool $canModifyCourse */
?>

<?php if (!$configured): ?>
    <?= MessageBox::info(_('Es wurden noch keine Meetings eingerichtet.')) ?>

    <? if (!$vc_driver) : ?>
        <?= MessageBox::error(_('Bitte setzen Sie erst in der globalen Konfiguration einen Wert f�r VC_DRIVER!')) ?>
    <? else : ?>
        <? if ($GLOBALS['perm']->have_perm('root')) : ?>
            <?= $this->render_partial('config/' . $vc_driver) ?>
        <? endif; ?>
    <? endif; ?>
<?php else: ?>
    <?= $this->render_partial('index/_confirm_delete') ?>

    <?php if (trim(strip_tags($courseConfig->introduction))): ?>
        <div class="vc_introduction"><?= formatReady($courseConfig->introduction) ?></div>
    <?php endif ?>

    <div>
        <?= $this->render_partial('index/_meetings', array('title' => $courseConfig->title, 'canModifyMeetings' => $canModifyCourse, 'showUser' => $canModifyCourse, 'showCreateForm' => true)) ?>
    </div>
<?php endif ?>
