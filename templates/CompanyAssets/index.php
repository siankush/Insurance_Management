<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CompanyAsset> $companyAssets
 */
?>
<!-- <div class="companyAssets index content">
    <?= $this->Html->link(__('New Company Asset'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Company Assets') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('contact_listing_id') ?></th>
                    <th><?= $this->Paginator->sort('insurance_company_id') ?></th>
                    <th><?= $this->Paginator->sort('insurance_policy_id') ?></th>
                    <th><?= $this->Paginator->sort('premium') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('term_length') ?></th>
                    <th><?= $this->Paginator->sort('check status') ?></th>
                    <th><?= $this->Paginator->sort('deleted') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($companyAssets as $companyAsset): ?>
                <tr>
                    <td><?= $this->Number->format($companyAsset->id) ?></td>
                    <td><?= $companyAsset->has('user') ? $this->Html->link($companyAsset->user->id, ['controller' => 'Users', 'action' => 'view', $companyAsset->user->id]) : '' ?></td>
                    <td><?= $this->Number->format($companyAsset->contact_listing_id->name) ?></td>
                    <td><?= $companyAsset->has('contact_listing') ? ($companyAsset->contact_listing->name): ''?></td>
                    <td><?= $companyAsset->has('insurance_company') ? ($companyAsset->insurance_company->name) : '' ?></td>
                    <td><?= $companyAsset->has('insurance_policy') ? ($companyAsset->insurance_policy->name) : '' ?></td>
                    <td><?= $companyAsset->has('insurance_policy') ? ($companyAsset->insurance_policy->premium) : '' ?></td>
                    <td><?= $this->Html->image($companyAsset->insurance_policy->image) ?></td>
                    <td><?= h($companyAsset->term_length) ?></td>
                    <td><?= h($companyAsset->checkstatus) ?></td>
                    <td><?= h($companyAsset->deleted) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $companyAsset->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $companyAsset->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $companyAsset->id], ['confirm' => __('Are you sure you want to delete # {0}?', $companyAsset->id)]) ?>
                    </td>
                </tr>
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
</div> -->


<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\InsurancesCompany> $insurancesCompany
 */
?>
<?php echo $this->element('sidebar1') ?>
<style>
a.addcomp {
    float: right;
    /* margin-top: -92px; */
    padding: 7px;
    width: 176px;
    border-radius: 20px;
    border: 3px solid black;
    background: #ff5722;
    color: white;
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 25px;
}
.policy {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  color: black!important;
}
.edit-company{
  width: 100%;
  background-color: #ff5722;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.modal-body {
  -webkit-box-flex: 1;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  padding: 1rem;
    padding-top: 1rem;
  padding-top: 0px;
  margin-top: -167px;
}
</style>
<div class='container-fluid'>
    <?php echo $this->Flash->render(); ?>
</div>
<div class="insurancesCompany index content" style="margin-top: 120px;" id='change-status'>
    
<div class="container-fluid">
<h3>Total Policies : <span class="badge"><?php echo count($companyAssets); ?></span></h3>
    <h1 style="padding-bottom:70px; text-align:center;font-weight:800;font-size:35px;">POLICY UNAPPROVED LISTS</h1>
    <!-- <a href="/insurance-companies/add" class="addcomp">Add Company</a> -->
    <table class="table table-hover" >

            <thead>
            <tr id="#tablerow_user">
                    <th>ID</th>
                    <th>AGENT ID</th>
                    <th>USER NAME</th>
                    <th><?= $this->Paginator->sort('insurance_company_id') ?></th>
                    <th><?= $this->Paginator->sort('insurance_policy_id') ?></th>
                    <th><?= $this->Paginator->sort('premium') ?></th>
                    <th><?= $this->Paginator->sort('image') ?></th>
                    <th><?= $this->Paginator->sort('term_length') ?></th>

                    <th class="actions">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            <?php $n = $this->Paginator->counter('{{start}}') ?>

            <?php foreach ($companyAssets as $companyAsset): ?>

                    <tr class="tabledata_user">
                    <td><?= $this->Number->format($n) ?></td>
                    <td><?= $companyAsset->has('user_id') ? ($companyAsset->contact_listing->user_id): ''?></td>
                    <td><?= $companyAsset->has('contact_listing') ? ($companyAsset->contact_listing->name): ''?></td>
                    <td><?= $companyAsset->has('insurance_company') ? ($companyAsset->insurance_company->name) : '' ?></td>
                    <td><?= $companyAsset->has('insurance_policy') ? ($companyAsset->insurance_policy->name) : '' ?></td>
                    <td><?= $companyAsset->has('insurance_policy') ? ($companyAsset->insurance_policy->premium) : '' ?></td>
                    <td><?= $this->Html->image($companyAsset->insurance_policy->image,['width'=>'100px']) ?></td>
                    <td><?= h($companyAsset->term_length) ?></td>
                    <td>
                   <?php  if($companyAsset->checkstatus == 0) : ?>
                            
                            <?= $this->Form->postLink(__('Pending'),['action' => 'policystatus', $companyAsset->id, $companyAsset->checkstatus],['class'=>'badge badge-sm bg-gradient-success','confirm' => __('Are you sure you want to approve ?', $companyAsset->id)]) ?>
                            <?php else : ?>
                                
                                <?= $this->Form->postLink(__('Approve'), ['action' => 'policystatus', $companyAsset->id, $companyAsset->checkstatus],['class'=>'badge badge-sm bg-gradient-secondary','confirm' => __('Are you sure you want to pending ?', $companyAsset->id)]) ?>
                                <?php endif; ?> 
                    </td>

                </tr>
                <?php $n++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
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
                   
</div>

    

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div> 
<?= $this->Html->script('adminscript') ?>