<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\AssignTask> $assignTasks
 */
?>
<div class="assignTasks index content">
    <?= $this->Html->link(__('New Assign Task'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3>
        <?= __('Assign Tasks') ?>
    </h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>
                        <?= $this->Paginator->sort('id') ?>
                    </th>
                    <!-- <th><?= $this->Paginator->sort('user_id') ?></th> -->
                    <th>
                        <?= $this->Paginator->sort('title') ?>
                    </th>
                    <th>
                        <?= $this->Paginator->sort('description') ?>
                    </th>
                    <!-- <th><?= $this->Paginator->sort('due_date') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('status') ?></th> -->
                    <!-- <th><?= $this->Paginator->sort('created_at') ?></th> -->
                    <th class="actions">
                        <?= __('Actions') ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($assignTasks as $assignTask): ?>
                    <tr>
                        <td>
                            <?= $this->Number->format($assignTask->id) ?>
                        </td>
                        <!-- <td><?= $assignTask->has('user') ? $this->Html->link($assignTask->user->id, ['controller' => 'Users', 'action' => 'view', $assignTask->user->id]) : '' ?></td> -->
                        <td>
                            <?= h($assignTask->title) ?>
                        </td>
                        <td>
                            <?= h($assignTask->description) ?>
                        </td>
                        <!-- <td><?= h($assignTask->due_date) ?></td> -->
                        <!-- <td><?= h($assignTask->status) ?></td> -->
                        <!-- <td><?= h($assignTask->created_at) ?></td> -->
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $assignTask->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $assignTask->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $assignTask->id], ['confirm' => __('Are you sure you want to delete # {0}?', $assignTask->id)]) ?>
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
        <p>
            <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
        </p>
    </div>
</div>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <?php foreach ($assignTasks as $assignTask): ?>
        <li class="nav-item">
            <a class="nav-link edit" edituser-id="<?= $assignTask->id ?>" id="<?= $assignTask['id'] ?>-tab"
                data-toggle="tab" href="#<?= $assignTask['id'] ?>" role="tab" aria-controls="<?= $assignTask['id'] ?>"
                aria-selected="true"><?= $assignTask['title'] ?>
            </a>

        </li>
    <?php endforeach; ?>
</ul>

<div class="tab-content" id="myTabContent">
    <?php foreach ($assignTasks as $assignTask): ?>
        <div class="tab-pane fade" id="<?= $assignTask['id'] ?>" role="tabpanel"
            aria-labelledby="<?= $assignTask['id'] ?>-tab">
            <div class="row">
                <aside class="column">
                    <div class="side-nav">
                        <h4 class="heading">
                            <?= __('Actions') ?>
                        </h4>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $assignTask->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $assignTask->id), 'class' => 'side-nav-item']
                        ) ?>
                        <?= $this->Html->link(__('List Assign Tasks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
                    </div>
                </aside>
                <div class="column-responsive column-80">
                    <div class="assignTasks form content">
                        <?= $this->Form->create($assignTask, ['id' => 'formid']) ?>

                        <fieldset>
                            <legend>
                                <?= __('Edit Assign Task') ?>
                            </legend>
                            <input type="text" id="assigntask_id" name="id">

                            <?php
                            echo $this->Form->control('user_id', ['options' => $users]);
                            echo $this->Form->control('title');
                            echo $this->Form->control('description');
                            echo $this->Form->control('due_date');
                            echo $this->Form->control('status');
                            echo $this->Form->control('created_at');
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Submit'), ['class' => 'edit-data', 'id' => 'submit']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>

        </div>
    <?php endforeach; ?>
</div>
<script>
    $(document).ready(function () {
        $('#myTab a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
    })
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).on("click", ".edit", function () {
        var csrfToken = $('meta[name="csrfToken"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
            }
        });

        var formData = $(this).attr("edituser-id");


        $.ajax({
            url: "http://localhost:8765/assign-tasks/getuser",
            method: "get",
            data: { 'id': formData },
            type: "JSON",
            success: function (response) {

                AssignTasks = $.parseJSON(response);

                $('#user-id').val(AssignTasks['user-id']);
                // $('#brand').val(car['brand']['name']);
                $('#title').val(AssignTasks['title']);
                $('#description').val(AssignTasks['description']);
                $('#status').val(AssignTasks['status']);
                $('#assigntask_id').val(AssignTasks['id']);

            }
        });
    });

    $(document).on("click", ".edit-data", function (e) {
        e.preventDefault();
        var csrfToken = $('meta[name="csrfToken"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken // this is defined in app.php as a js variable
            }
        });
        // var formData = new FormData(form);
        var formData = $("#formid").serialize();
        //   console.log(formData);

        //  alert(formData);
        $.ajax({

            url: "http://localhost:8765/assign-tasks/edituser",
            type: "JSON",
            method: "POST",
            data: formData,
            success: function (response) {

                var data = JSON.parse(response);
                // alert(data);

                if (data['status'] == 0) {
                    // alert(data['message']);
                } else {
                    swal("Good job!", "The contactlisting has been saved!", "success");

                }
                $('#myTab').load('/assign-tasks/index #myTab');
                // $('#myModal').hide();
                // $('.modal-backdrop').remove();

            }
        });
        // return false;



    });
</script>