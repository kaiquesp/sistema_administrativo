<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Cadastro de Produtos</h3>
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
            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="descricaoproduto">Descrição de Produto <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-12 col-xs-12">
              <input id="descricaoproduto" name="descricaoproduto" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"placeholder="Informe a descrição do produto" required="required" type="text">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="numeroreferencia">Número de referência do Produto <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-12 col-xs-12">
              <input id="numeroreferencia" name="numeroreferencia" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2"placeholder="ex: Ref: 123456" required="required" type="number">
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="unidadevenda">Unidade de venda<span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-12 col-xs-12">
              <select class="select2_single form-control" tabindex="-1" name="unidadevenda" id="unidadevenda">
                <option>Selecione</option>
                <option value="Unidade">Unidade</option>
                <option value="Caixa">Caixa</option>
                <option value="Kilo">Kilo</option>
                <option value="Metro">Metro</option>
              </select>
            </div>
          </div>
          <div class="item form-group">
            <label class="control-label col-md-2 col-sm-2 col-xs-12" for="valormercadoria">Valor mercadoria (R$) <span class="required">*</span>
            </label>
            <div class="col-md-10 col-sm-12 col-xs-12">
            <input id="valormercadoria" name="valormercadoria" class="form-control col-md-7 col-xs-12 format_value" placeholder="Informe o valor da mercadoria" required="required" type="text">
           </div>
         </div>
         <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="valorvenda">Valor para venda <span class="required">*</span>
          </label>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input id="valorvenda" name="valorvenda" class="form-control col-md-7 col-xs-12 format_value" placeholder="Informe o valor para venda" required="required" type="text">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="quantidadeestoque">Quantidade em estoque <span class="required">*</span>
          </label>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input type="number" id="quantidadeestoque" name="quantidadeestoque" required="required" class="form-control col-md-7 col-xs-12" placeholder="Informe a quantidade em estoque">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="telefonecomercial">Desconto máximo permitido (%) <span class="required">*</span>
          </label>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input id="descontomaximopermitido" name="descontomaximopermitido" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Informe o desconto máximo permitido" type="number">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="estoquealerta">Estoque mínimo para alerta <span class="required">*</span>
          </label>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input id="estoquealerta" name="estoquealerta" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Informe a quantidade mínima permitida em estoque" type="number">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">Quantidade mínima para venda <span class="required">*</span>
          </label>
          <div class="col-md-10 col-sm-12 col-xs-12">
            <input id="quantidademinimavenda" name="quantidademinimavenda" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" placeholder="Informe a quantidade mínima em estoque para a venda" type="number">
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
</div>

<script src="../assets/js/jquery/jquery-2.2.3.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery.maskMoney/jquery.maskMoney.js" type="text/javascript"></script>
<script type="text/javascript">
  $(".format_value").maskMoney({prefix:'R$ ', allowNegative: true, thousands:'.', decimal:',', affixesStay: false});
</script>