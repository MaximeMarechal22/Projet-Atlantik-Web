<?php
namespace App\Controllers;
use App\Models\ModeleClient;
use App\Models\ModeleAdministrateur;
use App\Models\ModeleSecteur;
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

    public function creerUnCompte()
    {
        helper(['form']);
        $session = session();

        $data['TitreDeLaPage'] = 'Créer un compte';
        if (!$this->request->is('post')) {
            return view('Templates/Header')
            . view('Visiteur/vue_CreerUnCompte', $data)
            . view('Templates/Footer');
        }
        $reglesValidation = [
        'txtNom' => 'required|regex_match[/^[a-zA-ZÀ-ÿ\- ]+$/]|max_length[30]',
        'txtPrenom' => 'required|regex_match[/^[a-zA-ZÀ-ÿ\- ]+$/]|max_length[30]',
        'txtAdresse' => 'required|max_length[100]',
        'txtCodePostal' => 'required|numeric|exact_length[5]',
        'txtVille' => 'required|max_length[30]',
        'txtFixe' => 'required|regex_match[/^0[1-5](\.\d{2}){4}$/]',
        'txtMobile' => 'required|regex_match[/^0[67](\.\d{2}){4}$/]',
        'txtMel' => 'required|max_length[254]|valid_email|',
        'txtMdP' => 'required|min_length[8]|max_length[30]',
        ];
        

        if (!$this->validate($reglesValidation)) {
            $data['TitreDeLaPage'] = "Saisie formulaire incorrecte";
            helper(['form']);
            return view('Templates/Header')
            . view('Visiteur/vue_CreerUnCompte', $data)
            . view('Templates/Footer');
        }

        $donneesAInserer = array(
            'NOM' => $this->request->getPost('txtNom'),
            'PRENOM' => $this->request->getPost('txtPrenom'),
            'ADRESSE' => $this->request->getPost('txtAdresse'),
            'CODEPOSTAL' => $this->request->getPost('txtCodePostal'),
            'VILLE' => $this->request->getPost('txtVille'),
            'TELEPHONEFIXE' => $this->request->getPost('txtFixe'),
            'TELEPHONEMOBILE' => $this->request->getPost('txtMobile'),
            'MEL' => $this->request->getPost('txtMel'),
            'MOTDEPASSE' => $this->request->getPost('txtMdP'),
        ); 
        $modeleClient = new ModeleClient();
        $donnees['Prenom'] = $this->request->getPost('txtPrenom');
        $donnees['clientAjoute'] = $modeleClient->insert($donneesAInserer, false);
        
        return view('Templates/Header')
            .view('Visiteur/vue_RapportCompteCree', $donnees)
            .view('Templates/Footer');
    }

    public function seDeconnecter()
    {
        session()->destroy();
        return redirect()->to('seconnecter');
    }

    public function voirLesLiaisons()
    {
        helper(['form']);
        $session = session();

        $modeleSecteur = new ModeleSecteur();
        $donnees['lesSecteurs'] = $modeleSecteur->getAllSecteur();
        $donnees['TitreDeLaPage'] = 'Les liaisons par secteur';
        
        if (!$this->request->is('post')) {
            return view('Templates/Header')
                .view('Visiteur/vue_LiaisonsParSecteur', $donnees)
                .view('Templates/Footer');
        }
        
        
    }
}

?>