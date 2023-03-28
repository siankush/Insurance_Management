<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AssignTask $assignTask
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<style>
    .tox .tox-promotion-link {
    align-items: unsafe center;
    background-color: #e8f1f8;
    border-radius: 5px;
    color: #086be6;
    cursor: pointer;
    display: flex;
    font-size: 14px;
    height: 26.6px;
    display: none !important;
    padding: 4px 8px;
    white-space: nowrap;
}
.tox .tox-statusbar__branding svg {
    fill: rgba(34,47,62,.8);
    height: 1.14em;
    vertical-align: -0.28em;
    width: 3.6em;
    display: none !important;
}
</style>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Assign Tasks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="assignTasks form content">
            <?= $this->Form->create($assignTask) ?>
            <fieldset>
                <legend><?= __('Add Assign Task') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('title');
                    echo $this->Form->control('description',['name'=>'description']);
                    echo $this->Form->control('due_date');
                    // echo $this->Form->control('status');
                    // echo $this->Form->control('created_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


<!-- tinymce cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.4.0/tinymce.min.js" integrity="sha512-nv2Ftve23IDZqQhji5P2w17Ch88OR37z6tV6djv8U6hcjpRjDXRypN6sXkN6UQo8S+/qf67LVh1a3COduJIG3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    tinymce.init({
    selector: '#description'
});
</script>