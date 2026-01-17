<?php require __DIR__ . '/../partials/header.php'; ?>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<h1>Available Seances</h1>

<?php if (empty($seances)): ?>
    <p>No seances available.</p>
<?php else: ?>
    <ul>
        <?php foreach ($seances as $seance): ?>
            <li>
                <strong><?= htmlspecialchars($seance['titre']) ?></strong><br>
                Coach: <?= htmlspecialchars($seance['coach_nom']) ?><br>
                Date: <?= htmlspecialchars($seance['date_seance']) ?>

                <form method="POST" action="/sportif/reserve">
                    <input type="hidden" name="seance_id" value="<?= (int) $seance['id'] ?>">
                    <button type="submit">Reserve</button>
                </form>
            </li>
            <hr>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php require __DIR__ . '/../partials/footer.php'; ?>
