using Npgsql;
using System;
using System.Collections.Generic;
using System.Data;
using System.Globalization;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace yemek
{
    class Baglanti
    {
        public string ogrAd;
        public bool ogrDurum;
        public double ogrBakiye;
        public int ogrKartNo;
        public string ogrSonAktif;
        public string kisiNo;
        public string kisiAdi;
        private string sifre;
        private static string Host = "localhost";
        private static string User = "postgres";
        private static string DBname = "yemekhane";
        private static string Password = "123";
        private static string Port = "5432";

        string connString = String.Format(
            "Server={0};Username={1};Database={2};Port={3};Password={4};SSLMode=Prefer",
                    Host,
                    User,
                    DBname,
                    Port,
                    Password);

        public NpgsqlConnection conn;
        public string sql;
        public NpgsqlCommand cmd;
        public DataTable dt;
        public Baglanti()
        {
            conn = new NpgsqlConnection(connString);
        }
        public bool oBaglan(string _no, string _sifre)
        {
            try
            {
                conn.Open();
                sql = @"select * from ogr_girisi(:_no,:_sifre)";
                cmd = new NpgsqlCommand(sql, conn);
                cmd.Parameters.AddWithValue("_no", _no);
                cmd.Parameters.AddWithValue("_sifre", _sifre);
                int sonuc = (int)cmd.ExecuteScalar();
                conn.Close();
                if (sonuc == 1)
                {
                    kisiNo = _no;
                    return true;
                }
                else
                {
                    return false;
                }
            }
            catch (Exception)
            {
                return false;
            }
        }
        public bool pBaglan(string _no, string _sifre)
        {
            try
            {
                conn.Open();
                sql = @"select * from personel_girisi(:_no,:_sifre)";
                cmd = new NpgsqlCommand(sql, conn);
                cmd.Parameters.AddWithValue("_no", _no);
                cmd.Parameters.AddWithValue("_sifre", _sifre);
                int sonuc = (int)cmd.ExecuteScalar();
                conn.Close();
                if (sonuc == 1)
                {
                    kisiNo = _no;
                    return true;
                }
                else
                {
                    return false;
                }
            }
            catch (Exception)
            {
                return false;
            }
        }
        public bool yBaglan(string _no, string _sifre)
        {
            try
            {
                conn.Open();
                sql = @"select * from yonetici_girisi(:_no,:_sifre)";
                cmd = new NpgsqlCommand(sql, conn);
                cmd.Parameters.AddWithValue("_no", _no);
                cmd.Parameters.AddWithValue("_sifre", _sifre);
                int sonuc = (int)cmd.ExecuteScalar();
                conn.Close();
                if (sonuc == 1)
                {
                    kisiNo = _no;
                    return true;
                }
                else
                {
                    return false;
                }
            }
            catch (Exception)
            {
                return false;
            }
        }
        public bool ogrBilgi(int _no)
        {
            try
            {
                conn.Open();
                sql = @"select * from ogr_sorgu('"+_no+"')";
                cmd = new NpgsqlCommand(sql, conn);
                NpgsqlDataReader rdr = cmd.ExecuteReader();
                if (rdr.Read())
                {  
                    ogrAd = rdr.GetString(0) + " " + rdr.GetString(1);
                    ogrBakiye = rdr.GetDouble(2);
                    ogrDurum = rdr.GetBoolean(3);
                    conn.Close();
                    return true;  
                }
                else
                {
                    ogrAd = "";
                    ogrBakiye = 0;
                    ogrDurum = false;
                    conn.Close();
                    return false;
                }
            }
            catch (Exception)
            {
                ogrAd = "";
                ogrBakiye = 0;
                ogrDurum = false;
                conn.Close();
                return false;
            }
        }
        public bool ogrKart()
        {
            try
            {
                conn.Open();
                sql = @"select * from ogr_kart_sorgu('" + kisiNo + "')";
                cmd = new NpgsqlCommand(sql, conn);
                NpgsqlDataReader rdr = cmd.ExecuteReader();
                if (rdr.Read())
                {
                    ogrAd = rdr.GetString(0) + " " + rdr.GetString(1);
                    ogrKartNo = rdr.GetInt32(2);
                    ogrBakiye = rdr.GetDouble(3);
                    ogrSonAktif = rdr.GetDate(4).ToString();
                    ogrDurum = rdr.GetBoolean(5);
                    conn.Close();
                    return true;
                }
                else
                {
                    ogrKartNo = 0;
                    ogrAd = "";
                    ogrSonAktif = "";
                    ogrBakiye = 0;
                    ogrDurum = false;
                    conn.Close();
                    return false;
                }
            }
            catch (Exception)
            {
                ogrKartNo = 0;
                ogrAd = "";
                ogrSonAktif = "";
                ogrBakiye = 0;
                ogrDurum = false;
                conn.Close();
                return false;
            }
        }
        public bool bakiyeYukle(int _no,string _bakiye)
        {
            try
            {
                conn.Open();
                _bakiye = _bakiye.Replace(',', '.');
                sql = @"select * from kart_bakiye_update('" + _bakiye + "','"+ _no +"')";
                //sql = @"update kart set son_islem_personel_no = '" + kisiNo + "' where kart_no= '" + _no + "'";
                cmd = new NpgsqlCommand(sql, conn);
                var rdr = cmd.ExecuteNonQuery();
                conn.Close();
                bakiyeGuncel(_no);
                return true;
            }
            catch (Exception)
            {
                conn.Close();
                return false;
            }
        }
        public bool bakiyeGuncel(int _no)
        {
            try
            {
                conn.Open();
                sql = @"update kart set son_islem_personel_no = '" + kisiNo + "' where kart_no= '" + _no + "'";
                cmd = new NpgsqlCommand(sql, conn);
                var rdr = cmd.ExecuteNonQuery();
                conn.Close();
                return true;
            }
            catch (Exception)
            {
                conn.Close();
                return false;
            }
        }
        public bool oAdi()
        {
            try
            {
                conn.Open();
                sql = @"select ad,soyad,sifre from ogrenci where ogrenci_no = '" + kisiNo + "'";
                cmd = new NpgsqlCommand(sql, conn);
                NpgsqlDataReader rdr = cmd.ExecuteReader();
                if (rdr.Read())
                {
                    kisiAdi = rdr.GetString(0) + " " + rdr.GetString(1);
                    sifre = rdr.GetString(2);
                    conn.Close();
                    return true;
                }
                else
                {
                    conn.Close();
                    kisiAdi = "Personel bilgi hatası";
                    return false;
                }
            }
            catch (Exception)
            {
                conn.Close();
                kisiAdi = "Bağlantı hatası";
                return false;
            }
        }
        public bool pAdi()
        {
            try
            {
                conn.Open();
                sql = @"select ad,soyad,sifre from personel where personel_no = '" + kisiNo + "'";
                cmd = new NpgsqlCommand(sql, conn);
                NpgsqlDataReader rdr = cmd.ExecuteReader();
                if (rdr.Read())
                {
                    kisiAdi = rdr.GetString(0) + " " + rdr.GetString(1);
                    sifre = rdr.GetString(2);
                    conn.Close();
                    return true;
                }
                else
                {
                    conn.Close();
                    kisiAdi = "Personel bilgi hatası";
                    return false;
                }
            }
            catch (Exception)
            {
                conn.Close();
                kisiAdi = "Bağlantı hatası";
                return false;
            }
        }
        public bool yAdi()
        {
            try
            {
                conn.Open();
                sql = @"select ad,soyad,sifre from yonetici where yonetici_no = '" + kisiNo + "'";
                cmd = new NpgsqlCommand(sql, conn);
                NpgsqlDataReader rdr = cmd.ExecuteReader();
                if (rdr.Read())
                {
                    kisiAdi = rdr.GetString(0) + " " + rdr.GetString(1);
                    sifre = rdr.GetString(2);
                    conn.Close();
                    return true;
                }
                else
                {
                    conn.Close();
                    kisiAdi = "Yonetici bilgi hatası";
                    return false;
                }
            }
            catch (Exception)
            {
                conn.Close();
                kisiAdi = "Bağlantı hatası";
                return false;
            }
        }
        public bool psifreDegistir(string eskiSifre,string yeniSifre) 
        {
            if (eskiSifre == sifre)
            {
                try
                {
                    conn.Open();
                    sql = @"update personel set sifre = '"+ yeniSifre +"' where personel_no ='"+ kisiNo +"'";
                    cmd = new NpgsqlCommand(sql, conn);
                    var rdr = cmd.ExecuteNonQuery();
                    conn.Close();
                    pAdi();
                    return true;
                }
                catch (Exception)
                {
                    conn.Close();
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        public bool osifreDegistir(string eskiSifre, string yeniSifre)
        {
            if (eskiSifre == sifre)
            {
                try
                {
                    conn.Open();
                    sql = @"update ogrenci set sifre = '" + yeniSifre + "' where ogrenci_no ='" + kisiNo + "'";
                    cmd = new NpgsqlCommand(sql, conn);
                    var rdr = cmd.ExecuteNonQuery();
                    conn.Close();
                    oAdi();
                    return true;
                }
                catch (Exception)
                {
                    conn.Close();
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        public bool ysifreDegistir(string eskiSifre, string yeniSifre)
        {
            if (eskiSifre == sifre)
            {
                try
                {
                    conn.Open();
                    sql = @"update yonetici set sifre = '" + yeniSifre + "' where yonetici_no ='" + kisiNo + "'";
                    cmd = new NpgsqlCommand(sql, conn);
                    var rdr = cmd.ExecuteNonQuery();
                    conn.Close();
                    yAdi();
                    return true;
                }
                catch (Exception)
                {
                    conn.Close();
                    return false;
                }
            }
            else
            {
                return false;
            }
        }
        public DataTable ogrGecmis()
        {
            try
            {
                conn.Open();
                sql = @"select * from ogr_gecmis('" + ogrKartNo + "');";
                cmd = new NpgsqlCommand(sql, conn);
                dt = new DataTable();
                dt.Load(cmd.ExecuteReader());
                conn.Close();
                return dt;
            }
            catch (Exception)
            {
                conn.Close();
                return null;
            }
        }
        public DataTable ogrenciler(string ara ,string sirala,string arama)
        {
            try
            {
                conn.Open();
                sql = @"select * from ogrenciler() where " + ara + " like '%" + arama+ "%' order by " + sirala+";";
                cmd = new NpgsqlCommand(sql, conn);
                dt = new DataTable();
                dt.Load(cmd.ExecuteReader());
                conn.Close();
                return dt;
            }
            catch (Exception)
            {
                conn.Close();
                return null;
            }
        }
        public DataTable ogun()
        {
            try
            {
                conn.Open();
                sql = @"select  * from ogun;";
                cmd = new NpgsqlCommand(sql, conn);
                dt = new DataTable();
                dt.Load(cmd.ExecuteReader());
                conn.Close();
                return dt;
            }
            catch (Exception)
            {
                conn.Close();
                return null;
            }
        }
        public DataTable yemekhane()
        {
            try
            {
                conn.Open();
                sql = @"select  * from yemekhane;";
                cmd = new NpgsqlCommand(sql, conn);
                dt = new DataTable();
                dt.Load(cmd.ExecuteReader());
                conn.Close();
                return dt;
            }
            catch (Exception)
            {
                conn.Close();
                return null;
            }
        }
        public bool ogrEkle(string ogr_no, string ad,string soyad ,string sifre)
        {
            try
            {
                conn.Open();
                sql = @"insert into ogrenci values('" + ogr_no + "','" + sifre + "','"+soyad+"','"+ad+"')";
                cmd = new NpgsqlCommand(sql, conn);
                var rdr = cmd.ExecuteNonQuery();
                conn.Close();
                return true;
            }
            catch (Exception)
            {
                conn.Close();
                return false;
            }
        }
        public bool ogunEkle(string baslamaSaati, string bitisSaati, string ogun, string ucret)
        {
            try
            {
                conn.Open();
                ucret = ucret.Replace(',', '.');
                sql = @"insert into ogun values('" + baslamaSaati + "','" + bitisSaati + "','" + ogun + "','" + ucret+"')";
                cmd = new NpgsqlCommand(sql, conn);
                var rdr = cmd.ExecuteNonQuery();
                conn.Close();
                return true;
            }
            catch (Exception)
            {
                conn.Close();
                return false;
            }
        }
        public bool ogunGuncelle(string baslamaSaati, string bitisSaati, string ogun, string ucret)
        {
            try
            {
                conn.Open();
                ucret = ucret.Replace(',', '.');
                sql = @"update ogun set baslama_saati ='"+baslamaSaati+ "', bitis_saati ='" + bitisSaati + "', ogun='" + ogun + "', ucret='" + ucret + "'where ogun='" + ogun + "'";
                cmd = new NpgsqlCommand(sql, conn);
                var rdr = cmd.ExecuteNonQuery();
                conn.Close();
                return true;
            }
            catch (Exception)
            {
                conn.Close();
                return false;
            }
        }
        public bool ogunSil(string ogun)
        {
            try
            {
                conn.Open();
                sql = @"delete from ogun where ogun ='" + ogun + "'";
                cmd = new NpgsqlCommand(sql, conn);
                var rdr = cmd.ExecuteNonQuery();
                conn.Close();
                return true;
            }
            catch (Exception)
            {
                conn.Close();
                return false;
            }
        }
        public bool yemekhaneEkle(string yemekhane, string adres, string detay)
        {
            try
            {
                conn.Open();
                sql = @"insert into yemekhane values('" + yemekhane + "','" + adres + "','" + detay + "')";
                cmd = new NpgsqlCommand(sql, conn);
                var rdr = cmd.ExecuteNonQuery();
                conn.Close();
                return true;
            }
            catch (Exception)
            {
                conn.Close();
                return false;
            }
        }
        public bool yemekhaneGuncelle(string yemekhane, string adres, string detay)
        {
            try
            {
                conn.Open();
                sql = @"update yemekhane set yemekhane ='" + yemekhane + "', adres ='" + adres + "', detaylar='" + detay + "'where yemekhane='" + yemekhane + "'";
                cmd = new NpgsqlCommand(sql, conn);
                var rdr = cmd.ExecuteNonQuery();
                conn.Close();
                return true;
            }
            catch (Exception)
            {
                conn.Close();
                return false;
            }
        }
        public bool yemekhaneSil(string yemekhane)
        {
            try
            {
                conn.Open();
                sql = @"delete from yemekhane where yemekhane ='" + yemekhane + "'";
                cmd = new NpgsqlCommand(sql, conn);
                var rdr = cmd.ExecuteNonQuery();
                conn.Close();
                return true;
            }
            catch (Exception)
            {
                conn.Close();
                return false;
            }
        }

    }
}
