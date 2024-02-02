#include <stdio.h>
#include <stdlib.h>
#define Max 30
/* run this program using the console pauser or add your own getch, system("pause") or input loop */
struct Kundendaten
{
  int   Artikelnummer;
  char  Artikelbezeichnung[12];
  float Artikelpreis;
  int  Artikelbestand;
};
 
void loescheTastaturpuffer()
{
  int c;
  while( ((c = getchar()) != EOF) && (c != '\n') )
     ;
}

void setzeDatensatz (struct Kundendaten *k, int eingabe, int *datenGesetzt, int deleto)
{
	int sizeName = 0 ; /* Groesse der Felder */
	char copy[] = "";
	sizeName = sizeof(k->Artikelbezeichnung);

  	if(deleto == 1)
	{	
		printf ("Eintrag wird geloescht\n\n", eingabe);
   		k->Artikelnummer = 0;
   		k->Artikelpreis = 0;
   		k->Artikelbestand = 0;
   		strcpy(k->Artikelbezeichnung, copy);
   		
   		deleto = 0;
	}
	else
	{
	printf ("Setze Eintrag %d:\n\n", eingabe);
	printf ("Artikelnummer: ");
	scanf ("%d", &k->Artikelnummer);
   	loescheTastaturpuffer();   /* sonst bleibt \n im Buffer */
 
   	printf ("Artikelbezeichnung: ");
   	fgets (k->Artikelbezeichnung, sizeName-1, stdin);
 
   	printf ("Artikelpreis: ");
   	scanf ("%f", &k->Artikelpreis);
   	loescheTastaturpuffer();   /* sonst bleibt \n im Buffer */
   
   	printf ("Artikelbestand: ");
   	scanf ("%d", &k->Artikelbestand);
   	loescheTastaturpuffer();   /* sonst bleibt \n im Buffer */
   
 
      /* Null-Terminierung und \n entfernen */
   	k->Artikelbezeichnung[strlen(k->Artikelbezeichnung)-1] = '\0'; 
 
   	*datenGesetzt = 1;   /* daran wird erkannt, dass schon Daten eingegeben wurden */
   	
   	if(sorter == 1)
   	int sort[4];
	int wert;
	int copy;
	int durchbruch;
	int Reihenfolge;
	int absterst;
	
	printf("Gib deine Zahlen ein\n");
	for(wert = 0; wert < 10; wert++)
	{
	scanf("%i", &sort[wert]);
	fflush(stdin);
	}
	
	printf("1 = Absteigend 0 = Aufsteigend\n");
	scanf("%i", &Reihenfolge);
	fflush(stdin);
	
	switch(Reihenfolge)
	{
		case 1:
		{
	while(durchbruch < 5){
	
	for(wert = 0; wert < 4; wert++)
	{
	absterst = sort[wert];
	if(sort[wert] < sort[wert + 1])
	{
	copy = sort[wert + 1];
	sort[wert + 1 ]= sort[wert];
	sort[wert] = copy;
	}
    }
    durchbruch++;
	}
    for(wert = 0; wert < 4; wert++)
	{
	printf("Geordnet: %i \n", sort[wert]);
	}
	break;
	}
	case 0:
		{
	while(durchbruch < 5){
	
	for(wert = 0; wert < 4; wert++)
	{
	if(sort[wert] > sort[wert + 1])
	{
	copy = sort[wert + 1];
	sort[wert + 1 ]= sort[wert];
	sort[wert] = copy;
	}
    }
    durchbruch++;
	}
    for(wert = 0; wert < 4; wert++)
	{
	printf("Geordnet: %i \n", sort[wert]);
	}
	}
	break;
	}	
	return 0;
	}
   	
   	
   	
	}
}
 
