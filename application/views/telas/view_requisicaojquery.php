<div class="col-md-12 col-xs-12">
  <div class="x_panel">
    <div class="x_title">
      <h2>Requisição Ajax</h2>
      <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Settings 1</a>
            </li>
            <li><a href="#">Settings 2</a>
            </li>
          </ul>
        </li>
        <li><a class="close-link"><i class="fa fa-close"></i></a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
          <label class="control-label col-md-4 col-sm-2 col-xs-12">Selecione</label>
            <div class="col-md-8 col-sm-9 col-xs-12">
              <select class="select2_single form-control" onchange="buscaInfo(this.value)">
                <option>Selecione...</option>
                  <?php
                  if (isset ( $resultadoPerfil )) {
                    foreach ( $resultadoPerfil as $perfil ) {
                      echo '<option value="' . $perfil->perfilid . '">' . $perfil->descricao . '</option>';
                    }
                  }
                  ?>
              </select>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12">Resultado</label>
            <div class="col-md-9 col-sm-9 col-xs-12">
              <textarea class="form-control" rows="3" id="resultado"
                name="resultado"
                placeholder="Selecione o Perfil para mais informações..."></textarea>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>


<script>
  var base_url = '<?php echo base_url() ?>';
  $(document).ready(function () {
    
  });
  function buscaInfo(perfil){
    var perfil = perfil;
    var url = base_url + "home/buscausuarioperfil";
    $.post(url, {
      perfil: perfil
    }, function (data) {
      $('#resultado').html(data);
    });
  }
</script>