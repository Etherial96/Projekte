using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApp1
{
    class Program
    {
        static void Main(string[] args)
        {

            int S0;
            int S1;
            int S2;
            int S3;
            int S4;

            Console.WriteLine("S0 S1 S2 S3 S4 AN/AUS");
            for (S0 = 0; S0 <= 1; S0++)
            {
                for (S1 = 0; S1 <= 1; S1++)
                {
                    for (S2 = 0; S2 <= 1; S2++)
                    {
                        for (S3 = 0; S3 <= 1; S3++)
                        {
                            for (S4 = 0; S4 <= 1; S4++)
                            {
                                Console.Write($"{S0}  {S1}  {S2}  {S3}  {S4 }");

                                if (S3 == 1 && S2 == 1)
                                {
                                    Console.Write(" an");

                                }
                                else
                                        {
                                    Console.Write(" aus");
                                        }
                                Console.WriteLine();
                            }
                        }
                    }
                }
            }
        }
    }
}
