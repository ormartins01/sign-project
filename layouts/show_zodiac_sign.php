<?php

include('header.php');

$dataNascimento = isset($_POST['data_nascimento']) ? $_POST['data_nascimento'] : null;

$xml = simplexml_load_file('sign.xml');

$signoEncontrado = null;

$dateObj = DateTime::createFromFormat('Y-m-d', $dataNascimento);
$formatDataNascimento = $dateObj ? $dateObj->format('d-m-Y') : '';

list($dia, $mes) = explode('-', $formatDataNascimento);
$diaNiver = (int)$dia;
$mesNiver = (int)$mes;

// printf("Data de Nascimento: %s<br>", $formatDataNascimento);
// printf("Dia: %d<br>", $diaNiver);
// printf("Mês: %d<br>", $mesNiver);


foreach ($xml->signo as $signo) {
    list($diaInicioSigno, $mesInicioSigno) = explode('-', $signo->dataInicio);
    list($diaFimSigno, $mesFimSigno) = explode('-', $signo->dataFim);
    $diaInicio = (int)$diaInicioSigno;
    $mesInicio = (int)$mesInicioSigno;
    $diaFim = (int)$diaFimSigno;
    $mesFim = (int)$mesFimSigno;

    if (($mesNiver == $mesInicio && $diaNiver >= $diaInicio) || ($mesNiver == $mesFim && $diaNiver <= $diaFim)) {
        $signoEncontrado = $signo;
        break;
    }
}

?>

<body class="w-100 flex-lg-column">
    <div class="w-100 align-items-center flex-row justify-content-center d-flex flex-column">
        <?php if ($signoEncontrado): ?>
            <div class="text-center mb-4 col-md-4">
                <h1 class="text-center my-4">Seu Signo é:</h1>
                <div class="flex flex-row align-items-center justify-content-center m-8">
                    <img src="../assets/imgs/<?php echo $signoEncontrado->image; ?>" alt="<?php echo $signoEncontrado->nome; ?>" class="img-fluid rounded-circle mb-2" style="max-width: 100px;">
                    <h2><?php echo $signoEncontrado->nome; ?></h2>
                </div>
                <p><strong>Período:</strong> <?php echo $signoEncontrado->dataInicio; ?> à <?php echo $signoEncontrado->dataFim; ?> </p>
                <p><?php echo $signoEncontrado->descricao; ?></p>
            </div>
        <?php else: ?>
            <div class="w-100 text-center mb-4 col-md-4 pt-5">
                <p class="font-5rem">Signo não encontrado. Por favor, selecione uma data válida.</p>
            </div>
        <?php endif; ?>
    </div>
</body>