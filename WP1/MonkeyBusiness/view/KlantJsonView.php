<?php

namespace view;

class KlantJsonView implements View
{
    public function show(array $data)
    {
        header('Content-Type: application/json');

        if (isset($data['klant'])) {
            $person = $data['klant'];
            echo json_encode(['id' => $person->getId(), 'naam' => $person->getNaam(), 'voornaam' => $person->getVoornaam(), 'postcode' => $person->getPostcode(),
                'gemeente' => $person->getGemeente(), 'straat' => $person->getStraat(), 'huisnummer' => $person->getHuisnummer(), 'telefoonnummer' => $person->getTelefoonnummer(),
                'mail' => $person->getMail()]);
        } else {
            echo '{}';
        }
    }
}
