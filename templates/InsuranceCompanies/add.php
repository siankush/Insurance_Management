


<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php echo $this->element('sidebar1') ?>
<style>
    .users.form.content {
    background: #214162;
    color: black;
    width: 1000px;
    padding: 40px;
    border: 11px solid #ff5722;
    margin-top: -85px;
}
legend {
    color: white;
    font-size: 30px;
    font-weight: 700;
}
label{
    color:white;
}

.formdesign {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

.submit {
  width: 100%;
  background-color: #ff5722;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.submit:hover {
  background-color: #000;
}
input#status, input#deleted {
    display: none;
}
/* 
div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
} */
</style>
<div class="container-fluid">

<div class="row">

    <div class="column-responsive column-80">
        <div class="users form content">
        <?= $this->Form->create($insuranceCompany) ?>
            <fieldset>
                <legend><?= __('Add Insurance Company') ?></legend>
                <?php
                    echo $this->Form->control('name',['class'=>'formdesign']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['class'=>'submit']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
</div>

