<<<<<<< HEAD
<div class="row">
    <div class="col-lg-10 col-md-10">
        <h1 class="page-header"><i class="fa fa-bell-o fa-fw"></i> View Notification</h1>
    </div>
    <div class="col-lg-2 col-md-2">
        </br>
        <div class="pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-primary dropdown-toggle" data-toggle="dropdown">
                    Actions
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li><?= $this->Form->postLink(__('Delete'), ['controller' => 'Notifications', 'prefix' => false, 'action' => 'delete', $notification->id], ['confirm' => __('Are you sure you want to delete # {0}?', $notification->id)]) ?></li>
                </ul>
            </div>
        </div>
        </br>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-key fa-fw"></i> Notification Details
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <h3><?= h($notification->notification_header) ?></h3>
                </br>
                <p><?= h($notification->text) ?></p>
            </div>
            <div class="panel-footer">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th><?= __('User') ?></th>
                            <td><?= $notification->has('user') ? $this->Html->link($notification->user->full_name, ['controller' => 'Users', 'action' => 'view', $notification->user->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Notificationtype') ?></th>
                            <td><?= $notification->has('notificationtype') ? $this->Html->link($notification->notificationtype->notification_type, ['controller' => 'Notificationtypes', 'action' => 'view', $notification->notificationtype->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Notification Source') ?></th>
                            <td><?= h($notification->notification_source) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Unique Notification Id') ?></th>
                            <td><?= $this->Number->format($notification->id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Date Created') ?></th>
                            <td><?= h($notification->created) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Read Date') ?></th>
                            <td><?= h($notification->read_date) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-link fa-fw"></i> Notification Subject
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <th><?= $this->Html->link('View Notification Subject', ['controller' => $notification->link_controller, 'action' => $notification->link_action, $notification->link_id]) ?></th>
            </div>
        </div>
    </div>
</div>
        

=======
<nav class="actions large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <h3 class="heading"><?= __('Actions') ?></h3>
        <li><?= $this->Html->link(__('All Your Notifications'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Your Unread Notifications'), ['action' => 'unread']) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Notification'), ['action' => 'delete', $notification->id], ['confirm' => __('Are you sure you want to delete notification # {0}?', $notification->id)]) ?></li>
    </ul>

    <?= $this->start('Sidebar');
    echo $this->element('Sidebar/user');
    $this->end(); ?>
    
    <?= $this->fetch('Sidebar') ?>
    
</nav>
<div class="notifications view large-10 medium-9 columns content">
    <h3><?= h($notification->notification_header) ?></h3>
    </br>
    <table class="vertical-table">
        <!-- <tr>
            <td><?= h($notification->text) ?></td>
        </tr> -->
        <tr>
            <th><?= $this->Html->link('View Notification Subject', ['controller' => $notification->link_controller, 'action' => $notification->link_action, 'prefix' => false, $notification->link_id]) ?></th>
        </tr>
    </table>
    <p><?= h($notification->text) ?></p>
    
    </br>
    <!-- </br> -->
    <table class="vertical-table">
        <tr>
            <th><?= __('Notification Source') ?></th>
            <td><?= h($notification->notification_source) ?></td>
        </tr>
        <tr>
            <th><?= __('Unique Notification Id') ?></th>
            <td><?= $this->Number->format($notification->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Created') ?></th>
            <td><?= h($notification->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Read Date') ?></th>
            <td><?= h($notification->read_date) ?></td>
        </tr>
    </table>
</div>
>>>>>>> master
