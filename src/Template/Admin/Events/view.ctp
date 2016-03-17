<<<<<<< HEAD
<div class="row">
    <div class="col-lg-9 col-md-8">
        <h1 class="page-header"><i class="fa fa-calendar-o fa-fw"></i> <?= h($event->name) ?></h1>
    </div>
    <div class="col-lg-1 col-md-2">
        </br>
        <div class="pull-right">
            <div class="btn-group">
                <button type="button" class="btn btn-default btn-success dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-envelope-o fa-fw"></i>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="<?php echo $this->Url->build([
                        'controller' => 'Notifications',
                        'action' => 'welcome',
                        'prefix' => 'admin',
                        $user->id],['_full']); ?>">Send Welcome Email</a>
                    </li>
                    <li><a href="<?php echo $this->Url->build([
                        'controller' => 'Users',
                        'action' => 'reset',
                        'prefix' => 'admin'],['_full']); ?>">++ Trigger Password Reset</a>
                    </li>
                </ul>
            </div>
        </div>
        </br>
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
                    <li><a href="<?php echo $this->Url->build([
                        'controller' => 'Applications',
                        'action' => 'book',
                        'prefix' => false,
                        $event->id],['_full']); ?>">Book onto Event</a>
                    </li>
                </ul>
            </div>
        </div>
        </br>
    </div> 
</div>

