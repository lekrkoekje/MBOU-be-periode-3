<?php

class SneakerController extends BaseController
{
    private $sneakerModel;

    public function __construct()
    {
        $this->sneakerModel = $this->model('Sneaker');
    }

    public function index()
    {
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->sneakerModel->getAllSneakers($display='none', $message = '');

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title'   => 'Overzicht Sneakers',
            'display' => $display,
            'message' => $message,
            'result'  => $result
        ];

        /**
         * Met de view-method uit de BaseController-class wordt de view aangeroepen
         */
        $this->view('sneaker/index', $data);
    }

        public function delete($id)
        {
            $result = $this->sneakerModel->delete($id);

            header('Refresh:3 ; url=' . URLROOT . '/SneakerController/index');

            $this->index('flex', 'Record is verwijderd');
        }

        public function create()
        {
            $data = [
                'title'   => 'Nieuwe sneaker toevoegen',
                'display' => 'none',
                'message' => '',
                'errors'  => []
            ];

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $errors = [];

                if (empty(trim($_POST['merk']))) {
                    $errors['merk'] = 'Voer een merk in';
                } elseif (strlen($_POST['merk']) > 20) {
                    $errors['merk'] = 'Merk mag maximaal 20 tekens bevatten';
                }

                if (empty(trim($_POST['model']))) {
                    $errors['model'] = 'Voer een model in';
                } elseif (strlen($_POST['model']) > 20) {
                    $errors['model'] = 'Model mag maximaal 20 tekens bevatten';
                }

                if (empty(trim($_POST['type']))) {
                    $errors['type'] = 'Voer een type in';
                } elseif (strlen($_POST['type']) > 20) {
                    $errors['type'] = 'Type mag maximaal 20 tekens bevatten';
                }

                if (empty($_POST['prijs'])) {
                    $errors['prijs'] = 'Voer een prijs in';
                } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] < 0 || $_POST['prijs'] > 9999.99) {
                    $errors['prijs'] = 'Voer een geldige prijs in (0 - 9999,99)';
                }

                if (empty(trim($_POST['materiaal']))) {
                    $errors['materiaal'] = 'Voer een materiaal in';
                } elseif (strlen($_POST['materiaal']) > 50) {
                    $errors['materiaal'] = 'Maximaal 50 tekens';
                }

                if (empty($_POST['gewicht'])) {
                    $errors['gewicht'] = 'Voer een gewicht in';
                } elseif (!is_numeric($_POST['gewicht']) || $_POST['gewicht'] < 0 || $_POST['gewicht'] > 9999.99) {
                    $errors['gewicht'] = 'Voer een geldig gewicht in (0 - 9999,99)';
                }

                if (empty($_POST['releasedatum'])) {
                    $errors['releasedatum'] = 'Voer een releasedatum in';
                } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                    $errors['releasedatum'] = 'Voer een geldig datum in (jjjj-mm-dd)';
                }

                if (!empty($errors)) {
                    $data['errors'] = $errors;
                } else {
                    $data['display'] = 'flex';
                    $data['message'] = 'De gegevens zijn opgeslagen';

                    $this->sneakerModel->create($_POST);

                    header('Refresh: 3; URL=' . URLROOT . '/SneakerController/index');
                }
            }

            $this->view('sneaker/create', $data);
        }

        public function update($id = NULL)
        {
            $data = [
                'title'   => 'Wijzig sneaker',
                'display' => 'none',
                'message' => '',
                'color'   => '',
                'errors'  => []
            ];

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $errors = [];

                if (empty(trim($_POST['merk']))) {
                    $errors['merk'] = 'Voer een merk in';
                } elseif (strlen($_POST['merk']) > 20) {
                    $errors['merk'] = 'Merk mag maximaal 20 tekens bevatten';
                }

                if (empty(trim($_POST['model']))) {
                    $errors['model'] = 'Voer een model in';
                } elseif (strlen($_POST['model']) > 20) {
                    $errors['model'] = 'Model mag maximaal 20 tekens bevatten';
                }

                if (empty(trim($_POST['type']))) {
                    $errors['type'] = 'Voer een type in';
                } elseif (strlen($_POST['type']) > 20) {
                    $errors['type'] = 'Type mag maximaal 20 tekens bevatten';
                }

                if (empty($_POST['prijs'])) {
                    $errors['prijs'] = 'Voer een prijs in';
                } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] < 0 || $_POST['prijs'] > 9999.99) {
                    $errors['prijs'] = 'Voer een geldige prijs in (0 - 9999,99)';
                }

                if (empty(trim($_POST['materiaal']))) {
                    $errors['materiaal'] = 'Voer een materiaal in';
                } elseif (strlen($_POST['materiaal']) > 50) {
                    $errors['materiaal'] = 'Maximaal 50 tekens';
                }

                if (empty($_POST['gewicht'])) {
                    $errors['gewicht'] = 'Voer een gewicht in';
                } elseif (!is_numeric($_POST['gewicht']) || $_POST['gewicht'] < 0 || $_POST['gewicht'] > 9999.99) {
                    $errors['gewicht'] = 'Voer een geldig gewicht in (0 - 9999,99)';
                }

                if (empty($_POST['releasedatum'])) {
                    $errors['releasedatum'] = 'Voer een releasedatum in';
                } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                    $errors['releasedatum'] = 'Voer een geldig datum in (jjjj-mm-dd)';
                }

                if (!empty($errors)) {
                    $data['errors'] = $errors;
                } else {
                    $result = $this->sneakerModel->updateSneaker($_POST);

                    $data['display'] = 'flex';
                    $data['message'] = 'Het record is succesvol opgeslagen';
                    $data['color'] = 'success';
                    header('Refresh:3; url=' . URLROOT . '/SneakerController/index');
                }

                $id = $_POST['id'];
            }

            $data['sneaker'] = $this->sneakerModel->getSneakerById($id);

            $this->view('sneaker/update', $data);
        }

}