<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Cadastro de usuários</h3>
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
        <form role="form" action="cadastrausuario" method="POST" class="form-horizontal form-label-left">
          </p>

          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nome <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="nome" name="nome" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Insira o nome" required="required" type="text">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Login <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="login" name="login" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="name" placeholder="Insira o Login" required="required" type="text">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" placeholder="Insira o email">
            </div>
          </div>
          <div class="item form-group">
            <label for="password" class="control-label col-md-3">Senha</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input id="senha" type="password" name="senha" data-validate-length="6,8" class="form-control col-md-7 col-xs-12" required="required">
            </div>
          </div>
          <div class="item form-group">
            <label for="password" class="control-label col-md-3">Perfil</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <select class="form-control" id="perfilid" name="perfilid">
                <option value="">Selecione</option>
                <?php 
                if(isset($resultadoPerfil)){
                  foreach ($resultadoPerfil as $perfil) {
                    echo '<option value="'.$perfil->perfilid.'">'.$perfil->descricao.'</option>';
                  }
                }
                ?>
              </select>
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
              <button id="send" type="submit" class="btn btn-success">Cadastrar usuário</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>