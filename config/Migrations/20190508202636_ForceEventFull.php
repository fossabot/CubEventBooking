<?php
use Migrations\AbstractMigration;

class ForceEventFull extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $this
            ->table('events')
            ->addColumn('force_full', 'boolean', [
                'null' => false,
                'default' => false,
            ])
            ->save();
    }
}
