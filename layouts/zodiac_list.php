<?php
include('header.php');
$xml = simplexml_load_file('sign.xml');
?>

<div class="container">
    <div class="row">
        <?php foreach ($xml->signo as $sign): ?>
            <div class="text-center mb-4 col-md-4">
                <div class="flex flex-row align-items-center justify-content-center m-8">
                    <img src="../assets/imgs/<?php echo $sign->image; ?>" alt="<?php echo $sign->nome; ?>" class="img-fluid rounded-circle mb-2" style="max-width: 100px;">
                    <h2><?php echo $sign->nome; ?></h2>
                </div>
                <p><strong>Período:</strong> <?php echo $sign->dataInicio; ?> à </strong> <?php echo $sign->dataFim; ?> </p>
                <p><?php echo $sign->descricao; ?></p>
            </div>
        <?php endforeach; ?>
    </div>
</div>