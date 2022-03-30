<?php

require '../vendor/autoload.php';

use App\Models\Contact as Contact;


$contact = Contact::load(2);


// ?je null safe operator, nevyhodi chybu, pokud $contact neni instance ale null
echo $contact?->Name . '<br />';

$contactsArray = Contact::loadAll();

foreach($contactsArray as $contact) {
    echo $contact->Name . '<br />';
}

// tvorba noveho kontaktu + ulozeni
$novy = new Contact();
$novy->Name = 'Radek';
$novy->Surname = 'Vala';
$novy->Email = 'example@example.com';
$novy->save();
echo '<p>Kontakt '. $novy->name . ' byl ulozen</p>';






