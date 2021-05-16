package cevreselbirimler;

public class Eyleyici implements IEyleyici{

    private boolean sogutucuAcikMi;

    public Eyleyici(){
        sogutucuAcikMi = false;
    }

    @Override
    public boolean sogutucuAc() {
        if(sogutucuAcikMi == true){
            System.out.println("Sogutucu zaten acık.");
            return false;
        }else{
            sogutucuAcikMi=true;
            System.out.println("Sogutucu acıldı.");
            return true;
        }
    }
    @Override
    public boolean sogutucuKapat() {
        if(sogutucuAcikMi == false){
            System.out.println("Sogutucu zaten kapalı.");
            return false;
        }else{
            sogutucuAcikMi=false;
            System.out.println("Sogutucu kapatıldı.");
            return true;
        }
    }
}
