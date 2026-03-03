<?php require_once APPROOT . '/views/includes/header.php'; ?>

<!-- Voor het centreren van de container gebruiken we het bootstrap grid -->
<div class="container">
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <h3><?php echo $data['title']; ?></h3>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
    <div class="col-10">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Type</th>
                    <th>Prijs</th>
                    <th>Materiaal</th>
                    <th>Gewicht</th>
                    <th>Releasedatum</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['result'] as $sneakers) : ?>
                    <tr>
                        <td><?= $sneakers->Merk; ?></td>
                        <td><?= $sneakers->Model; ?></td>
                        <td><?= $sneakers->Type; ?></td>
                        <td><?= $sneakers->Prijs; ?></td>
                        <td><?= $sneakers->Materiaal; ?></td>
                        <td><?= $sneakers->Gewicht; ?></td>
                        <td><?= $sneakers->Releasedatum; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="<?= URLROOT; ?>/homepages/index">
            <i class="bi bi-arrow-left"></i>
        </a>
    </div>
</div>

</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>