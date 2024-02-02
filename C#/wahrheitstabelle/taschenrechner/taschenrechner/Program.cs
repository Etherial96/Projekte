using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace taschenrechner
{
    class Program
    {
        static void Main(string[] args)
        {
            int schleife = 20;
            int zahl;
            int zahl2;
            int zahl3;
            int loesung;
            char mal;
            int ze;
            char wahl;
            int loesung2;


            while (schleife = schleife)
            {
                Console.WriteLine("Gib den Buchstaben an fuer welche Methode du dich entscheidest. A. Multiplikation B. Addition C. Dividieren D. Subtrahieren\n");
                Console.ReadLine();

                switch (wahl)
                {

                    case 'a':
                        {
                            Console.WriteLine("Sie haben sich fuer Mal entschieden\n");
                            for (loesung2 = 5000000; loesung <= 1000000;)
                            {
                                printf("Meine erste Zahl =");
                                scanf("%i\n", &zahl);
                                printf("Meine zweite Zahl =");
                                scanf("%i\n", &zahl2);

                                loesung = zahl2 * zahl;

                                printf("Ergebnis = %i\n", loesung);


                                for (loesung2 = 50000000; loesung2 >= loesung;)
                                {
                                    scanf("%i", &zahl3);


                                    loesung2 = loesung * zahl3;
                                    printf("Ergebnis %i\n", loesung2);
                                    break;
                                }
                            }
                        }

                    case 'b':
                        {
                            printf("Sie haben sich für Plus entschieden\n");
                        }
                    case 'c':
                        {
                            printf("Sie haben sich für Geteilt entschieden\n");
                        }
                    case 'd':
                        {
                            printf("Sie haben sich für Minus entschieden\n");
                        }
                    default:
                        printf("falsche eingabe\n");
                }
            }
        }
    }
}
