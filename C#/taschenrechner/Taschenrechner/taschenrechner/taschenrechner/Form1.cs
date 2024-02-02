using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace taschenrechner
{
    public partial class Form1 : Form
    {
        private double x;
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {

        }
        
        private void button12_Click(object sender, EventArgs e)
        {

        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {
            try
            {
                x = Convert.ToDouble(textBox1.Text);
            }
            catch
            {
                textBox1.Text = "";
                x = 0;
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {
            Button button3_Click = sender as Button;
            textBox1.Text += button3_Click.Text;
        }
    }
}
