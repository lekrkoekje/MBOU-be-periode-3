<?php require_once APPROOT . '/views/includes/header.php'; ?>

<!-- Voor het centreren van de container gebruiken we het bootstrap grid -->
<div class="container">
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <h3><?php echo $data['title']; ?></h3>
        </div>
    </div>


    <!-- Terugkoppeling naar de gebruiker -->
    <div class="row mt-3 d-<?= $data['display']; ?> justify-content-center">
        <div class="col-10 text-begin text-primary">
            <div class="alert alert-success" role="alert">
                <?= $data['message']; ?>
            </div>
        </div>
    </div>


    <!-- Knop voor het maken van een nieuwe zangeres record -->
    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10 text-begin text-danger">
            <a href="<?= URLROOT; ?>/ZangeressenController/create"
                class="btn btn-warning"
                role="button">Nieuwe zangeres
            </a>
        </div>
    </div>

    <div class="row mt-3 d-flex justify-content-center">
        <div class="col-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Nationaliteit</th>
                        <th>Nettowaarde</th>
                        <th>Geboortedatum</th>
                        <th>Bekendste Hit</th>
                        <th>Wijzig</th>
                        <th>Verwijder</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['result'] as $zangeres) : ?>
                        <tr>
                            <td><?= $zangeres->Naam; ?></td>
                            <td><?= $zangeres->Nationaliteit; ?></td>
                            <td><?= $zangeres->Nettowaarde; ?></td>
                            <td><?= $zangeres->Geboortedatum; ?></td>
                            <td><?= $zangeres->BekendsteHit; ?></td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/ZangeressenController/update/<?= $zangeres->Id; ?>">
                                    <i class="bi bi-pencil-fill text-success"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/ZangeressenController/delete/<?= $zangeres->Id; ?>"
                                    onclick="return confirm('Weet je zeker dat je dit record wilt verwijderen?');">
                                    <i class="bi bi-trash3-fill text-danger"></i>
                                </a>
                            </td>
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