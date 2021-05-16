package cevreselbirimler;

import observer.ISubject;
import observer.Publisher;

import java.util.Random;
import java.util.Timer;
import java.util.TimerTask;
import java.util.concurrent.Flow;

public class SicaklikAlgilayici extends Publisher implements ISicaklikAlgilayici  {

    private int sicaklik;
    private int kritikSicaklik;
    private int optimumSicaklik;
    private boolean celsiusMu;

    private SicaklikAlgilayici(SicaklikAlgilayiciBuilder builder){
        this.celsiusMu = builder.celsiusMu;
        setKritikSicaklik(builder.kritikSicaklik);
        setOptimumSicaklik(builder.optimumSicaklik);
        RandomSicaklkik();
    }

    public static class SicaklikAlgilayiciBuilder{

        private int kritikSicaklik;
        private int optimumSicaklik;
        private boolean celsiusMu;

        public SicaklikAlgilayiciBuilder(int optimumSicaklik, int kritikSicaklik){
            this.kritikSicaklik = kritikSicaklik;
            this.optimumSicaklik = optimumSicaklik;
            this.celsiusMu = true;
        }
        public SicaklikAlgilayiciBuilder setKelvin(){
            this.celsiusMu = false;
            return this;
        }
        public SicaklikAlgilayiciBuilder setCelsius(){
            this.celsiusMu = true;
            return this;
        }
        public SicaklikAlgilayici build(){
            return new SicaklikAlgilayici(this);
        }

    }


    private void RandomSicaklkik() {
        Random random = new Random();
        sicaklik =donusumKelvin(random.nextInt(100));
    }

    private int donusumKelvin(int sicak){
        if(celsiusMu == true)
            return sicak;
        else
            return sicak + 273;
    }

    private String sicaklikSembol(int sicak){
        if(celsiusMu == true)
            return sicak + " Celsius";
        else
            return sicak + " Kelvin";
    }

    public boolean setKelvin(){
        if(celsiusMu == true){
            celsiusMu = false;
            sicaklik = sicaklik + 273;
            kritikSicaklik = kritikSicaklik + 273;
            optimumSicaklik = optimumSicaklik + 273;
            System.out.println("Sıcaklık birimi Kelvin olarak değiştirildi.");
            return true;
        }
        System.out.println("Sıcaklık birimi zaten Kelvin.");
        return false;
    }
    public boolean setCelsius(){
        if(celsiusMu == false){
            celsiusMu = true;
            sicaklik = sicaklik - 273;
            kritikSicaklik = kritikSicaklik - 273;
            optimumSicaklik = optimumSicaklik - 273;
            System.out.println("Sıcaklık birimi Celsius olarak değiştirildi.");
            return true;
        }
        System.out.println("Sıcaklık birimi zaten Celsius.");
        return false;
    }
    @Override
    public int getSicaklik() {
        return sicaklik;
    }

    public String sicaklikOku() {
        //System.out.println("Sıcaklık : "+  sicaklikSembol(sicaklikOku()));
        return "Sıcaklık : "+sicaklikSembol(getSicaklik());
    }

    public boolean setOptimumSicaklik(int sicak) {
        if(sicak<kritikSicaklik){
            optimumSicaklik = sicak;
            return true;
        }
        optimumSicaklik = sicak-10;
        return true;
    }

    public boolean setKritikSicaklik(int sicak) {
        kritikSicaklik = sicak;
        return true;
    }
    public int getOptimumSicaklik() {
        return optimumSicaklik;
    }
    public int getKritikSicaklik() {
        return kritikSicaklik;
    }

    public boolean kritikSicaklikKontrol(){
        if(sicaklik>=kritikSicaklik){
            notify("Sıcaklık kritik sıcaklığın üzerinde : " + sicaklikOku() + " : ");
            return true;
        }
        else
            return false;
    }

    /////////////////////////////////////////////
    /////////////////////////////////////////////

    private int sicaklikArt = 0 ;

    public void sicaklikArttir(){
        if(sicaklikArt==0){
            sicaklikArt = 1;
            sicaklikDegistir();
        }
        sicaklikArt = 1;
    }
    public void sicaklikAzalt(){
        if(sicaklikArt==0){
            sicaklikArt = -1;
            sicaklikDegistir();
        }
        sicaklikArt = -1;
    }
    private void sicaklikDegistir(){
        Timer timer = new Timer();
        TimerTask task = new TimerTask() {
            @Override
            public void run() {
                if(sicaklikArt == 1)
                    sicaklik++;
                else
                    sicaklik--;
            }
        };
        timer.schedule(task,0,5000);
    }

    /////////////////////////////////////////////
    /////////////////////////////////////////////
    @Override
    public String toString(){
        return  "Sicaklik: " + sicaklikSembol(getSicaklik()) +
                " Optimum Sicaklik: " + sicaklikSembol(getOptimumSicaklik()) +
                " Kritik Sicaklik: " + sicaklikSembol(getKritikSicaklik());
    }




}
