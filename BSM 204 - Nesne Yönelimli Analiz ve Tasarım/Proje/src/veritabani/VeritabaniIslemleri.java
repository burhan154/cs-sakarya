package veritabani;

import cevreselbirimler.Eyleyici;

public class VeritabaniIslemleri {

    private VeritabaniSurucu veritabani;

    public VeritabaniIslemleri(VeritabaniSurucu veritabani) {
        this.veritabani = veritabani;
    }
    public void baglan(){
        veritabani.baglan();
    }
    public boolean giris(String name,String password){
        return veritabani.giris(name,password);
    }



    public void ekle(){
        veritabani.sorguCalistir();
    }
    public void sil(){
        veritabani.sorguCalistir();
    }
    public void guncelle(){
        veritabani.sorguCalistir();
    }
    public void listele(){
        veritabani.sorguCalistir();
    }
    public void baglantiSonlandir(){
        veritabani.baglantiSonlandir();
    }
}
