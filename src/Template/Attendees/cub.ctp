<div class="row">
    <div class="col-lg-12">
        <?= $this->Form->create($attendee) ?>
        <fieldset>
            <legend><i class="fal fa-poll-people fa-fw"></i><?= __(' Add a New Young Person') ?></legend>
            <?php
                echo $this->Form->input('section_id');
                echo $this->Form->input('role_id');
                echo $this->Form->input('firstname');
                echo $this->Form->input('lastname');
                echo $this->Form->input('dateofbirth', ['label' => 'Date of Birth', 'type' => 'date', 'maxYear' => (date('Y')-3), 'minYear' => (date('Y')-18)]);
                echo $this->Form->input('phone', ['label' =>'Emergency Contact Number']);
                echo $this->Form->input('vegetarian');
                echo $this->Form->input('applications._ids', ['options' => $applications, 'multiple' => 'checkbox']);
                echo $this->Form->input('allergies._ids', ['options' => $allergies, 'multiple' => 'checkbox']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'),['class' => 'btn-success']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
