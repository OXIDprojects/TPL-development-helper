# TPL Development Helper
### Entwicklungswerkzeug zur Kontrolle schwer zug�nglicher Shopinhalte

Diese Tool soll bei t�glichen Entwicklungsaufgaben im OXID eShop helfen, die (systembedingt) vom Shopsystem erschwert werden.

* Mailversand (�bers Shopframework) �bers Shopframework wird blockiert __oder__
* Mails (�bers Shopframework) werden an alternative Mailadresse umgeleitet
    (Das Tool setzt direkt an der oxemail::_sendMail()-Methode an und kann damit __jeden__ Mailversand kontrollieren, der �bers Framework l�uft. Man muss nicht X verschiedene Module �berwachen und hat auch Kontrolle �ber Mailerweiterungen, die keinen Stage-Einsatz vorsehen.)
* unterbindet das L�schen des Warenkorbs nach Bestellabschluss
* Thankyou-Seite ist auch ohne Bestellabschluss aufrufbar (unter Angabe der Bestellnummer auch f�r eine bestimmte Bestellung)
* Bestellbest�tigungsmails und sind im Browser darstellbar (unter Angabe der Bestellnummer auch f�r eine bestimmte Bestellung)

__Da hiermit gezielt Mails der Shopbestellungen angezeigt werden k�nnen, ist das Modul mit �u�erster Vorsicht zu verwenden. Die H�rden f�r die Anzeige der Mails sind daher absichtlich sehr hoch gesetzt. Vor der Verwendung sind Einstellungen zu �ndern. Denken Sie unbedingt daran, diese Einstellungen im Anschluss wieder zur�ckzusetzen. Sonst sind Kunden- und Bestelldaten frei abrufbar. Wir �bernehmen f�r daraus resultierenden Sch�den keine Haftung.__

Um unser Tool verwenden zu k�nnen, folgen Sie bitte diesen Schritten:

1. Produktivmodus entfernen

   ![Adminbereich -> Stammdaten -> Grundeinstellungen -> Haken bei Produktivmodus entfernen](step1.jpg "Produktivmodus entfernen")

2. Modul aktivieren

   ![Adminbereich -> Erweiterungen -> Module -> TPL Development Tool -> Aktivieren](step2.jpg "Modul aktivieren")
   
3. In den Einstellungen die gew�nschten Funktionen freischalten

   ![Adminbereich -> Erweiterungen -> Module -> TPL Development Tool -> Einstell.](step3.jpg "gew�nschte Funktionen freischalten")
   
4. �ber die Links im Tab �Stamm� k�nnen Sie die betreffenden Seiten aufrufen. Vor der Darstellung wird ein Benutzername und Passwort abgefragt. Hierf�r verwenden Sie die Anmeldedaten des Abminbereichs Ihres Shops.

5. An den E-Mail- und Thankyou-Links gibt es einen leeren Parameter, den Sie bei Bedarf mit einer Bestellnummer f�llen k�nnen. Dann wird statt der letzten Bestellung ganz gezielt eine andere Bestellung zur Darstellung verwendet.

6. Beachten Sie unbedingt, dass Sie nach der Verwendung unbedingt das Modul wieder deaktivieren und den Produktivmodus wieder anschalten.

Ber�cksichtigen Sie bei der Darstellung der E-Mails bitte, dass die Mailprogramme diese m�glicherweise anders darstellen, als der Browser dies tut. Daher kann die Darstellung im Browser nur ein Anhaltspunkt sein.