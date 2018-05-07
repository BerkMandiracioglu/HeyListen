package com.compy;

import java.util.ArrayList;

/**
 * Created by wifinaynay on 05/04/18.
 */
public class Testdb {
    public static void main(String args[]){
        DBaccess dbman = new DBaccess();
        dbman.createTable();
        User tmp = new User("20000001","Cem","10.11.1980","Engineer","Tunali","Ankara","TC");
        dbman.insertUserTable(tmp);
        tmp = new User("20000002","Asli","08.09.1985","Teacher","Nisantasi","Istanbul","TC");
        dbman.insertUserTable(tmp);
        tmp = new User("20000003","Ahmet","11.02.1995","Salesman","Karsiyaka","Izmir","TC");
        dbman.insertUserTable(tmp);
        tmp = new User("20000004","John","16.04.1990","Architect","Kizilay","Ankara","TC");
        dbman.insertUserTable(tmp);

        Account acc = new Account("A0000001","Kizilay",2000,"01.01.2009" );
        dbman.insertAccountTable(acc);
        acc = new Account("A0000002","Bilkent",8000,"01.01.2011" );
        dbman.insertAccountTable(acc);
        acc = new Account("A0000003","Cankaya",4000,"01.01.2012" );
        dbman.insertAccountTable(acc);
        acc = new Account("A0000004","Sincan",1000,"01.01.2012" );
        dbman.insertAccountTable(acc);
        acc = new Account("A0000005","Tandogan",3000,"01.01.2013" );
        dbman.insertAccountTable(acc);
        acc = new Account("A0000006","Eryaman",5000,"01.01.2015" );
        dbman.insertAccountTable(acc);
        acc = new Account("A0000007","Umitkoy",6000,"01.01.2017" );
        dbman.insertAccountTable(acc);

        Owns own = new Owns("20000001","A0000001");
        dbman.insertOwnsTable(own);
        own = new Owns("20000001","A0000002");
        dbman.insertOwnsTable(own);
        own = new Owns("20000001","A0000003");
        dbman.insertOwnsTable(own);
        own = new Owns("20000001","A0000004");
        dbman.insertOwnsTable(own);
        own = new Owns("20000002","A0000002");
        dbman.insertOwnsTable(own);
        own = new Owns("20000002","A0000003");
        dbman.insertOwnsTable(own);
        own = new Owns("20000002","A0000005");
        dbman.insertOwnsTable(own);
        own = new Owns("20000003","A0000006");
        dbman.insertOwnsTable(own);
        own = new Owns("20000003","A0000007");
        dbman.insertOwnsTable(own);
        own = new Owns("20000004","A0000006");
        dbman.insertOwnsTable(own);

        ArrayList<Account> listAcc = dbman.listAccounts();
        ArrayList<Owns> listOwns = dbman.listOwns();
        ArrayList<User> listUser = dbman.listUsers();
        System.out.println("Account Table");
        System.out.println("aid         branch     opendate      balance");
        for (int i = 0; i < listAcc.size();i++){
            System.out.println(listAcc.get(i).getAid() +"    "+ listAcc.get(i).getBranch() + "    "+listAcc.get(i).getOpenDate() + "    "+listAcc.get(i).getBalance()  );
        }
        System.out.println("Customer Table");
        System.out.println("cid         name     bdate      profession     adress     city    nationality");
        for (int i = 0; i < listUser.size();i++){
            System.out.println(listUser.get(i).getCid() +"    "+ listUser.get(i).getName() + "    "+listUser.get(i).getBdate() + "    "+listUser.get(i).getProfession()+ "    "+listUser.get(i).getAddress() + "    "+listUser.get(i).getCity() + "    "+listUser.get(i).getNationality()  );
        }
        System.out.println("Owns Table");
        System.out.println("cid           aid");
        for (int i = 0; i < listOwns.size();i++){
            System.out.println(listOwns.get(i).getCid() +"    "+ listOwns.get(i).getAid()  );
        }

    }

}
