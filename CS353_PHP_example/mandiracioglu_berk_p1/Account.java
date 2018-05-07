package com.compy;

/**
 * Created by wifinaynay on 05/04/18.
 */
public class Account {
    private String aid;
    private String branch;
    private float balance;
    private String openDate;


    public Account(String aid,String branch,float balance,String openDate){
        this.aid=aid;
        this.branch = branch;
        this.balance = balance;
        this.openDate = openDate;
    }

    public void setAid(String aid) {
        this.aid = aid;
    }

    public void setBalance(float balance) {
        this.balance = balance;
    }

    public void setBranch(String branch) {
        this.branch = branch;
    }

    public void setOpenDate(String openDate) {
        this.openDate = openDate;
    }

    public String getAid() {
        return aid;
    }

    public float getBalance() {
        return balance;
    }

    public String getBranch() {
        return branch;
    }

    public String getOpenDate() {
        return openDate;
    }
}
