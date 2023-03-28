<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<style>
div#table-data {
    padding: 0;
    box-shadow: none;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-right: 10px;
    padding-left: 10px;
}
</style>


<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/641bf9b64247f20fefe7807b/1gs6kesuv';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->


<div class="users index content" id="table-data">
    
    <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Users') ?></h3>
    <?= $this->Form->create(null,['type'=>'GET','id'=>'form']) ?>
    <?= $this->Form->control('key',['label'=>'Search','id'=>'search','value'=>$this->request->getQuery()]) ?>
    <input type="submit">
    <?= $this->Form->end() ?>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('username') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('role') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('Change Status') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <?php if($user->deleted == 1): ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td><?= h($user->username) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->role) ?></td>
                    <td><?= h($user->created_at) ?></td>
                    <td>
                        <?php if($user->status == 1): ?>
                            <?= $this->Form->postLink(__('Active'), ['action' => 'userStatus', $user->id,$user->status], ['class'=>'alert alert-success','confirm' => __('Are you sure you want to inactive ?', $user->id)]) ?>

                            <?php else: ?>    
                            <?= $this->Form->postLink(__('Inactive'), ['action' => 'userStatus', $user->id,$user->status], ['class'=>'alert alert-danger' ,'confirm' => __('Are you sure you want to active ?', $user->id)]) ?>
                        <?php endif; ?>    
                    </td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                    </td>
                </tr>
                <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- <script>
    var csrfToken = $('meta[name="csrfToken"]').attr('content');
$.ajaxSetup({
   headers: {
       'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
    }
});
$('#search').on('keyup',function(){
    var key = $(this).val();

    $.ajax({
        url : "/users/index",
        type : "GET",
        data : $('#form').serialize(),
        success : function(data){
            $('#table-data').html(data);
        }
    })
})
</script> -->