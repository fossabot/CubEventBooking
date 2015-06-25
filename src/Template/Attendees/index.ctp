<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Attendee'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applications'), ['controller' => 'Applications', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Allergies'), ['controller' => 'Allergies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Allergy'), ['controller' => 'Allergies', 'action' => 'add']) ?></li>
    </ul>
</div>
<div class="attendees index large-10 medium-9 columns">
    <table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('user_id') ?></th>
            <th><?= $this->Paginator->sort('scoutgroup_id') ?></th>
            <th><?= $this->Paginator->sort('role_id') ?></th>
            <th><?= $this->Paginator->sort('firstname') ?></th>
            <th><?= $this->Paginator->sort('lastname') ?></th>
            <th><?= $this->Paginator->sort('dateofbirth') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($attendees as $attendee): ?>
        <tr>
            <td><?= $this->Number->format($attendee->id) ?></td>
            <td>
                <?= $attendee->has('user') ? $this->Html->link($attendee->user->id, ['controller' => 'Users', 'action' => 'view', $attendee->user->id]) : '' ?>
            </td>
            <td><?= $this->Number->format($attendee->scoutgroup_id) ?></td>
            <td><?= $this->Number->format($attendee->role_id) ?></td>
            <td><?= h($attendee->firstname) ?></td>
            <td><?= h($attendee->lastname) ?></td>
            <td><?= h($attendee->dateofbirth) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $attendee->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $attendee->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $attendee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $attendee->id)]) ?>
            </td>
        </tr>

    <?php endforeach; ?>
    </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
