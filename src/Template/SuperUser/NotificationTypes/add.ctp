<div class="notificationtypes form large-10 medium-9 columns content">
    <?= $this->Form->create($notificationtype) ?>
    <fieldset>
        <legend><?= __('Add Notification Type') ?></legend>
        <?php
            echo $this->Form->input('notification_type');
            echo $this->Form->input('notification_description');
            echo $this->Form->input('icon');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>