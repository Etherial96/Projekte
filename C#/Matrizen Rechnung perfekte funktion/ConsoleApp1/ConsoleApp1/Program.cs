using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;


namespace ConsoleApp1
{
    class Program
    {
        static void Funktionscreater(ref double[,] Matrix, ref double[,] Kopie, ref int y, ref int x)
        {
            int varispeicher = y;
            int zei4 = y - 1;
            int spa4 = x - 2;
            int zei3 = y-1;
            int zei2 = 0;
            int zei = 0;
            int spa = 0;
            int spa2 = x-2;
            int counter = x-2;
            int multiple = y - 1;
            double[] loesungsvariabeln = new double[50];
            double[] merken = new double[10];
            double[] endfunktion = new double[100];
            int ende = 0;

            loesungsvariabeln[varispeicher] = Matrix[y-1, x-1] / Matrix[y-1, x-2] ;
            //Console.WriteLine(Matrix[y-1, x-1] + " / " + Matrix[y-1, x-2] + " varispeicher+1 = " + varispeicher);
            endfunktion[ende] = loesungsvariabeln[varispeicher];
            ende++;
            for (zei = y-1; zei >= 0; zei--)
            {
                for (spa = x-1; spa >= 0; spa--)
                {
                        for (zei2 = y - 2; zei2 >= 0; zei2--)
                        { 
                            Kopie[zei2, spa2] = loesungsvariabeln[varispeicher] * Matrix[zei2, counter];
                            //Console.WriteLine(loesungsvariabeln[varispeicher] + " * " + Matrix[zei2, counter] + " = " + Kopie[zei2, spa2] + " varispeicher =" + varispeicher/* + " Zwischenstand abspeicherung ind zeile = " + zei2 + " spalte = " + counter*/);

                            if (Kopie[zei2, spa2] < 0)
                            {
                                Kopie[zei2, x - 1] += (Kopie[zei2, spa2] * -1);
                            }
                            else
                            {
                                Kopie[zei2, x - 1] += Kopie[zei2, spa2] * -1;
                            }
                            //Console.WriteLine("Ergebnis " + Kopie[zei2, x - 1] + " wurde addiert mit = " + Kopie[zei2, spa2] + " zei2 = " + zei2 + " spa2 = " + spa2);
                        }
                        spa2--;
                        counter--;

                        endfunktion[ende] = loesungsvariabeln[varispeicher];
                        ende++;

                        if(zei4-1 < 1)
                        {
                            zei4 = 1;
                            spa4 = 1;
                        } 
                        loesungsvariabeln[varispeicher] = Kopie[zei3-1, x - 1] / Matrix[zei4-1, spa4-1];
                        //Console.WriteLine(Kopie[zei3-1, x - 1] + "/ " + Matrix[zei4-1, spa4-1] + " =" + loesungsvariabeln[varispeicher] + " varispeicher " + varispeicher);
                        if (zei3-1 > 0)
                        {
                            zei3--;
                        }
                        spa4--;
                        zei4--;
                        break;
                }
            }
            Console.Write("f(x)= ");
            int count = y;
            for (ende = 1; ende < y+1; ende++)
            {
                Console.Write(endfunktion[ende]+"x"+count+" ");
                count--;
            }
        }
        static void Kopiematrix(ref int zeiley, ref int spaltex, ref double[,] Matrix, ref double[,] Kopie, ref int y, ref int x)
        {
            for (zeiley = 0; zeiley < y; zeiley++)
            {
                for (spaltex = 0; spaltex < x; spaltex++)
                {
                    Kopie[zeiley, spaltex] = Matrix[zeiley, spaltex];
                }
            }
        }
        static void Multirechnung(ref int spaltex, ref int x, ref double[,] Kopie, ref int zeiley, ref int y, ref double Speicher, ref double[,] Matrix)
        {
            //Rechenprozess des Gaußverfahrens Treppenstruktur

            for (int z = 0; z < Matrix.GetLength(0); z++)
            {
                for (zeiley = z + 1; zeiley < Matrix.GetLength(0); zeiley++)
                {
                    double Zwischenspeicher = Matrix[zeiley, z];
                    //Console.WriteLine("z = " + z + " y= " + zeiley);
                    //Console.WriteLine(" Zw = "+Zwischenspeicher);

                    for (spaltex = z; spaltex < Matrix.GetLength(0); spaltex++)
                    {
                        //Console.WriteLine(Matrix[zeiley, spaltex] + " - ((" + Zwischenspeicher + " / " + Matrix[z, z] + ") * " + Matrix[z, spaltex] + ")"+"zeiley = "+ spaltex+" z="+ z);
                        Matrix[zeiley, spaltex] = Matrix[zeiley, spaltex] - ((Zwischenspeicher / Matrix[z, z]) * Matrix[z, spaltex]);
                    }
                }
            }
        }
              
