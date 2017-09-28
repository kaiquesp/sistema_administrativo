 <!-- top tiles -->
 <div class="row tile_count">
  <div class="col-md-6 col-sm-6 col-xs-6 tile_stats_count">
    <span class="count_top"><i class="fa fa-user"></i> Total de clientes</span>
    <div class="count"><?php echo sizeof($resultadocliente); ?></div>
    <!-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> -->
  </div>
</div>

<div class="">
  <div class="page-title">
    <div class="title_left">
      <h3>Lista de usuários</h3>
    </div>
  </div>

  <div class="clearfix"></div>
  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <div class="clearfix"></div>
      </div>
      <?php if(isset($msg)){
        echo "<div class='box-header with-border'>".$msg."</div>";
      } 
      ?>
      <div class="x_content">
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nome Fantasia</th>
              <th>Razão Social</th>
              <th>CNPJ</th>
              <th>CPF</th>
              <th>Telefone</th>
              <th>Celular</th>
              <th>E-mail</th>
              <th>CEP</th>
              <th>Endereço</th>
              <th>Número</th>
              <th>Complemento</th>
              <th>Bairro</th>
              <th>Cidade</th>
              <th>Estado</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            if(isset($resultadocliente)){
              foreach ($resultadocliente as $cliente){
                ?>
                <tr>
                  <td><?php echo $cliente->nomefantasia; ?></td>
                  <td><?php echo $cliente->razaosocial; ?></td>
                  <td><?php echo $cliente->cnpj; ?></td>
                  <td><?php echo $cliente->cpf; ?></td>
                  <td><?php echo $cliente->telefonecomercial; ?></td>
                  <td><?php echo $cliente->celular; ?></td>
                  <td><?php echo $cliente->email; ?></td>
                  <td><?php echo $cliente->cep; ?></td>
                  <td><?php echo $cliente->endereco; ?></td>
                  <td><?php echo $cliente->numero; ?></td>
                  <td><?php echo $cliente->complemento; ?></td>
                  <td><?php echo $cliente->bairro; ?></td>
                  <td><?php echo $cliente->cidade; ?></td>
                  <td><?php echo $cliente->estado; ?></td>
                  <td><button type="button" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button><a href="#" type="button" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>

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



