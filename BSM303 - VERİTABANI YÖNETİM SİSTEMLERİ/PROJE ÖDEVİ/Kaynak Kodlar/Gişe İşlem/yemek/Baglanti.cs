using Npgsql;
using System;
using System.Collections;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace yemek
{
    class Baglanti
    {
        public ArrayList yemekhane = new ArrayList();
        public ArrayList adres = new ArrayList();
        public ArrayList detay = new ArrayList();

        public int fatura_no;
        public string ogun;
        public double ogun_ucret;

        public string ogrAd;
        public bool ogrDurum;
        public double ogrBakiye;

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

        private NpgsqlConnection conn;
        private string sql;
        private NpgsqlCommand cmd;
        private DataTable dt;
        public Baglanti()
        {
            conn = new NpgsqlConnection(connString);
        }
        public bool yemekhaneler()
        {
            try
            {
                conn.Open();
                sql = @"select * from yemekhane";
                cmd = new NpgsqlCommand(sql, conn);
                NpgsqlDataReader rdr = cmd.ExecuteReader();
                while (rdr.Read())
                {  
                    yemekhane.Add(rdr.GetString(0));
                    adres.Add(rdr.GetString(0));
                    detay.Add(rdr.GetString(0));
                }
                conn.Close();
                return true;
            }
            catch (Exception)
            {
                conn.Close();
                return false;
            }
        }
        public bool faturaEkle()
        {
            try
            {
                conn.Open();
                sql = @"insert into fatura (fatura_tarihi,fatura_saati) values(now(),current_timestamp::time(0)) RETURNING fatura_no";
                cmd = new NpgsqlCommand(sql, conn);
                NpgsqlDataReader rdr = cmd.ExecuteReader();
                if (rdr.Read())
                {
                    fatura_no = rdr.GetInt32(0);
                    conn.Close();
                    return true;
                }
                else
                {
                    conn.Close();
                    return false;
                }
            }
            catch (Exception)
            {
                conn.Close();
                return false;
            }
        }
        public bool ogunSorgu()
        {
            try
            {
                conn.Open();
                sql = @"select * from ogun_sorgu()";
                cmd = new NpgsqlCommand(sql, conn);
                NpgsqlDataReader rdr = cmd.ExecuteReader();
                while (rdr.Read())
                {
                    ogun= rdr.GetString(0);
                    ogun_ucret = rdr.GetDouble(1);

                }
                conn.Close();
                return true;
            }
            catch (Exception)
            {
                conn.Close();
                return false;
            }
        }
        public bool giseEkle(int kart_no,string secili_yemekhane)
        {
            try
            {
                conn.Open();
                sql = @"insert into gise values('"+kart_no+"','"+fatura_no+"','"+ogun+"','"+ secili_yemekhane + "');";
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
        public bool ogrBilgi(int _no)
        {
            try
            {
                conn.Open();
                sql = @"select * from ogr_sorgu('" + _no + "')";
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
        public bool ucretKesimi(int _no, string _bakiye)
        {
            try
            {
                conn.Open();
                _bakiye = _bakiye.Replace(',', '.');
                sql = @"select * from kart_bakiye_update('" + _bakiye + "','" + _no + "')";
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
        public bool ogr_yemek(int _kart_no)
        {
            try
            {
                conn.Open();
                sql = @"select * from yemek_sorgu('"+ ogun + "','"+ _kart_no + "')";
                cmd = new NpgsqlCommand(sql, conn);

                int sonuc = (int)cmd.ExecuteScalar();
                conn.Close();
                if (sonuc == 0)
                {
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
        public DataTable yiyenListesi(string secili_yemekhane)
        {
            try
            {
                conn.Open();
                sql = @"select * from yiyenlerin_listesi('"+ogun+"','"+secili_yemekhane+"') limit 10;";
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
    }
}
