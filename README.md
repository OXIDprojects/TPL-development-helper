TPL Development Helper
======================

Das Tool soll bei t�glichen Entwicklungsaufgaben im OXID eShop helfen, die (systembedingt) vom Shopsystem erschwert werden.

* Mailversand �bers Shopframework wird blockiert __oder__
* Mails werden an alternative Mailadresse umgeleitet

- unterbindet das L�schen des Warenkorbs nach Bestellabschluss
- Thankyou-Seite ist auch ohne Bestellabschluss aufrufbar (unter Angabe der Bestellnummer auch f�r eine bestimmte Bestellung)
- Bestellbest�tigungsmails und sind im Browser darstellbar (unter Angabe der Bestellnummer auch f�r eine bestimmte Bestellung)

Hinweise zur Benutzung und Konfiguration sind in der Metadata-Modulbeschreibung enthalten.
Diese k�nnen nach Installation im Backend des OXID-Shops unter "Erweiterungen -> Module" eingesehen werden.

Alle Optionen sind einzeln aktivierbar. Der Shop darf nicht im Produktivmodus laufen.

__Da das Modul einige Sicherheitsmechanismen des Shops deaktiviert, ist bei einem Einsatz in von extern erreichbaren Systemen besondere Vorsicht n�tig!__