int main()
{	
	FILE *fp; /*Hier wird auf die Textdatei verwiesen*/
	
	fp = fopen("Lagersystem.txt", "w+"); /*Textdatei wird erstellt mit passendem modi w+*/
	
	
	struct Kundendaten kunden[10]; /*Kundendatenstruktur angelegt*/
	unsigned int eingabe = 0,
   	             	  i = 0,
                datenGesetzt[10] = { 0, 0, 0, 0, 0, 0, 0, 0, 0, 0 };
	char vergleichbezeichnung[12];
	int vergleichartikelnummer;
	int change;
	int take;
		for(i = 0; i < 10; i++)
		{
			datenGesetzt[i];
			fscanf (fp, "Eintrag %i:\n\n", &take);
 			fscanf (fp, "Artikelnummer: %d\n", &kunden[i].Artikelnummer);
    		fscanf (fp, "Artikelbezeichnung: %s\n", &kunden[i].Artikelbezeichnung);
   			fscanf (fp, "Artikelpreis: %.2f\n", &kunden[i].Artikelpreis);
    		fscanf (fp, "Artikelbestand: %i\n\n", &kunden[i].Artikelbestand);
    		
    		printf("%i\n", take);
    		
    	
		}
 	while(1)
	{	
		int datensatz = 0;		
		int delet = 0;
		int beihilfe = 0;
	
     	printf ("\nMenuesteuerung:\n1-10 = Aufruf einzelner Auftraege oder hinzufuegen eines neuen Datensatzes;\n0 = Programmende; 11 = Aufruf aller Eintraege; 12 = Suchfunktion;\n13 = Aendere Datensatz; 14 = Loesche Datensatz; 15 = Loesche alle Eintraege;\n17 = Speichern\n");
     	scanf ("%u", &eingabe);
 		printf("\n");
 		
 		
      	if (eingabe == 0)
     	{
     		fclose(fp);
        	return 0;   /* Programmende */
	 	}
	 	else if(eingabe == 17)
	 	{
	 	for(i = 0; i < 10; i++)
 	  	{	
			if(datenGesetzt[i] == 0)
 	  		{
 	  			continue;
			}
			else
			{
				fprintf (fp, "Eintrag %i:\n\n", i+1);
 	  		 	fprintf (fp, "Artikelnummer: %d\n", kunden[i].Artikelnummer);
         		fprintf (fp, "Artikelbezeichnung: %s\n", kunden[i].Artikelbezeichnung);
         		fprintf (fp, "Artikelpreis: %.2f\n", kunden[i].Artikelpreis);
         		fprintf (fp, "Artikelbestand: %i\n\n", kunden[i].Artikelbestand);
			}	
		}
		}	
	 	else if(eingabe == 13)
      	{
      		printf("Welcher Datensatz soll geaendert werden?");
      		scanf("%i", &eingabe);
      		setzeDatensatz(&kunden[i], eingabe, &datenGesetzt[i], delet);
      		continue;
	  	}
	  	else if(eingabe == 14)
      	{
      		printf("Welcher Datensatz soll geloescht werden?");
      		scanf("%i", &eingabe);
       		delet = 1;
      		setzeDatensatz(&kunden[i], eingabe, &datenGesetzt[i], delet);
      		datenGesetzt[i] = 0;
      		continue;
	  	}
	  	else if(eingabe == 11)
 	  	{ 
 	  	
 	  	
 	  		for(i = 0; i < 10; i++)
 	  		{	
				if(datenGesetzt[i] == 0)
 	  			{	
 	  				datensatz++;
 	  				if(datensatz == 10)
 	  				{
 	  					printf("Es existiert kein Datensatz\n\n");
					}
				}
			}
			if(datensatz > 0)
			{
				for(i = 0; i < 10; i++)
 	  			{	
					if(datenGesetzt[i] == 0)
 	  			{	
 	  				continue;
				}
				else
				{
					printf ("Eintrag %i:\n\n", i+1);
 	  		 		printf ("Artikelnummer: %d\n", kunden[i].Artikelnummer);
         			printf ("Artikelbezeichnung: %s\n", kunden[i].Artikelbezeichnung);
         			printf ("Artikelpreis: %.2f\n", kunden[i].Artikelpreis);
         			printf ("Artikelbestand: %i\n\n", kunden[i].Artikelbestand);
				}
	  			}
	  		}
	 	}
	 	
	  	else if(eingabe == 15)
 	  	{
 	  	for(i = 0; i < 10; i++)
 	  	{	
			if(datenGesetzt[i] == 0)
 	  		{
 	  			continue;
			}
			else
			{
      		delet = 1;
      		setzeDatensatz(&kunden[i], eingabe, &datenGesetzt[i], delet);
      		datenGesetzt[i] = 0;
      		continue;
			}
	  	}
		}
	  	else if(eingabe == 12)
	  	{	
	  		printf("0 = Artikelbezeichnung suchen; 1 = Artikelnummer suchen\n");
	  		scanf("%i", &change);
	  	
	  	switch(change)
	  	{
	  		case 0:
	  		{
	  			printf("Geben Sie die Artikelbezeichnung ein\n");
	  			scanf("%s", &vergleichbezeichnung);
	  			
	  			for(i = 0; i < 10; i++)
	  			{
	  				if(strcmp(vergleichbezeichnung, kunden[i].Artikelbezeichnung) == 0)
	  				{
	  					printf("Sie haben Ihren Eintrag gefunden\n\n");
						printf ("Eintrag %i:\n\n", i+1);
 	  			 		printf ("Artikelnummer: %d\n", kunden[i].Artikelnummer);
         				printf ("Artikelbezeichnung: %s\n", kunden[i].Artikelbezeichnung);
         				printf ("Artikelpreis: %.2f\n", kunden[i].Artikelpreis);
         				printf ("Artikelbestand: %i\n\n", kunden[i].Artikelbestand);
         				
         				beihilfe = 1; //Ist für den unteren Dialog gedacht.
					}
	  			}
	  			if(beihilfe == 0)
	  			{
					printf("Nichts gefunden");	
				}
				break;
			}
			case 1:
			{
				
				printf("Geben Sie die Artikelnummer ein\n");
	  			scanf("%i", &vergleichartikelnummer);
	  			for(i = 0; i < 10; i++)
	  			{
	  				if(vergleichartikelnummer == kunden[i].Artikelnummer)
	  				{
	  					printf("Sie haben Ihren Eintrag gefunden\n\n");
						printf ("Eintrag %i:\n\n", i+1);
 	  			 		printf ("Artikelnummer: %d\n", kunden[i].Artikelnummer);
         				printf ("Artikelbezeichnung: %s\n", kunden[i].Artikelbezeichnung);
         				printf ("Artikelpreis: %.2f\n", kunden[i].Artikelpreis);
         				printf ("Artikelbestand: %i\n\n", kunden[i].Artikelbestand);
         				
         				beihilfe = 1; //Ist für den unteren Dialog gedacht.
					}
	  			}
	  			if(beihilfe == 0)
	  			{
					printf("Nichts gefunden");	
				}
			}
			break;
		  }
		  continue;	
		}
		else if (eingabe > 10)
     	{
        	continue;   /* sonst wird der zulaessige Bereich ueberschritten */
 	  	}

      	i = eingabe -1;   /* Array-Index geht von 0 bis 99, Benutzereingabe aber von 1 bis 100 */
 
         /* wenn noch keine Daten eingegeben wurden, einlesen */
      	if(datenGesetzt[i] == 0 && eingabe < 11)   /* false */
      	{
        	setzeDatensatz (&kunden[i], eingabe, &datenGesetzt[i], delet);
      	}
    	else if(eingabe < 11)  /* sonst Daten anzeigen */
		{   	
        	printf ("Artikelnummer: %d\n", kunden[i].Artikelnummer);
        	printf ("Artikelbezeichnung: %s\n", kunden[i].Artikelbezeichnung);
        	printf ("Artikelpreis: %.2f\n", kunden[i].Artikelpreis);
        	printf ("Artikelbestand: %i\n\n", kunden[i].Artikelbestand);
   		}
	}
   return 0;
}
