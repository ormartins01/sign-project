<?php
include('header.php');
?>
<div class="container">
    <form action="show_zodiac_sign.php" method="POST" class="w-50 mx-auto">
        <div class="mb-3">
            <label class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" name="data_nascimento" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Descobrir Signo</button>
    </form>
</div>