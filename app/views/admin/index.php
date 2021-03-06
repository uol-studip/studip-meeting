<form method="post" action="<?= PluginEngine::getLink($plugin, array(), 'admin/save') ?>" class="studip_form <?= StudipVersion::newerThan('3.5') ? 'default' : '' ?>">
<? foreach ($drivers as $name => $driver) : ?>
    <fieldset>
        <legend><?= $driver['title'] ?></legend>

        <input type="hidden" name="driver" value="<?= $name ?>">

        <label class="caption">
            <input type="checkbox" name="config[<?= $name ?>][enable]" value="1" <?= $driver['config']['enable']->getValue() ? 'checked="checked"' : '' ?>>
            <?= $_('Verwenden dieses Treibers zulassen') ?>
        </label>

        <? foreach ($driver['config'] as $option) : ?>
            <? if ($option->getName() != enable) : ?>
            <label class="caption">
                <?= $option->getDisplayName() ?>
                <input type="text" name="config[<?= $name ?>][<?= $option->getName() ?>]" value="<?= $option->getValue() ?>">
            </label>
            <? endif ?>
        <? endforeach ?>

    </fieldset>
<? endforeach ?>

    <div class="button-group">
        <?= \Studip\Button::createAccept($_('Speichern')) ?>
    </div>

</form>
