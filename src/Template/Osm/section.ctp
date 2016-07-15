<?= $this->assign('title', 'OSM Integration'); ?>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <h1 class="page-header"><i class="fa fa-paw fa-fw"></i> Select Your OSM Section</h1>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <?= $this->Form->create($sectionForm); ?>
        <fieldset>
            <?php
                echo $this->Form->select('osm_section', $hsec, ['label' => 'Online Scout Manager Section']);
            ?>
        </fieldset>
        </br>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>