<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h2>Login</h2>
        <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create('user', ['class' => 'form-inline', 'action' => 'login']) ?>
        <?= $this->Form->input('username', ['class' => 'form-control']) ?>
        <?= $this->Form->input('password', ['class' => 'form-control']) ?>
        <?= $this->Form->button('Submit', ['class' => 'btn btn-primary btn-margin']) ?>
        <?= $this->Form->end() ?>
</div>