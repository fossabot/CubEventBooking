<div class="row">
    <div class="col-lg-12">
        <h3><i class="fa fa-user fa-fw"></i> All Users</h3>

<h1>Logs</h1>
    <ul class="list-inline">
        <a href="<?php echo $this->Url->build([
            'controller' => 'Logs',
            'action' => 'index',
            'prefix' => 'super_user'
        ]); ?> ">
            <li class="btn btn-default btn-sm"> ALL </li>
        </a>
        <li></li>
        <?php
        foreach ($types as $type) {
            echo '<a href="' . $this->Url->build([
                    'controller' => 'Logs',
                    'action' => 'index',
                    'prefix' => 'super_user',
                    '?' => ['type' => $type]
                ])
                . '">';

            $typeStyle = $type;

            if ($type == 'error') {
                $typeStyle = 'danger';
            }
            if ($type == 'notice') {
                $typeStyle = 'warning';
            }

            echo '<li class="btn btn-default btn-'. $typeStyle . ' btn-sm">';

            echo ' ' . strtoupper($type) . ' ';

            echo '</li></a>';

            echo '<li> </li>';
        }
        ?>
</ul>

<?php echo $this->element('DatabaseLog.admin_filter'); ?>

	<table class="table list">
		<tr>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
            <th><?php echo $this->Paginator->sort('count');?></th>
			<th><?php echo $this->Paginator->sort('message');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
		</tr>
		<?php
		foreach ($logs as $log):
			$message = $log['message'];
			$pos = strpos($message, 'Stack Trace:');
			if ($pos) {
				$message = trim(substr($message, 0, $pos));
			}
			$pos = strpos($message, 'Trace:');
			if ($pos) {
				$message = trim(substr($message, 0, $pos));
			}
			?>
			<tr>
				<td><?php echo $this->Time->nice($log['created']); ?>&nbsp;</td>
				<td><?php echo $this->Log->typeLabel($log['type']); ?>&nbsp;</td>
				<td><?php echo h($log['count']); ?>x</td>
				<td><?php echo nl2br($this->Text->truncate($message,100)); ?>&nbsp;</td>
				<td class="actions">
                    <?= $this->Html->link('', ['action' => 'view', $log->id], ['title' => __('View'), 'class' => 'btn btn-default fa fa-eye']) ?>
                    <?= $this->Form->postLink('', ['action' => 'delete', $log->id], ['confirm' => __('Are you sure you want to delete # {0}?', $log->id), 'title' => __('Delete'), 'class' => 'btn btn-default fa fa-trash-o']) ?>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php echo $this->element('DatabaseLog.paging'); ?>

</div>
</div>