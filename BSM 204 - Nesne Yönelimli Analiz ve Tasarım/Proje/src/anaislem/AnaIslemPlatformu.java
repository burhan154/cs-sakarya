package anaislem;

import cevreselbirimler.Eyleyici;
import cevreselbirimler.SicaklikAlgilayici;
import observer.Kullanici;
import veritabani.MySQLSurucu;
import veritabani.PostgreSQLSurucu;
import veritabani.VeritabaniIslemleri;
import veritabani.VeritabaniSurucu;

import java.util.Timer;
import java.util.TimerTask;

public class AnaIslemPlatformu implements IAnaIslemPlatformu{
    Eyleyici eyleyici = new Eyleyici();

    SicaklikAlgilayici sicaklikAlgilayici = new SicaklikAlgilayici.SicaklikAlgilayiciBuilder(50,70)
            .setCelsius()
            .build();


    VeritabaniSurucu veritabaniSurucu = new PostgreSQLSurucu();
    //VeritabaniSurucu veritabaniSurucu = new MySQLSurucu();
    VeritabaniIslemleri veritabaniIslemleri = new VeritabaniIslemleri(veritabaniSurucu);


    public AnaIslemPlatformu(){
        veritabaniIslemleri.baglan();
    }

    public boolean girisYap(String name, String password) {
        if (!veritabaniIslemleri.giris(name,password))
            System.out.println("Kullanıcı adı veya sifre hatalı. Tekrar deneyiniz");
        else {

            Kullanici s1 = new Kullanici(name);
            sicaklikAlgilayici.attach(s1);

            sicaklikAlgilayici.sicaklikArttir();
            sicaklikKontrol();
        }
        return veritabaniIslemleri.giris(name,password);
    }


    @Override
    public boolean sogutucuAc() {
        sicaklikAlgilayici.sicaklikAzalt();
        return eyleyici.sogutucuAc();
    }
    @Override
    public boolean sogutucuKapat() {
        if(sicaklikAlgilayici.kritikSicaklikKontrol()){
            sicaklikAlgilayici.sicaklikAzalt();
            return eyleyici.sogutucuAc();
        }
        sicaklikAlgilayici.sicaklikArttir();
        return eyleyici.sogutucuKapat();
    }
    @Override
    public void sicaklikOku() {
        System.out.println(sicaklikAlgilayici.sicaklikOku());
    }

    private void sicaklikKontrol(){
        Timer timer = new Timer();
        TimerTask task = new TimerTask() {
            @Override
            public void run() {
                if(sicaklikAlgilayici.kritikSicaklikKontrol()){
                    sicaklikAlgilayici.sicaklikAzalt();
                    eyleyici.sogutucuAc();
                }
            }
        };
        timer.schedule(task,0,30000);
    }
}
