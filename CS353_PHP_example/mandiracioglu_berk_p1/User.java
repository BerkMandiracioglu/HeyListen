package com.compy;

/**
 * Created by wifinaynay on 21/06/17.
 */
public class User {
    private String cid;
    private String name;
    private String profession;
    private String bdate;
    private String address;
    private String city;
    private String nationality;

    public User(String cid,String name,String bdate,String profession,String address,String city,String nationality){
        this.name=name;
        this.cid = cid;
        this.name=name;
        this.profession = profession;
        this.bdate = bdate;
        this.address = address;
        this.city = city;
        this.nationality = nationality;

    }

    public void setAddress(String address) {
        this.address = address;
    }

    public void setBdate(String bdate) {
        this.bdate = bdate;
    }

    public void setCid(String cid) {
        this.cid = cid;
    }

    public void setCity(String city) {
        this.city = city;
    }

    public void setNationality(String nationality) {
        this.nationality = nationality;
    }

    public void setProfession(String profession) {
        this.profession = profession;
    }

    public String getName() {
        return name;
    }


    public String getAddress() {
        return address;
    }

    public String getBdate() {
        return bdate;
    }

    public String getCid() {
        return cid;
    }

    public String getCity() {
        return city;
    }

    public String getNationality() {
        return nationality;
    }

    public String getProfession() {
        return profession;
    }

}
