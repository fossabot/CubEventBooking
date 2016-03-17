<nav class="actions large-2 medium-3 columns" id="actions-sidebar">
    
    <?= $this->start('Sidebar');
    echo $this->element('Sidebar/admin_view');
    echo $this->element('Sidebar/admin');
    $this->end(); ?>
    
    <?= $this->fetch('Sidebar') ?>
    
</nav>
<div class="invoices view large-10 medium-9 columns content">
    <h3>Payment Invoice</h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $invoice->has('user') ? $this->Html->link($invoice->user->username, ['controller' => 'Users', 'action' => 'view', $invoice->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Invoice ID Number') ?></th>
            <td>Invoice #<?= $this->Number->format($invoice->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Initial Value') ?></th>
            <td><?= $this->Number->currency($invoice->initialvalue,'GBP') ?></td>
        </tr>
        <tr>
            <th><?= __('Payments Recieved') ?></th>
            <td><?= $this->Number->currency($invoice->value,'GBP') ?></td>
        </tr>
        <tr>
            <th><?= __('Balance') ?></th>
            <td><?= $this->Number->currency($invoice->balance,'GBP') ?></td>
        </tr>
        <tr>
            <th><?= __('Date Created') ?></th>
            <td><?= h($this->Time->i18nFormat($invoice->created,'dd-MMM-YYYY HH:mm')) ?></tr>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Invoice Line Items') ?></h4>
        <?php if (!empty($invoice->invoice_items)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Description') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Value') ?></th>
                <th><?= __('Sum Price') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($invoice->invoice_items as $invoiceItems): ?>
            <tr>
                <td><?= h($invoiceItems->Description) ?></td>
                <td><?= h($invoiceItems->Quantity) ?></td>
                <td><?= h($this->number->currency($invoiceItems->Value,'GBP')) ?></td>
                <td><?= h($this->number->currency($invoiceItems->quantity_price,'GBP')) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'InvoiceItems', 'action' => 'view', $invoiceItems->id]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
        <div class="warning">

            <p>Deposits for invoices should be made payable to <strong><?= h($setting) ?></strong> and sent to Hertfordshire Cubs 100th Birthday Camp, <strong>76 Monklands, Letchworth, SG6 4XG</strong> by 31-Dec-15. Please write <strong>Invoice #<?= $this->Number->format($invoice->id) ?></strong> on the back of the cheque.</p>

        </div>
    </div>
    <div class="related">
        <h4><?= __('Payments Recieved') ?></h4>
        <?php if (!empty($invoice->payments)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Value') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Paid') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($invoice->payments as $payments): ?>
            <tr>
                <td><?= h($payments->id) ?></td>
                <td><?= $this->Number->currency($payments->value,'GBP') ?></td>
                <td><?= $this->Time->i18nformat($payments->created,'dd-MMM-yy HH:mm') ?></td>
                <td><?= $this->Time->i18nformat($payments->paid,'dd-MMM-yy HH:mm') ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Payments', 'action' => 'view', $payments->id]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
