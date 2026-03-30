<?php
namespace App\Controllers;
use App\Models\ModeleUtilisateur;
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
        $modUtilisateur = new ModeleUtilisateur();

        $condition = ['mel'=>$Identifiant,'motdepasse'=>$MdP];

        $utilisateurRetourne = $modUtilisateur->where($condition)->first();
 
        if ($utilisateurRetourne != null) {
            $session->set('identifiant', $utilisateurRetourne->mel);
            $data['Identifiant'] = $Identifiant;
            echo view('Templates/Header', $data);
            echo view('Visiteur/vue_ConnexionReussie');
        } else {
            $data['TitreDeLaPage'] = "Identifiant ou/et Mot de passe inconnu(s)";
            return view('Templates/Header', $data)
            . view('Visiteur/vue_SeConnecter')
            . view('Templates/Footer');
        }
    }
}

?>