<!DOCTYPE html>
<html lang="pt-br">
  <?php include('header.php'); ?>

  <body class="py-5">
    <h3 class="text-center mb-4">Descubra seu Signo!</h3>

    <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="container g-3 justify-content-center">
      <div class="row justify-content-center m-4">
        <div class="col-md-6">
          <label for="data_nascimento" class="form-label">Data de Nascimento</label>
          <input type="date" name="data_nascimento" id="data_nascimento" class="form-control" required placeholder="Ex.: 14/03/1995">
        </div>
      </div>
      
      <div class="row justify-content-center m-4">
        <div class="col-md-6">
          <button type="submit" class="btn btn-primary w-100">Descobrir</button>
        </div>
      </div>
    </form>
  </body>
</html>