# Changelog
All notable changes to this project will be documented in this file.

---

## 2.0.1.0 (2019-10-21)
### Changed
- Mails k�nnen auch Dreingabeartikel regenerieren und darstellen
- weitere Mailinformationen werden f�r Mailumleitung ge�ndert
### Fixed
- verhindert Thankyou Redirect, wenn keine Order geladen wurde
- Debugging von Mails mit Dreingabebestellungen l�scht diese Discounts in der gesamten Bestellung

---

## 2.0.0.0 (2018-02-23)
### Added
- verf�gbar f�r OXID 6
- Installation via Composer

---

## 1.2.0.0 (2017-11-21)
### Added
- Mail-Anzeige fordert zus�tzlich Authentfikation mit einem Shopadmin-Konto
- Seitenencoding definiert
### Changed
- Dokumentation erg�nzt

---

## 1.1.0.0 (2017-05-31)
### Added
- Mailversand �bers Shopframework wird blockiert oder
- Mails werden an alternative Mailadresse umgeleitet

---

## 1.0.0.0 (2015-12-16)
### Added
- unterbindet das L�schen des Warenkorbs nach Bestellabschluss
- Thankyou ist ohne Bestellabschluss aufrufbar (unter Angabe der Bestellnummer auch f�r eine bestimmte Bestellung)
- Bestellbest�tigungsmails und (sofern D3-Modul installiert) Anfragebest�tigungsmails sind im Browser darstellbar (unter Angabe der Bestellnummer auch f�r eine bestimmte Bestellung)
