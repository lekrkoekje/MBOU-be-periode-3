<?php

class ZangeressenController extends BaseController
{
    private $zangeresModel;

    public function __construct()
    {
        $this->zangeresModel = $this->model('Zangeres');
    }

    public function index()
    {
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->zangeresModel->getAllZangeressen($display='none', $message = '');

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title'   => 'Rijkste Zangeressen',
            'display' => $display,
            'message' => $message,
            'result'  => $result
        ];

        /**
         * Met de view-method uit de BaseController-class wordt de view aangeroepen
         */
        $this->view('zangeressen/index', $data);
    }

        public function delete($id)
        {
            $result = $this->zangeresModel->delete($id);

            header('Refresh:3 ; url=' . URLROOT . '/ZangeressenController/index');

            $this->index('flex', 'Record is verwijderd');
        }

        public function create()
        {
            $data = [
                'title'   => 'Nieuwe zangeres toevoegen',
                'display' => 'none',
                'message' => '',
                'errors'  => []
            ];

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $errors = [];

                if (empty(trim($_POST['naam']))) {
                    $errors['naam'] = 'Voer een naam in';
                } elseif (strlen($_POST['naam']) > 50) {
                    $errors['naam'] = 'Naam mag maximaal 50 tekens bevatten';
                }

                if (empty(trim($_POST['nationaliteit']))) {
                    $errors['nationaliteit'] = 'Voer een nationaliteit in';
                } elseif (strlen($_POST['nationaliteit']) > 50) {
                    $errors['nationaliteit'] = 'Maximaal 50 tekens';
                }

                if (empty($_POST['nettowaarde'])) {
                    $errors['nettowaarde'] = 'Voer een nettowaarde in';
                } elseif (!is_numeric($_POST['nettowaarde']) || $_POST['nettowaarde'] < 0 || $_POST['nettowaarde'] > 999999999) {
                    $errors['nettowaarde'] = 'Voer een geldige nettowaarde in (0 - 999999999)';
                }

                if (empty($_POST['geboortedatum'])) {
                    $errors['geboortedatum'] = 'Voer een geboortedatum in';
                } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['geboortedatum'])) {
                    $errors['geboortedatum'] = 'Voer een geldig datum in (jjjj-mm-dd)';
                }

                if (empty(trim($_POST['bekendstehit']))) {
                    $errors['bekendstehit'] = 'Voer een bekendste hit in';
                } elseif (strlen($_POST['bekendstehit']) > 100) {
                    $errors['bekendstehit'] = 'Maximaal 100 tekens';
                }

                if (!empty($errors)) {
                    $data['errors'] = $errors;
                } else {
                    $data['display'] = 'flex';
                    $data['message'] = 'De gegevens zijn opgeslagen';

                    $this->zangeresModel->create($_POST);

                    header('Refresh: 3; URL=' . URLROOT . '/ZangeressenController/index');
                }
            }

            $this->view('zangeressen/create', $data);
        }

        public function update($id = NULL)
        {
            $data = [
                'title'   => 'Wijzig zangeres',
                'display' => 'none',
                'message' => '',
                'color'   => '',
                'errors'  => []
            ];

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $errors = [];

                if (empty(trim($_POST['naam']))) {
                    $errors['naam'] = 'Voer een naam in';
                } elseif (strlen($_POST['naam']) > 50) {
                    $errors['naam'] = 'Naam mag maximaal 50 tekens bevatten';
                }

                if (empty(trim($_POST['nationaliteit']))) {
                    $errors['nationaliteit'] = 'Voer een nationaliteit in';
                } elseif (strlen($_POST['nationaliteit']) > 50) {
                    $errors['nationaliteit'] = 'Maximaal 50 tekens';
                }

                if (empty($_POST['nettowaarde'])) {
                    $errors['nettowaarde'] = 'Voer een nettowaarde in';
                } elseif (!is_numeric($_POST['nettowaarde']) || $_POST['nettowaarde'] < 0 || $_POST['nettowaarde'] > 999999999) {
                    $errors['nettowaarde'] = 'Voer een geldige nettowaarde in (0 - 999999999)';
                }

                if (empty($_POST['geboortedatum'])) {
                    $errors['geboortedatum'] = 'Voer een geboortedatum in';
                } elseif (!DateTime::createFromFormat('Y-m-d', $_POST['geboortedatum'])) {
                    $errors['geboortedatum'] = 'Voer een geldig datum in (jjjj-mm-dd)';
                }

                if (empty(trim($_POST['bekendstehit']))) {
                    $errors['bekendstehit'] = 'Voer een bekendste hit in';
                } elseif (strlen($_POST['bekendstehit']) > 100) {
                    $errors['bekendstehit'] = 'Maximaal 100 tekens';
                }

                if (!empty($errors)) {
                    $data['errors'] = $errors;
                } else {
                    $result = $this->zangeresModel->updateZangeres($_POST);

                    $data['display'] = 'flex';
                    $data['message'] = 'Het record is succesvol opgeslagen';
                    $data['color'] = 'success';
                    header('Refresh:3; url=' . URLROOT . '/ZangeressenController/index');
                }

                $id = $_POST['id'];
            }

            $data['zangeres'] = $this->zangeresModel->getZangeresById($id);

            $this->view('zangeressen/update', $data);
        }

}