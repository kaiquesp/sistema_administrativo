<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Alteração de informações do usuário</h3>
    </div>
  </div>
  <div class="clearfix"></div>

  <div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_content">
          <?php if(isset($msg)){
            echo "<div class='box-header with-border'>".$msg."</div>";
          } 
          ?>
          <form role="form" action="atualizausuario" method="POST" class="form-horizontal form-label-left">
          </p>

          <?php  
          $nome = '';
          $login = '';
          $email = '';
          if(isset($consultausuarioespecifico)){
            foreach ($consultausuarioespecifico as $user ) {
              $id = $user->id;
              $nome = $user->nome;
              $login = $user->login;
              $email = $user->email;
            }
          }
          ?>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nome <span class="required">*</span>
            </label>
            <input type="hidden" name="id" id="id" value="<?php echo set_value('id', $id); ?>" readonly="readonly">
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="nome" name="nome" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Insira o nome" required="required" type="text" value="<?php echo set_value('nome', $nome); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Login <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="login" name="login" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Insira o Login" required="required" type="text" value="<?php echo set_value('nome', $login); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" placeholder="Insira o email" value="<?php echo set_value('nome', $email); ?>">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <button id="send" type="submit" class="btn btn-success">Atualizar usuário</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>