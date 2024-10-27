<!DOCTYPE html>
<html lang="pt-BR">
  <?php include('header.php'); ?>

  <body class="container py-5">
    <h3 class="text-center mb-4">Seu Signo é:</h3>

    <?php
      $data_nascimento = DateTime::createFromFormat('Y-m-d', $_POST['data_nascimento']);
      if ($data_nascimento === false) {
          echo "<p class='text-danger text-center'>Data de nascimento inválida.</p>";
      } else {
        $signos = simplexml_load_file("signos.xml");
        $signoEncontrado = null;

        foreach ($signos->signo as $signo) {
            $dataInicio = DateTime::createFromFormat('d/m', $signo->dataInicio);
            $dataFim = DateTime::createFromFormat('d/m', $signo->dataFim);

            $dataInicio->setDate($data_nascimento->format('Y'), $dataInicio->format('m'), $dataInicio->format('d'));
            $dataFim->setDate($data_nascimento->format('Y'), $dataFim->format('m'), $dataFim->format('d'));

            if (($data_nascimento >= $dataInicio && $data_nascimento <= $dataFim) ||
                ($dataInicio > $dataFim && ($data_nascimento >= $dataInicio || $data_nascimento <= $dataFim))) {
                $signoEncontrado = $signo;
                break;
            }
        }

        if ($signoEncontrado) {
            echo "<h4 class='text-center'>{$signoEncontrado->signoNome}</h4>";
            echo "<p class='text-center'>{$signoEncontrado->descricao}</p>";
        } else {
            echo "<p class='text-danger text-center'>Signo não encontrado.</p>";
        }
      }
    ?>
  </body>
</html>