<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-key fa-fw"></i> Key Event Information
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th><?= __('Full Name') ?></th>
                            <td><?= h($event->full_name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Location') ?></th>
                            <td><?= h($event->location) ?></td>
                        </tr>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th><?= __('Event Start') ?></th>
                            <th><?= __('Event End') ?></th>
                        </tr>
                        <tr>
                            <td><?= $this->Time->i18nFormat($event->start, 'dd-MMM-yy HH:mm') ?></td>
                            <td><?= $this->Time->i18nFormat($event->end, 'dd-MMM-yy HH:mm') ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-envelope-o fa-fw"></i> Event Organiser Contact
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th><?= __('Contact Person') ?></th>
                            <td><?= h($event->admin_full_name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Contact Email') ?></th>
                            <td><?= $this->Text->autoLink($event->admin_email) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Address') ?></th>
                            <td><?= h($event->address) ?> </br>
                                <?= h($event->city) ?> </br>
                                <?= h($event->county) ?> </br>
                                <?= h($event->postcode) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-body">
            <?= $this->Html->image($event->logo, ['alt' => $event->alt_text, 'height' => $logoHeight, 'width' => $logoWidth]); ?>
            </div>
            <div class="panel-footer">
                <p><?= h($event->intro_text) ?></p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-gbp fa-fw"></i> Prices
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <tr>
                            <th><?= __('Attendee Type'); ?></th>
                            <th><?= __('Booking Permited'); ?></th>
                            <th><?= __('Max Number'); ?></th>
                            <th><?= __('Price'); ?></th>
                            <th><?= __('Invoice Text'); ?></th>
                        </tr>
                        <tr>
                            <td><?= __('Cubs'); ?></td>
                            <td><?= $event->cubs ? __('Yes') : __('No'); ?></td>
                            <td><?php if (isset($event->max_cubs) && $event->max_cubs > 0) {
                                    $this->Number->format($event->max_cubs);
                                } else {
                                    echo 'Not Limited';
                                } ?></td>
                            <td><?= $this->Number->currency($event->cubs_value,'GBP') ?></td>
                            <td><?= h($event->cubs_text) ?></td>
                        </tr>
                        <tr>
                            <td><?= __('Young Leaders'); ?></td>
                            <td><?= $event->yls ? __('Yes') : __('No'); ?></td>
                            <td><?php if (isset($event->max_yls) && $event->max_yls > 0) {
                                    $this->Number->format($event->max_yls);
                                } else {
                                    echo 'Not Limited';
                                } ?></td>
                            <td><?= $this->Number->currency($event->yls_value,'GBP') ?></td>
                            <td><?= h($event->yls_text) ?></td>
                        </tr>
                        <tr>
                            <td><?= __('Leaders'); ?></td>
                            <td><?= $event->leaders ? __('Yes') : __('No'); ?></td>
                            <td><?php if (isset($event->max_leaders) && $event->max_leaders > 0) {
                                    $this->Number->format($event->max_leaders);
                                } else {
                                    echo 'Not Limited';
                                } ?></td>
                            <td><?= $this->Number->currency($event->leaders_value,'GBP') ?></td>
                            <td><?= h($event->leaders_text) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="panel-footer">
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th><?= __('Deposit Required') ?></th>
                            <th><?= __('Deposit Inc Leaders') ?></th>
                            <th><?= __('Deposit Date') ?></th>
                            <th><?= __('Deposit Value') ?></th>
                            <th><?= __('Deposit Invoice Text') ?></th>
                        </tr>
                        <tr>
                            <td><?= $event->deposit ? __('Yes') : __('No'); ?></td>
                            <td><?= $event->deposit_inc_leaders ? __('Yes') : __('No'); ?></td>
                            <td><?= $this->Time->i18nFormat($event->deposit_date, 'dd-MMM-yy HH:mm') ?></td>
                            <td><?= $this->Number->currency($event->deposit_value,'GBP') ?></td>
                            <td><?= h($event->deposit_text) ?></td>
                        </tr>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <tr>
                            <th><?= __('Discount Available') ?></th>
                            <th><?= __('Nature of Discount') ?></th>
                            <th><?= __('Discount Ratio') ?></th>
                            <th><?= __('Discount Value') ?></th>
                            <th><?= __('Deposit Invoice Text') ?></th>
                        </tr>
                        <tr>
                            <td><?= $event->has('discount') ? __('Yes') : __('No'); ?></td>
                            <td><?= $event->has('discount') ? $this->Html->link($event->discount->discount, ['controller' => 'Discounts', 'action' => 'view', $event->discount->id]) : 'None' ?></td>
                            <td><?= $event->has('discount') ? __('1 : ') . $this->Number->format($event->discount->discount_number) : '' ?></td>
                            <td><?= $event->has('discount') ? __('(') . $this->Number->currency($event->discount->discount_value,'GBP') . __(')') : '' ?></td>
                            <td><?= $event->has('discount') ? $this->Html->link($event->discount->text, ['controller' => 'Discounts', 'action' => 'view', $event->discount->id]) : '' ?>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


=======
<nav class="actions large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <h3 class="heading"><?= __('Actions') ?></h3>
        <li><?= $this->Html->link(__('View Complete'), ['action' => 'full_view', $event->id]) ?> </li>
        <li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
        <li><?= $this->Html->link(__('New Setting'), ['controller' => 'Settings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('New Discount'), ['controller' => 'Discounts', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Event Applications'), ['controller' => 'Applications', 'action' => 'bookings', $event->id]) ?></li>
        <li><?= $this->Html->link(__('New Application'), ['controller' => 'Applications', 'action' => 'book', $event->id]) ?></li>
    </ul>

    <?= $this->start('Sidebar');
    echo $this->element('Sidebar/admin');
    $this->end(); ?>
    
    <?= $this->fetch('Sidebar') ?>
</nav>

<div class="events view large-10 medium-9 columns content">
    <h3><?= h($event->name) ?></h3>
    <table class="goat">
        <tr>
            <th><?= __('Full Name') ?></th>
            <td><?= h($event->full_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Location') ?></th>
            <td><?= h($event->location) ?></td>
        </tr>
        <tr>
            <th><?= __('Tagline Text') ?></th>
            <td></td>
        </tr>
    </table>

    <table class="goat">
        <tr>
            <th><?= __('Contact Person') ?></th>
            <td><?= h($event->admin_full_name) ?></td>
            <td><?= $this->Text->autoLink($event->admin_email) ?></td>
        </tr>
    </table>

    <table class="goat">
        <tr>
            <th><?= __('Address') ?></th>
            <td><?= h($event->admin_full_name) ?></td>
            <th><?= __('Deposit Required') ?></th>
            <td><?= $event->deposit ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?= h($event->address) ?></td>
            <th><?= __('Deposit Date') ?></th>
            <td><?= $this->Time->i18nFormat($event->deposit_date, 'dd-MMM-yy HH:mm') ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?= h($event->city) ?></td>
            <th><?= __('Deposit Value') ?></th>
            <td><?= $this->Number->currency($event->deposit_value,'GBP') ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?= h($event->county) ?></td>
            <th><?= __('Deposit Invoice Text') ?></th>
            <td><?= h($event->deposit_text) ?></td>
        </tr>
        <tr>
            <th></th>
            <td><?= h($event->postcode) ?></td>
            <th><?= __('Deposit Inc Leaders') ?></th>
            <td><?= $event->deposit_inc_leaders ? __('Yes') : __('No'); ?></td>
        </tr>
        <tr>
            <th><?= __('Event Start') ?></th>
            <td><?= $this->Time->i18nFormat($event->start, 'dd-MMM-yy HH:mm') ?></td>
            <th><?= __('Date Created') ?></th>
            <td><?= $this->Time->i18nFormat($event->created, 'dd-MMM-yy HH:mm') ?></td>
        </tr>
        <tr>
            <th><?= __('Event End') ?></th>
            <td><?= $this->Time->i18nFormat($event->end, 'dd-MMM-yy HH:mm') ?></td>
            <th><?= __('Date Modified') ?></th>
            <td><?= $this->Time->i18nFormat($event->modified, 'dd-MMM-yy HH:mm') ?></td>
        </tr>
        <tr>
            <th><?= __('Discount') ?></th>
            <td><?= $event->has('discount') ? $this->Html->link($event->discount->text, ['controller' => 'Discounts', 'action' => 'view', $event->discount->id]) : 'None' ?></td>
            <td><?= $event->has('discount') ? __('(') . $this->Number->currency($event->discount->discount_value,'GBP') . __(')') : '' ?></td>
            <td><?= $event->has('discount') ? __('1 : ') . $this->Number->format($event->discount->discount_number) : '' ?></td>
        </tr>
    </table>

    <p><strong><?= h($event->tagline_text) ?></strong></p>

    <table class="goat">
        <tr>
            <th><?= $this->Html->image($event->logo, ['alt' => $event->alt_text, 'height' => $logoHeight, 'width' => $logoWidth]); ?></th>
            <td><p><?= h($event->intro_text) ?></p></td>
        </tr>
    </table>
    <table class="goat">
        <tr>
            <th><?= __('Attendee Type'); ?></th>
            <th><?= __('Booking Permited'); ?></th>
            <th><?= __('Max Number'); ?></th>
            <th><?= __('Price'); ?></th>
            <th><?= __('Invoice Text'); ?></th>
        </tr>
        <tr>
            <td><?= __('Cubs'); ?></td>
            <td><?= $event->cubs ? __('Yes') : __('No'); ?></td>
            <td><?= $this->Number->format($event->max_cubs) ?></td>
            <td><?= $this->Number->currency($event->cubs_value,'GBP') ?></td>
            <td><?= h($event->cubs_text) ?></td>
        </tr>
        <tr>
            <td><?= __('Young Leaders'); ?></td>
            <td><?= $event->yls ? __('Yes') : __('No'); ?></td>
            <td><?= $this->Number->format($event->max_yls) ?></td>
            <td><?= $this->Number->currency($event->yls_value,'GBP') ?></td>
            <td><?= h($event->yls_text) ?></td>
        </tr>
        <tr>
            <td><?= __('Leaders'); ?></td>
            <td><?= $event->leaders ? __('Yes') : __('No'); ?></td>
            <td><?= $this->Number->format($event->max_leaders) ?></td>
            <td><?= $this->Number->currency($event->leaders_value,'GBP') ?></td>
            <td><?= h($event->leaders_text) ?></td>
        </tr>
    </table>
</div>
>>>>>>> master
