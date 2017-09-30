  <div class="page-title">
    <div class="title_left">
      <h3>Cadastro de Pedidos</h3>
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
          <form role="form" action="cadastraproduto" method="POST" data-parsley-validate class="form-horizontal form-label-left">
          </p>
          <div class="item form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="idcliente">ID do Cliente<span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-12 col-xs-12">
              <input id="idcliente" name="idcliente" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"placeholder="Informe a descrição do produto" required="required" type="text" value="<?php set_value($codigopedido,'codigopedido'); ?>">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="cliente">Cliente<span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-12 col-xs-12">
              <select class="select2_single form-control" tabindex="-1" name="cliente" id="cliente">
                <option>Selecione</option>
                <?php 

                ?>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <?php 
              $codigopedido = ("ymdhis");
            ?>
            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="valormercadoria">Valor mercadoria (R$) <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-12 col-xs-12">
              <input id="valormercadoria" name="valormercadoria" class="form-control col-md-7 col-xs-12 format_value" value="<?php set_value($codigopedido,'codigopedido'); ?>" required="required" type="text">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="valorbruto">Valor Bruto <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-12 col-xs-12">
              <input id="valorbruto" name="valorbruto" class="form-control col-md-7 col-xs-12 format_value" value="<?php set_value('valorbruto'); ?>" required="required" type="text">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="quantidadeestoque">Quantidade em estoque <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-12 col-xs-12">
              <input type="number" id="quantidadeestoque" name="quantidadeestoque" required="required" class="form-control col-md-7 col-xs-12" value="<?php set_value('valorliquido'); ?>">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-6 col-md-offset-2">
              <button id="send" type="submit" class="btn btn-success">Cadastrar Produto</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_content">
       <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>#</th>
            <th>Cod. produto</th>
            <th>Descrição</th>
            <th>Vl. Mercadoria</th>
            <th>Vl. Venda</th>
            <th>Desconto</th>

          </tr>
        </thead>
        <tbody>
          <?php 
          if(isset($resultadoproduto)){
            foreach ($resultadoproduto as $produtos){
              ?>
              <tr>
                <td><a href="consultausuario?id=<?php echo $produtos->id; ?>"><i class="fa fa-mail-forward"></i></a></td>
                <td><?php echo $produtos->descricaoproduto; ?></td>
                <td><?php echo $produtos->valormercadoria; ?></td>
                <td><?php echo $produtos->valorvenda; ?></td>
                <td><?php echo $produtos->quantidadeestoque; ?></td>
                <?php 
                  if($produtos->desconto === 1):
                      echo "<td>$produtos->desconto; ?></td>";
                  else:

                  endif;
                ?>
                
              </tr>
              <?php 
            }
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>
</div>
</div>


<script src="../assets/js/jquery/jquery-2.2.3.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery.maskMoney/jquery.maskMoney.js" type="text/javascript"></script>
<script type="text/javascript">
  $(".format_value").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
</script>