#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int equals(char eins[], char zwei[]) {
	int i;
	
	if(strlen(eins) != strlen(zwei)) {
		return 9;
	}
	
	for(i = 0; i < strlen(eins) && i < strlen(zwei); i++)
	{
		if(eins[i] != zwei[i]) {
			return 9;
		}
	}
	
	return 0;
}


int main(int argc, char *argv[]) {
	char old_pw[32] = "", new_pw[32] = "", new_pw2[32] = "", saved_pw[32] = "password123", c;
	int contDig = 1, contGro = 1, contKln = 1, contSon = 1, counter = 0, i = 0, x = 0, y = 0;
	
	do {
		for(x = 0; x < sizeof old_pw; x++) {
			old_pw[x] = "";
		}
		printf("Bitte geben Sie Ihr Passwort ein:\n");
		fgets(old_pw, 32, stdin);
		
		
		fflush(stdin);	
		old_pw[strlen(old_pw)-1] = '\0';

		if(equals(old_pw, saved_pw) != 0) {
			printf("\nDas Passwort ist falsch. (%d)\n", equals(old_pw, saved_pw));
			counter++;
			system("pause");
		}
		system("cls");
	} while(equals(old_pw, saved_pw) != 0 && counter < 3);
	
	if(counter >= 3){
		printf("Zu viele Falscheingaben!\n");
		return 1;
	}
	
	printf("Das Passwort ist richtig.\n\n");
	
	printf("Bitte erstellen Sie ein neues Passwort.\n(Es muss Gross- und Kleinbuchstaben und Zahlen enthalten\nund mindestens 8 Zeichen lang sein.)\n\n");
	
	do {
		for(x = 0; x < sizeof new_pw; x++) {
			new_pw[x] = "";
		}
		for(x = 0; x < sizeof new_pw2; x++) {
			new_pw2[x] = "";
		}
		printf("Bitte geben Sie Ihr neues Passwort ein:\n");
		fgets(new_pw, 32, stdin);
		
		fflush(stdin);
		new_pw[strlen(new_pw)-1] = '\0';
		
		printf("\n\nBitte widerholen Sie Ihr neues Passwort:\n");
		fgets(new_pw, 32, stdin);
		
		y = 0;
		while((c = getch()) != 13) {
			if(c != 8) {
				new_pw2[y] = c;
				printf("*");
			} 			
			y++;
		}
				
		if(equals(new_pw, new_pw2) != 0) {
			system("cls");
			printf("Die Passwoerter stimmen nicht ueberein.\n\n");
			system("pause");
		} else {
			for(i = 0; i < strlen(new_pw); i++)
			{
				if(isdigit(new_pw[i])) {
					contDig = 0;
				}
				if(isupper(new_pw[i])) {
					contGro = 0;
				}
				if(islower(new_pw[i])) {
					contKln = 0;
				}
				if(islower(new_pw[i]) == 0 && isupper(new_pw[i]) == 0 && isdigit(new_pw[i]) == 0) {
					contSon = 0;
				}
			}
			if(strcmp(new_pw, saved_pw) == 0 || strlen(new_pw) < 8 || contDig == 1 || contGro == 1 || contKln == 1 || contSon == 1) {
			system("cls");
			printf("Das Passwort entspricht nicht den Anforderungen.\n\n");
			system("pause");
			}
		}
		system("cls");
	} while(equals(new_pw, new_pw2) != 0 || equals(new_pw, saved_pw) == 0 || strlen(new_pw) < 8 || contDig == 1 || contGro == 1 || contKln == 1 || contSon == 1);
	
	printf("Das Passwort wurde geaendert.\n\n");
	
	return 0;
}

