<div class="payments form large-10 medium-10 columns content">
    <?= $this->Form->create($payment) ?>
    <fieldset>
        <legend><?= __('Edit Payment') ?></legend>
        <?php
            echo $this->Form->input('value');
            echo $this->Form->input('paid');
            echo $this->Form->input('cheque_number');
            echo $this->Form->input('name_on_cheque');
            echo $this->Form->input('payment_notes');
            echo $this->Form->input('invoices._ids', ['options' => $invoices, /*'multiple' => false, 'type' => 'select',*/ 'label' => 'Invoice Associated']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>