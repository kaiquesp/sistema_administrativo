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
                        <th>#</th>
                        <th>Nome do Usuário</th>
                        <th>Login</th>
                        <th>E-mail</th>
                        <th>Cadastrado em:</th>
                        <th>Ultimo Acesso</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      if(isset($resultadousuario)){
                        foreach ($resultadousuario as $usuarios){
                          ?>
                          <tr>
                            <td><a href="consultausuario?id=<?php echo $usuarios->id; ?>"><i class="fa fa-mail-forward"></i></a></td>
                            <td><?php echo $usuarios->nome; ?></td>
                            <td><?php echo $usuarios->login; ?></td>
                            <td><?php echo $usuarios->email; ?></td>
                            <td><?php echo $usuarios->datacadastro; ?></td>
                            <td><?php echo $usuarios->dataultimoacesso; ?></td>
                            <?php 
                              if($usuarios->nomestatus == 'Ativo'){
                                echo "<td><button type='button' class='btn btn-success btn-xs'>".$usuarios->nomestatus."</button></td>";
                              }elseif($usuarios->nomestatus == 'Desativado'){
                                  echo "<td><button type='button' class='btn btn-danger btn-xs'>".$usuarios->nomestatus."</button></td>";
                              }
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
        </div>



