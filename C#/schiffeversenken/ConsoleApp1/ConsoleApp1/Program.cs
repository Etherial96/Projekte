using System;

namespace ConsoleApp1
{
    class Program
    {
        static void Main(string[] args)
        {
        int einlesenx;
          //brettinfo dient der schönheit des Brettfeldes
        int brettinfox;
        int brettinfo = 0;
        int einleseny;
        int zaehlerx;
        int zaehlery;
        int schiffer;
        int wagesenk;
        int brett[10][10] = { {} };
	    //Das brett wird von v d z kopiert und jedes boot hat jeweils nur 1 boot in seinem Spielfeld
	    int freigabe3 = 0;
        int vboot1[10][10] = { {} };
	    int vboot1v;
        int vboot2[10][10] = { {} };
	    int vboot2v;

        int freigabe = 0;
        int zboot1[10][10] = { {} };
	    int zboot1z;
        int zboot2[10][10] = { {} };										
	    int zboot2z;
        int zboot3[10][10] = { {} };
	    int zboot3z;

        int freigabe2 = 0;
        int dboot1[10][10] = { {} };
	    int dboot1d;
        int dboot2[10][10] = { {} };
	    int dboot2d;
        int dboot3[10][10] = { {} };
	    int dboot3d;

        int vboot = 0;
        int dboot = 0;
        int zboot = 0;
        //Geht mit denen aus der Schleife.
        int vbootx = 2;
        int dbootx = 3;
        int zbootx = 3;
        int schleife = 0;

        int bootaufpasser;

        int zufallsgenerator;


    Console.WriteLine("Sie haben das Spiel gestartet");
	for(brettinfox = 0; brettinfox <= 9; brettinfox++)
	{

        printf("%3i", brettinfox);
    }

    printf("\n    ______________________________");


    printf("\n\n");
	for(zaehlerx = 0; zaehlerx< 10; zaehlerx++)
	{	
		if(brettinfo< 10)
		{

        printf(" %i |", brettinfo);
    brettinfo++;
		}
		else
		{

            printf("%i |", brettinfo);
		}
		
		for(zaehlery = 0; zaehlery <= 9; zaehlery++)
		{

            printf("%3i", brett[zaehlerx][zaehlery]);
		}

        printf("\n");
	}

        printf("\n");


        printf("Reset der Boote, Eingabe = 0\n\n");

        printf("Boote zufaellig verteilen = 7\n\n");
		
		while(schleife == 0)
		{	
		
		if((vbootx + zbootx + dbootx )== 0)
		{
			schleife++;
		}

            printf("Waehle ein Boot aus \n 4er Boot = 4\n 3er Boot = 3\n 2er Boot = 2\n\n");

            printf("Anzahl zum noch verteilen an Boote \n 4er Boot noch %i\n 3er Boot noch %i\n 2er Boot noch %i\n", vbootx, dbootx, zbootx);



    scanf("%i", &schiffer);
	if(schiffer == 7)
	{
		zufallsgenerator = 7;
	}
	switch(schiffer)
	{
		
		case 2:
		{			
					if(zbootx > 0)
					{
						zbootx--;
									
						if(freigabe == 0)
						{
							zboot2z = 1;
							zboot3z = 1;
						}
					
						if(freigabe == 1)
						{
							zboot2z = 0;		
						}
						if(freigabe == 2)
						{
							zboot3z = 0;
						}


                printf("\nSoll das Schiff Senkrecht = 1 oder Wagerecht = 2 positioniert werden\n\n");

                scanf("%i", &wagesenk);
				if(wagesenk< 3 || wagesenk != 0)
				{					
				switch(wagesenk)
				{
					case 1:
					{

                        printf("\nGeben Sie die Koordinaten ein um das Schiff hinzustellen\n Erst Y , dann X\n");

                        scanf("%i %i", &einleseny, &einlesenx);
						if(einleseny< 9 && einlesenx< 10 )
						{
						zaehlerx = einlesenx;
						zaehlery = einleseny;
							
						if(zaehlerx > 10 || zaehlery > 9)
							{

                                printf("Das Boot liegt nicht im Feld \n\n");
zbootx++;							
							}			
							
						if((brett[zaehlery][zaehlerx] == 1 || brett[zaehlery + 1][zaehlerx] == 1) || (zaehlerx > 10 || zaehlery > 9
							|| brett[zaehlery][zaehlerx + 1] || brett[zaehlery + 1][zaehlerx + 1]
							|| brett[zaehlery][zaehlerx - 1] || brett[zaehlery + 1][zaehlerx - 1]
							|| brett[zaehlery - 1][zaehlerx]	 || brett[zaehlery + 2][zaehlerx] == 1))
						{	
							
							if(brett[zaehlery][zaehlerx + 1] || brett[zaehlery + 1][zaehlerx + 1]
								|| brett[zaehlery][zaehlerx - 1] || brett[zaehlery + 1][zaehlerx - 1]
								|| brett[zaehlery - 1][zaehlerx]	|| brett[zaehlery + 2][zaehlerx] == 1)
							{

                                printf("Die Boote duerfen nicht nebeneinander liegen\n");
zbootx++;
							}
							if(zaehlerx > 10 || zaehlery > 9 )
							{

                                printf("Das Boot liegt nicht im Feld \n\n");
								if(zbootx< 4)
								{
									zbootx++;
								}								
							}	
							
							if(brett[zaehlery][zaehlerx] == 1 || brett[zaehlery + 1][zaehlerx] == 1)
							{

                            printf("Deine Boote ueberschneiden sich\nVerleg das Boot neu\n");
							if(zbootx< 4)
							{
								zbootx++;
							}
					 		}			
						}
																								 
						else if(zaehlery< 9 && brett[zaehlery][zaehlerx] || brett[zaehlery + 1][zaehlerx] 
											 || brett[zaehlery][zaehlerx + 1] || brett[zaehlery + 1][zaehlerx + 1]
											 || brett[zaehlery][zaehlerx - 1] || brett[zaehlery + 1][zaehlerx - 1]
											 || brett[zaehlery - 1][zaehlerx]	 || brett[zaehlery + 2][zaehlerx] == 0)
						{
						for(zboot = 0; zboot< 2; zboot++)
						{
	 					//Zeile 117 kann eventuell gelöscht werden. Da man theoretisch am Ende erst alles aufs Spielfeld setzen kann.
						 	brett[zaehlery][zaehlerx] = 1;
	 						
	 						
	 						if(zboot1z == 0)
	 						{
								zboot1[zaehlery][zaehlerx] = 1;
								if(zboot > 0)
								{
								zboot1z = 1;
								freigabe++;
								}
							}
							if(zboot2z == 0)
	 						{
								zboot2[zaehlery][zaehlerx] = 1;
								if(zboot > 0)
								{
								zboot2z = 1;
								freigabe++;
								}
							}
							if(zboot3z == 0)
	 						{
								zboot3[zaehlery][zaehlerx] = 1;
								if(zboot > 0)
								{
								zboot3z = 1;
								}
							}
							
							zaehlery++;
						}
						}
					
						}
						else
						{

                            printf("Das Boot liegt nicht im Feld \n\n");
zbootx++;
						}
						
					}
						break;
					
 
					case 2:
					{

                        printf("\nGeben Sie die Koordinaten ein um das Schiff hinzustellen\n Erst Y , dann X\n");

                        scanf("%i %i", &einleseny, &einlesenx);
						if(einleseny< 10 && einlesenx< 9 )
						{
						zaehlerx = einlesenx;
						zaehlery = einleseny;
															
						if((brett[zaehlery][zaehlerx] == 1 || brett[zaehlery][zaehlerx + 1] == 1) || (zaehlerx > 9 || zaehlery > 10))
						{	
							if(zaehlerx > 9 || zaehlery > 10 )
							{

                                printf("Das Boot liegt nicht im Feld \n\n");
zbootx++;						
							}	
							
							if(brett[zaehlery][zaehlerx] == 1 || brett[zaehlery][zaehlerx + 1] == 1)
							{

                            printf("Deine Boote ueberschneiden sich\nVerleg das Boot neu\n");
							if(zbootx< 4)
							{
								zbootx++;
							}
					 		}			
						}
						
						
																		 
						else if(zaehlerx< 9 && brett[zaehlery][zaehlerx] || brett[zaehlery][zaehlerx + 1] == 0)
						{
							
						for(zboot = 0; zboot< 2; zboot++)
						{
	 						brett[zaehlery][zaehlerx] = 1;
	 						
	 						if(zboot1z == 0)
	 						{
								zboot1[zaehlery][zaehlerx] = 1;
								if(zboot > 0)
								{
								zboot1z = 1;
								freigabe++;
								}
							}
							if(zboot2z == 0)
	 						{
								zboot2[zaehlery][zaehlerx] = 1;
								if(zboot > 0)
								{
								zboot2z = 1;
								freigabe++;
								}
							}
							if(zboot3z == 0)
	 						{
								zboot3[zaehlery][zaehlerx] = 1;
								if(zboot > 0)
								{
								zboot3z = 1;
								}
						 } 
	 						
					zaehlerx++;
					}
				}
							}
							else
						{

                            printf("Das Boot liegt nicht im Feld \n\n");
zbootx++;
						}
						}
					}
				}
				if(wagesenk > 3 || wagesenk == 0)
				{

                    printf("Sie haben sich vertippt\n");
zbootx++;
				}
			}
		}
		
		break;
		
		case 3:
		{		
			if(dbootx > 0)
			{
				dbootx--;


                printf("\nSoll das Schiff Senkrecht = 1 oder Wagerecht = 2 positioniert werden\n\n");

                scanf("%i", &wagesenk);
				if(wagesenk< 3 || wagesenk != 0)
				{
				if(freigabe2 == 0)
					{
						dboot2d = 1;
						dboot3d = 1;
					}
					
					if(freigabe2 == 1)
					{
						dboot2d = 0;		
					}
					if(freigabe2 == 2)
					{
						dboot3d = 0;
					}
				
				switch(wagesenk)
				{
					case 1:
					{

                        printf("\nGeben Sie die Koordinaten ein um das Schiff hinzustellen\n Erst Y , dann X\n");

                        scanf("%i %i", &einleseny, &einlesenx);
						if(einleseny< 8 && einlesenx< 10 )
						{
	
						zaehlerx = einlesenx;
						zaehlery = einleseny;
													
						if((brett[zaehlery][zaehlerx] == 1 || brett[zaehlery + 1][zaehlerx] == 1 || brett[zaehlery + 2][zaehlerx] == 1) || (zaehlerx > 10 || zaehlery > 8))
					{	
						if(zaehlerx > 10 || zaehlery > 8 )
						{

                            printf("Das Boot liegt nicht im Feld \n\n");
dbootx++;						
						}	
							
						if(brett[zaehlery][zaehlerx] == 1 || brett[zaehlery + 1][zaehlerx] == 1 || brett[zaehlery + 2][zaehlerx] == 1)
						{

                            printf("Deine Boote ueberschneiden sich\nVerleg das Boot neu\n");
							if(dbootx< 4)
							{
								dbootx++;
							}
					 	}			
					}				
																		 
					else if(zaehlery< 8 && brett[zaehlery][zaehlerx] || brett[zaehlery + 2][zaehlerx] || brett[zaehlery + 2][zaehlerx] == 0)
					{			
						for(dboot = 0; dboot< 3; dboot++)
						{
	 						brett[zaehlery][zaehlerx] = 1;
	 						
	 						if(dboot1d == 0)
	 						{
								dboot1[zaehlery][zaehlerx] = 1;
								if(dboot > 1)
								{
								dboot1d = 1;
								freigabe2++;
								}
							}
							if(dboot2d == 0)
	 						{
								dboot2[zaehlery][zaehlerx] = 1;
								if(dboot > 1)
								{
								dboot2d = 1;
								freigabe2++;
								}
							}
							if(dboot3d == 0)
	 						{
								dboot3[zaehlery][zaehlerx] = 1;
								if(dboot > 1)
								{
								dboot3d = 1;
								}
	 						}
							 zaehlery++;
						}
					}
						
					}
					else
						{

                            printf("Das Boot liegt nicht im Feld \n\n");
dbootx++;
						}
				}
									
					break;
			
		case 2:
			{

                printf("\nGeben Sie die Koordinaten ein um das Schiff hinzustellen\n Erst Y , dann X\n");

                scanf("%i %i", &einleseny, &einlesenx);
				if(einleseny< 10 && einlesenx< 8 )
				{
	
				zaehlerx = einlesenx;
				zaehlery = einleseny;
					
				if((brett[zaehlery][zaehlerx] == 1 || brett[zaehlery][zaehlerx + 1] == 1 || brett[zaehlery][zaehlerx + 2] == 1) || (zaehlerx > 8 || zaehlery > 9))
					{	
						if(zaehlerx > 8 || zaehlery > 9 )
						{

                            printf("Das Boot liegt nicht im Feld \n\n");
dbootx++;						
						}	
							
						if(brett[zaehlery][zaehlerx] == 1 || brett[zaehlery][zaehlerx + 1] == 1 || brett[zaehlery][zaehlerx + 2] == 1)
						{

                            printf("Deine Boote ueberschneiden sich\nVerleg das Boot neu\n");
							if(dbootx< 4)
							{
								dbootx++;
							}
					 	}			
					}				
																		 
				else if(zaehlerx< 8 && brett[zaehlery][zaehlerx] || brett[zaehlery][zaehlerx + 1] || brett[zaehlery][zaehlerx + 2] == 0)
				{
					for(dboot = 0; dboot< 3; dboot++)
					{
	 					brett[zaehlery][zaehlerx] = 1;
	 					
	 						if(dboot1d == 0)
	 						{
								dboot1[zaehlery][zaehlerx] = 1;
								if(dboot > 1)
								{
								dboot1d = 1;
								freigabe2++;
								}
							}
							if(dboot2d == 0)
	 						{
								dboot2[zaehlery][zaehlerx] = 1;
								if(dboot > 1)
								{
								dboot2d = 1;
								freigabe2++;
								}
							}
							if(dboot3d == 0)
	 						{
								dboot3[zaehlery][zaehlerx] = 1;
								if(dboot > 1)
								{
								dboot3d = 1;
								}
	 						}	 						
						 zaehlerx++;
					}					
			break;
				}					}
									else
									{

                                        printf("Das Boot liegt nicht im Feld \n\n");
dbootx++;
									}
								}
							}	
						}
				if(wagesenk > 3 || wagesenk == 0)
				{

                    printf("Sie haben sich vertippt\n");
dbootx++;
				}
			}
		}
		break;
				
			case 4:
			{
			if(vbootx > 0)
			{
			vbootx--;
			
			if(freigabe3 == 0)
					{
					vboot2v = 1;
					}
					
					if(freigabe3 == 1)
						{
							vboot2v = 0;		
						}


                printf("\nSoll das Schiff Senkrecht = 1 oder Wagerecht = 2 positioniert werden\n\n");

                scanf("%i", &wagesenk);
				if(wagesenk< 3 || wagesenk != 0)
				{
				switch(wagesenk)
				{
					case 1:
					{

                        printf("\nGeben Sie die Koordinaten ein um das Schiff hinzustellen\n Erst Y , dann X\n");

                        scanf("%i %i", &einleseny, &einlesenx);
					if(einleseny< 7 && einlesenx< 10 )
					{
	
					zaehlerx = einlesenx;
					zaehlery = einleseny;
					
					if((brett[zaehlery][zaehlerx] == 1 || brett[zaehlery + 1][zaehlerx] == 1 || brett[zaehlery + 2][zaehlerx] == 1 || brett[zaehlery + 3][zaehlerx]== 1) || (zaehlerx > 9 || zaehlery > 7))
					{	
						if(zaehlerx > 9 || zaehlery > 7 )
						{

                            printf("Das Boot liegt nicht im Feld \n\n");
vbootx++;							
						}	
							
						if(brett[zaehlery][zaehlerx] == 1 || brett[zaehlery + 1][zaehlerx] == 1 || brett[zaehlery + 2][zaehlerx] == 1 || brett[zaehlery + 3][zaehlerx]== 1)
						{

                            printf("Deine Boote ueberschneiden sich\nVerleg das Boot neu\n");
							if(vbootx< 3)
							{
								vbootx++;
							}
					 	}			
					}				
																		 
				else if(zaehlery< 7 && brett[zaehlery][zaehlerx] || brett[zaehlery + 1][zaehlerx] || brett[zaehlery + 2][zaehlerx] || brett[zaehlery + 3][zaehlerx] == 0)
				{
					for(vboot = 0; vboot< 4; vboot++)
					{
	 					brett[zaehlery][zaehlerx] = 1;
	 					
	 					if(vboot1v == 0)
	 						{
								vboot1[zaehlery][zaehlerx] = 1;
								if(vboot > 1)
								{
								vboot1v = 1;
								freigabe3++;
								}
							}
							if(vboot2v == 0)
	 						{
								vboot2[zaehlery][zaehlerx] = 1;
								if(vboot > 2)
								{
								vboot2v = 1;
								}
							}
	 					
						 zaehlery++;
					}						
					break;
			}
			else
					{
						vbootx++;

                        printf("Die Koordinaten liegen nicht im Feld \n\n");
					}
			}
			else
			{

                printf("Das Boot liegt nicht im Feld \n\n");
vbootx++;
			}
		}
			break;
			
			case 2:
			{

                printf("\nGeben Sie die Koordinaten ein um das Schiff hinzustellen\n Erst Y , dann X\n");

                scanf("%i %i", &einleseny, &einlesenx);
				if(einleseny< 10 && einlesenx< 7 )
				{
	
				zaehlerx = einlesenx;
				zaehlery = einleseny;
					
				if((brett[zaehlery][zaehlerx] == 1 || brett[zaehlery][zaehlerx + 1] == 1 || brett[zaehlery][zaehlerx + 2] == 1 || brett[zaehlery][zaehlerx + 3]== 1) || (zaehlerx > 17 || zaehlery > 9))
					{	
						if(zaehlerx > 7 || zaehlery > 9 )
						{

                            printf("Das Boot liegt nicht im Feld \n\n");
vbootx++;							
						}	
							
						if(brett[zaehlery][zaehlerx] == 1 || brett[zaehlery][zaehlerx + 1] == 1 || brett[zaehlery][zaehlerx + 2] == 1 || brett[zaehlery][zaehlerx + 3]== 1)
						{

                            printf("Deine Boote ueberschneiden sich\nVerleg das Boot neu\n");
							if(vbootx< 3)
							{
								vbootx++;
							}
					 	}			
					}				
																		 
				else if(zaehlerx< 7 && brett[zaehlery][zaehlerx] || brett[zaehlery][zaehlerx + 1] || brett[zaehlery][zaehlerx + 2] || brett[zaehlery][zaehlerx + 3] == 0)
				{
					for(vboot= 0; vboot< 4; vboot++)
					{
	 					brett[zaehlery][zaehlerx] = 1;
	 					
	 					if(vboot1v == 0)
	 						{
								vboot1[zaehlery][zaehlerx] = 1;
								if(vboot > 1)
								{
								vboot1v = 1;
								freigabe3++;
								}
							}
							if(vboot2v == 0)
	 						{
								vboot2[zaehlery][zaehlerx] = 1;
								if(vboot > 2)
								{
								vboot2v = 1;
								}
							}
						 zaehlerx++;
					}
					break;		
				}
					else
					{
						vbootx++;

                        printf("Die Koordinaten liegen nicht im Feld \n\n");
					}
				}
				else
				{

                    printf("Das Boot liegt nicht im Feld \n\n");
vbootx++;
				}
			}
		}						
				if(wagesenk > 3 || wagesenk == 0)
				{

                    printf("Sie haben sich vertippt\n");
vbootx++;
				}
					break;
				}
		}
	}
	case 7:
		{
		int counter = 0;	
	while(schleife == 0)
		{	
		bootaufpasser = 0;
		if((vbootx + zbootx + dbootx )== 0)
		{
			schleife++;
		}
			
	if(zufallsgenerator == 7)
	{
		schiffer = 7;
	}
	else{

    scanf("%i", &schiffer);
	}
	if(schiffer == 7)
	{	zufallsgenerator = 7;
		schiffer = 4;
		if(vbootx == 0)
		{
			schiffer = 3;
		}
		if(dbootx == 0)
		{
			schiffer = 2;
		}
	}		
	counter++;		
	switch(schiffer)
	{
		
		case 2:
		{
					if(zbootx > 0)
					{
						zbootx--;
									
						if(freigabe == 0)
						{
							zboot2z = 1;
							zboot3z = 1;
						}
					
						if(freigabe == 1)
						{
							zboot2z = 0;		
						}
						if(freigabe == 2)
						{
							zboot3z = 0;
						}
					
				
				wagesenk = wechsel();
				if(wagesenk< 3 || wagesenk != 0)
				{					
				switch(wagesenk)
				{
					case 1:
					{
						if(freigabe< 2)
						{
							einleseny = randomy();
einlesenx = randomx();
							
						if(einleseny< 9 && einlesenx< 10 )
						{
						zaehlerx = einlesenx;
						zaehlery = einleseny;			
						for(zaehlerx; zaehlerx< 9; zaehlerx++)
						{							

						if((brett[zaehlery][zaehlerx] == 1 || brett[zaehlery + 1][zaehlerx] == 1) || (zaehlerx > 10 || zaehlery > 9
							|| brett[zaehlery][zaehlerx + 1] || brett[zaehlery + 1][zaehlerx + 1]
							|| brett[zaehlery][zaehlerx - 1] || brett[zaehlery + 1][zaehlerx - 1]
							|| brett[zaehlery - 1][zaehlerx]	 || brett[zaehlery + 2][zaehlerx] == 1))
						{									
									zbootx++;				
						}
																								 
						else if(zaehlery< 9 && brett[zaehlery][zaehlerx] || brett[zaehlery + 1][zaehlerx] 
											 	|| brett[zaehlery][zaehlerx + 1] || brett[zaehlery + 1][zaehlerx + 1]
											 	|| brett[zaehlery][zaehlerx - 1] || brett[zaehlery + 1][zaehlerx - 1]
											 	|| brett[zaehlery - 1][zaehlerx]	 || brett[zaehlery + 2][zaehlerx] == 0)
						{
						for(zboot = 0; zboot< 2; zboot++)
						{
	 					//Zeile 117 kann eventuell gelöscht werden. Da man theoretisch am Ende erst alles aufs Spielfeld setzen kann.
						 	brett[zaehlery][zaehlerx] = 1;
	 						
	 						
	 						if(zboot1z == 0)
	 						{
								zboot1[zaehlery][zaehlerx] = 1;
								if(zboot > 0)
								{
								zboot1z = 1;
								freigabe++;
								}
							}
							if(zboot2z == 0)
	 						{
								zboot2[zaehlery][zaehlerx] = 1;
								if(zboot > 0)
								{
								zboot2z = 1;
								freigabe++;
								}
							}
							if(zboot3z == 0)
	 						{
								zboot3[zaehlery][zaehlerx] = 1;
								if(zboot > 0)
								{
								zboot3z = 1;
								}
							}
							
							zaehlery++;
						}
						}
						else if(zaehlery< 9 && brett[zaehlery][zaehlerx] || brett[zaehlery - 1][zaehlerx]
												|| brett[zaehlery][zaehlerx + 1] || brett[zaehlery - 1][zaehlerx + 1]
											 	|| brett[zaehlery][zaehlerx - 1] || brett[zaehlery - 1][zaehlerx - 1]
											 	|| brett[zaehlery + 1][zaehlerx]	|| brett[zaehlery - 2][zaehlerx] == 0)
						{
							for(zboot = 0; zboot< 2; zboot++)
						{
						 	brett[zaehlery][zaehlerx] = 1;
	 						
	 						
	 						if(zboot1z == 0)
	 						{
								zboot1[zaehlery][zaehlerx] = 1;
								if(zboot > 0)
								{
								zboot1z = 1;
								freigabe++;
								}
							}
							if(zboot2z == 0)
	 						{
								zboot2[zaehlery][zaehlerx] = 1;
								if(zboot > 0)
								{
								zboot2z = 1;
								freigabe++;
								}
							}
							if(zboot3z == 0)
	 						{
								zboot3[zaehlery][zaehlerx] = 1;
								if(zboot > 0)
								{
								zboot3z = 1;
								}
							}
							
							zaehlery--;
						}
						}
						else if(dbootx< 4)
						{						
							zbootx++;
						}
					
					}
					}
						else if(zbootx< 4)
						{
						
							zbootx++;
						}
						
					}
				}
						break;
					
 
					case 2:
					{		
							if(freigabe< 2)
							{
							einleseny = randomy();
einlesenx = randomx();
							
						if(einleseny< 10 && einlesenx< 9 )
						{
						zaehlerx = einlesenx;
						zaehlery = einleseny;
						for(zaehlery; zaehlery< 9; zaehlery++)
						{										
						if((brett[zaehlery][zaehlerx] == 1 || brett[zaehlery][zaehlerx + 1] == 1) || (zaehlerx > 9 || zaehlery > 10
							|| brett[zaehlery + 1][zaehlerx]  || brett[zaehlery + 1][zaehlerx + 1]
							|| brett[zaehlery - 1][zaehlerx]  || brett[zaehlery - 1][zaehlerx + 1]
							|| brett[zaehlery][zaehlerx - 1]	|| brett[zaehlery][zaehlerx + 2] == 1))
						{			
											
						}
																		 
						else if(zaehlerx< 9 && brett[zaehlery][zaehlerx] || brett[zaehlery][zaehlerx + 1] == 0
							|| brett[zaehlery + 1][zaehlerx]  || brett[zaehlery + 1][zaehlerx + 1]
							|| brett[zaehlery - 1][zaehlerx]  || brett[zaehlery - 1][zaehlerx + 1]
							|| brett[zaehlery][zaehlerx - 1]	|| brett[zaehlery][zaehlerx + 2] == 0)
						{
							
						for(zboot = 0; zboot< 2; zboot++)
						{
	 						brett[zaehlery][zaehlerx] = 1;
	 						
	 						if(zboot1z == 0)
	 						{
								zboot1[zaehlery][zaehlerx] = 1;
								if(zboot > 0)
								{
								zboot1z = 1;
								freigabe++;
								}
							}
							if(zboot2z == 0)
	 						{
								zboot2[zaehlery][zaehlerx] = 1;
								if(zboot > 0)
								{
								zboot2z = 1;
								freigabe++;
								}
							}
							if(zboot3z == 0)
	 						{
								zboot3[zaehlery][zaehlerx] = 1;
								if(zboot > 0)
								{
								zboot3z = 1;
								}
						 } 
	 						
					zaehlerx++;
					}
				}
				else if(zaehlerx< 9 && brett[zaehlery][zaehlerx] || brett[zaehlery][zaehlerx - 1] == 0
							|| brett[zaehlery + 1][zaehlerx]  || brett[zaehlery + 1][zaehlerx - 1]
							|| brett[zaehlery - 1][zaehlerx]  || brett[zaehlery - 1][zaehlerx - 1]
							|| brett[zaehlery][zaehlerx + 1]	|| brett[zaehlery][zaehlerx - 2] == 0)
						{
							for(zboot = 0; zboot< 2; zboot++)
						{
	 						brett[zaehlery][zaehlerx] = 1;
	 						
	 						if(zboot1z == 0)
	 						{
								zboot1[zaehlery][zaehlerx] = 1;
								if(zboot > 0)
								{
								zboot1z = 1;
								freigabe++;
								}
							}
							if(zboot2z == 0)
	 						{
								zboot2[zaehlery][zaehlerx] = 1;
								if(zboot > 0)
								{
								zboot2z = 1;
								freigabe++;
								}
							}
							if(zboot3z == 0)
	 						{
								zboot3[zaehlery][zaehlerx] = 1;
								if(zboot > 0)
								{
								zboot3z = 1;
								}
						 } 
	 						
					zaehlerx--;
					}			
				}
				
				else if(zbootx< 3)
						{						
							zbootx++;
						}
						}
							}
							else
						{
							
							zbootx++;
						}
					}
						}
					}
				}
				if(wagesenk > 3 || wagesenk == 0)
				{
				
					zbootx++;
				}
			}
	}
		break;
		
		case 3:
		{		
			if(dbootx > 0)
			{
				dbootx--;
				wagesenk = wechsel();

				if(wagesenk< 3 || wagesenk != 0)
				{
				if(freigabe2 == 0)
					{
						dboot2d = 1;
						dboot3d = 1;
					}
					
					if(freigabe2 == 1)
					{
						dboot2d = 0;		
					}
					if(freigabe2 == 2)
					{
						dboot3d = 0;
					}
				
				switch(wagesenk)
				{
					case 1:
					{
						if(freigabe2< 2)
						{
							einleseny = randomy();
einlesenx = randomx();
							
						if(einleseny< 8 && einlesenx< 10)
						{
	
						zaehlerx = einlesenx;
						zaehlery = einleseny;
						for(zaehlerx; zaehlerx< 9; zaehlerx++)
						{									
						if((brett[zaehlery][zaehlerx] == 1 || brett[zaehlery + 1][zaehlerx] == 1 || brett[zaehlery + 2][zaehlerx] == 1 || zaehlerx > 10 || zaehlery > 8
						|| brett[zaehlery][zaehlerx + 1] ==1 || brett[zaehlery + 1][zaehlerx + 1] ==1
						|| brett[zaehlery][zaehlerx - 1] ==1 || brett[zaehlery + 1][zaehlerx - 1] ==1
						|| brett[zaehlery + 2][zaehlerx - 1] ==1|| brett[zaehlery + 2][zaehlerx + 1] ==1
						|| brett[zaehlery - 1][zaehlerx] ==1	|| brett[zaehlery + 3][zaehlerx] == 1) 
						
						||
						
						(zaehlery > 8 && brett[zaehlery][zaehlerx] ==1 || brett[zaehlery - 1][zaehlerx] ==1 || brett[zaehlery - 2][zaehlerx] ==1
							|| brett[zaehlery][zaehlerx + 1] ==1|| brett[zaehlery - 1][zaehlerx + 1]==1
							|| brett[zaehlery][zaehlerx - 1]==1 || brett[zaehlery - 1][zaehlerx - 1]==1
							|| brett[zaehlery - 2][zaehlerx - 1]==1|| brett[zaehlery - 2][zaehlerx + 1]==1
							|| brett[zaehlery + 1][zaehlerx]	==1|| brett[zaehlery - 3][zaehlerx]== 1))
					{		
								dbootx++;
							
					}				
																	 
					else if(zaehlery< 8 && brett[zaehlery][zaehlerx] || brett[zaehlery + 1][zaehlerx] || brett[zaehlery + 2][zaehlerx] 
							|| brett[zaehlery][zaehlerx + 1] || brett[zaehlery + 1][zaehlerx + 1]
							|| brett[zaehlery][zaehlerx - 1] || brett[zaehlery + 1][zaehlerx - 1]
							|| brett[zaehlery + 2][zaehlerx - 1]|| brett[zaehlery + 2][zaehlerx + 1]
							|| brett[zaehlery - 1][zaehlerx]	|| brett[zaehlery + 3][zaehlerx]== 0)
					{			
						for(dboot = 0; dboot< 3; dboot++)
						{
	 						brett[zaehlery][zaehlerx] = 1;
	 						
	 						if(dboot1d == 0)
	 						{
								dboot1[zaehlery][zaehlerx] = 1;
								if(dboot > 1)
								{
								dboot1d = 1;
								freigabe2++;
								}
							}
							if(dboot2d == 0)
	 						{
								dboot2[zaehlery][zaehlerx] = 1;
								if(dboot > 1)
								{
								dboot2d = 1;
								freigabe2++;
								}
							}
							if(dboot3d == 0)
	 						{
								dboot3[zaehlery][zaehlerx] = 1;
								if(dboot > 1)
								{
								dboot3d = 1;
								}
	 						}
							 zaehlery++;
						}
					}
					else if(zaehlery< 8 || brett[zaehlery][zaehlerx] || brett[zaehlery - 1][zaehlerx] || brett[zaehlery - 2][zaehlerx] 
							|| brett[zaehlery][zaehlerx + 1] || brett[zaehlery - 1][zaehlerx + 1]
							|| brett[zaehlery][zaehlerx - 1] || brett[zaehlery - 1][zaehlerx - 1]
							|| brett[zaehlery - 2][zaehlerx - 1]|| brett[zaehlery - 2][zaehlerx + 1]
							|| brett[zaehlery + 1][zaehlerx]	|| brett[zaehlery - 3][zaehlerx]== 0)
					{			
						for(dboot = 0; dboot< 3; dboot++)
						{
	 						brett[zaehlery][zaehlerx] = 1;
	 						
	 						if(dboot1d == 0)
	 						{
								dboot1[zaehlery][zaehlerx] = 1;
								if(dboot > 1)
								{
								dboot1d = 1;
								freigabe2++;
								}
							}
							if(dboot2d == 0)
	 						{
								dboot2[zaehlery][zaehlerx] = 1;
								if(dboot > 1)
								{
								dboot2d = 1;
								freigabe2++;
								}
							}
							if(dboot3d == 0)
	 						{
								dboot3[zaehlery][zaehlerx] = 1;
								if(dboot > 1)
								{
								dboot3d = 1;
								}
	 						}
							 zaehlery--;
						}
					}
				
					}
			
				}
					else if(dbootx< 3)
						{						
							dbootx++;
						}
				}
			}
		
					break;
			
		case 2:
			{
				if(freigabe2< 2)
				{
				einleseny = randomy();
einlesenx = randomx();
				
				if(einleseny< 10 && einlesenx< 8 )
				{
					
				zaehlerx = einlesenx;
				zaehlery = einleseny;
				for(zaehlery; zaehlery< 9; zaehlery++)
				{
				if((brett[zaehlery][zaehlerx] == 1  || brett[zaehlery][zaehlerx + 1] == 1 || brett[zaehlery][zaehlerx + 2] == 1 || zaehlerx > 8 || zaehlery > 10
					|| brett[zaehlery + 1][zaehlerx]==1  || brett[zaehlery + 1][zaehlerx + 1]==1
					|| brett[zaehlery - 1][zaehlerx] ==1 || brett[zaehlery - 1][zaehlerx + 1]==1
					|| brett[zaehlery + 1][zaehlerx + 2]==1|| brett[zaehlery - 1][zaehlerx + 2]==1
					|| brett[zaehlery][zaehlerx - 1]	==1|| brett[zaehlery][zaehlerx + 3] == 1)
					
					||
					
					(zaehlerx > 8 || zaehlery > 10 || brett[zaehlery][zaehlerx] == 1 || brett[zaehlery][zaehlerx - 1] || brett[zaehlery][zaehlerx - 2]
					|| brett[zaehlery + 1][zaehlerx]==1|| brett[zaehlery + 1][zaehlerx - 1]==1
					|| brett[zaehlery - 1][zaehlerx] ==1|| brett[zaehlery - 1][zaehlerx - 1]==1
					|| brett[zaehlery + 1][zaehlerx - 2]==1|| brett[zaehlery - 1][zaehlerx - 2]==1
					|| brett[zaehlery][zaehlerx + 1]==1	|| brett[zaehlery][zaehlerx - 3] == 1))
					{			
								dbootx++;						
					}				
																		 
				else if(zaehlerx< 8 || brett[zaehlery][zaehlerx] || brett[zaehlery][zaehlerx + 1] || brett[zaehlery][zaehlerx + 2]
					|| brett[zaehlery + 1][zaehlerx]== 0 || brett[zaehlery + 1][zaehlerx + 1]== 0
					|| brett[zaehlery - 1][zaehlerx] == 0|| brett[zaehlery - 1][zaehlerx + 1]== 0
					|| brett[zaehlery + 1][zaehlerx + 2]== 0|| brett[zaehlery - 1][zaehlerx + 2]== 0
					|| brett[zaehlery][zaehlerx - 1]== 0	|| brett[zaehlery][zaehlerx + 3] == 0)
				{
					for(dboot = 0; dboot< 3; dboot++)
					{
	 					brett[zaehlery][zaehlerx] = 1;
	 					
	 						if(dboot1d == 0)
	 						{
								dboot1[zaehlery][zaehlerx] = 1;
								if(dboot > 1)
								{
								dboot1d = 1;
								freigabe2++;
								}
							}
							if(dboot2d == 0)
	 						{
								dboot2[zaehlery][zaehlerx] = 1;
								if(dboot > 1)
								{
								dboot2d = 1;
								freigabe2++;
								}
							}
							if(dboot3d == 0)
	 						{
								dboot3[zaehlery][zaehlerx] = 1;
								if(dboot > 1)
								{
								dboot3d = 1;
								}
	 						}	 						
						 zaehlerx++;
					}					
			break;
				}
				else if(zaehlerx< 8 || brett[zaehlery][zaehlerx] || brett[zaehlery][zaehlerx - 1] || brett[zaehlery][zaehlerx - 2]
					|| brett[zaehlery + 1][zaehlerx]== 0 || brett[zaehlery + 1][zaehlerx - 1]== 0
					|| brett[zaehlery - 1][zaehlerx]== 0 || brett[zaehlery - 1][zaehlerx - 1]== 0
					|| brett[zaehlery + 1][zaehlerx - 2]== 0|| brett[zaehlery - 1][zaehlerx - 2]== 0
					|| brett[zaehlery][zaehlerx + 1]== 0	|| brett[zaehlery][zaehlerx - 3] == 0)
				{
					for(dboot = 0; dboot< 3; dboot++)
					{
	 					brett[zaehlery][zaehlerx] = 1;
	 					
	 						if(dboot1d == 0)
	 						{
								dboot1[zaehlery][zaehlerx] = 1;
								if(dboot > 1)
								{
								dboot1d = 1;
								freigabe2++;
								}
							}
							if(dboot2d == 0)
	 						{
								dboot2[zaehlery][zaehlerx] = 1;
								if(dboot > 1)
								{
								dboot2d = 1;
								freigabe2++;
								}
							}
							if(dboot3d == 0)
	 						{
								dboot3[zaehlery][zaehlerx] = 1;
								if(dboot > 1)
								{
								dboot3d = 1;
								}
	 						}	 						
						 zaehlerx--;
					}					
			break;
				}
				else if(dbootx< 4)
						{						
							dbootx++;
						}
					}
				}
									else
									{
									
										dbootx++;
									}
								}
								}	
							}	
						}
				if(wagesenk > 3 || wagesenk == 0)
				{
					
					dbootx++;
				}
			}
		}
		break;
				
			case 4:
			{
			if(vbootx > 0)
			{
			vbootx--;
			
			if(freigabe3 == 0)
					{
					vboot2v = 1;
					}
					
					if(freigabe3 == 1)
						{
							vboot2v = 0;		
						}
				wagesenk = wechsel();
				if(wagesenk< 3 || wagesenk != 0)
				{
				switch(wagesenk)
				{
					case 1:
					{
							einleseny = randomy();
einlesenx = randomx();
					if(einleseny< 7 && einlesenx< 10)
					{
	
					zaehlerx = einlesenx;
					zaehlery = einleseny;
					
					if((brett[zaehlery][zaehlerx] == 1 || brett[zaehlery + 1][zaehlerx] == 1 || brett[zaehlery + 2][zaehlerx] == 1 || brett[zaehlery + 3][zaehlerx]== 1) || (zaehlerx > 10 || zaehlery > 7
						|| brett[zaehlery][zaehlerx + 1] || brett[zaehlery + 1][zaehlerx + 1]
						|| brett[zaehlery][zaehlerx - 1] || brett[zaehlery + 1][zaehlerx - 1]
						|| brett[zaehlery + 2][zaehlerx - 1]|| brett[zaehlery + 2][zaehlerx + 1]
						|| brett[zaehlery + 3][zaehlerx - 1]|| brett[zaehlery + 3][zaehlerx + 1]
						|| brett[zaehlery - 1][zaehlerx]	|| brett[zaehlery + 4][zaehlerx] == 1	))
					{			
								vbootx++;					
					}				
																		 
				else if(zaehlery< 7 && brett[zaehlery][zaehlerx] || brett[zaehlery + 1][zaehlerx] || brett[zaehlery + 2][zaehlerx] || brett[zaehlery + 3][zaehlerx] 
						|| brett[zaehlery][zaehlerx + 1] || brett[zaehlery + 1][zaehlerx + 1]
						|| brett[zaehlery][zaehlerx - 1] || brett[zaehlery + 1][zaehlerx - 1]
						|| brett[zaehlery + 2][zaehlerx - 1]|| brett[zaehlery + 2][zaehlerx + 1]
						|| brett[zaehlery + 3][zaehlerx - 1]|| brett[zaehlery + 3][zaehlerx + 1]
						|| brett[zaehlery - 1][zaehlerx]	|| brett[zaehlery + 4][zaehlerx]	== 0)
					{
					for(vboot = 0; vboot< 4; vboot++)
					{
	 					brett[zaehlery][zaehlerx] = 1;
	 					
	 					if(vboot1v == 0)
	 						{
								vboot1[zaehlery][zaehlerx] = 1;
								if(vboot > 1)
								{
								vboot1v = 1;
								freigabe3++;
								}
							}
							if(vboot2v == 0)
	 						{
								vboot2[zaehlery][zaehlerx] = 1;
								if(vboot > 2)
								{
								vboot2v = 1;
								}
							}
	 					
						 zaehlery++;
					}						
					break;
			}
			else
					{
						vbootx++;
						
					}
			}
			else
			{
				
				vbootx++;
			}
		}
			break;
			
			case 2:
			{
					einleseny = randomy();
einlesenx = randomx();
				if(einleseny< 10 && einlesenx< 7 )
				{
	
				zaehlerx = einlesenx;
				zaehlery = einleseny;
					
				if((brett[zaehlery][zaehlerx] == 1 || brett[zaehlery][zaehlerx + 1] == 1 || brett[zaehlery][zaehlerx + 2] == 1 || brett[zaehlery][zaehlerx + 3]== 1) || (zaehlerx > 7 || zaehlery > 10
					|| brett[zaehlery + 1][zaehlerx]  || brett[zaehlery + 1][zaehlerx + 1]
					|| brett[zaehlery - 1][zaehlerx]  || brett[zaehlery - 1][zaehlerx + 1]
					|| brett[zaehlery + 1][zaehlerx + 2]|| brett[zaehlery - 1][zaehlerx + 2]
					|| brett[zaehlery - 1][zaehlerx + 3]|| brett[zaehlery + 1][zaehlerx + 3]
					|| brett[zaehlery][zaehlerx - 1]	|| brett[zaehlery][zaehlerx + 4] == 1))
					{			
								vbootx++;						
					}
				else if(zaehlerx< 7 && brett[zaehlery][zaehlerx] || brett[zaehlery][zaehlerx + 1] || brett[zaehlery][zaehlerx + 2] || brett[zaehlery][zaehlerx + 3] 
					|| brett[zaehlery + 1][zaehlerx]  || brett[zaehlery + 1][zaehlerx + 1]
					|| brett[zaehlery - 1][zaehlerx]  || brett[zaehlery - 1][zaehlerx + 1]
					|| brett[zaehlery + 1][zaehlerx + 2]|| brett[zaehlery - 1][zaehlerx + 2]
					|| brett[zaehlery - 1][zaehlerx + 3]|| brett[zaehlery + 1][zaehlerx + 3]
					|| brett[zaehlery][zaehlerx - 1]	|| brett[zaehlery][zaehlerx + 4] == 0)
				{
					for(vboot= 0; vboot< 4; vboot++)
					{
	 					brett[zaehlery][zaehlerx] = 1;
	 					
	 					if(vboot1v == 0)
	 						{
								vboot1[zaehlery][zaehlerx] = 1;
								if(vboot > 1)
								{
								vboot1v = 1;
								freigabe3++;
								}
							}
							if(vboot2v == 0)
	 						{
								vboot2[zaehlery][zaehlerx] = 1;
								if(vboot > 2)
								{
								vboot2v = 1;
								}
							}
						 zaehlerx++;
					}
					break;		
				}
					else
					{
						vbootx++;
					}
				}
				else
				{
					vbootx++;
				}
			}
		}						
				if(wagesenk > 3 || wagesenk == 0)
				{
					vbootx++;
				}
					break;
				}
		}
	}
}
printf("    ");
	for(brettinfox = 0; brettinfox <= 9; brettinfox++)
	{

        printf("%3i", brettinfox);
	}

    printf("\n    ______________________________");


    printf("\n\n");
brettinfo = 0;
	for(zaehlerx = 0; zaehlerx< 10; zaehlerx++)
	{	
		if(brettinfo< 10)
		{

        printf(" %i |", brettinfo);
brettinfo++;
		}
		else
		{

            printf("%i |", brettinfo);
		}
		
		for(zaehlery = 0; zaehlery <= 9; zaehlery++)
		{

            printf("%3i", brett[zaehlerx][zaehlery]);
		}

        printf("\n");
	}

        printf("\n");

        printf("%i\n", counter);
	
}
}
}

    printf("    ");
	for(brettinfox = 0; brettinfox <= 9; brettinfox++)
	{

        printf("%3i", brettinfox);
	}

    printf("\n    ______________________________");


    printf("\n\n");
brettinfo = 0;
	for(zaehlerx = 0; zaehlerx< 10; zaehlerx++)
	{	
		if(brettinfo< 10)
		{

        printf(" %i |", brettinfo);
brettinfo++;
		}
		else
		{

            printf("%i |", brettinfo);
		}
		
		for(zaehlery = 0; zaehlery <= 9; zaehlery++)
		{

            printf("%3i", brett[zaehlerx][zaehlery]);
		}

        printf("\n");
	}

        printf("\n");
	}	


    printf("Du hast alle Boote verteilt!....\n Spiel Beginnt....!\n");


int brettgegner[10][21]= { {} };
	int angriff = 1;

int vschaltere = 0;
int vschalter1 = 0;

int vschalterz = 0;
int vschalter2 = 0;

int zschaltere = 0;
int zschalter1 = 0;

int zschalterz = 0;
int zschalter2 = 0;

int zschalterd = 0;
int zschalter3 = 0;

int dschaltere = 0;
int dschalter1 = 0;

int dschalterz = 0;
int dschalter2 = 0;

int dschalterd = 0;
int dschalter3 = 0;

int schalter1 = 0;
int schalter2 = 0;
int schalter3 = 0;
int schalter4 = 0;
int schalter5 = 0;
int schalter6 = 0;
int schalter7 = 0;
int schalter8 = 0;
		
	while(angriff == 1)
	{

    printf("Koordinaten eingeben zum versenken des Gegners\n");

    scanf("%i %i", &einleseny, &einlesenx);


zaehlerx = einlesenx;
	zaehlery = einleseny;
	
	brettgegner[zaehlery][zaehlerx] = 1;
	if(brettgegner[zaehlery][zaehlerx] && brett[zaehlery][zaehlerx] == 1)
	{

        printf("Treffer, schieß nochmal\n");
zschalter1 = 0;
		zschaltere = 0;
		zboot1[zaehlery][zaehlerx] = 0; 
		
		brettgegner[zaehlery][zaehlerx] = 2;
		brett[zaehlery][zaehlerx] = 2;
					
		for(zaehlery = 0; zaehlery< 10; zaehlery++)
		{		
			for(zaehlerx = 0; zaehlerx <= 20; zaehlerx++)
			{				
				if(zboot1[zaehlery][zaehlerx] == 0)
				{
					zschalter1 = 0;
				}
				if(zboot1[zaehlery][zaehlerx] == 1)
				{
					zschaltere = 1;
				}
				if(zboot2[zaehlery][zaehlerx] == 0)
				{
					zschalter2 = 0;
				}
				if(zboot2[zaehlery][zaehlerx] == 1)
				{
					zschalterz = 1;
				}
				if(zboot3[zaehlery][zaehlerx] == 0)
				{
					zschalter3 = 0;
				}
				if(zboot3[zaehlery][zaehlerx] == 1)
				{
					zschalterd = 1;
				}
				if(dboot1[zaehlery][zaehlerx] == 0)
				{
					dschalter1 = 1;
				}
				if(dboot1[zaehlery][zaehlerx] == 1)
				{
					dschaltere = 1;
				}
				if(dboot2[zaehlery][zaehlerx] == 0)
				{
					dschalter2 = 1;
				}
				if(dboot2[zaehlery][zaehlerx] == 1)
				{
					dschalterz = 1;
				}
				if(dboot3[zaehlery][zaehlerx] == 0)
				{
					dschalter3 = 1;
				}
				if(dboot3[zaehlery][zaehlerx] == 1)
				{
					dschalterd = 1;
				}
				if(vboot1[zaehlery][zaehlerx] == 0)
				{
					vschalter1 = 1;
				}
				if(vboot1[zaehlery][zaehlerx] == 1)
				{
					vschaltere = 1;
				}
				if(vboot2[zaehlery][zaehlerx] == 0)
				{
					vschalter2 = 1;
				}
				if(vboot2[zaehlery][zaehlerx] == 1)
				{
					vschalterz = 1;
				}
			}				
		}
		if(zschalter1 == 0 && zschaltere == 0 && schalter1 == 0)
		{	
			schalter1 = 1;

            printf("Schiff wurde versenkt\n");
			
		}
		if(zschalter2 == 1 && zschalterz == 0 && schalter2 == 0)
		{

            printf("Schiff wurde versenkt\n");
schalter2 = 1;
		}
		if(zschalter3 == 1 && zschalterd == 0 && schalter3 == 0)
		{

            printf("Schiff wurde versenkt\n");
schalter3 = 1;
		}
		if(dschalter1 == 1 && dschaltere == 0 && schalter4 == 0)
		{

            printf("Schiff wurde versenkt\n");
schalter4 = 1;
		}
		if(dschalter2 == 1 && dschalterz == 0 && schalter5 == 0)
		{

            printf("Schiff wurde versenkt\n");
schalter5 = 1;
		}
		if(dschalter3 == 1 && dschalterd == 0 && schalter6 == 0)
		{

            printf("Schiff wurde versenkt\n");
schalter6 = 1;
		}
		if(vschalter1 == 1 && zschaltere == 0 && schalter7 == 0)
		{

            printf("Schiff wurde versenkt\n");
schalter7 = 1;
		}
		if(vschalter2 == 1 && vschalterz == 0 && schalter8 == 0)
		{

            printf("Schiff wurde versenkt\n");
schalter8 = 1;
		}
	}	
	else if(brettgegner[zaehlery][zaehlerx] && brett[zaehlery][zaehlerx] == 0)
	{

        printf("Du hast nicht getroffen\n");
brettgegner[zaehlery][zaehlerx] = 3	;
	}
	else
	{
		brettgegner[zaehlery][zaehlerx] = 2;
	}
	if((schalter8 && schalter7 && schalter6 && schalter5 && schalter4 && schalter3 && schalter2 && schalter1) == 1)
	{

        printf("GEWONNEN! GEWONNEN! GEWONNEN! GEWONNEN! GEWONNEN! GEWONNEN! GEWONNEN! GEWONNEN!\n GEWONNEN! GEWONNEN! GEWONNEN! GEWONNEN! GEWONNEN! GEWONNEN! GEWONNEN!");
	}


    printf("    ");
	for(brettinfox = 0; brettinfox <= 20; brettinfox++)
	{

        printf("%3i", brettinfox);
	}

    printf("\n    ________________________________________________________________");


    printf("\n\n");

brettinfo = 0;
	
	for(zaehlerx = 0; zaehlerx< 10; zaehlerx++)
	{	
		if(brettinfo< 10)
		{

        printf(" %i |", brettinfo);
brettinfo++;
		}
		else
		{

            printf("%i |", brettinfo);
		}
		
		for(zaehlery = 0; zaehlery <= 20; zaehlery++)
		{

            printf("%3i", brettgegner[zaehlerx][zaehlery]);
		}

        printf("\n");
	}

        printf("\n");
	}
	return 0;
        }

int random()
{
    int y = 0;
    int i;
    time_t t;
    int a = 0;
    int halten = 1;
    int beenden = 0;

    while (halten == 1)
    {
        if (a == 40000000)
        {
            beenden++;
            a = 0;

            if (beenden == 1)
            {
                srand(time(&t));
                y = rand() % 9;
            }
        }
        if (beenden == 1)
        {
            halten--;
            printf(" Ok y %i\n", y);
        }

        a++;
    }
    return y;
}

int randomy()
{
    int y = 0;
    int i;
    time_t t;
    int a = 0;
    int halten = 1;
    int beenden = 0;

    while (halten == 1)
    {
        if (a == 4000000)
        {
            beenden++;
            a = 0;

            if (beenden == 1)
            {
                srand(time(&t));
                y = rand() % 9;
            }
        }
        if (beenden == 1)
        {
            halten--;
        }

        a++;
    }
    return y;
}
int randomx()
{

    int x = 0;
    int i;
    time_t t;
    int a = 0;
    int halten = 1;
    int beenden = 0;

    while (halten == 1)
    {
        if (a == 40000000)
        {
            beenden++;
            a = 0;
            if (beenden == 1)
            {
                srand(time(&t));
                x = rand() % 9;
            }
        }
        if (beenden == 1)
        {
            halten--;
        }

        a++;
    }
    return x;
}
int wechsel()
{

    int x = 0;
    int i;
    time_t t;
    int a = 0;
    int halten = 1;
    int beenden = 0;

    while (halten == 1)
    {
        if (a == 4)
        {
            beenden++;
            a = 0;
            if (beenden == 1)
            {
                srand(time(&t));
                x = rand() % 2 + 1;
            }
        }
        if (beenden == 1)
        {
            halten--;
        }

        a++;
    }
    return x;
}
int schiffwahl()
{
    int x = 0;
    int i;
    time_t t;
    int a = 0;
    int halten = 1;
    int beenden = 0;

    while (halten == 1)
    {
        if (a == 4000000)
        {
            beenden++;
            a = 0;
            if (beenden == 1)
            {
                srand(time(&t));
                x = rand() % 4 + 2;
            }
        }
        if (beenden == 1)
        {
            halten--;
        }

        a++;
    }
    return x;
}
