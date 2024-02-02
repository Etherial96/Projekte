using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ConsoleApp2
{
    class Program
    {
        static void Main(string[] args)
        {
            int p;


            for (p = 1; p <= 1000000; p = p + 2)
            {
                if (p > 9 && !(p % 3 == 0 || p % 5 == 0 || p % 7 == 0))
                {
                    Console.Write(p);
                }
                else if (p == 3 || p == 5 || p == 7)
                {
                    Console.Write(p);
                }
            }
        }
    }
}
 
