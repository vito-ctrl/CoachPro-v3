<?php require __DIR__ . '/../partials/header.php'; ?>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<h1>My Reservations</h1>

<?php if (empty($reservations)): ?>
    <p>No reservations yet.</p>
<?php else: ?>
    <ul>
        <?php foreach ($reservations as $reservation): ?>
            <li>
                <strong><?= htmlspecialchars($reservation['titre']) ?></strong><br>
                Coach: <?= htmlspecialchars($reservation['coach_nom']) ?><br>
                Seance date: <?= htmlspecialchars($reservation['date_seance']) ?><br>
                Reserved at: <?= htmlspecialchars($reservation['date_reservation']) ?>
            </li>
            <hr>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php require __DIR__ . '/../partials/footer.php'; ?>
