namespace yemek
{
    partial class Form1
    {
        /// <summary>
        ///Gerekli tasarımcı değişkeni.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        ///Kullanılan tüm kaynakları temizleyin.
        /// </summary>
        ///<param name="disposing">yönetilen kaynaklar dispose edilmeliyse doğru; aksi halde yanlış.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer üretilen kod

        /// <summary>
        /// Tasarımcı desteği için gerekli metot - bu metodun 
        ///içeriğini kod düzenleyici ile değiştirmeyin.
        /// </summary>
        private void InitializeComponent()
        {
            this.tbno = new System.Windows.Forms.Label();
            this.pSifre = new System.Windows.Forms.TextBox();
            this.pNo = new System.Windows.Forms.TextBox();
            this.label3 = new System.Windows.Forms.Label();
            this.lblNo = new System.Windows.Forms.Label();
            this.pGiris = new System.Windows.Forms.Button();
            this.button4 = new System.Windows.Forms.Button();
            this.lbGiris = new System.Windows.Forms.Label();
            this.pnlUst = new System.Windows.Forms.Panel();
            this.btnCikis = new System.Windows.Forms.Button();
            this.btnMenu = new System.Windows.Forms.Button();
            this.pnlMenu = new System.Windows.Forms.Panel();
            this.row4 = new System.Windows.Forms.Button();
            this.row3 = new System.Windows.Forms.Button();
            this.row2 = new System.Windows.Forms.Button();
            this.row1 = new System.Windows.Forms.Button();
            this.pnlPersonel = new System.Windows.Forms.Panel();
            this.pnlYonetici = new System.Windows.Forms.Panel();
            this.label1 = new System.Windows.Forms.Label();
            this.yGiris = new System.Windows.Forms.Button();
            this.label2 = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.button10 = new System.Windows.Forms.Button();
            this.yNo = new System.Windows.Forms.TextBox();
            this.ySifre = new System.Windows.Forms.TextBox();
            this.pnlHakkinda = new System.Windows.Forms.Panel();
            this.label5 = new System.Windows.Forms.Label();
            this.label6 = new System.Windows.Forms.Label();
            this.label7 = new System.Windows.Forms.Label();
            this.button12 = new System.Windows.Forms.Button();
            this.row5 = new System.Windows.Forms.Button();
            this.pnlOgrenci = new System.Windows.Forms.Panel();
            this.label8 = new System.Windows.Forms.Label();
            this.Giris = new System.Windows.Forms.Button();
            this.label9 = new System.Windows.Forms.Label();
            this.label10 = new System.Windows.Forms.Label();
            this.button2 = new System.Windows.Forms.Button();
            this.oNo = new System.Windows.Forms.TextBox();
            this.oSifre = new System.Windows.Forms.TextBox();
            this.pnlUst.SuspendLayout();
            this.pnlMenu.SuspendLayout();
            this.pnlPersonel.SuspendLayout();
            this.pnlYonetici.SuspendLayout();
            this.pnlHakkinda.SuspendLayout();
            this.pnlOgrenci.SuspendLayout();
            this.SuspendLayout();
            // 
            // tbno
            // 
            this.tbno.AutoSize = true;
            this.tbno.Location = new System.Drawing.Point(12, 8);
            this.tbno.Name = "tbno";
            this.tbno.Size = new System.Drawing.Size(0, 13);
            this.tbno.TabIndex = 38;
            // 
            // pSifre
            // 
            this.pSifre.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.pSifre.Location = new System.Drawing.Point(212, 116);
            this.pSifre.Name = "pSifre";
            this.pSifre.Size = new System.Drawing.Size(185, 22);
            this.pSifre.TabIndex = 35;
            this.pSifre.UseSystemPasswordChar = true;
            // 
            // pNo
            // 
            this.pNo.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.pNo.Location = new System.Drawing.Point(212, 90);
            this.pNo.MaxLength = 10;
            this.pNo.Name = "pNo";
            this.pNo.Size = new System.Drawing.Size(185, 22);
            this.pNo.TabIndex = 34;
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.label3.ForeColor = System.Drawing.Color.White;
            this.label3.Location = new System.Drawing.Point(91, 122);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(52, 16);
            this.label3.TabIndex = 33;
            this.label3.Text = "ŞİFRE";
            // 
            // lblNo
            // 
            this.lblNo.AutoSize = true;
            this.lblNo.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.lblNo.ForeColor = System.Drawing.Color.White;
            this.lblNo.Location = new System.Drawing.Point(91, 93);
            this.lblNo.Name = "lblNo";
            this.lblNo.Size = new System.Drawing.Size(115, 16);
            this.lblNo.TabIndex = 32;
            this.lblNo.Text = "PERSONEL NO";
            // 
            // pGiris
            // 
            this.pGiris.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(76)))), ((int)(((byte)(175)))), ((int)(((byte)(80)))));
            this.pGiris.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.pGiris.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.pGiris.ForeColor = System.Drawing.Color.White;
            this.pGiris.Location = new System.Drawing.Point(118, 173);
            this.pGiris.Name = "pGiris";
            this.pGiris.Size = new System.Drawing.Size(251, 32);
            this.pGiris.TabIndex = 28;
            this.pGiris.Text = "GİRİŞ";
            this.pGiris.UseVisualStyleBackColor = false;
            this.pGiris.Click += new System.EventHandler(this.pGiris_Click);
            // 
            // button4
            // 
            this.button4.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(198)))), ((int)(((byte)(16)))), ((int)(((byte)(23)))));
            this.button4.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.button4.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.button4.ForeColor = System.Drawing.Color.White;
            this.button4.Location = new System.Drawing.Point(118, 211);
            this.button4.Name = "button4";
            this.button4.Size = new System.Drawing.Size(251, 32);
            this.button4.TabIndex = 39;
            this.button4.Text = "ÇIKIŞ";
            this.button4.UseVisualStyleBackColor = false;
            this.button4.Click += new System.EventHandler(this.kapat_Click);
            // 
            // lbGiris
            // 
            this.lbGiris.AutoSize = true;
            this.lbGiris.Font = new System.Drawing.Font("Microsoft Sans Serif", 21.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.lbGiris.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(255)))), ((int)(((byte)(128)))));
            this.lbGiris.Location = new System.Drawing.Point(103, 26);
            this.lbGiris.Name = "lbGiris";
            this.lbGiris.Size = new System.Drawing.Size(282, 33);
            this.lbGiris.TabIndex = 41;
            this.lbGiris.Text = "PERSONEL GİRİŞİ";
            // 
            // pnlUst
            // 
            this.pnlUst.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(52)))), ((int)(((byte)(73)))), ((int)(((byte)(94)))));
            this.pnlUst.Controls.Add(this.btnCikis);
            this.pnlUst.Controls.Add(this.btnMenu);
            this.pnlUst.Dock = System.Windows.Forms.DockStyle.Top;
            this.pnlUst.Location = new System.Drawing.Point(0, 0);
            this.pnlUst.Name = "pnlUst";
            this.pnlUst.Size = new System.Drawing.Size(474, 31);
            this.pnlUst.TabIndex = 43;
            this.pnlUst.MouseDown += new System.Windows.Forms.MouseEventHandler(this.pnlUst_MouseDown);
            this.pnlUst.MouseMove += new System.Windows.Forms.MouseEventHandler(this.pnlUst_MouseMove);
            this.pnlUst.MouseUp += new System.Windows.Forms.MouseEventHandler(this.pnlUst_MouseUp);
            // 
            // btnCikis
            // 
            this.btnCikis.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(198)))), ((int)(((byte)(16)))), ((int)(((byte)(23)))));
            this.btnCikis.BackgroundImage = global::yemek.Properties.Resources.exit;
            this.btnCikis.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Zoom;
            this.btnCikis.Dock = System.Windows.Forms.DockStyle.Right;
            this.btnCikis.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnCikis.ImageAlign = System.Drawing.ContentAlignment.TopLeft;
            this.btnCikis.Location = new System.Drawing.Point(421, 0);
            this.btnCikis.Name = "btnCikis";
            this.btnCikis.Size = new System.Drawing.Size(53, 31);
            this.btnCikis.TabIndex = 43;
            this.btnCikis.UseVisualStyleBackColor = false;
            this.btnCikis.Click += new System.EventHandler(this.kapat_Click);
            // 
            // btnMenu
            // 
            this.btnMenu.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(76)))), ((int)(((byte)(175)))), ((int)(((byte)(80)))));
            this.btnMenu.BackgroundImage = global::yemek.Properties.Resources.menu_icon;
            this.btnMenu.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Zoom;
            this.btnMenu.Dock = System.Windows.Forms.DockStyle.Left;
            this.btnMenu.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnMenu.ImageAlign = System.Drawing.ContentAlignment.TopLeft;
            this.btnMenu.Location = new System.Drawing.Point(0, 0);
            this.btnMenu.Name = "btnMenu";
            this.btnMenu.Size = new System.Drawing.Size(53, 31);
            this.btnMenu.TabIndex = 42;
            this.btnMenu.UseVisualStyleBackColor = false;
            this.btnMenu.Click += new System.EventHandler(this.menu_Click);
            // 
            // pnlMenu
            // 
            this.pnlMenu.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(52)))), ((int)(((byte)(73)))), ((int)(((byte)(94)))));
            this.pnlMenu.Controls.Add(this.row5);
            this.pnlMenu.Controls.Add(this.row4);
            this.pnlMenu.Controls.Add(this.row3);
            this.pnlMenu.Controls.Add(this.row2);
            this.pnlMenu.Controls.Add(this.row1);
            this.pnlMenu.Dock = System.Windows.Forms.DockStyle.Left;
            this.pnlMenu.Location = new System.Drawing.Point(0, 31);
            this.pnlMenu.Name = "pnlMenu";
            this.pnlMenu.Size = new System.Drawing.Size(137, 280);
            this.pnlMenu.TabIndex = 44;
            // 
            // row4
            // 
            this.row4.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(198)))), ((int)(((byte)(16)))), ((int)(((byte)(23)))));
            this.row4.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.row4.Font = new System.Drawing.Font("Microsoft Sans Serif", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.row4.ForeColor = System.Drawing.Color.White;
            this.row4.Location = new System.Drawing.Point(3, 244);
            this.row4.Name = "row4";
            this.row4.Size = new System.Drawing.Size(131, 32);
            this.row4.TabIndex = 45;
            this.row4.Text = "ÇIKIŞ";
            this.row4.UseVisualStyleBackColor = false;
            this.row4.Click += new System.EventHandler(this.kapat_Click);
            // 
            // row3
            // 
            this.row3.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(76)))), ((int)(((byte)(175)))), ((int)(((byte)(80)))));
            this.row3.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.row3.Font = new System.Drawing.Font("Microsoft Sans Serif", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.row3.ForeColor = System.Drawing.Color.White;
            this.row3.Location = new System.Drawing.Point(3, 208);
            this.row3.Name = "row3";
            this.row3.Size = new System.Drawing.Size(131, 32);
            this.row3.TabIndex = 44;
            this.row3.Text = "HAKKINDA";
            this.row3.UseVisualStyleBackColor = false;
            this.row3.Click += new System.EventHandler(this.row3_Click);
            // 
            // row2
            // 
            this.row2.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(76)))), ((int)(((byte)(175)))), ((int)(((byte)(80)))));
            this.row2.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.row2.Font = new System.Drawing.Font("Microsoft Sans Serif", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.row2.ForeColor = System.Drawing.Color.White;
            this.row2.Location = new System.Drawing.Point(3, 140);
            this.row2.Name = "row2";
            this.row2.Size = new System.Drawing.Size(131, 64);
            this.row2.TabIndex = 43;
            this.row2.Text = "YÖNETİCİ GİRİŞİ";
            this.row2.UseVisualStyleBackColor = false;
            this.row2.Click += new System.EventHandler(this.row2_Click);
            // 
            // row1
            // 
            this.row1.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(76)))), ((int)(((byte)(175)))), ((int)(((byte)(80)))));
            this.row1.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.row1.Font = new System.Drawing.Font("Microsoft Sans Serif", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.row1.ForeColor = System.Drawing.Color.White;
            this.row1.Location = new System.Drawing.Point(3, 72);
            this.row1.Name = "row1";
            this.row1.Size = new System.Drawing.Size(131, 64);
            this.row1.TabIndex = 42;
            this.row1.Text = "PERSONEL GİRİŞİ";
            this.row1.UseVisualStyleBackColor = false;
            this.row1.Click += new System.EventHandler(this.row1_Click);
            // 
            // pnlPersonel
            // 
            this.pnlPersonel.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.pnlPersonel.Controls.Add(this.lbGiris);
            this.pnlPersonel.Controls.Add(this.pGiris);
            this.pnlPersonel.Controls.Add(this.lblNo);
            this.pnlPersonel.Controls.Add(this.label3);
            this.pnlPersonel.Controls.Add(this.button4);
            this.pnlPersonel.Controls.Add(this.pNo);
            this.pnlPersonel.Controls.Add(this.pSifre);
            this.pnlPersonel.Location = new System.Drawing.Point(0, 31);
            this.pnlPersonel.Name = "pnlPersonel";
            this.pnlPersonel.Size = new System.Drawing.Size(474, 280);
            this.pnlPersonel.TabIndex = 45;
            // 
            // pnlYonetici
            // 
            this.pnlYonetici.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.pnlYonetici.Controls.Add(this.label1);
            this.pnlYonetici.Controls.Add(this.yGiris);
            this.pnlYonetici.Controls.Add(this.label2);
            this.pnlYonetici.Controls.Add(this.label4);
            this.pnlYonetici.Controls.Add(this.button10);
            this.pnlYonetici.Controls.Add(this.yNo);
            this.pnlYonetici.Controls.Add(this.ySifre);
            this.pnlYonetici.Location = new System.Drawing.Point(0, 31);
            this.pnlYonetici.Name = "pnlYonetici";
            this.pnlYonetici.Size = new System.Drawing.Size(474, 280);
            this.pnlYonetici.TabIndex = 46;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Microsoft Sans Serif", 21.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.label1.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(255)))), ((int)(((byte)(128)))));
            this.label1.Location = new System.Drawing.Point(107, 26);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(263, 33);
            this.label1.TabIndex = 41;
            this.label1.Text = "YÖNETİCİ GİRİŞİ";
            // 
            // yGiris
            // 
            this.yGiris.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(76)))), ((int)(((byte)(175)))), ((int)(((byte)(80)))));
            this.yGiris.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.yGiris.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.yGiris.ForeColor = System.Drawing.Color.White;
            this.yGiris.Location = new System.Drawing.Point(118, 173);
            this.yGiris.Name = "yGiris";
            this.yGiris.Size = new System.Drawing.Size(251, 32);
            this.yGiris.TabIndex = 28;
            this.yGiris.Text = "GİRİŞ";
            this.yGiris.UseVisualStyleBackColor = false;
            this.yGiris.Click += new System.EventHandler(this.yGiris_Click);
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.label2.ForeColor = System.Drawing.Color.White;
            this.label2.Location = new System.Drawing.Point(91, 93);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(104, 16);
            this.label2.TabIndex = 32;
            this.label2.Text = "YÖNETİCİ NO";
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.label4.ForeColor = System.Drawing.Color.White;
            this.label4.Location = new System.Drawing.Point(91, 122);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(52, 16);
            this.label4.TabIndex = 33;
            this.label4.Text = "ŞİFRE";
            // 
            // button10
            // 
            this.button10.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(198)))), ((int)(((byte)(16)))), ((int)(((byte)(23)))));
            this.button10.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.button10.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.button10.ForeColor = System.Drawing.Color.White;
            this.button10.Location = new System.Drawing.Point(118, 211);
            this.button10.Name = "button10";
            this.button10.Size = new System.Drawing.Size(251, 32);
            this.button10.TabIndex = 39;
            this.button10.Text = "ÇIKIŞ";
            this.button10.UseVisualStyleBackColor = false;
            this.button10.Click += new System.EventHandler(this.kapat_Click);
            // 
            // yNo
            // 
            this.yNo.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.yNo.Location = new System.Drawing.Point(212, 90);
            this.yNo.MaxLength = 10;
            this.yNo.Name = "yNo";
            this.yNo.Size = new System.Drawing.Size(185, 22);
            this.yNo.TabIndex = 34;
            // 
            // ySifre
            // 
            this.ySifre.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.ySifre.Location = new System.Drawing.Point(212, 116);
            this.ySifre.Name = "ySifre";
            this.ySifre.Size = new System.Drawing.Size(185, 22);
            this.ySifre.TabIndex = 35;
            this.ySifre.UseSystemPasswordChar = true;
            // 
            // pnlHakkinda
            // 
            this.pnlHakkinda.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.pnlHakkinda.Controls.Add(this.label5);
            this.pnlHakkinda.Controls.Add(this.label6);
            this.pnlHakkinda.Controls.Add(this.label7);
            this.pnlHakkinda.Controls.Add(this.button12);
            this.pnlHakkinda.Location = new System.Drawing.Point(0, 31);
            this.pnlHakkinda.Name = "pnlHakkinda";
            this.pnlHakkinda.Size = new System.Drawing.Size(474, 280);
            this.pnlHakkinda.TabIndex = 46;
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Font = new System.Drawing.Font("Microsoft Sans Serif", 21.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.label5.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(255)))), ((int)(((byte)(128)))));
            this.label5.Location = new System.Drawing.Point(162, 28);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(170, 33);
            this.label5.TabIndex = 41;
            this.label5.Text = "HAKKINDA";
            // 
            // label6
            // 
            this.label6.AutoSize = true;
            this.label6.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.label6.ForeColor = System.Drawing.Color.White;
            this.label6.Location = new System.Drawing.Point(130, 96);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(219, 16);
            this.label6.TabIndex = 32;
            this.label6.Text = "HÜSEYİN BURHAN BAŞARAN";
            // 
            // label7
            // 
            this.label7.AutoSize = true;
            this.label7.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.label7.ForeColor = System.Drawing.Color.White;
            this.label7.Location = new System.Drawing.Point(130, 122);
            this.label7.Name = "label7";
            this.label7.Size = new System.Drawing.Size(91, 16);
            this.label7.TabIndex = 33;
            this.label7.Text = "G191210077";
            // 
            // button12
            // 
            this.button12.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(198)))), ((int)(((byte)(16)))), ((int)(((byte)(23)))));
            this.button12.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.button12.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.button12.ForeColor = System.Drawing.Color.White;
            this.button12.Location = new System.Drawing.Point(118, 211);
            this.button12.Name = "button12";
            this.button12.Size = new System.Drawing.Size(251, 32);
            this.button12.TabIndex = 39;
            this.button12.Text = "ÇIKIŞ";
            this.button12.UseVisualStyleBackColor = false;
            this.button12.Click += new System.EventHandler(this.kapat_Click);
            // 
            // row5
            // 
            this.row5.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(76)))), ((int)(((byte)(175)))), ((int)(((byte)(80)))));
            this.row5.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.row5.Font = new System.Drawing.Font("Microsoft Sans Serif", 14.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.row5.ForeColor = System.Drawing.Color.White;
            this.row5.Location = new System.Drawing.Point(3, 4);
            this.row5.Name = "row5";
            this.row5.Size = new System.Drawing.Size(131, 64);
            this.row5.TabIndex = 46;
            this.row5.Text = "ÖĞRENCİ GİRİŞİ";
            this.row5.UseVisualStyleBackColor = false;
            this.row5.Click += new System.EventHandler(this.row5_Click);
            // 
            // pnlOgrenci
            // 
            this.pnlOgrenci.BorderStyle = System.Windows.Forms.BorderStyle.FixedSingle;
            this.pnlOgrenci.Controls.Add(this.label8);
            this.pnlOgrenci.Controls.Add(this.Giris);
            this.pnlOgrenci.Controls.Add(this.label9);
            this.pnlOgrenci.Controls.Add(this.label10);
            this.pnlOgrenci.Controls.Add(this.button2);
            this.pnlOgrenci.Controls.Add(this.oNo);
            this.pnlOgrenci.Controls.Add(this.oSifre);
            this.pnlOgrenci.Location = new System.Drawing.Point(0, 31);
            this.pnlOgrenci.Name = "pnlOgrenci";
            this.pnlOgrenci.Size = new System.Drawing.Size(474, 280);
            this.pnlOgrenci.TabIndex = 47;
            // 
            // label8
            // 
            this.label8.AutoSize = true;
            this.label8.Font = new System.Drawing.Font("Microsoft Sans Serif", 21.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.label8.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(255)))), ((int)(((byte)(128)))));
            this.label8.Location = new System.Drawing.Point(109, 26);
            this.label8.Name = "label8";
            this.label8.Size = new System.Drawing.Size(260, 33);
            this.label8.TabIndex = 41;
            this.label8.Text = "ÖĞRENCİ GİRİŞİ";
            // 
            // Giris
            // 
            this.Giris.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(76)))), ((int)(((byte)(175)))), ((int)(((byte)(80)))));
            this.Giris.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.Giris.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.Giris.ForeColor = System.Drawing.Color.White;
            this.Giris.Location = new System.Drawing.Point(118, 173);
            this.Giris.Name = "Giris";
            this.Giris.Size = new System.Drawing.Size(251, 32);
            this.Giris.TabIndex = 28;
            this.Giris.Text = "GİRİŞ";
            this.Giris.UseVisualStyleBackColor = false;
            this.Giris.Click += new System.EventHandler(this.Giris_Click);
            // 
            // label9
            // 
            this.label9.AutoSize = true;
            this.label9.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.label9.ForeColor = System.Drawing.Color.White;
            this.label9.Location = new System.Drawing.Point(91, 93);
            this.label9.Name = "label9";
            this.label9.Size = new System.Drawing.Size(102, 16);
            this.label9.TabIndex = 32;
            this.label9.Text = "ÖĞRENCİ NO";
            // 
            // label10
            // 
            this.label10.AutoSize = true;
            this.label10.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.label10.ForeColor = System.Drawing.Color.White;
            this.label10.Location = new System.Drawing.Point(91, 122);
            this.label10.Name = "label10";
            this.label10.Size = new System.Drawing.Size(52, 16);
            this.label10.TabIndex = 33;
            this.label10.Text = "ŞİFRE";
            // 
            // button2
            // 
            this.button2.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(198)))), ((int)(((byte)(16)))), ((int)(((byte)(23)))));
            this.button2.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.button2.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.button2.ForeColor = System.Drawing.Color.White;
            this.button2.Location = new System.Drawing.Point(118, 211);
            this.button2.Name = "button2";
            this.button2.Size = new System.Drawing.Size(251, 32);
            this.button2.TabIndex = 39;
            this.button2.Text = "ÇIKIŞ";
            this.button2.UseVisualStyleBackColor = false;
            this.button2.Click += new System.EventHandler(this.kapat_Click);
            // 
            // oNo
            // 
            this.oNo.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.oNo.Location = new System.Drawing.Point(212, 90);
            this.oNo.MaxLength = 10;
            this.oNo.Name = "oNo";
            this.oNo.Size = new System.Drawing.Size(185, 22);
            this.oNo.TabIndex = 34;
            // 
            // oSifre
            // 
            this.oSifre.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(162)));
            this.oSifre.Location = new System.Drawing.Point(212, 116);
            this.oSifre.Name = "oSifre";
            this.oSifre.Size = new System.Drawing.Size(185, 22);
            this.oSifre.TabIndex = 35;
            this.oSifre.UseSystemPasswordChar = true;
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(75)))), ((int)(((byte)(101)))), ((int)(((byte)(128)))));
            this.ClientSize = new System.Drawing.Size(474, 311);
            this.Controls.Add(this.pnlMenu);
            this.Controls.Add(this.pnlUst);
            this.Controls.Add(this.tbno);
            this.Controls.Add(this.pnlOgrenci);
            this.Controls.Add(this.pnlYonetici);
            this.Controls.Add(this.pnlHakkinda);
            this.Controls.Add(this.pnlPersonel);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.None;
            this.Name = "Form1";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Load += new System.EventHandler(this.Form1_Load);
            this.pnlUst.ResumeLayout(false);
            this.pnlMenu.ResumeLayout(false);
            this.pnlPersonel.ResumeLayout(false);
            this.pnlPersonel.PerformLayout();
            this.pnlYonetici.ResumeLayout(false);
            this.pnlYonetici.PerformLayout();
            this.pnlHakkinda.ResumeLayout(false);
            this.pnlHakkinda.PerformLayout();
            this.pnlOgrenci.ResumeLayout(false);
            this.pnlOgrenci.PerformLayout();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion
        private System.Windows.Forms.Label tbno;
        private System.Windows.Forms.TextBox pSifre;
        private System.Windows.Forms.TextBox pNo;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Label lblNo;
        private System.Windows.Forms.Button pGiris;
        private System.Windows.Forms.Button button4;
        private System.Windows.Forms.Label lbGiris;
        private System.Windows.Forms.Panel pnlUst;
        private System.Windows.Forms.Panel pnlMenu;
        private System.Windows.Forms.Panel pnlPersonel;
        private System.Windows.Forms.Button row4;
        private System.Windows.Forms.Button row3;
        private System.Windows.Forms.Button row2;
        private System.Windows.Forms.Button row1;
        private System.Windows.Forms.Button btnMenu;
        private System.Windows.Forms.Button btnCikis;
        private System.Windows.Forms.Panel pnlYonetici;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.Button yGiris;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.Button button10;
        private System.Windows.Forms.TextBox yNo;
        private System.Windows.Forms.TextBox ySifre;
        private System.Windows.Forms.Panel pnlHakkinda;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.Label label6;
        private System.Windows.Forms.Label label7;
        private System.Windows.Forms.Button button12;
        private System.Windows.Forms.Button row5;
        private System.Windows.Forms.Panel pnlOgrenci;
        private System.Windows.Forms.Label label8;
        private System.Windows.Forms.Button Giris;
        private System.Windows.Forms.Label label9;
        private System.Windows.Forms.Label label10;
        private System.Windows.Forms.Button button2;
        private System.Windows.Forms.TextBox oNo;
        private System.Windows.Forms.TextBox oSifre;
    }
}

