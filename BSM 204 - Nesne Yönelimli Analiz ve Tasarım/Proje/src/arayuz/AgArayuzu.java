package arayuz;

import anaislem.AnaIslemPlatformu;

import java.util.Scanner;

public class AgArayuzu implements IAgArayuzu {

    AnaIslemPlatformu anaIslemPlatformu = new AnaIslemPlatformu();

    private static final int SICAKLIK_GOSTER = 1;
    private static final int SOGUTUCU_AC = 2;
    private static final int SOGUTUCU_KAPAT = 3;
    private static final int CIKIS = 4;

    public AgArayuzu(){
        menuGiris();
    }

    @Override
    public void menuGiris() {
        Scanner scan = new Scanner(System.in);
        String name;
        String sifre;
        do{
            System.out.print("Kullanıcı Adı giriniz : ");
            name = scan.next();
            System.out.print("Sifre giriniz : ");
            sifre = scan.next();
        }while (!anaIslemPlatformu.girisYap(name,sifre));
        menu();
    }

    @Override
    public void menuIslem() {
        System.out.println("-----------------------");
        System.out.println("| 1 - Sıcaklık Goster |");
        System.out.println("| 2 - Sogutucu Ac     |");
        System.out.println("| 3 - Sogutucu Kapat  |");
        System.out.println("| 4 - Cıkıs           |");
        System.out.println("-----------------------");
        System.out.print("Islem Giriniz: ");
    }

    @Override
    public void menu() {
        Scanner scan = new Scanner(System.in);
        int islem = 0;
        do{
            menuIslem();
            islem = scan.nextInt();
            System.out.println("\n-----------------------");
            switch (islem){
                case SICAKLIK_GOSTER:
                    anaIslemPlatformu.sicaklikOku();
                    break;
                case SOGUTUCU_AC:
                    anaIslemPlatformu.sogutucuAc();
                    break;
                case SOGUTUCU_KAPAT:
                    anaIslemPlatformu.sogutucuKapat();
                    break;
                case CIKIS:
                    System.exit(0);
                    break;
                default:
                    break;
            }
        }while (islem!=4);
    }
}
