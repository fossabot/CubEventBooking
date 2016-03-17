<<<<<<< HEAD
<nav class="actions large-2 medium-3 columns" id="actions-sidebar">
=======
<nav class="large-3 medium-4 columns" id="actions-sidebar">
>>>>>>> master
    
    <?= $this->start('Sidebar');
    echo $this->element('Sidebar/champion');
    $this->end(); ?>
    
    <?= $this->fetch('Sidebar') ?>
    
</nav>
<<<<<<< HEAD
<div class="invoiceItems view large-10 medium-9 columns content">
=======
<div class="invoiceItems view large-9 medium-8 columns content">
>>>>>>> master
    <h3><?= h($invoiceItem->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Invoice') ?></th>
            <td><?= $invoiceItem->has('invoice') ? $this->Html->link($invoiceItem->invoice->id, ['controller' => 'Invoices', 'action' => 'view', $invoiceItem->invoice->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($invoiceItem->Description) ?></td>
        </tr>
        <tr>
            <th><?= __('Itemtype') ?></th>
            <td><?= $invoiceItem->has('itemtype') ? $this->Html->link($invoiceItem->itemtype->id, ['controller' => 'Itemtypes', 'action' => 'view', $invoiceItem->itemtype->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($invoiceItem->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Value') ?></th>
            <td><?= $this->Number->currency($invoiceItem->Value,GBP) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity') ?></th>
            <td><?= $this->Number->currency($invoiceItem->Quantity,GBP) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity Price') ?></th>
            <td><?= $this->Number->currency($invoiceItem->quantity_price,GBP) ?></td>
        </tr>
    </table>
</div>
