<?php
    namespace App\Controllers;
    use App\Models\ModeleClient;
    use App\Models\ModeleAdministrateur;
    use App\Models\ModeleSecteur;
    use App\Models\ModeleTraversee;
    use App\Models\ModeleLiaison;
    helper(['assets']);

    class Client extends BaseController
    {
        
    public function modifierMonCompte()
    {
        helper(['form']);
        $session = session();

        $data['TitreDeLaPage'] = 'Modifier mon compte';

        $modeleClient = new ModeleClient();
        $idClient = $session->get('NOCLIENT');
        $client = $modeleClient->find($idClient);

        $data['client'] = $client;

        if (!$this->request->is('post')) {
            return view('Templates/Header', $data)
            . view('Client/vue_ModifierMonCompte', $data)
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
            'txtMel' => 'required|max_length[254]|valid_email',
            'txtMdP' => 'permit_empty|min_length[8]|max_length[30]',
        ];

        if (!$this->validate($reglesValidation)) {
            $data['TitreDeLaPage'] = "Saisie formulaire incorrecte";
            return view('Templates/Header', $data)
            . view('Client/vue_ModifierMonCompte', $data)
            . view('Templates/Footer');
        }

        $donneesAInserer = [
            'NOM' => $this->request->getPost('txtNom'),
            'PRENOM' => $this->request->getPost('txtPrenom'),
            'ADRESSE' => $this->request->getPost('txtAdresse'),
            'CODEPOSTAL' => $this->request->getPost('txtCodePostal'),
            'VILLE' => $this->request->getPost('txtVille'),
            'TELEPHONEFIXE' => $this->request->getPost('txtFixe'),
            'TELEPHONEMOBILE' => $this->request->getPost('txtMobile'),
            'MEL' => $this->request->getPost('txtMel'),
        ];

        if ($this->request->getPost('txtMdP')) {
            $donneesAInserer['MOTDEPASSE'] = $this->request->getPost('txtMdP');
        }

        $modeleClient->update($idClient, $donneesAInserer);

        return redirect()->to('accueil');
    }

    public function reserver($noTraversee)
    {
        $modeleLiaison = new ModeleLiaison();
        helper(['form']);
        $session = session();

        $noLiaison = $session->get('noLiaisonSaisie');
        $data['ports'] = $modeleLiaison->getPortsLiaison($noLiaison);
        $data['date'] = $session->get('dateRetour');
        $data['heure'] = $session->get('heure');
        $data['traversee'] = $noTraversee;
        $data['TitreDeLaPage'] = 'Réservation';
        return view('Templates/Header', $data)
            . view('Client/vue_Reserver', $data)
            . view('Templates/Footer');
    }

    public function afficherReservations()
    {
        helper(['form']);
        $session = session();

        $data['TitreDeLaPage'] = 'Mes réservations';
        return view('Templates/Header', $data)
            . view('Client/vue_AfficherReservations', $data)
            . view('Templates/Footer');
    }

        public function seDeconnecter()
        {
            session()->destroy();
            return redirect()->to('seconnecter');
        }
    }
?>