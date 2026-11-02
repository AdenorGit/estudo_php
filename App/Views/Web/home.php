<?php include __DIR__ . "/../Templates/tmp_head.php"; ?>

<?php include __DIR__ . "/../Templates/tmp_header.php"; ?>

<?php include __DIR__ . "/../Templates/tmp_msg.php"; ?>

<main class="container mt-5">

    <h1><?= $titulo ?></h1>

    <?php if (empty($eventos)): ?>
        <p class="text-muted">Nenhum evento cadastrado.</p>
    <?php else: ?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php foreach ($eventos as $evento): ?>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <?php if (!empty($evento['eve_cartaz'])): ?>
                            <img src="Assets/Img/<?= htmlspecialchars($evento['eve_cartaz']) ?>"
                                class="card-img-top" alt="<?= htmlspecialchars($evento['eve_titulo']) ?>"
                                style="height:180px;object-fit:cover;">
                        <?php endif; ?>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?= htmlspecialchars($evento['eve_titulo']) ?></h5>
                            <p class="card-text text-muted small mb-2">
                                <i class="bi bi-calendar3"></i>
                                <?= htmlspecialchars(date('d/m/Y', strtotime($evento['eve_dt_evento']))) ?>
                            </p>
                            <p class="card-text flex-grow-1">
                                <?= htmlspecialchars(mb_strimwidth($evento['eve_descricao'] ?? '', 0, 120, '...')) ?>
                            </p>
                            <a href="#" class="btn btn-primary btn-sm mt-auto">Ver detalhes</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

</main>

<?php include __DIR__ . "/../Templates/tmp_footer.php"; ?>

<?php include __DIR__ . "/../Templates/tmp_fim.php"; ?>