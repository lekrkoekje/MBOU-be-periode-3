<?php

class HorlogesController extends BaseController
{
    private $horlogeModel;

    public function __construct()
    {
        $this->horlogeModel = $this->model('Horloge');
    }

    public function index()
    {
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->horlogeModel->getAllHorloges($display='none', $message = '');

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title'   => 'Duurste Horloges',
            'display' => $display,
            'message' => $message,
            'result'  => $result
        ];

        /**
         * Met de view-method uit de BaseController-class wordt de view aangeroepen
         */
        $this->view('horloges/index', $data);
    }

        public function delete($id)
        {
            $result = $this->horlogeModel->delete($id);

            header('Refresh:3 ; url=' . URLROOT . '/HorlogesController/index');

            $this->index('flex', 'Record is verwijderd');
        }

        public function create()
        {
            $data = [
                'title'   => 'Nieuw horloge toevoegen',
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

                if (empty($_POST['prijs'])) {
                    $errors['prijs'] = 'Voer een prijs in';
                } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] < 0 || $_POST['prijs'] > 9999999) {
                    $errors['prijs'] = 'Voer een geldige prijs in (0 - 9999999)';
                }

                if (empty(trim($_POST['materiaal']))) {
                    $errors['materiaal'] = 'Voer een materiaal in';
                } elseif (strlen($_POST['materiaal']) > 50) {
                    $errors['materiaal'] = 'Maximaal 50 tekens';
                }

                if (empty($_POST['diameter'])) {
                    $errors['diameter'] = 'Voer een diameter in';
                } elseif (!is_numeric($_POST['diameter']) || $_POST['diameter'] < 0 || $_POST['diameter'] > 999) {
                    $errors['diameter'] = 'Voer een geldige diameter in (0 - 999)';
                }

                if (empty(trim($_POST['beweging']))) {
                    $errors['beweging'] = 'Voer een beweging in';
                } elseif (strlen($_POST['beweging']) > 50) {
                    $errors['beweging'] = 'Maximaal 50 tekens';
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

                    $this->horlogeModel->create($_POST);

                    header('Refresh: 3; URL=' . URLROOT . '/HorlogesController/index');
                }
            }

            $this->view('horloges/create', $data);
        }

        public function update($id = NULL)
        {
            $data = [
                'title'   => 'Wijzig horloge',
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

                if (empty($_POST['prijs'])) {
                    $errors['prijs'] = 'Voer een prijs in';
                } elseif (!is_numeric($_POST['prijs']) || $_POST['prijs'] < 0 || $_POST['prijs'] > 9999999) {
                    $errors['prijs'] = 'Voer een geldige prijs in (0 - 9999999)';
                }

                if (empty(trim($_POST['materiaal']))) {
                    $errors['materiaal'] = 'Voer een materiaal in';
                } elseif (strlen($_POST['materiaal']) > 50) {
                    $errors['materiaal'] = 'Maximaal 50 tekens';
                }

                if (empty($_POST['diameter'])) {
                    $errors['diameter'] = 'Voer een diameter in';
                } elseif (!is_numeric($_POST['diameter']) || $_POST['diameter'] < 0 || $_POST['diameter'] > 999) {
                    $errors['diameter'] = 'Voer een geldige diameter in (0 - 999)';
                }

                if (empty(trim($_POST['beweging']))) {
                    $errors['beweging'] = 'Voer een beweging in';
                } elseif (strlen($_POST['beweging']) > 50) {
                    $errors['beweging'] = 'Maximaal 50 tekens';
                }

                if (empty($_POST['releasedatum'])) {
                    $errors['releasedatum'] = 'Voer een releasedatum in';
                } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['releasedatum'])) {
                    $errors['releasedatum'] = 'Voer een geldig datum in (jjjj-mm-dd)';
                }

                if (!empty($errors)) {
                    $data['errors'] = $errors;
                } else {
                    $result = $this->horlogeModel->updateHorloge($_POST);

                    $data['display'] = 'flex';
                    $data['message'] = 'Het record is succesvol opgeslagen';
                    $data['color'] = 'success';
                    header('Refresh:3; url=' . URLROOT . '/HorlogesController/index');
                }

                $id = $_POST['id'];
            }

            $data['horloge'] = $this->horlogeModel->getHorlogeById($id);

            $this->view('horloges/update', $data);
        }

}