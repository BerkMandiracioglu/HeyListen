package com.compy;


import java.sql.*;
import java.util.ArrayList;
import java.util.Locale;

/**
 * Created by wifinaynay on 21/06/17.
 */
public class DBaccess {
    private Connection connect = null;
    private Statement statement = null;
    private ResultSet resultSet = null;
    public DBaccess()
    {
        try {
            Class.forName("com.mysql.jdbc.Driver");
            // Setup the connection with the DB
            connect = DriverManager
                    .getConnection();

            // Statements allow to issue SQL queries to the database
            statement = connect.createStatement();

        } catch (Exception e) {
            System.out.println("There is an error ");
        }
    }
    public void createTable() {

            createUserTable();
            createAccountTable();
            createOwnsTable();



    }
    public void createUserTable() {
        try {
            statement.executeUpdate("DROP TABLE IF EXISTS  owns ");
            statement.executeUpdate("DROP TABLE IF EXISTS  customer");

            statement.executeUpdate("CREATE TABLE customer (cid char(12), name char(50), bdate DATE,profession varchar(25),address varchar(50),city varchar(20),nationality varchar(20) , PRIMARY KEY (cid)) ENGINE=InnoDB");
        }
        catch(Exception e){
            System.out.println("There is an error user");
            return;
        }
    }
    public void createAccountTable(){
        try {
            statement.executeUpdate("DROP TABLE IF EXISTS  owns ");
            statement.executeUpdate("DROP TABLE IF EXISTS  account ");
            statement.executeUpdate("CREATE TABLE account (aid CHAR(8), branch VARCHAR(20), balance FLOAT, openDate DATE, PRIMARY KEY (aid)) ENGINE=InnoDB");

        }
        catch(Exception e){
            System.out.println("There is an error account");
            return;
        }

    }
    public void createOwnsTable(){
        try{
            statement.executeUpdate("DROP TABLE IF EXISTS  owns ");
            statement.executeUpdate("CREATE TABLE owns (cid CHAR(12), aid CHAR(8), foreign key(aid) references account(aid), FOREIGN KEY(cid) references customer(cid)) ENGINE=InnoDB");
            }
        catch(Exception e){
            System.out.println("There is an error owns");
            return;
        }

    }
    public void insertUserTable(User me){
        try {

            String dateString = me.getBdate();

            java.text.DateFormat formatter = new java.text.SimpleDateFormat("dd.MM.yyyy", Locale.GERMANY);
            java.util.Date myDate = formatter.parse(dateString);
            //System.out.println(formatter);
            java.sql.Date sqlDate = new java.sql.Date(myDate.getTime());

            //System.out.println(sqlDate);
            String stmt = "insert into customer values ('";
            stmt += me.getCid() +"', '";
            stmt+=me.getName() +"', '";
            stmt+=sqlDate+"','";
            stmt+=me.getProfession()+"','";
            stmt+= me.getAddress() + "','";
            stmt += me.getCity()+"','";
            stmt += me.getNationality()+"' )";

            statement.executeUpdate(stmt);
            return;
        }
        catch(Exception e){
            System.out.println("There is an error here");
            return;
        }
    }
    public void insertAccountTable(Account acc){
        try {
            String dateString = acc.getOpenDate();
            java.text.DateFormat formatter = new java.text.SimpleDateFormat("dd.MM.yyyy",Locale.GERMANY);
            java.util.Date myDate = formatter.parse(dateString);
            java.sql.Date sqlDate = new java.sql.Date(myDate.getTime());
            String stmt = "insert into account values ('";
            stmt += acc.getAid() + "', '";
            stmt += acc.getBranch() +"', ";
            stmt += acc.getBalance() + ", '";
            stmt += sqlDate + "')";
            statement.executeUpdate(stmt);
            return;
        }
        catch(Exception e){
            return;
        }
    }
    public void insertOwnsTable(Owns own){
        try {
            String stmt = "insert into owns values ('";
            stmt += own.getCid() + "','";
            stmt += own.getAid() + "')";
            statement.executeUpdate(stmt);
        }
        catch(Exception e){
            return;
        }
    }
    public User fetchUser(String cid){
        User tmp=null;
        try {
            resultSet = statement
                    .executeQuery("select * from customer");
            while (resultSet.next()) {

                java.text.DateFormat df = new java.text.SimpleDateFormat("dd.MM.yyyy",Locale.GERMANY);



                String reportDate = df.format(resultSet.getDate("bdate"));
                String c_id=resultSet.getString("cid");

                if(cid.equals(c_id)){
                    tmp = new User(c_id,resultSet.getString("name"),reportDate, resultSet.getString("profession")
                    ,resultSet.getString("address"),resultSet.getString("city"),resultSet.getString("nationality"));
                }
            }
            return tmp;
        }
        catch(Exception e){
            return tmp;
        }

    }
    public Account fetchAccount(String aid){
        Account tmp = null;
        try {
            resultSet = statement
                    .executeQuery("select * from customer");
            while (resultSet.next()) {

                java.text.DateFormat df = new java.text.SimpleDateFormat("dd.MM.yyyy",Locale.GERMANY);



                String reportDate = df.format(resultSet.getDate("openDate"));
                String a_id=resultSet.getString("aid");

                if(aid.equals(a_id)){
                    tmp = new Account(a_id,resultSet.getString("branch"),resultSet.getFloat("balance"),reportDate );
                }
            }
            return tmp;
        }
        catch(Exception e){
            return tmp;
        }
    }

