# PHP Hotel

Pagina in cui vengono visualizzati i nomi e le caratteristiche di alcuni hotel.
E' possibile filtrare tra gli hotel con parcheggio o meno scegliendo il valore 'Yes' e 'No' vicino alla voce Parking e tramite votazione.
Cliccando sul bottone Filtra viene riaggiornata la pagina mostrando solo gli hotel che soddisfano le caratteristiche dei filtri.

A livello di codice, vengono salvati i valori dei campi di 'filtraggio'(parcheggio e voto) in 2 variabili distinte.
Si utilizza una table le cui righe vengono gestite da un foreach che scorre gli hotel nella variabile hotels.
Per ogni hotel si controlla il valore riferito alla chiave 'parking' e si confronta con il valore scelto dall'utente per scegliere se l'hotel va mostrato in tabella.
Allo stesso modo si confrontano il valore riferito a 'vote' di ciascun hotel con quelle scelto dall'utente per filtrare ulteriormente gli hotel che soddisfano la condizione.
