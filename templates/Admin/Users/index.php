
<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\InsurancesCompany> $insurancesCompany
 */
?>
<style>
#sidebar {
    min-width: 280px;
    max-width: 280px;
    background-color: #15283c;
    color: #fff;
    transition: all 0.3s;
    position: relative;
    z-index: 11;
    box-shadow: 0 0 3px 0px rgba(0, 0, 0, 0.4);
    float: left;
    width: 100%;
    background-image: url('images/layout_img/pattern_h.png');
    position: fixed;
    height: 100%;
    overflow: auto;
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
p {
    color: #58718a;
    font-size: 14px;
    line-height: 21px;
}
#sidebar ul li a {
    padding: 15px 25px;
    display: block;
    font-size: 14px;
    color: rgba(255, 255, 255, 0.9);
    font-weight: 300;
}
.edit-user {
  width: 100%;
  background-color: #ff5722;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
button#useradd {
    float: right;
    margin-top: -107px;
    padding: 6px;
    border-radius: 20px;
    width: 133px;
    background: #ff5722;
    color: white;
    border: 2px solid #0067ff;
    font-size: 18px;
    font-weight: 800;
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
<body class="dashboard dashboard_1">
<div class='container-fluid'>
    <?php echo $this->Flash->render(); ?>
</div>
      <div class="full_container" id='change-status'>
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section">
                        <a href="index.html"><?php echo $this->Html->image('logo/logo_icon.png',['class'=>'logo_icon img-responsive']) ?></a>
                     </div>
                  </div>
                  
                  <div class="sidebar_user_info">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><?php echo $this->Html->image('layout_img/user_img.jpg',['class'=>'img-responsive']) ?></div>
                        <div class="user_info">
                           <h6 style="text-transform: capitalize;"><?php echo $user->first_name; ?></h6>
                           <p><span class="online_animation"></span> Online</p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2">
                  <h4>General</h4>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="/admin/users/admin" ><i class="fa fa-dashboard yellow_color"></i> <span>Dashboard</span></a>
                        
                     </li>
                     <li><a href="/insurance-companies/index"><i class="fa fa-clock-o orange_color"></i> <span>Insurance Companies</span></a></li>
                    
                     <li><a href="/insurance-policies/index"><i class="fa fa-table purple_color2"></i> <span>Insurance Policy</span></a></li>
                   
                     <li><a href="/admin/users/"><i class="fa fa-briefcase blue1_color"></i> <span>Users</span></a></li>
                   
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="index.html"><?php echo $this->Html->image('logo/logo.png') ?></a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                              <ul>
                                 <li><a href="#"><i class="fa fa-bell-o"></i><span class="badge">2</span></a></li>
                                 <li><a href="#"><i class="fa fa-question-circle"></i></a></li>
                                 <li><a href="#"><i class="fa fa-envelope-o"></i><span class="badge">3</span></a></li>
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown"><?php echo $this->Html->image('layout_img/user_img.jpg',['class'=>'img-responsive rounded-circle']) ?><span class="name_user">John David</span></a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="/admin/users/logout"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->

<div class="insurancesCompany index content" style="margin-top: 120px;">

<div class="container-fluid">
<h1 style="padding-bottom:70px; text-align:center;font-weight:800;font-size:35px;">USERS LISTINGS</h1>
        <table class="table table-hover" >

            <thead>
            <tr id="#tablerow_user">
            <th><?= $this->Paginator->sort('id') ?></th>
                    <th>FIRST NAME</th>
                    <th>LAST NAME</th>
                    <th>EMAIL</th>
                    <th>PHONE.NO</th>
                    <th>ADDRESS</th>
                    <th>STATUS</th>
                    <th>CREATED AT</th>
                    <th class="actions">ACTIONS</th>
            </tr>
            </thead>
            <tbody>
            <?php $n = $this->Paginator->counter('{{start}}') ?>

            <?php foreach ($users as $user): ?>
                <?php if($user->deleted==1): ?>
            <tr id="data<?php echo $user->id;?>" class="tabledata_user">
            <td><?= h($n); ?></td>
                    <td><?= h($user->first_name) ?></td>
                    <td><?= h($user->last_name) ?></td>
                    <td><?= h($user->email) ?></td>
                    <td><?= h($user->contact_number) ?></td>
                    <td><?= h($user->address) ?></td>
                    <td class="align-middle text-sm">
                          <!-- <?= h($contactlist->status); ?> -->
                          <?php  if($user->status == 1) : ?>
                            
                            <?= $this->Form->postLink(__('Active'),['action' => 'userstatus', $user->id, $user->status],['class'=>'badge badge-sm bg-gradient-success','confirm' => __('Are you sure you want to Inactive ?', $user->id)]) ?>
                            <?php else : ?>
                                
                                <?= $this->Form->postLink(__('Inactive'), ['action' => 'userstatus', $user->id, $user->status], ['class'=>'badge badge-sm bg-gradient-secondary','confirm' => __('Are you sure you want to Active ?', $user->id)]) ?>
                                <?php endif; ?> 
                         </td>                         <td><?= h($user->created_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__(''), ['action' => 'view', $user->id],['class'=>'fa-solid fa-eye']) ?>
                        <i class="fa-solid fa-pen-to-square get-userinfo " data-bs-toggle="modal" data-bs-target="#myModal" style="color: orange; font-size: 18px;" edituser-id ="<?= $user->id ?>"></i>
                        <i class="fa-solid fa-trash-can delete-user-info" style="color: red; font-size: 18px; cursor: pointer;" status-id ="<?= $user->deleted?>" deleteuser-id ="<?= $user->id?>"></i> 
                    </td>
                   
            </tr>
            <?php endif; ?>
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
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
       </div>

       <!-- Modal body -->
       <div class="modal-body">
        
   
   <div class="column-responsive column-80">
     <div class="insurancesCompany view content">
       <h1 style="padding-bottom:70px; text-align:center;font-weight:800;font-size:35px;color:white">INSURANCE USER EDIT</h1>

       <?= $this->Form->create($user,['id'=>'formid']) ?>
       <input type="hidden" id="userlisting_id" name="id">
       
           <fieldset>
               <legend><?= __('Edit User') ?></legend>
               <?php
                   echo $this->Form->control('first_name',['class'=>'policy','id'=>'first_name']);
                   echo $this->Form->control('last_name',['class'=>'policy','id'=>'last_name']);
                   echo $this->Form->control('email',['class'=>'policy','id'=>'email']);
                   echo $this->Form->control('contact_number',['class'=>'policy','id'=>'contact_number']);
                   echo $this->Form->control('address',['class'=>'policy', 'id'=> 'address']);
               ?>
           </fieldset>
           <?= $this->Form->button(__('Submit'),['class'=>'edit-user']) ?>
           <?= $this->Form->end() ?>
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