    public boolean deleteUser(String user){
        try {
            statement.executeUpdate("delete from members where username='" + user + "'");
            return true;
        }catch(Exception e) {
            return false;
        }
    }





    public ArrayList<User> listUsers(){
        ArrayList<User> listOfUsers = new ArrayList<User>();
        try{
        resultSet = statement
                .executeQuery("select * from customer");

            User tmp;
        while (resultSet.next()) {

            java.text.DateFormat df = new java.text.SimpleDateFormat("dd.MM.yyyy",Locale.GERMANY);

            java.util.Date today = resultSet.getDate("bdate");
// Using DateFormat format method we can create a string
// representation of a date with the defined format.
            String  reportDate= df.format(today);


            tmp = new User(resultSet.getString("cid"),resultSet.getString("name"),reportDate, resultSet.getString("profession")
                    ,resultSet.getString("address"),resultSet.getString("city"),resultSet.getString("nationality"));


            listOfUsers.add(tmp);
        }
        return listOfUsers;
        }
        catch(Exception e){
            return null;
            }




    }

    public ArrayList<Owns> listOwns(){
        ArrayList<Owns> listOfOwns = new ArrayList<Owns>();
        try{
            resultSet = statement
                    .executeQuery("select * from owns");

            Owns tmp;
            while (resultSet.next()) {



                tmp = new Owns(resultSet.getString("cid"),resultSet.getString("aid")) ;


                listOfOwns.add(tmp);
            }
            return listOfOwns;
        }
        catch(Exception e){
            return null;
        }

    }

    public ArrayList<Account> listAccounts(){
        ArrayList<Account> listOfAccounts=new ArrayList<Account>();

        try{
            resultSet = statement
                    .executeQuery("select * from account");

            Account tmp;
            while (resultSet.next()) {
                java.text.DateFormat df = new java.text.SimpleDateFormat("dd.MM.yyyy",Locale.GERMANY);

                java.util.Date today = resultSet.getDate("openDate");

                String reportDate = df.format(today);
                tmp = new Account(resultSet.getString("aid"),resultSet.getString("branch"),resultSet.getFloat("balance"),reportDate );
                listOfAccounts.add(tmp);

            }


            return listOfAccounts;
        }
        catch(Exception e){
            return null;
        }

    }



}
