<?php

class SmartphoneController extends BaseController
{
    private $smartphoneModel;

    public function __construct()
    {
        $this->smartphoneModel = $this->model('Smartphone');
    }

    public function index()
    {
        /**
         * Haal de resultaten van de model binnen
         */
        $result = $this->smartphoneModel->getAllSmartphones($display='none', $message = '');

        // var_dump($result);

        /**
         * Het $data-array geeft informatie mee aan de view-pagina
         */
        $data = [
            'title'  => 'Overzicht Smartphones',
            'display' => $display,
            'message' => $message,
            'result' => $result
        ];

        /**
         * Met de view-method uit de BaseController-class wordt de view aangeroepen
         */
        $this->view('smartphone/index', $data);
    }

        public function delete($id)
        {
            $result = $this->smartphoneModel->delete($id);

            header('Refresh:3 ; url=' . URLROOT . '/SmartphoneController/index');

            $this->index('flex', 'Record is verwijderd');
        }

}