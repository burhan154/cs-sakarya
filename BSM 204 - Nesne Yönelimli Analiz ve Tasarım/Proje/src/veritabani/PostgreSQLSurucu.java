package veritabani;

import java.sql.*;

public class PostgreSQLSurucu implements VeritabaniSurucu{

    private String url = "jdbc:postgresql://localhost:5432/proje";
    private Connection conn=null;
    @Override
    public void baglan(){
        try {
            conn = DriverManager.getConnection(url,"postgres", "123");
            if (conn != null) {
                String sql = "SELECT name, pass FROM users";

                System.out.println("Veritabanına bağlandı!");
            }
            else
                System.out.println("Bağlantı girişimi başarısız!");
        } catch (Exception e) {
            e.printStackTrace();
        }
    }
    @Override
    public boolean giris(String name, String password){

        try {
            CallableStatement stmt = conn.prepareCall("{?= call giris(?,?)}");
            stmt.setString(2,name);
            stmt.setString(3,password);
            stmt.registerOutParameter(1,Types.INTEGER);
            stmt.execute();

            if(stmt.getInt(1)==1)
                return true;

            return false;
        } catch (Exception e) {
            e.printStackTrace();
            return false;
        }
    }

    public void sorguCalistir(){

    }

    public void baglantiSonlandir(){

    }
}
