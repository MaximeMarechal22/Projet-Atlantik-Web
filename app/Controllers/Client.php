<?php
    namespace App\Controllers;
    use App\Models\ModeleClient;
    use App\Models\ModeleAdministrateur;
    use App\Models\ModeleSecteur;
    helper(['assets']);
    class Client extends BaseController
    {
            

    public function modifierMonCompte()
        {
            helper(['form']);
            $session = session();
    
            $data['TitreDeLaPage'] = 'Modifier mon compte';
            if (!$this->request->is('post')) {
                return view('Templates/Header', $data)
                . view('Client/vue_ModifierMonCompte')
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
            $donnees['clientModifie'] = $modeleClient->update($donneesAInserer, false);
        }

        public function seDeconnecter()
        {
            session()->destroy();
            return redirect()->to('seconnecter');
        }
    }
?>