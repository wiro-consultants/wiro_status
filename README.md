Dokumentation
=============

Funktion
--------

Mit der wiro_status Extension lässt sich über einen API Call der Status von Statuspal.io abfragen. Sobald Störungen auf
der Statuspal.io Seite vorhanden sind, wird der Status mit der Anzahl der Störungen als Badge dargestellt. Über einen
Button lassen sich weitere Informationen zu den Störungen (Titel, Zeitpunkt, betroffene Services, Status)
innerhalb eines Modals anzeigen.



Konfiguration
-------------

### Installation

Das WiRo Status TypoScript Template wird im Template Modul im Backend des TYPO3 Systems inkludiert. Danach lässt sich
die Statusanzeige als Inhaltselement (Plugin) einfügen.

### Templates

Um das Layout, die Templates und Partials zu überschreiben, wird ein neuer Pfad im TypoScript gesetzt. Dazu werden die
entsprechenden Konstanten *plugin.tx_wirostatus.view.templateRootPath* etc. überschrieben.

### API

Die URL für den API Call wird im TypoScript als Konstante (*plugin.tx_wirostatus.settings.apiUrl*) gesetzt. Der Aufbau
sieht wie folgt aus:
https://statuspal.io/api/v1/status_pages/[SUBDOMAIN]/status

### Link zur Statusseite

Der Link zur Statusseite wird im TypoScript als Konstante (*plugin.tx_wirostatus.settings.statusLink*) angegeben.