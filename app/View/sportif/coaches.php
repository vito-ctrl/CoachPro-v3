<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);
 ?>

<h1>Coaches</h1>

<?php if (empty($coaches)): ?>
    <p>No coaches available.</p>
<?php else: ?>
    <table border="1" cellpadding="10">
        <tr>
            <th>Name</th>
            <th>Discipline</th>
            <th>Experience</th>
        </tr>

        <?php foreach ($coaches as $coach): ?>
            <tr>
                <td><?= htmlspecialchars($coach['nom']) ?></td>
                <td><?= htmlspecialchars($coach['discipline']) ?></td>
                <td><?= (int) $coach['experience'] ?> years</td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

<?php require __DIR__ . '/../partials/footer.php'; ?>
