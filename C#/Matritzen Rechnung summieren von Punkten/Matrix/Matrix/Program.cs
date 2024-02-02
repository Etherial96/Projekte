using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Matrix
{
    class Program
    {
        static void Main(string[] args)
        {
            double[] Punkte = new double[16];

            Punkte[0] = 1;
            Punkte[1] = 2;
            Punkte[2] = 3;
            Punkte[3] = 4;
            Punkte[4] = 5;
            Punkte[5] = 6;
            Punkte[6] = 7;
            Punkte[7] = 8;
            Punkte[8] = 1;
            Punkte[9] = 2;
            Punkte[10] = 3;
            Punkte[11] = 4;
            Punkte[12] = 5;
            Punkte[13] = 6;
            Punkte[14] = 7;
            Punkte[15] = 8;

            int pflanzen = 0;
            double ti = 0;
            double ti2 = 0;
            double ti3 = 0;
            double ti4 = 0;
            double ti5 = 0;
            double ti6 = 0;
            double ti7 = 0;
            double n = 0;
            double an = 0;
            double ae = 0;
            double az = 0;
            double ad = 0;
            double av = 0;

            int Punkteverteiler = (Punkte.Length);
            int Daten = (Punkte.Length) / 2;
            int zeiley = 0;
            int spaltex = 0;


            double[,] Matrix = new double[5, 6];
            double[,] Kopie = new double[5, 6];

            for(pflanzen = 0; pflanzen < Punkteverteiler; pflanzen++)
            {
                ti = ti + Punkte[pflanzen];
                ti2 = ti2 + Math.Pow(Punkte[pflanzen], 2);
                ti3 = ti3 + Math.Pow(Punkte[pflanzen], 3);
                ti4 = ti4 + Math.Pow(Punkte[pflanzen], 4);
                ti5 = ti5 + Math.Pow(Punkte[pflanzen], 5);
                ti6 = ti6 + Math.Pow(Punkte[pflanzen], 6);
                ti7 = ti7 + Math.Pow(Punkte[pflanzen], 7);
                pflanzen++;
            }
            for(pflanzen = 1; pflanzen < Punkteverteiler; pflanzen++)
            {
                an = (an) + (Punkte[pflanzen]);
                ae = (ae) + (Math.Pow(Punkte[pflanzen], 2));
                az = (az) + (Math.Pow(Punkte[pflanzen], 3));
                ad = (ad) + (Math.Pow(Punkte[pflanzen], 4));
                av = (av) + (Math.Pow(Punkte[pflanzen], 5));
                pflanzen++;
            }
            n = n + Daten;

            for (zeiley = 0; zeiley < 5; zeiley++)
            {
                for (spaltex = 0; spaltex < 6; spaltex++)
                {
                    if ((spaltex == 2 && zeiley == 0) || (spaltex == 1 && zeiley == 1))
                    {
                        Matrix[zeiley, spaltex] = ti;
                    }
                    else if ((spaltex == 0 && zeiley == 0) || (spaltex == 0 && zeiley == 1) || (spaltex == 0 && zeiley == 2) || (spaltex == 0 && zeiley == 3) || (spaltex == 0 && zeiley == 4))
                    {
                        Matrix[zeiley, spaltex] = 1;
                    }
                    else if((spaltex == 3 && zeiley == 0) || (spaltex == 2 && zeiley == 1) || (spaltex == 1 && zeiley == 2))
                    {
                        Matrix[zeiley, spaltex] = ti2;
                    }
                    else if((spaltex == 3 && zeiley == 1) || (spaltex == 2 && zeiley == 2) || (spaltex == 1 && zeiley == 3) || (spaltex == 4 && zeiley == 0))
                    {
                        Matrix[zeiley, spaltex] = ti3;
                    }
                    else if((spaltex == 1 && zeiley == 4) || (spaltex == 2 && zeiley == 3) || (spaltex == 3 && zeiley == 2) || (spaltex == 4 && zeiley == 1))
                    {
                        Matrix[zeiley, spaltex] = ti4;
                    }
                    else if((spaltex == 2 && zeiley == 4) || (spaltex == 3 && zeiley == 3) || (spaltex == 4 && zeiley == 2))
                    {
                        Matrix[zeiley, spaltex] = ti5;
                    }
                    else if((spaltex == 3 && zeiley == 4) || (spaltex == 4 && zeiley == 3))
                    {
                        Matrix[zeiley, spaltex] = ti6;
                    }
                    else if(spaltex == 4 && zeiley == 5)
                    {
                        Matrix[zeiley, spaltex] = ti7;
                    }
                    else if(spaltex == 1 && zeiley == 0)
                    {
                        Matrix[zeiley, spaltex] = n;
                    }
                    else if(spaltex == 5 && zeiley == 0)
                    {
                        Matrix[zeiley, spaltex] = an;
                    }
                    else if (spaltex == 5 && zeiley == 1)
                    {
                        Matrix[zeiley, spaltex] = ae;
                    }
                    else if (spaltex == 5 && zeiley == 2)
                    {
                        Matrix[zeiley, spaltex] = az;
                    }
                    else if (spaltex == 5 && zeiley == 3)
                    {
                        Matrix[zeiley, spaltex] = ad;
                    }
                    else if (spaltex == 5 && zeiley == 4)
                    {
                        Matrix[zeiley, spaltex] = av;
                    }
                }
            }
            // Hier gebe ich die Matrix normal aus
            for (zeiley = 0; zeiley < 5; zeiley++)
            {
                for (spaltex = 0; spaltex < 6 ; spaltex++)
                {
                    Console.Write(Matrix[zeiley, spaltex] + " ");
                }
                Console.WriteLine();
            }
            Console.WriteLine();
            //Hier beginne ich mit der Matrix berechnung
            
            for (spaltex = 0; spaltex < 6; spaltex++)
            {
                Matrix[1, spaltex] = Matrix[1, spaltex] - Matrix[0, spaltex];
                Matrix[2, spaltex] = Matrix[2, spaltex] - Matrix[0, spaltex];
                Matrix[3, spaltex] = Matrix[3, spaltex] - Matrix[0, spaltex];
                Matrix[4, spaltex] = Matrix[4, spaltex] - Matrix[0, spaltex];
            }

            for (zeiley = 0; zeiley < 5; zeiley++)
            {
                for (spaltex = 0; spaltex < 6; spaltex++)
                {
                    Kopie[zeiley, spaltex] = Matrix[zeiley, spaltex];
                }
            }
            for (spaltex = 0; spaltex < 6; spaltex++)
            {
                Matrix[2, spaltex] = Kopie[2, spaltex] * Kopie[3, 1] * Kopie[4, 1] * Kopie[1, 1];
                Matrix[3, spaltex] = Kopie[2, 1] * Kopie[3, spaltex] * Kopie[4, 1] * Kopie[1, 1];
                Matrix[4, spaltex] = Kopie[2, 1] * Kopie[3, 1] * Kopie[4, spaltex] * Kopie[1, 1];
                Matrix[1, spaltex] = Kopie[2, 1] * Kopie[3, 1] * Kopie[1, spaltex] * Kopie[4, 1];
            }

            for (spaltex = 0; spaltex < 6; spaltex++)
            {
                Matrix[2, spaltex] = Matrix[2, spaltex] - Matrix[1, spaltex];
                Matrix[3, spaltex] = Matrix[3, spaltex] - Matrix[1, spaltex];
                Matrix[4, spaltex] = Matrix[4, spaltex] - Matrix[1, spaltex];
            }
            for (zeiley = 0; zeiley < 5; zeiley++)
            {
                for (spaltex = 0; spaltex < 6; spaltex++)
                {
                    Kopie[zeiley, spaltex] = Matrix[zeiley, spaltex];
                }
            }
            for (spaltex = 0; spaltex < 6; spaltex++)
            {
                Matrix[2, spaltex] = Kopie[2, spaltex] * Kopie[3, 2] * Kopie[4, 2];
                Matrix[3, spaltex] = Kopie[2, 2] * Kopie[3, spaltex] * Kopie[4, 2];
                Matrix[4, spaltex] = Kopie[2, 2] * Kopie[3, 2] * Kopie[4, spaltex];
            }
            for (spaltex = 0; spaltex < 6; spaltex++)
            {
                Matrix[3, spaltex] = Matrix[3, spaltex] - Matrix[2, spaltex];
                Matrix[4, spaltex] = Matrix[4, spaltex] - Matrix[2, spaltex];
            }
            for (zeiley = 0; zeiley < 5; zeiley++)
            {
                for (spaltex = 0; spaltex < 6; spaltex++)
                {
                    Kopie[zeiley, spaltex] = Matrix[zeiley, spaltex];
                }
            }
            for (spaltex = 0; spaltex < 6; spaltex++)
            {
                Matrix[3, spaltex] = Kopie[3, spaltex] * Kopie[4, 3];
                Matrix[4, spaltex] = Kopie[3, 3] * Kopie[4, spaltex];
            }
            for (spaltex = 0; spaltex < 6; spaltex++)
            {
                Matrix[4, spaltex] = Matrix[4, spaltex] - Matrix[3, spaltex];
            }
            for (zeiley = 0; zeiley < 5; zeiley++)
            {
                for (spaltex = 0; spaltex < 6; spaltex++)
                {
                    Console.Write(Matrix[zeiley, spaltex] + " ");
                }
                Console.WriteLine();
            }
            double a = 0;
            double b = 0;
            double c = 0;
            double d = 0;
            double e = 0;

            a = Matrix[4, 5] / Matrix[4, 4];
            b = (Matrix[3, 5]) / (Matrix[3, 3] +(a)*Matrix[3, 4]);
            c = (Matrix[2, 5]) / (Matrix[2, 2]+(Matrix[2, 4] *(a))+(Matrix[2, 3] * (b)));
            d = (Matrix[1, 5] / (Matrix[1, 1] + (Matrix[1, 2] * (c)) + (Matrix[1, 4] * (a)) + (Matrix[1, 3] * (b))));
            e = (Matrix[0, 5] / (Matrix[0, 0] +(Matrix[0, 1] * (e)) + (Matrix[0, 2] * (c)) + (Matrix[0, 4] * (a)) + (Matrix[0, 3] * (b))));
            Console.WriteLine();
            Console.Write(a+"x^4 + "+b+"x^3+ "+c+"x^2+ "+d+"x^1+ "+e);
            Console.WriteLine();
            Console.ReadLine();

            //Vorischt, nicht löschen. Rechnung ohne 1 am ende
            /*double[] Punkte = new double[16];

            Punkte[0] = -1;
            Punkte[1] = -1;
            Punkte[2] = 0;
            Punkte[3] = 3;
            Punkte[4] = 1;
            Punkte[5] = 2.5;
            Punkte[6] = 2;
            Punkte[7] = 5;
            Punkte[8] = 3;
            Punkte[9] = 4;
            Punkte[10] = 5;
            Punkte[11] = 2;
            Punkte[12] = 7;
            Punkte[13] = 5;
            Punkte[14] = 9;
            Punkte[15] = 4;

            int pflanzen = 0;
            double ti = 0;
            double ti2 = 0;
            double ti3 = 0;
            double ti4 = 0;
            double ti5 = 0;
            double ti6 = 0;
            double ti7 = 0;
            double n = 0;
            double an = 0;
            double ae = 0;
            double az = 0;
            double ad = 0;
            double av = 0;

            int Punkteverteiler = (Punkte.Length);
            int Daten = (Punkte.Length) / 2;
            int zeiley = 0;
            int spaltex = 0;


            double[,] Matrix = new double[5, 5];
            double[,] Kopie = new double[5, 5];

            for (pflanzen = 0; pflanzen < Punkteverteiler; pflanzen++)
            {
                ti = ti + Punkte[pflanzen];
                ti2 = ti2 + Math.Pow(Punkte[pflanzen], 2);
                ti3 = ti3 + Math.Pow(Punkte[pflanzen], 3);
                ti4 = ti4 + Math.Pow(Punkte[pflanzen], 4);
                ti5 = ti5 + Math.Pow(Punkte[pflanzen], 5);
                ti6 = ti6 + Math.Pow(Punkte[pflanzen], 6);
                ti7 = ti7 + Math.Pow(Punkte[pflanzen], 7);
                pflanzen++;
            }
            for (pflanzen = 1; pflanzen < Punkteverteiler; pflanzen++)
            {
                an = (an) + (Punkte[pflanzen]);
                ae = (ae) + (Math.Pow(Punkte[pflanzen], 2));
                az = (az) + (Math.Pow(Punkte[pflanzen], 3));
                ad = (ad) + (Math.Pow(Punkte[pflanzen], 4));
                av = (av) + (Math.Pow(Punkte[pflanzen], 5));
                pflanzen++;
            }
            n = n + Daten;

            for (zeiley = 0; zeiley < 5; zeiley++)
            {
                for (spaltex = 0; spaltex < 5; spaltex++)
                {
                    if ((spaltex == 1 && zeiley == 0) || (spaltex == 0 && zeiley == 1))
                    {
                        Matrix[zeiley, spaltex] = ti;
                    }
                    else if ((spaltex == 2 && zeiley == 0) || (spaltex == 1 && zeiley == 1) || (spaltex == 0 && zeiley == 2))
                    {
                        Matrix[zeiley, spaltex] = ti2;
                    }
                    else if ((spaltex == 2 && zeiley == 1) || (spaltex == 1 && zeiley == 2) || (spaltex == 0 && zeiley == 3) || (spaltex == 3 && zeiley == 0))
                    {
                        Matrix[zeiley, spaltex] = ti3;
                    }
                    else if ((spaltex == 0 && zeiley == 4) || (spaltex == 1 && zeiley == 3) || (spaltex == 2 && zeiley == 2) || (spaltex == 3 && zeiley == 1))
                    {
                        Matrix[zeiley, spaltex] = ti4;
                    }
                    else if ((spaltex == 1 && zeiley == 4) || (spaltex == 2 && zeiley == 3) || (spaltex == 3 && zeiley == 2))
                    {
                        Matrix[zeiley, spaltex] = ti5;
                    }
                    else if ((spaltex == 2 && zeiley == 4) || (spaltex == 3 && zeiley == 3))
                    {
                        Matrix[zeiley, spaltex] = ti6;
                    }
                    else if (spaltex == 3 && zeiley == 4)
                    {
                        Matrix[zeiley, spaltex] = ti7;
                    }
                    else if (spaltex == 0 && zeiley == 0)
                    {
                        Matrix[zeiley, spaltex] = n;
                    }
                    else if (spaltex == 4 && zeiley == 0)
                    {
                        Matrix[zeiley, spaltex] = an;
                    }
                    else if (spaltex == 4 && zeiley == 1)
                    {
                        Matrix[zeiley, spaltex] = ae;
                    }
                    else if (spaltex == 4 && zeiley == 2)
                    {
                        Matrix[zeiley, spaltex] = az;
                    }
                    else if (spaltex == 4 && zeiley == 3)
                    {
                        Matrix[zeiley, spaltex] = ad;
                    }
                    else if (spaltex == 4 && zeiley == 4)
                    {
                        Matrix[zeiley, spaltex] = av;
                    }
                }
            }
            // Hier gebe ich die Matrix normal aus
            for (zeiley = 0; zeiley < 5; zeiley++)
            {
                for (spaltex = 0; spaltex < 5; spaltex++)
                {
                    Console.Write(Matrix[zeiley, spaltex] + " ");
                }
                Console.WriteLine();
            }
            Console.WriteLine();
            Console.ReadKey();
            //Hier beginne ich mit der Matrix berechnung
            /*
            for (zeiley = 0; zeiley < 3; zeiley++)
            {
                for (spaltex = 0; spaltex < 4; spaltex++)
                {
                    Kopie[zeiley, spaltex] = Matrix[zeiley, spaltex];
                }
            }
            for (spaltex = 0; spaltex < 4; spaltex++)
            {
                Matrix[0, spaltex] = Kopie[0, spaltex] * Kopie[2, 0] * Kopie[1, 0];
                Matrix[1, spaltex] = Kopie[1, spaltex] * Kopie[2, 0] * Kopie[0, 0];
                Matrix[2, spaltex] = Kopie[2, spaltex] * Kopie[1, 0] * Kopie[0, 0];           
            }
            
            for (spaltex = 0; spaltex < 4; spaltex++)
                {
                    Matrix[1, spaltex] = Matrix[1, spaltex] - Matrix[0, spaltex];

                    Matrix[2, spaltex] = Matrix[2, spaltex] - Matrix[0, spaltex];
                }
            for (zeiley = 0; zeiley < 3; zeiley++)
            {
                for (spaltex = 0; spaltex < 4; spaltex++)
                {
                    Kopie[zeiley, spaltex] = Matrix[zeiley, spaltex];
                }
            }
            for (spaltex = 0; spaltex < 4; spaltex++)
            {
                Matrix[1, spaltex] = Matrix[1, spaltex] * Kopie[2, 1];
                Matrix[2, spaltex] = Matrix[2, spaltex] * Kopie[1, 1];
            }
            for(spaltex = 0; spaltex < 4; spaltex++)
            {
                Matrix[2, spaltex] = Matrix[2, spaltex] - Matrix[1, spaltex];
            }
            for (zeiley = 0; zeiley < 3; zeiley++)
            {
                for (spaltex = 0; spaltex < 4; spaltex++)
                {
                    Console.Write(Matrix[zeiley, spaltex] + " ");
                    Kopie[zeiley, spaltex] = Matrix[zeiley, spaltex];

                }
                Console.WriteLine();
            }
            double a = 0;
            double b = 0;
            double c = 0;

            a = Matrix[2, 3] / Matrix[2, 2];
            b = (Matrix[1, 3]) / (Matrix[1, 2] +(a)*Matrix[1,2]);
            c = (Matrix[0, 3]) / ((Matrix[0,2] *(a))+(Matrix[0, 1] * (b)));
            Console.WriteLine();
            Console.Write(a+"x^2 + "+b+"x + "+c);
            Console.WriteLine();
            Console.ReadLine();*/










        }
    }
}
