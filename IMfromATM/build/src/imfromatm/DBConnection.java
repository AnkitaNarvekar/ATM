/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package imfromatm;

import java.sql.*;
import java.util.logging.Level;
import java.util.logging.Logger;

public class DBConnection{
        Connection con;
        Statement st;
        public Statement DBC(){
        try {
               Class.forName("com.mysql.jdbc.Driver");
               con=DriverManager.getConnection("jdbc:mysql://localhost:3306/money","root","");
               st=con.createStatement();
        } catch (SQLException ex) {
            Logger.getLogger(DBConnection.class.getName()).log(Level.SEVERE, null, ex);
        } catch (ClassNotFoundException ex) {
            Logger.getLogger(DBConnection.class.getName()).log(Level.SEVERE, null, ex);
        }
            return st;
        }
}