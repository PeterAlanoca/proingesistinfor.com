<div class="row">
  <div class="col-lg-4 col-md-5">
    <div class="card card-user">
      <div class="image">
        <img src="<?php echo base_url(); ?>images/cover/<?php echo $user->cover ?>"/>
      </div>
      <div class="content">
        <div class="author">
          <img class="avatar border-white" src="<?php echo base_url(); ?>images/profile/<?php echo $user->photo ?>"/>
          <h4 class="title"><?php echo $user->firstname.' '.$user->lastname; ?><br />
            <small><?php echo $user->email; ?></small><br />
            <small><?php echo $user->username; ?></small>
          </h4>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="header">
          <h4 class="title">Personas que te cuidan</h4>
      </div>
      <div class="content">
        <ul class="list-unstyled team-members">
          <?php for ($i=0; $i < count($contacts); $i++) { ?>
          <li>
            <div class="row">
              <div class="col-xs-3">
                <div>
                  <img width="40px" src="<?php echo base_url(); ?>assets/backend/img/person-icon.png" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                </div>
              </div>
              <div class="col-xs-6">
                <?php echo $contacts[$i]->name; ?>
                <br />
                <span class="text-muted"><small><?php echo $contacts[$i]->cellphone; ?></small></span>
              </div>
              <div class="col-xs-3 text-right">
                <btn title="Editar" class="btn btn-sm btn-success btn-icon" disabled><i class="fa fa-pencil"></i></btn>
              </div>
            </div>
          </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-lg-8 col-md-7">
    <div class="card">
      <div class="header">
        <h4 class="title">Editar Perfil</h4>
      </div>
      <div class="content">
        <form method="post" action="<?php echo base_url(); ?>heartapp/perfil/update">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" id="firstname" name="firstname" class="form-control border-input" placeholder="Nombre" value="<?php echo $user->firstname; ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Apellido</label>
              <input type="text" id="lastname" name="lastname" class="form-control border-input" placeholder="Apellido" value="<?php echo $user->lastname; ?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
              <label>Nombre de usuario</label>
              <input type="text" id="username" name="username" class="form-control border-input" placeholder="username" value="<?php echo $user->username; ?>">
            </div>
          </div>
          <div class="col-md-5">
            <div class="form-group">
              <label for="exampleInputEmail1">Correo electrónico</label>
              <input type="email" id="email" name="email" class="form-control border-input" placeholder="Email" value="<?php echo $user->email; ?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Contraseña</label>
              <input type="password" id="password" name="password" class="form-control border-input" placeholder="Contraseña" value="<?php echo $user->password; ?>">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>País</label>
              <select class="form-control border-input" id="country" name="country" disabled>
                <option>Argentina</option>
                <option selected>Bolivia</option>
                <option>Brasil</option>
                <option>Chile</option>
                <option>Colombia</option>
                <option>Costa Rica</option>
                <option>Cuba</option>
                <option>Ecuador</option>
                <option>El Salvador</option>
                <option>Guatemala</option>
                <option>Haití</option>
                <option>Honduras</option>
                <option>México</option>
                <option>Nicaragua</option>
                <option>Panamá</option>
                <option>Paraguay</option>
                <option>Perú</option>
                <option>República</option>
                <option>Dominicana</option>
                <option>Uruguay</option>
                <option>Venezuela</option>
              </select>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Ciudad</label>
              <input type="text" id="city" name="city" class="form-control border-input" placeholder="Ciudad" value="<?php echo $user->city; ?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Teléfono móvil</label>
              <input type="text" id="cellphone" name="cellphone" class="form-control border-input" placeholder="Teléfono móvil" value="<?php echo $user->cellphone; ?>">
            </div>
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-info btn-fill btn-wd">Actualizar tu información</button>
        </div>
        <div class="clearfix"></div>
        </form>
      </div>
    </div>
  </div>
</div>