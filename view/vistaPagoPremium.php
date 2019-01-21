
<html lang="es">
<head>
    <?php include_once('../includes.php');?>
    <title>Web-Manager</title>
</head>
<script type="text/javascript">
 $(document).ready(function(){


 });
</script>

<body class="animsition">
  <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php include "menu.php"?>

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include "header.php"?>
        

            <div class="main-content">
              <div class="section__content section__content--p30">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-12"> 
                      <div class="card" >
                        <center><div class="card-header"></div></center>
                        <div class="card-body">
                        <div class="card-title">
                        <h3 class="text-center title-2">Pago de la Aplicación</h3>
                        </div>
                        <hr>
                          
                            <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Cantidad de Pago</label>
                            <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false" value="29.99">
                            </div>
                            <div class="form-group has-success">
                              <label for="cc-name" class="control-label mb-1">Dueño de la Tarjeta</label>
                              <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                              <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                            </div>
                            <div class="form-group">
                              <label for="cc-number" class="control-label mb-1">Numero de tarjeta</label>
                              <input id="cc-number" name="cc-number" type="tel" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Por favor ingresar una tarjeta válida" data-val-cc-number="Por favor ingresar una tarjeta válida" autocomplete="cc-number">
                              <span class="help-block" data-valmsg-for="cc-number" data-valmsg-replace="true"></span>
                            </div>
                            <div class="row">
                            <div class="col-6">
                              <div class="form-group">
                                <label for="cc-exp" class="control-label mb-1">Fecha de Expiración</label>
                                <input id="cc-exp" name="cc-exp" type="tel" class="form-control cc-exp" value="" data-val="true" data-val-required="Please enter the card expiration" data-val-cc-exp="Please enter a valid month and year" placeholder="MM / YY" autocomplete="cc-exp">
                                <span class="help-block" data-valmsg-for="cc-exp" data-valmsg-replace="true"></span>
                              </div>
                            </div>
                            <div class="col-6">
                              <label for="x_card_code" class="control-label mb-1">Código de Seguridad</label>
                              <div class="input-group">
                                <input id="x_card_code" name="x_card_code" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                              </div>
                            </div>
                            <div class="col-6">
                              <label for="x_ced" class="control-label mb-1">Céd.Empresa</label>
                              <div class="input-group">
                                <input id="x_ced" name="x_ced" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                              </div>
                            </div>
                            <div class="col-6">
                              <label for="x_pass" class="control-label mb-1">Contraseña</label>
                              <div class="input-group">
                                <input id="x_pass" name="x_pass" type="tel" class="form-control cc-cvc" value="" data-val="true" data-val-required="Please enter the security code" data-val-cc-cvc="Please enter a valid security code" autocomplete="off">
                              </div>
                            </div>
                            </div>
                            <br>
                            <div>
                              <button   class="btn btn-lg btn-info btn-block" onclick="pagarMembresía()">Pagar
                                
                               
                              </button>
                            </div>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

    <?php include_once('../dependencies.php'); ?>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.33.1/dist/sweetalert2.all.min.js"></script>
</body>

</html>
