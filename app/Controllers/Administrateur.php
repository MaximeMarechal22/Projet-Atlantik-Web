<?php
    namespace App\Controllers;
    use App\Models\ModeleClient;
    use App\Models\ModeleAdministrateur;
    use App\Models\ModeleSecteur;
    helper(['assets']);
    class Administrateur extends BaseController
    {
        public function seDeconnecter()
        {
            session()->destroy();
            return redirect()->to('seconnecter');
        }
    }
?>