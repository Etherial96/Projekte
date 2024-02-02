using System;
using System.Collections.Generic;
using System.IO;
namespace ConsoleApp1
{
    class Program
    {   
        public struct Lagersystem
        {
           public int Preise;
           public string Artikelname;
           public int Artikelid;
        }

        static Lagersystem Macht(Lagersystem k)
        {
            
            Console.WriteLine(k.Artikelname + " wird jetzt verändert:");
            
                Console.Write("Artikelpreis = ");
                string p = Console.ReadLine();
                k.Preise = int.Parse(p);
                
                Console.Write("Artikelname = ");
                string g = Console.ReadLine();
                k.Artikelname = g;

                Console.Write("Artikel_ID = ");
                string d = Console.ReadLine();
                k.Artikelid = int.Parse(d);

            return k;
                
        }
        static void Main(string[] args)
        {

            var path = @"C:\Users\leon.schurna\Desktop\Arbeitsthemen\c# programme\einfache wiederholungsaufgaben_übungen\testo.txt";
            StreamWriter Speicher = new StreamWriter(path);

            Lagersystem[] Bestand = new Lagersystem[5];
            
            int i;
            int eingabe;
            int[] Liste = new int[4];
             
            /*List<int> Artikel = new List<int>();

            string b = Console.ReadLine();
            i = int.Parse(b);
            Artikel.Add(i);
            Console.WriteLine(Artikel[0]);*/



            while (1 == 1)
            {
                Console.WriteLine("0-4 um Artikel hinzuzufuegen; 14 = Alle Artikel aufrufen");
                string lese = Console.ReadLine();
                eingabe = int.Parse(lese);
                i = eingabe;
                if (eingabe < 4 && Liste[i] == 0)
                {
                    Bestand[i] = Macht(Bestand[i]);
                    Liste[i] = 1;
                    Speicher.Write(Bestand[i].Preise + Bestand[i].Artikelname + Bestand[i].Artikelid);
                }
                else if (eingabe == 14)
                {
                    for (i = 0; i < 5; i++)
                    {
                        Console.WriteLine("\nDatensatz = " + i + "\n\n" + "Artikelpreis = " + Bestand[i].Preise + "\n" + "Artikelname = " + Bestand[i].Artikelname + "\n" + "Artikelid = " + Bestand[i].Artikelid + "\n");
                    }

                }
                else if (eingabe == 15)
                {
                    StreamReader reader = new StreamReader(path);
                    var input = reader.ReadToEnd();
                    reader.Close();
                    Console.Write(input+"\n");
                }
                else if (eingabe == 17)
                {

                }
                else if(eingabe == 6)
                {
                    Speicher.Close();
                }
            }
        }

    }
}