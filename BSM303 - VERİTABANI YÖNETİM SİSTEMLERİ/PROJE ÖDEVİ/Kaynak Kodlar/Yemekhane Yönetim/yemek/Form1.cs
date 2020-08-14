using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using Npgsql;

namespace yemek
{
    public partial class Form1 : Form
    {
        Baglanti baglanti = new Baglanti();
        int panel = 0;
        int Move;
        int Mouse_X;
        int Mouse_Y;
        public Form1()
        {
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            panel_Kapat();
            pnlOgrenci.Visible = true;
            pnlOgrenci.Enabled = true;
        }

        private void Giris_Click(object sender, EventArgs e)
        {
            if (baglanti.oBaglan(oNo.Text, oSifre.Text) == true)
            {
                Ogrenci frmOgrenci = new Ogrenci(oNo.Text);
                frmOgrenci.Show();
                this.Hide();
            }
            else
            {
                MessageBox.Show("Giriş başarısız. Lütfen tekrar deneyin.");
            }
        }
        private void pGiris_Click(object sender, EventArgs e)
        {
            if (baglanti.pBaglan(pNo.Text, pSifre.Text) == true)
            {
                Personel frmPersonel = new Personel(pNo.Text);
                frmPersonel.Show();
                this.Hide();
            }
            else
            {
                MessageBox.Show("Giriş başarısız. Lütfen tekrar deneyin.");
            }
        }
        private void yGiris_Click(object sender, EventArgs e)
        {
            if (baglanti.yBaglan(yNo.Text, ySifre.Text) == true)
            {
                Yonetici frmYonetici = new Yonetici(yNo.Text);
                frmYonetici.Show();
                this.Hide();
            }
            else
            {
                MessageBox.Show("Giriş başarısız. Lütfen tekrar deneyin.");
            }
        }
        private void menu_Click(object sender, EventArgs e)
        {
            if (panel == 0)
            {
                pnlMenu.Visible = true;
                panel = 1;
                pnlPersonel.Enabled = false;
                pnlYonetici.Enabled = false;
                pnlHakkinda.Enabled = false;
                pnlOgrenci.Enabled = false;
            }
            else
            {
                pnlMenu.Visible = false;
                panel = 0;
                pnlPersonel.Enabled = true;
                pnlYonetici.Enabled = true;
                pnlHakkinda.Enabled = true;
                pnlOgrenci.Enabled = true;
            }
        }
        public void panel_Kapat() 
        {
            pnlHakkinda.Visible = false;
            pnlPersonel.Visible = false;
            pnlYonetici.Visible = false;
            pnlOgrenci.Visible = false;
            pnlMenu.Visible = false;
        }
        private void row1_Click(object sender, EventArgs e)
        {
            panel_Kapat();
            pnlPersonel.Visible = true;
            pnlPersonel.Enabled = true;
            panel = 0;
        }
        private void row2_Click(object sender, EventArgs e)
        {
            panel_Kapat();
            pnlYonetici.Visible = true;
            pnlYonetici.Enabled = true;
            panel = 0;
        }
        private void row3_Click(object sender, EventArgs e)
        {
            panel_Kapat();
            pnlHakkinda.Visible = true;
            pnlHakkinda.Enabled = true;
            panel = 0;
        }
        private void row5_Click(object sender, EventArgs e)
        {
            panel_Kapat();
            pnlOgrenci.Visible = true;
            pnlOgrenci.Enabled = true;
            panel = 0;
        }
        private void kapat_Click(object sender, EventArgs e)
        {
            Close();
        }
        private void pnlUst_MouseUp(object sender, MouseEventArgs e)
        {
            Move = 0;
        }
        private void pnlUst_MouseDown(object sender, MouseEventArgs e)
        {
            Move = 1;
            Mouse_X = e.X;
            Mouse_Y = e.Y;
        }
        private void pnlUst_MouseMove(object sender, MouseEventArgs e)
        {
            if (Move == 1)
            {
                this.SetDesktopLocation(MousePosition.X - Mouse_X, MousePosition.Y - Mouse_Y);
            }
        }
    }
}
