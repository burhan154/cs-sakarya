package observer;

public class Kullanici implements IObserver{

    private String name;

    public Kullanici(String name){
        this.name = name;
    }

    @Override
    public void update(String mesaj) {
        System.out.print("\n"+ name + " -> " + mesaj );
    }
}
