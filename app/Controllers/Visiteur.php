<?php
namespace App\Controllers;
use App\Models\ModeleClient;
use App\Models\ModeleAdministrateur;
helper(['assets']);
class Visiteur extends BaseController
{
    public function accueil()
    {
        helper(['form']);
        $session = session();
 
        $data['TitreDeLaPage'] = 'Bienvenue !';
        if (!$this->request->is('post')) {
            return view('Templates/Header', $data)
            . view('Visiteur/vue_Accueil')
            . view('Templates/Footer');
        }
    }
    public function seConnecter()
    {
        helper(['form']);
        $session = session();
 
        $data['TitreDeLaPage'] = 'Se connecter';
        if (!$this->request->is('post')) {
            return view('Templates/Header', $data)
            . view('Visiteur/vue_SeConnecter')
            . view('Templates/Footer');
        }
        $reglesValidation = [
            'txtIdentifiant' => 'required',
            'txtMotDePasse' => 'required',
        ];
        if (!$this->validate($reglesValidation)) {
            $data['TitreDeLaPage'] = "Saisie incorrecte";
            return view('Templates/Header', $data)
            . view('Visiteur/vue_SeConnecter')
            . view('Templates/Footer');
        }
        $Identifiant = $this->request->getPost('txtIdentifiant');
        $MdP = $this->request->getPost('txtMotDePasse');

        $modClient = new ModeleClient();
        $conditionClient = ['Mel'=>$Identifiant, 'motdepasse'=>$MdP];
        $clientRetourne = $modClient->where($conditionClient)->first();

        if ($clientRetourne != null) {
            $session->set('Identifiant', $clientRetourne->MEL);
            $data['Identifiant'] = $Identifiant;
            echo view('Templates/Header', $data);
            echo view('Visiteur/vue_ConnexionReussie');
            }

        else {
            $modAdministrateur = new ModeleAdministrateur();
            $conditionAdmin = ['identifiant'=>$Identifiant,'motdepasse'=>$MdP];
            $administrateurRetourne = $modAdministrateur->where($conditionAdmin)->first();

            if ($administrateurRetourne != null) {
            $session->set('identifiant', $administrateurRetourne->IDENTIFIANT);
            $session->set('profil', $administrateurRetourne->PROFIL);
            $data['Identifiant'] = $Identifiant;
            echo view('Templates/Header', $data);
            echo view('Visiteur/vue_ConnexionReussie');
            }
            else {
                $data['TitreDeLaPage'] = "Identifiant ou/et Mot de passe inconnu(s)";
                return view('Templates/Header', $data)
                . view('Visiteur/vue_SeConnecter')
                . view('Templates/Footer');
            }
        }
    }
    
    public function seDeconnecter()
        {
            session()->destroy();
            return redirect()->to('seconnecter');
        }
}

?>