        static void Main(string[] args)
        {
            int groesse = 32;
            double[] Punkte = new double[groesse];

            Punkte[0] = 365;
            Punkte[1] = 32;
            Punkte[2] = 3;
            Punkte[3] = 35;
            Punkte[4] = 5;
            Punkte[5] = 21;
            Punkte[6] = 7;
            Punkte[7] = 38;
            Punkte[8] = 9;
            Punkte[9] = 32;
            Punkte[10] = 11;
            Punkte[11] = 35;
            Punkte[12] = 13;
            Punkte[13] = 21;
            Punkte[14] = 14;
            Punkte[15] = 38;
            Punkte[16] = 15;
            Punkte[17] = 32;
            Punkte[18] = 32;
            Punkte[19] = 35;
            Punkte[20] = 52;
            Punkte[21] = 21;
            Punkte[22] = 72;
            Punkte[23] = 38;
            Punkte[24] = 92;
            Punkte[25] = 32;
            Punkte[26] = 24;
            Punkte[27] = 35;
            Punkte[28] = 65;
            Punkte[29] = 21;
            Punkte[30] = 67;
            Punkte[31] = 38;

            int Punkteverteiler = (Punkte.Length);
            int go;
            int goes;
            double Pointsum;
            double Pointsumdubel;
            double sum1 = 0;
            double sum2 = 0;
            double sum3 = 0;
            double ersetzer;
            double counters = 0;
            int veraenderer = 0;
            double pointchanger;
            for(go = 0; go < Punkteverteiler; go++)
            {
                for (goes = go; goes < Punkteverteiler; goes++)
                {
                    Pointsum = Punkte[go];
                    Pointsumdubel = Punkte[goes];
                    if (Punkte[go] == Punkte[goes] && go != goes)
                    {
                        pointchanger = Punkte[go];
                        veraenderer++;
                        counters = counters + 2;
                        sum1 = Punkte[go + 1];
                        sum2 = Punkte[goes + 1];
                        sum3 = Punkte[goes + 1] + Punkte[go + 1] + sum3;
                        ersetzer = Punkte[go];
                        Console.WriteLine(Punkte[go]);

                    }
                    goes++;
                }
                go++;
            }
            sum3 = sum3 / counters;

            for(go = 0; go < Punkteverteiler; go++)
            {
                //if()
            }
            Console.WriteLine(sum3+" "+veraenderer+" "+counters);

            int count = 0;
            int Punktevergabe = 0;
            int potenzierzaehler = 0;
            int potenzieren = 2;
            int Daten = (Punkte.Length) / 2;
            int x = Daten+1;
            int y = Daten;
            int zeiley = y;
            int spaltex = x;
            int multix = x;
            int dfull = 1;
            double Speicher = 1;

            double[,] Matrix = new double[x, y+1];
            double[,] Kopie = new double[x, y+1];
            for (zeiley = 0; zeiley < y; zeiley++)
            {
                for(spaltex = 0; spaltex < x; spaltex++)
                {   
                    if (spaltex == 0)
                    {   
                        Matrix[zeiley, spaltex] = 1;
                    }
                    if(Matrix[zeiley,spaltex] == 0 && spaltex == 1)
                    {
                        for(count = 0; count < 1; count++)
                        {
                            Matrix[zeiley, spaltex] = Punkte[Punktevergabe];
                            Punktevergabe = Punktevergabe + 2;
                        }
                    }
                    if(Matrix[zeiley, spaltex] == 0 && spaltex > 1 && spaltex < Daten)
                    {
                        
                            for (potenzieren = 2; potenzieren < y; potenzieren++)
                            {
                                Matrix[zeiley, spaltex] = Math.Pow(Punkte[potenzierzaehler], potenzieren);
                                spaltex++;
                            }
                            potenzierzaehler = potenzierzaehler +2;       
                    }
                    if (spaltex == Daten)
                    {
                        Matrix[zeiley, spaltex] = Punkte[dfull];
                        dfull = dfull + 2;
                    }
                }                 
            }
            // Hier gebe ich die Matrix normal aus
            for (zeiley = 0; zeiley < y; zeiley++)
            {
                for (spaltex = 0; spaltex < x; spaltex++)
                {
                    Console.Write(Matrix[zeiley, spaltex] + " ");
                }
                Console.WriteLine();
            }
            Console.WriteLine();

            //Berechnung der Funktion aus den Daten der Matrix
            Program.Multirechnung(ref spaltex, ref x, ref Kopie, ref zeiley, ref y, ref Speicher, ref Matrix);
            Program.Kopiematrix(ref zeiley, ref spaltex, ref Matrix, ref Kopie, ref y, ref x);
         
            //Ausgabe

            for (zeiley = 0; zeiley < y; zeiley++)
            {
                for (spaltex = 0; spaltex < x; spaltex++)
                {
                    Console.Write(Matrix[zeiley, spaltex] + " ");
                }
                Console.WriteLine();
            }
            Console.WriteLine();
            Program.Funktionscreater(ref Matrix, ref Kopie, ref y, ref x);
            Console.ReadLine();         
            }
        }
    }
